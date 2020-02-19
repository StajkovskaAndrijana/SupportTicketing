<?php

namespace App\Http\Controllers\Tickets;

use App\Mailers\AppMailer;
use App\Models\Tickets\Type;
use Illuminate\Http\Request;
use App\Models\Tickets\Status;
use App\Models\Tickets\Ticket;
use App\Models\Tickets\Category;
use App\Models\Tickets\Document;
use App\Models\Tickets\Priority;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Tickets\StatusNotification;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate(10);
        return view('admin.ticket.index')->with('tickets', $tickets);
    }

    public function userTickets()
    {
        $tickets = Ticket::where('id_user', Auth::user()->id)->paginate(10);
        return view('users.ticket.index')->with('tickets', $tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        $categories = Category::all();
        $priorities = Priority::all();
        $types = Type::all();

        return view('users.ticket.create', compact('statuses', 'categories', 'priorities', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'type' => 'required'
        ]);

        $ticket = new Ticket();
        $ticket->name = $request->input('name');
        $ticket->description = $request->input('description');
        $ticket->id_user = Auth::user()->id;

        $statuses = Status::where('name', 'Open')->get();
        foreach($statuses as $status) {
            $statusId = $status->id;
        }

        $ticket->id_status = $statusId;
        $ticket->id_category = $request->input('category');
        $ticket->id_priority = $request->input('priority');
        $ticket->id_type = $request->input('type');
        $ticket->created_by = Auth::user()->name;

        $ticket->save();

        $doc = $request->file('document');
        $docName = $doc->getClientOriginalName();
        $doc->move(public_path('images'),$docName);

        $docUpload = new Document();
        $docUpload->id_user = Auth::user()->id;
        $docUpload->id_ticket = $ticket->id;
        $docUpload->path = 'images/'.$doc->getClientOriginalName();
        $docUpload->save();

        $mailer->sendTicketInformation(Auth::user(), $ticket);

        return redirect('/mytickets')->with("success", "A Ticket with ID: #$ticket->id has been opened.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);
        $docs = $ticket->documents()->get();
        return view('admin.ticket.show', compact('ticket', 'docs'));
    }

    //Showing Users Created Ticket
    public function showUserTicket($id)
    {
        $ticket = Ticket::find($id);
        $docs = $ticket->documents()->get();
        return view('users.ticket.show', compact('ticket', 'docs'));
    }

    //Closing Ticket
    public function close($id, AppMailer $mailer) {
        $ticket = Ticket::find($id);
        $statuses = Status::where('name', 'Closed')->get();

        foreach($statuses as $status) {
            $statusId = $status->id;
        }

        $ticket->id_status = $statusId;
        $ticket->save();

        $statusNotification = new StatusNotification();
        $statusNotification->id_user = Auth::user()->id;
        $statusNotification->id_status = $statusId;
        $statusNotification->save();

        $ticketOwner = $ticket->user;
        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);

        return redirect()->back()->with("success", "The ticket has been closed.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();

        return redirect('/tickets')->with('success', 'Ticket Has Been Successfully Deleted');
    }
}

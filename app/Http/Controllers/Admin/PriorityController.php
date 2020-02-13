<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Tickets\Priority;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities = Priority::all();
        return view('admin.nom.priority.index')->with('priorities', $priorities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nom.priority.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $priority = new Priority();
        $priority->name = $request->input('title');
        $priority->description = $request->input('body');
        $priority->id_user = Auth::user()->id;
        $priority->save();

        return redirect('/priority')->with('success', 'Priority Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $priority = Priority::find($id);
        return view('admin.nom.priority.show')->with('priority', $priority);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $priority = Priority::find($id);
        return view('admin.nom.priority.edit')->with('priority', $priority);
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
        $priority = Priority::find($id);
        $priority->name = $request->input('title');
        $priority->description = $request->input('body');
        $priority->save();

        return redirect('/priority')->with('success', 'Priority Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $priority = Priority::find($id);
        $priority->delete();

        return redirect('/priority')->with('success', 'Priority Has Been Successfully Deleted');
    }
}

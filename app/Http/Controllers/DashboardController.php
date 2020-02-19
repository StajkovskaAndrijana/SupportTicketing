<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use App\Models\Tickets\Status;
use App\Models\Tickets\Ticket;
use Illuminate\Support\Facades\Auth;
use App\Charts\SampleChart;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $noUsers = User::all()->count();
        $noTickets = Ticket::all()->count();

        $social_users=Ticket::selectRaw('count(id_status) as count,id_status')->groupBy('id_status')->get();
        $data=array();
        foreach ($social_users as $result) {
            $data[$result->id_status]=(int)$result->count;
        }


        return view('home', compact('noUsers', 'noTickets'));
    }

    public function userDashboard()
    {
        $myTickets = Ticket::where('id_user', Auth::user()->id)->count();
        return view('home')->with('myTickets', $myTickets);
    }
}

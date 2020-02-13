@extends('layouts.master')

@section('content')
@include('incs.messages')
<div class="content mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row ml-1">
                            <i class="fas fa-2x fa-ticket-alt"></i>
                            <h3 class="ml-2">All Tickets</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(count($tickets) > 0)
                        <div class="table-responsive text-center">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Category</th>
                                        <th>Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>{{$ticket->id}}</td>
                                            <td><a class="link-fx text-info" href="{{ route('admin.ticket.show',$ticket->id)}}">{{$ticket->name}}</a></td>
                                            <td>{{$ticket->user->name}}</td>
                                            <td>
                                                @if ($ticket->status->name == 'Open')
                                                    <span class="badge bg-success">{{ $ticket->status->name }}</span>
                                                @else
                                                    <span class="badge bg-danger">{{ $ticket->status->name }}</span>
                                                @endif
                                            </td>
                                            <td>{{$ticket->category->name}}</td>
                                            <td>{{$ticket->updated_at}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <p>There are currently no tickets.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

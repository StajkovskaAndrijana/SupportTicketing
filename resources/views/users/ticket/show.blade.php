@extends('layouts.master')

@section('content')
    <div class="content mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>{{$ticket->name}}</h2>
                        </div>

                        <div class="card-body">
                            <p><b>Description:</b> {{$ticket->description}}</p>
                            <p><b>Category:</b> {{$ticket->category->name}}</p>
                            <p><b>Priority:</b> {{$ticket->priority->name}}</p>
                            <p><b>Type:</b> {{$ticket->type->name}}</p>
                            <p>
                                @if ($ticket->status->name == 'Open')
                                    <b>Status:</b> <span class="badge bg-success">{{ $ticket->status->name }}</span>
                                @else
                                    <b>Status:</b> <span class="badge bg-danger">{{ $ticket->status->name }}</span>
                                @endif
                            </p>
                            <p>Created on:</b> {{ $ticket->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <hr>
                    <h4>Comments</h4>
                    @include('tickets.comments')

                    <hr>

                    @include('tickets.reply')
                </div>
            </div>
        </div>
    </div>
@endsection

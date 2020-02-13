@extends('layouts.master')

@section('content')
@include('incs.messages')
<div class="content mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-md-left">{{$ticket->name}}</h2>
                        <button type="button" class="btn btn-danger float-md-right" data-toggle="modal" data-target="#close-ticket">Close Ticket</button>
                    </div>

                    <div class="card-body">
                        <p><b>Description:</b> {{$ticket->description}}</p>
                        <p><b>Created By:</b> {{$ticket->user->name}}</p>
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
                        <p><b>Created on:</b> {{ $ticket->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                <div class="modal fade" id="close-ticket" tabindex="-1" role="dialog" aria-labelledby="modal-default-popin" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-popin" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Close Ticket</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body pb-1">
                                <p><i class="fa fa-fw fa-exclamation-triangle mr-1 text-warning"></i>Are you sure that you want to close this ticket?</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-rounded btn-danger" data-dismiss="modal" aria-label="Close">
                                    No
                                </button>
                                <form action="{{ route('admin.close.ticket', $ticket->id) }}" method="POST">
                                    {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-rounded btn-success float-md-right" data-toggle="modal" data-target="#close-ticket">Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <h4>Comments</h4>
                @include('tickets.comments')

                <hr>

                <h4><i class="fas fa-pen-square"></i> Write a Comment</h4>
                @include('tickets.reply')
            </div>
        </div>
    </div>
</div>
@endsection

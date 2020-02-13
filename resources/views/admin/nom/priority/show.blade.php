@extends('layouts.master')

@section('content')
    <div class="content mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-5">
                                <p><b>Name:</b> {!!$priority->name!!}<p>
                                <p><b>Description:</b> {!!$priority->description!!}<p>
                            </div>

                            @if(!Auth::guest())
                                @if(Auth::user()->id == Auth::user()->id)
                                <a href="{{ route('admin.nom.priority.edit',$priority->id)}}" class="btn btn-primary">
                                    <i class="fa fa-pencil-alt mr-1"></i> Edit
                                </a>
                                <button type="button" class="btn btn-danger mr-1 push" data-toggle="modal" data-target="#modal-block-popin"><i class="fa fa-fw fa-times mr-1"></i> Delete</button>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="modal fade" id="modal-block-popin" tabindex="-1" role="dialog" aria-labelledby="modal-default-popin" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-popin" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Priority</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body pb-1">
                                    <p><i class="fa fa-fw fa-exclamation-triangle mr-1 text-warning"></i>Are you sure that you want to delete this priority?</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-rounded btn-outline-primary" data-dismiss="modal" aria-label="Close">
                                        No
                                    </button>
                                    <form action="{{ route('admin.nom.priority.destroy',$priority->id)}}" method="post" style="display: contents">
                                        <input type="hidden" name="_method" value="delete" />
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" value="delete" class="btn btn-danger mr-1">
                                            <i class="fa fa-fw fa-times mr-1"></i> Delete
                                        </button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

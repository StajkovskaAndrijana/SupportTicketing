@extends('layouts.master')

@section('content')
@include('incs.messages')
    <div class="content-header">
        <div class="container">
            <div class="row mb-3 mt-3">
                <div class="col-12">
                    <a href="{{ route('admin.nom.priority.create') }}">
                        <button type="button" class="btn btn-success mr-1">
                            <i class="fa fa-fw fa-plus mr-1"></i> Add Priority
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Priority List</h3>
                        </div>

                        <div class="card-body">
                            @if(count($priorities) > 0)
                            <div class="table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($priorities as $priority)
                                            <tr>
                                                <td>{{$priority->id}}</td>
                                                <td><a class="link-fx text-info" href="{{ route('admin.nom.priority.show',$priority->id)}}">{{$priority->name}}</a></td>
                                                <td>{{$priority->description}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <p>No Priorities found</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

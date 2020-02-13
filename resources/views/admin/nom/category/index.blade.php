@extends('layouts.master')

@section('content')
@include('incs.messages')
<div class="content">
    <div class="content-header">
        <div class="container">
            <div class="row mb-3 mt-3">
                <div class="col-12">
                    <a href="{{ route('admin.nom.category.create') }}">
                        <button type="button" class="btn btn-success mr-1">
                            <i class="fa fa-fw fa-plus mr-1"></i> Add Category
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Category List</h3>
                        </div>

                        <div class="card-body">
                            @if(count($categories) > 0)
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
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td><a class="link-fx text-info" href="{{ route('admin.nom.category.show',$category->id)}}">{{$category->name}}</a></td>
                                                <td>{{$category->description}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <p>No Categories found</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

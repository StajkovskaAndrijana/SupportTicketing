@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-4 mt-3">
            <div class="col-12 font-w700">
               <h3>OPEN NEW TICKET</h3>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'users.ticket.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Name')}}
                            <span class="text-danger">*</span>
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
                            @if ($errors->has('name'))
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {{Form::label('description', 'Description')}}
                            <span class="text-danger">*</span>
                            {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description Text'])}}
                            @if ($errors->has('description'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                {{Form::label('category', 'Category')}}
                                <span class="text-danger">*</span>
                                <select class="js-select2 form-control js-select2-enabled select2-hidden-accessible" name="category">
                                    <option value="">Choose one...</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{(old('category')==$category->id)? 'selected':''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-6">
                                {{Form::label('priority', 'Priority')}}
                                <span class="text-danger">*</span>
                                <select class="js-select2 form-control js-select2-enabled select2-hidden-accessible" name="priority">
                                    <option value="">Choose one...</option>
                                    @foreach($priorities as $priority)
                                        <option value="{{$priority->id}}" {{(old('priority')==$priority->id)? 'selected':''}}>{{$priority->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('priority'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('priority') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {{Form::label('type', 'Type')}}
                            <span class="text-danger">*</span>
                            <select class="js-select2 form-control js-select2-enabled select2-hidden-accessible" name="type">
                                <option value="">Choose one...</option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}" {{(old('type')==$type->id)? 'selected':''}}>{{$type->name}}</option>
                                 @endforeach
                            </select>
                            @if ($errors->has('type'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {{Form::label('document', 'Document')}}
                            <span class="text-danger">*</span>
                            {{Form::file('document')}}
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-ticket"></i> Open Ticket
                            </button>
                        </div>
                        {!!Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

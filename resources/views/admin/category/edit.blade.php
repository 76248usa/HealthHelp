@extends('admin.dashboard')


@section('content')


    <h1>Categories</h1>


    <div class="col-sm-6">

        {!! Form::model($category, ['method'=>'PATCH', 'action'=> ['CategoryController@update', $category->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-6 ']) !!}
        </div>
        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE', 'action'=> ['CategoryController@destroy', $category->id]]) !!}


        <div class="form-group">
            {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}



    </div>




    <div class="col-sm-6">






    </div>





@stop

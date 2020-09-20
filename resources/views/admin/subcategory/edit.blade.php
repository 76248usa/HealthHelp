@extends('admin.dashboard')


@section('content')


    <h1>Categories</h1>


    <div class="col-sm-6">

        {!! Form::model($subcategory, ['method'=>'PATCH', 'action'=> ['SubcategoryController@update', $subcategory->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Subcategory', ['class'=>'btn btn-primary col-sm-6 ']) !!}
        </div>
        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE', 'action'=> ['SubcategoryController@destroy', $subcategory->id]]) !!}


        <div class="form-group">
            {!! Form::submit('Delete Subcategory', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}



    </div>




    <div class="col-sm-6">






    </div>





@stop

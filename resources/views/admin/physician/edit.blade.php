@extends('admin.dashboard')

@section('content')

        <div class="row ">
        <h1 class="h3 mb-0 ml-4 text-gray-400">Edit Physician</h1>

        <div class="col-md-6">

<h1>Edit Physician Page</h1>

<div class="col-sm-3">

        <img height="200" src="{{ asset('/images/' . $physician->image) }}" />
        <br>

        </div>

{!! Form::model($physician, ['method'=> 'PATCH', 'action'=>['PhysicianController@update', $physician->id],'files'=>true]) !!}
{{csrf_field()}}

<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
        {!! Form::label('address', 'Address:') !!}
        {!! Form::text('address', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
        {!! Form::label('phone', 'Phone:') !!}
        {!! Form::text('phone', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
        {!! Form::label('credentials', 'Credentials:') !!}
        {!! Form::text('credentials', null, ['class' => 'form-control'])!!}
    </div>

    <div class="form-group">
            {!! Form::label('specialization', 'Specialization:') !!}
            {!! Form::text('specialization', null, ['class' => 'form-control'])!!}
    </div>

    <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price', null, ['class' => 'form-control'])!!}
    </div>

    <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id',  $categories, null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
            {!! Form::label('subcategory_id', 'Subcategory:') !!}
            {!! Form::select('subcategory_id',  $subcategories, null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
            {!! Form::label('info', 'Additional Information:') !!}
            {!! Form::textarea('info', null, ['class'=>'form-control'])!!}
        </div>

@if(count($errors) > 0 )


    <div class="alert alert-danger">

        <ul>

            @foreach($errors->all() as $error)


                <li>{{$error}}</li>


            @endforeach

        </ul>
    </div>

@endif

            <div class="form-group">
                    {!! Form::submit('Update Physician', ['class' => 'btn btn-primary']) !!}

                </div>
{!! Form::close() !!}

            </div>

            </div>

@endsection

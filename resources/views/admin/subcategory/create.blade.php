@extends('admin.dashboard')

@section('content')



<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 ml-4 text-gray-400">Category</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>

        <li class="breadcrumb-item active" aria-current="page">Category</li>
    </ol>
</div>

<div class="row justify-content-center">
    @if(Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
<div class="col-lg-10">
    <form
        action="{{ route('subcategory.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
        >
            <h6 class="m-0 font-weight-bold text-primary">Create Subcategory</h6>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="">Name</label>
                    <input
                        name="name"
                        type="text"
                        class="form-control  @error('name')
                        is-invalid @enderror"
                        id=""
                        placeholder="Enter name of category"
                    />
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                {!! Form::open(['method'=>'POST', 'action'=> 'SubcategoryController@store', 'files'=>true]) !!}




                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>


                </div>
            </form>
        </div>
    </form>
</div>
</div>


    <h1>Create Subcategory</h1>

    <div class="row">
         {!! Form::open(['method'=>'POST', 'action'=> 'SubcategoryController@store', 'files'=>true]) !!}

           <div class="form-group">
                 {!! Form::label('name', 'Title:') !!}
                 {!! Form::text('name', null, ['class'=>'form-control'])!!}
           </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', [''=>'Choose Categories'] + $categories, null, ['class'=>'form-control'])!!}
            </div>




             <div class="form-group">
                {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
             </div>

           {!! Form::close() !!}

    </div>


    <div class="row">






    </div>




@stop

@endsection



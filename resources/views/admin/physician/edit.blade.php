@extends('admin.dashboard')

@section('content')

        <div class="row ">
        <h1 class="h3 mb-0 ml-4 text-gray-400">Category</h1>

        <div class="col-md-6">

<h1>Create Physician Page</h1>

{!! Form::model($physician, ['method'=> 'PATCH', 'action'=>['PhysicianController@update', $physician->id],'files'=>true]) !!}
{{csrf_field()}}

<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control'])!!}
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
    <label for="">Choose Category</label>
<select class="form-control form-control-lg" name="category">

    <option value="">Choose Category</option>
    @foreach(App\Category::all() as $key=>$category)
    <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach

</select>
</div>


<div class="form-group">
        <label for="">Choose Subcategory</label>
    <select class="form-control form-control-lg" name="subcategory">

        <option value="">Choose Subcategory</option>


    </select>
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

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category"]').on('change', function() {
            var catId = $(this).val();
            if(catId) {
                $.ajax({
                    url: '/subcategories/'+catId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {


                        $('select[name="subcategory"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }//success close
                });
            }else{ //if close and starts
                $('select[name="subcategory"]').empty();
            }
        });
    });
</script>

@endsection


@extends('admin.dashboard')

@section('content')

    <h1>Subcategories</h1>


    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=> 'SubcategoryController@store']) !!}
             <div class="form-group">
                 {!! Form::label('name', 'Name:') !!}
                 {!! Form::text('name', null, ['class'=>'form-control'])!!}
             </div>

             <div class="form-group">
                    {!! Form::label('category_id', 'Category Id:') !!}
                    {!! Form::select('category_id', [''=>'Choose Categories'] + $categories, null, ['class'=>'form-control'])!!}
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
                 {!! Form::submit('Create Subcategory', ['class'=>'btn btn-primary']) !!}
             </div>
        {!! Form::close() !!}



    </div>




    <div class="col-sm-6">


        @if($subcategories)


            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Created date</th>
                    <th>Category name</th>
                </tr>
                </thead>
                <tbody>

                @foreach($subcategories as $subcategory)

                    <tr>
                        <td>{{$subcategory->id}}</td>
                        <td><a href="{{route('subcategory.edit', $subcategory->id)}}">{{$subcategory->name}}</a></td>
                        <td>{{$subcategory->created_at ? $subcategory->created_at->diffForHumans() : 'no date'}}</td>
                        <td>{{$subcategory->category ? $subcategory->category->name : 'Uncategorized'}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif



    </div>




          <!--Row-->

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12">
              <p></p>
            </div>
          </div>

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->

@endsection

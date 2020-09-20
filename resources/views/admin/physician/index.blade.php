@extends('admin.dashboard')

@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-400">Physicians</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>

            <li class="breadcrumb-item active" aria-current="page">Physicians</li>
        </ol>
    </div>


    <div class="container">
            <form action="#" method="GET">
                <div class="form-row">
                    <div class="col-md-8">
                        <input type="text" name="search" class="form-control" placeholder="search...">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-secondary">Search</button>
                    </div>
                </div>

            </form>
            <br>


<!-- Datatables -->
<div class="col-lg-12">
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
    </div>
    <div class="table-responsive p-3">
      <table class="table align-items-center table-flush" id="dataTable">
        <thead class="thead-light">
          <tr>
            <th>Name</th>
            <th>Credentials</th>
            <th>Specialization</th>
            <th>Zip Code</th>
            <th>Procedure</th>
            <th>Price</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>

          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Credentials</th>
            <th>Specialization</th>
            <th>Zip Code</th>
            <th>Procedure</th>
            <th>Price</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>

          </tr>
        </tfoot>
        <tbody>
            @if(count($physicians)>0)
            @foreach($physicians as $physician)
          <tr>
            <td>{{ $physician->name }}</td>
            <td>{{ $physician->credentials }}</td>
            <td>{{ $physician->specialization }}</td>
            <td>{{ $physician->category->name}}</td>
            <td>{{ $physician->subcategory->name}}</td>
            <td>{{ $physician->price }}</td>
            <td>{{ $physician->created_at }}</td>
            <td>
                <a href=" {{route('physician.edit', $physician->id)}} ">
                    <button class="btn btn-primary">Edit </button>

            </td>
            <td>

           {!! Form::open(['method'=>'DELETE', 'action'=> ['PhysicianController@destroy', $physician->id]]) !!}


        <div class="form-group">
            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
          </tr>
          @endforeach
          @else
          <td>No physicians for this procedure</td>
          @endif
        </tbody>
    </table>
</div>
</div>




</div>



<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>







@endsection

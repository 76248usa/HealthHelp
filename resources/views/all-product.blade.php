@extends('layouts.app')

@section('content')

 <div class="container">
 	<form action="{{route('more.product')}}" method="GET">
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


 	     <div class="row">

      @foreach($physicians as $physician)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">

            <img src="{{asset('/images/'. $physician->image)}}" alt="Avatar" style="width:100%;">
            <div class="card-body">
                <p><b>{{$physician->name}}</b></p>
              <p class="card-text">
                  {{(Str::limit($physician->info,120))}}
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                 <a href="#"> <button type="button" class="btn btn-sm btn-outline-success">View</button>
                 </a>

                </div>
                <small class="text-muted">${{$physician->price}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>


 </div>
 @endsection

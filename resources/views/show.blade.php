









@extends('layouts.app')

@section('content')


<div class="container">
        <h5 class="">Physician Info</h5>


<div class="card">
	<div class="row">
		<aside class="col-sm-5 border-right">
			<section class="gallery-wrap">
			<div class="img-big-wrap">
			  <div>
                    <img src="{{asset('/images/'. $physician->image)}}" alt="Avatar" style="width:100%;">

			  </div>
			</div>

			</section>
		</aside>



		<aside class="col-sm-7">

			<section class="card-body p-5">
				<h3 class="title mb-3">{{ $physician->name }}</h3>

<p class="price-detail-wrap">
	<span class="price h3 text-danger">
		<span class="currency">US $</span>{{ $physician->price }}
	</span>

</p> <!-- price-detail-wrap .// -->
  <h3>Additional Information</h3>
  <p>{{ $physician->info }}</p>
<hr>
<h4>Pharmacist Information</h4>
<div class="row">
    <div class="col-md-6">
        <h5>MemberID: <span class="badge badge-info">{{ $physician->credentials }}</span> </h5>
        <h5>MemberID: <span class="badge badge-info">{{ $physician->specialization }}</span> </h5>
    </div>

    <div class="col-md-6">
            <h5>MemberID: <span class="badge badge-info">{{ $physician->credentials }}</span> </h5>
            <h5>MemberID: <span class="badge badge-info">{{ $physician->specialization }}</span> </h5>
        </div>


</div>

<hr>

<div class="row">

        <div class="form-inline">
            <h4>Quantity: </h4>
            <input type="text" name="qty" class="form-control">
            <input type="submit" name="qty" class="btn btn-primary ml-2">
        </div>

    </div>
<br>

	<a href="#" class="btn btn-lg btn-outline-primary text-uppercase">  Add to cart </a>
</section>
		</aside>

	</div>
</div>


<div class="jumbotron">
<div class="row">
        @if($productFromSameCategories)
        @foreach($productFromSameCategories as $productFromSameCategory)


    <div class="col-md-3">
      <div class="card mb-4 shadow-sm">

        <img height="200" src="{{ asset('/images/' . $productFromSameCategory->image) }}" />

        <div class="card-body">

          <p class="card-text"><h5>Physician Name: {{ $productFromSameCategory->name }}</Physician></h5></p>

          <p class="card-text">Zip Code: {{ $productFromSameCategory->category->name }}</p>
          <p class="card-text">Procedure: {{ $productFromSameCategory->subcategory->name }}</p>
          <p class="card-text">Credentials: {{ $productFromSameCategory->credentials }}</p>
          <p class="card-text">Specialization: {{ $productFromSameCategory->specialization }}</p>
          <h5 class="card-text" id="#h5"><span >Procedure Price: {{ $productFromSameCategory->price }}</span></h5>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="{{ route('physician.view', [$productFromSameCategory->id]) }}">
              <button id = "but1" type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
              <button id = "but2" type="button" class="btn btn-sm btn-outline-secondary">Edit</button>

            </div>
            <small class="text-muted">9 mins</small>
          </div>

        </div>
      </div>
    </div>

    @endforeach
          @endif

</div>

</div>

</div>

@endsection

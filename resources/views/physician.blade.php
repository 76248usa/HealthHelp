
@extends('layouts.app')

@section('content')



<div class="container">
<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1>Album example</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-secondary my-2" style="background-color: #3490dc;">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </section>
  <h2>Category</h2>
  @foreach(App\Category::all() as $cat)
  <a href="{{ route('product.list', [$cat->id]) }}"> <button class="btn btn-secondary">{{ $cat->name }}</button>
@endforeach




  <h3 class="text-center">Choose your Medication</h3>
  @foreach(App\Subcategory::all() as $cat)
  <button class="btn btn-secondary">{{ $cat->name }}</button>

  @endforeach

  <div class="album py-5 bg-light">
    <div class="container">
        <h3 class="text-center" style="color: #3490dc;">Physicians in your Area</h3>
        <br>
      <div class="row">
            @if($physicians)
            @foreach($physicians as $physician)


        <div class="col-md-3">
          <div class="card mb-4 shadow-sm">

            <img height="200" src="{{ asset('/images/' . $physician->image) }}" />

            <div class="card-body">

              <p class="card-text"><h5>Physician Name: {{ $physician->name }}</Physician></h5></p>

              <p class="card-text">Zip Code: {{ $physician->category->name }}</p>
              <p class="card-text">Procedure: {{ $physician->subcategory->name }}</p>
              <p class="card-text">Credentials: {{ $physician->credentials }}</p>
              <p class="card-text">Specialization: {{ $physician->specialization }}</p>
              <h5 class="card-text" id="#h5"><span >Procedure Price: {{ $physician->price }}</span></h5>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="physician/{{ $physician->id }}">
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
<center>
    <a href="{{ route('more.product') }}"><button class="btn btn-success">More Physicians</button></a>
</center>
</div>


        <h1>Carousel</h1>

        <div class="jumbotron">
               <div id="carouselExampleFade" class="carousel slide " data-ride="carousel">
          <div class="carousel-inner">

            <div class="carousel-item active">
             <div class="row">
               <div class="col-3">
                 <img src="images/photo1.jpg" class="img-thumbnail">
               </div>

               <div class="col-3">
                 <img src="images/photo1.jpg" class="img-thumbnail">
               </div>

               <div class="col-3">
                 <img src="images/photo1.jpg" class="img-thumbnail">
               </div>

               <div class="col-3">
                 <img src="images/photo1.jpg" class="img-thumbnail">
               </div>

             </div>
            </div>

            <div class="carousel-item">
             <div class="row">
               <div class="col-3">
                 <img src="images/photo1.jpg" class="img-thumbnail">
               </div>

               <div class="col-3">
                 <img src="images/photo1.jpg" class="img-thumbnail">
               </div>

               <div class="col-3">
                 <img src="images/photo1.jpg" class="img-thumbnail">
               </div>

               <div class="col-3">
                 <img src="images/photo1.jpg" class="img-thumbnail">
               </div>

             </div>
            </div>



          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
             </div>











































</main>
<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="/docs/4.4/getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>
</div>
@endsection


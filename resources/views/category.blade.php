@extends('layouts.app')

@section('content')


    <div class="container">
        <h2>Products</h2>

      <div class="row">
        <div class="col-md-2">
             <form action="{{ route('physician.list', [$slug]) }}" method="GET">
            <!--foreach subcategories-->
            @foreach($subcategories as $subcategory)

              <p><input type="checkbox" name="subcategory[]" value="{{ $subcategory->id }}"

               @if(isset($filterSubCategories))
               {{in_array($subcategory->id, $filterSubCategories) ? 'checked' :''}}
              @endif
              >{{ $subcategory->name }}
            </p>

            @endforeach
           <!--end foreach-->
          <input type="submit" value="Filter" class="btn btn-success">
         </form>
         <hr>
         <a href="{{ route('physician.list', [$slug]) }}">Back</a>


        </div>
      <div class="col-md-10">
        <div class="row">
      <!--foreach products-->
      @foreach($physicians as $physician)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="{{ asset('/images/' . $physician->image) }}" />
            <div class="card-body">
                <p><b>{{ $physician->name }} </b></p>
              <p class="card-text">
                    {{ $physician->info }}
              </p>
              <p class="card-text">
                    {{ $physician->credentials }}
              </p>
              <p class="card-text">
                    {{ $physician->specialization }}
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                 <a href="{{ route('physician.view', [$physician->id]) }}"> <button type="button" class="btn btn-sm btn-outline-success">View</button>
                 </a>
                  <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
                </div>
                <small class="text-muted">{{ $physician->price }}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>

    </div>
</div>
</div>

@endsection

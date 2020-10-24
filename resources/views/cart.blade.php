@extends('layouts.app')

@section('content')

 <div class="container">
   @if($errors->any())

   @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
   @endforeach

   @endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
      <th scope="col">Remove</th>

    </tr>
  </thead>
  <tbody>

    @if($cart)
  @php $i=1 @endphp

@foreach($cart->items as $physician)
    <tr>
      <th scope="row">{{$i++}}</th>

      <td><img width="100" src="{{ asset('/images/' . $physician['image']) }}" /></td>
      <td>{{$physician['name']}}</td>
      <td>${{$physician['price']}}</td>

      <td>
            <form action="{{route('cart.update',$physician['id'])}}" method="post">@csrf
                    <input type="text" name="qty" value="{{$physician['qty']}}">
                    <button class="btn btn-secondary btn-sm">
                        <i class="fas fa-sync"></i>Update
                    </button>
                </form>
            </td>
    <td>
    <form action="{{ route('cart.remove', $physician['id']) }}" method="post">@csrf

      	<button class="btn btn-danger">Remove</button>
      </form>


      </td>
    </tr>
   @endforeach



  </tbody>
</table>
<hr>
<div class="card-footer">
	<a href="{{url('/')}}"><button class="btn btn-primary">Continue shopping</button></a>
	<span style="margin-left: 300px;">Total Price:${{$cart->totalPrice}}</span>

	<a href="#"><button class="btn btn-info float-right">Checkout</button></a>



</div>
@else
<td>No items in cart</td>
@endif

 </div>
 @endsection

@extends('layouts.user')
@section('content')
    <!-- Button trigger modal -->

<!-- Cart Items -->
    <div class="container cart">
      <div>
        <a id="btn_delete_all" class="btn btn-danger" data-toggle="modal" data-target="#delete_all" ><i class="fa fa-trash" aria-hidden="true"></i><strong>Delete All Selected Product</strong></a>
      </div>
        

      <hr>
      <form method="POST" action="{{route('updateQuantity')}}" >
        @csrf
       
      <table id="datatable">
        <tr>
          <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
          <th>Product</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
       

        @foreach ($cart as $key=>$item)
        
        <tr>
          <td>
            <input name="id[]" type="hidden"  value="{{$item->id}}" >
            <input  type="checkbox"  value="{{$item->id}}" class="box1" >
          </td>
          <td>
            <div class="cart-info">
              <img src="{{asset('storage/'.$item->Product->image)}}" alt="" />
              <div>
                <p>{{$item->Product->name}}</p>
                <span>Price: ${{$item->Product->price}}</span>
                
              </div>
            </div>
          </td>
          <input class="prc" value="{{$item->Product->price}}" type="hidden" >
          <td><input onchange="GetNo()" id="myText" class="qty" name="quantity[]" type="number" value="{{$item->quantity}}" min="1" /></td>
          <td class="total">$ {{$item->quantity * $item->Product->price}}</td>
        </tr>

       
        @endforeach
        
        
      </table>

      <div class="total-price">
        <table>
          <tr>
            <td>Subtotal</td>
            <td class="finalTotal">{{$total}}</td>
          </tr>
          <tr>
            <td>Tax</td>
            <td>0</td>
          </tr>
          <tr>
            <td>Total</td>
            <td id="finalTotal">$ {{$total}}</td>
          </tr>
        </table>
        <a class="checkout btn" type="submit">Proceed To Checkout</a>
        <!-- a  href="{{--route('checkoutView')--}}" class="checkout btn">Proceed To Checkout</a -->
      </div>
    </div>
  </form>
<!-- Modal -->
<div class="modal fade" id="delete_all" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Selected Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('delete_all_products_from_cart')}}" method="POST">
        @csrf
        <div class="modal-body">
            Are You Sure ?
            <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete </button>
        </div>
    </form>
    </div>
  </div>
</div>
  
   
@endsection
@section('scripts')

@include('components.deleteAllSelected');

<script>
  function GetNo(){
    'use strict'
   // var x =document.getElementById("myText").value;
    var elements = document.getElementsByClassName('qty');
    var price = document.getElementsByClassName('prc');
    var rowtotal = document.getElementsByClassName('total') ;
    var total = 0 ;
    var l =elements.length;

    for (var i = 0; i < l; i++) {
     
     var t = elements[i].value  *  price[i].value ; 
     rowtotal[i].innerHTML = '$ ' +t  ;
     total += t ;
    }
    document.getElementById("finalTotal").innerHTML = '$ ' + total ;
  }
 
</script>

<script>
    (function ($) {


$(".addCart").click(function(e){
  e.preventDefault();
var form = $(this);
$.ajax({
  type: form.attr('method'),
  url: "{{route('cart')}}",
  data: form.serialize()
}).done(function(data) {
  swal({
    toast: true,
    position: 'bottom-end',
    icon: 'success',
    title: 'Products Add Successfully',
    showConfirmButton: true,
    timer: 1500
  });
}).fail(function(data) {
  // Optionally alert the user of an error here...
});

})
})(jQuery);
</script>
@endsection
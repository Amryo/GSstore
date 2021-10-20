@extends('layouts.user')
  <!-- PRODUCTS -->
@section('content')
  <section class="section products">
    <div class="products-layout container">
      <div class="col-1-of-4">
        <div>
          <div class="block-title">
            <h3>Category</h3>
          </div>

          <ul class="block-content">
            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>Shoes</span>
                <small>(10)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>Bags</span>
                <small>(7)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span> Accessories</span>
                <small>(3)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>Clothings</span>
                <small>(3)</small>
              </label>
            </li>
          </ul>
        </div>

        <div>
          <div class="block-title">
            <h3>Brands</h3>
          </div>

          <ul class="block-content">
            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>Gucci</span>
                <small>(10)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>Burberry</span>
                <small>(7)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span> Accessories</span>
                <small>(3)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>Valentino</span>
                <small>(3)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>Dolce & Gabbana</span>
                <small>(3)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>Hogan</span>
                <small>(3)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>Moreschi</span>
                <small>(3)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>Givenchy</span>
                <small>(3)</small>
              </label>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-3-of-4">
        <form action="{{route('Filter_Products')}}" method="POST">
          @csrf
          <div class="item">
            <label for="sort-by">Sort By</label> 
            <select name="name" id="sort-by" required onchange="this.form.submit()">

              <option  value="name" selected="selected">Name</option>
              <option  value="price">Price</option>
              <option  value="search_api_relevance">Relevance</option>
              <option  value="created">Newness</option>
            </select>

          </div>
          <div class="item">
            <label for="order-by">Order</label>
            <select name="order-by" id="sort-by">
              <option value="ASC" selected="selected">ASC</option>
              <option value="DESC">DESC</option>
            </select>
          </div>
          <a href="">Apply</a>
        </form>

        <div class="product-layout">
          @foreach ($products as $product)
          <div class="product">
            <div class="img-container">
              <img style="height: 300px" src="{{ asset('./storage/'.$product->image) }}" alt="" />
              
      
                <form class="addCart border-0" action="#" method="POST">
                  @csrf
                  <input hidden name="product_id" value="{{$product->id}}">
                  <input hidden name="quantity" type="number" value="1">
                  <i class="fas fa-shopping-cart"></i>
                </form>
      
               
              
      
              <ul class="side-icons">
                <span><i class="fas fa-search"></i></span>
                <span><i class="far fa-heart"></i></span>
                <span><i class="fas fa-sliders-h"></i></span>
              </ul>
            </div>
            <div class="bottom">
              <a href="productDetails.html">{{$product->name}}</a>
              <div class="price">
                <span>{{$product->price}}</span>
              </div>
            </div>
          </div>
          @endforeach
         
    
        </div>

        <!-- PAGINATION -->
        <ul class="pagination">
          <span>1</span>
          <span>2</span>
          <span class="icon">››</span>
          <span class="last">Last »</span>
        </ul>
      </div>
    </div>
  </section>
@endsection
 

@section('scripts')
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
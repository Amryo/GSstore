@extends('layouts.user')
@section('stylesheet')
<style>
  .swal2-popup.swal2-toast .swal2-title
  {
    font-size: 1.5rem !important;
    padding: 10px;
  }
</style>
@endsection
@section('content')
<div class="hero">
  <div class="row">
    <div class="swiper-container slider-1">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="{{ asset('./images/hero-1.png') }}" alt="" />
          <div class="content">
            <h1>Super market vegbox

              <br/>
              start from 
              <span>$9</span>
            </h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti ad natus facilis magni corporis alias.</p>

            <a href="#">Shop Now</a>
          </div>
        </div>

        <div class="swiper-slide">
          <img src="{{ asset('./images/hero-2.png') }}" alt="hero image" />
          <div class="content">
            <h1>You first Order
              <br/>
              <span>20% off</span>
              at Juice
            </h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti ad natus facilis magni corporis alias.</p>
            <a href="#">Shop Now</a>
          </div>
        </div>
        
        <div class="swiper-slide">
          <img src="{{ asset('./images/hero-3.png') }}" alt="hero image" />
          <div class="content">
            <h1>You first Order
              <br/>
              <span>20% off</span>
              at Juice
            </h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti ad natus facilis magni corporis alias.</p>
            <a href="#">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Carousel Navigation -->
  <div class="arrows d-flex">
      <div class="swiper-prev d-flex">
        <i class="bx bx-chevrons-left swiper-icon"></i>
      </div>
      <div class="swiper-next d-flex">
        <i class="bx bx-chevrons-right swiper-icon"></i>
      </div>
  </div>
</div>

<!-- Promotion -->

<section class="section promotion">
  <div class="title">
    <h2>Shop Collections</h2>
    <span>Select from the premium product and save plenty money</span>
  </div>

  <div class="promotion-layout container">
    @foreach ($categories as $category)
    <div class="promotion-item">
      <img src="{{ asset('./storage/'.$category->image) }}" alt="" />
      <div class="promotion-content">
        <h3>{{$category->name}}</h3>
        <a href="">SHOP NOW</a>
      </div>
    </div>

    @endforeach
  
   
  </div>
</section>

<!-- Featured -->
<section class="section featured">
  <div class="title">
    <h2>Featured Products</h2>
    <span>Select from the premium product brands and save plenty money</span>
  </div>

  <div class="row container">
    <div class="swiper-container slider-2">
      <div class="swiper-wrapper">
        @foreach ($product as $product)
        <div class="swiper-slide">
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
        </div>
        @endforeach
        
       
      </div>
    </div>
  </div>

   <!-- Carousel Navigation -->
  <div class="arrows d-flex">
     <div class="custom-next d-flex">
        <i class="bx bx-chevrons-right swiper-icon"></i>
      </div>
      <div class="custom-prev d-flex">
        <i class="bx bx-chevrons-left swiper-icon"></i>
      </div>
  </div>
</section>

<!-- Products -->
<section class="section products">
  <div class="title">
    <h2>New Products</h2>
    <span>Select from the premium product brands and save plenty money</span>
  </div>

  <div class="product-layout">

    @foreach ($newproducts as $product)
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
</section>

<!-- ADVERT -->
<section class="section advert">
  <div class="advert-layout container">
    <div class="item ">
      <img src="{{ asset('./images/banner1.jpg') }}" alt="">
      <div class="content left">
        <span>Exclusive Sales</span>
        <h3>Spring Collections</h3>
        <a href="">View Collection</a>
      </div>
    </div>
    <div class="item">
      <img src="{{ asset('./images/banner2.jpg') }}" alt="">
      <div class="content  right">
        <span>New Trending</span>
        <h3>Designer Bags</h3>
        <a href="">Shop Now </a>
      </div>
    </div>
  </div>
</section>

<!-- BRANDS -->
<section class="section brands">
  <div class="title">
    <h2>Shop by Brand</h2>
    <span>Select from the premium product brands and save plenty money</span>
  </div>

  <div class="brand-layout container">
    <div class="swiper-container slider-3">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img id="TEST" src="{{ asset('./images/brand1.png') }}" alt="">
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('./images/brand2.png') }}" alt="">
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('./images/brand3.png') }}" alt="">
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('./images/brand4.png') }}" alt="">
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('./images/brand5.png') }}" alt="">
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('./images/brand6.png') }}" alt="">
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('./images/brand7.png') }}" alt="">
        </div>
        
      </div>
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
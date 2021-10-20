@extends('layouts.user')
@section('content')
  <!-- Product Details -->
  <section class="section product-detail">
    <div class="details container">
      <div class="left">
        <div class="main">
          <img src="{{asset('storage/'.$product->image)}}" alt="" />
        </div>
        <div class="thumbnails">
          <div class="thumbnail">
            <img src="./images/product-2.jpg" alt="" />
          </div>
          <div class="thumbnail">
            <img src="./images/product-3.jpg" alt="" />
          </div>
          <div class="thumbnail">
            <img src="./images/product-4.jpg" alt="" />
          </div>
          <div class="thumbnail">
            <img src="./images/product-5.jpg" alt="" />
          </div>
        </div>
      </div>
      <div class="right">
        <span>{{$product->Category->name}}</span>
        <h1>{{$product->name}}</h1>
        <div class="price">$ {{$product->price}}</div>
        <form>
          <div>
            <select>
              <option value="Select Quantity" selected disabled>
                Select Quantity
              </option>
              <option value="1">32</option>
              <option value="2">42</option>
              <option value="3">52</option>
              <option value="4">62</option>
            </select>
            <span><i class="fas fa-chevron-down"></i></span>
          </div>
        </form>

        <form id="add_to_cart" class="form" action="{{route('cart')}}" method="POST">
          @csrf
          <input hidden name="product_id" value="{{$product->id}}">
          <input name="quantity" type="text" placeholder="1" />
          <button type="submit" class="addCart">Add To Cart</button>
        </form>
        <h3>Product Detail</h3>
        <p>
          {{$product->description}}
        </p>
      </div>
    </div>
  </section>

  <!-- Related Products -->

  <section class="section related-products">
    <div class="title">
      <h2>Related Products</h2>
      <span>Select from the premium product brands and save plenty money</span>
    </div>
    <div class="product-layout container">
      <div class="product">
        <div class="img-container">
          <img src="./images/product-1.jpg" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
          <a href="">Bambi Print Mini Backpack</a>
          <div class="price">
            <span>$150</span>
          </div>
        </div>
      </div>
      <div class="product">
        <div class="img-container">
          <img src="./images/product-2.jpg" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
          <a href="">Bambi Print Mini Backpack</a>
          <div class="price">
            <span>$150</span>
          </div>
        </div>
      </div>
      <div class="product">
        <div class="img-container">
          <img src="./images/product-3.jpg" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
          <a href="">Bambi Print Mini Backpack</a>
          <div class="price">
            <span>$150</span>
          </div>
        </div>
      </div>
      <div class="product">
        <div class="img-container">
          <img src="./images/product-4.jpg" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
          <a href="">Bambi Print Mini Backpack</a>
          <div class="price">
            <span>$150</span>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
<nav class="nav">
    <div class="wrapper container">
      <div class="logo"><a href="{{route('home')}}">
        <img src="{{asset('./images/logo.png')}}" alt="">
      </a>
      </div>
      <ul class="nav-list">
        <div class="top">
          <label for="" class="btn close-btn"><i class="fas fa-times"></i></label>
        </div>
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('products')}}">Products</a></li>
       
       
        

       

        <li>
          <a href="" class="desktop-item" style="color: orange">Amr Yon <span><i class="fas fa-chevron-down"></i></span></a>
          <input type="checkbox" id="showdrop2" />
          <label for="showdrop2" class="mobile-item">Page <span><i class="fas fa-chevron-down"></i></span></label>
          <ul class="drop-menu2">
            
            <li><a href="">Faq</a></li>
            <li><a href="">Logout</a></li>
          </ul>
        </li>
  
  
        <!-- icons -->
        <li class="icons">
          <a href="{{route('viewCart')}}">
            <span>
            <img src="{{asset('./images/shoppingBag.svg')}}" alt="" />
            <small class="count d-flex">{{$counter}}</small>
            </span>
          </a>

          <a href="{{route('viewCart')}}">
            <span>
            
            
            </span>
          </a>

          <span><img src="./images/search.svg" alt="" /></span>
        </li>
      </ul>
      <label for="" class="btn open-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav>
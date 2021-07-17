@extends('layouts.admin')

@section('content')

  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Products Table</h1>
      <p>Products This Store</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Control Panel</li>
      <li class="breadcrumb-item active"><a href="#">Products</a></li>
    </ul>
  </div>
  <div class="col-md-12">
       
        
    <div class="tile">
      @if (Session::has('success'))
      <div class="alert alert-success" role="alert">
       {{Session::get('success')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div> 
      @endif
      <div class="tile-body">
        <div  class="col-md-12 p-2 m-2 row ">
          <div class="col-md-6 justify-content-start align-items-center">
            <h5 class="h5"><i class="fa fa-table"></i><strong> Products Table</strong></h5>
          </div>
          <div class="row col-md-6 justify-content-end">
              <a style="height: 30px; width:100px;" href="#" class="btn btn-warning d-flex justify-content-center align-items-center ml-1"><i class="fa fa-print "></i><small>PDF</small></a>
              <a style="height: 30px; width:100px;" href="{{route('products.create')}}" class="btn btn-primary d-flex justify-content-center align-items-center ml-1"><i class="fa fa-plus "></i><small>New</small></a>
          </div>
          
          
        </div>
          <input style="width: 100%; padding:5px ; margin-bottom:5px;" type="text" name="search" placeholder="Search...">
        
        <div class="table-responsive">
          
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Category</th>
                    <th>Description</th>
                    <!--th>image</th> -->
                    <th>price</th>
                    <th>sale price</th>
                    <th>quantity</th>
                    <th>weight</th>
                    <th>height</th>
                    <th>wedth</th>
                    <th>length</th>
                    <th>status</th>
                    <th>options</th>
                <tr>
            </thead>
            <tbody>
             
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td> 
                    <td>{{$product->name}}</td>
                    <td>{{$product->slug}}</td> 
                    <td>{{$product->category->name}}</td> 
                    <td>{{$product->description}}</td>
                    <td>
                        <img style="height: 100px ; wedth:100px" src="{{$product->image}}" >
                    </td>
                    <td>{{$product->price}} $</td>
                    <td>{{$product->sale_price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->weight}}</td>
                    <td>{{$product->height}}</td>
                    <td>{{$product->wedth}}</td>
                    <td>{{$product->length}}</td>
                    <td>{{$product->status}}</td> 
                    <td>
                      <div class="row  align-items-center">
                        <a style="height: 30px; width:100px;" href="{{route('products.edit',$product->id)}}" class="btn btn-warning d-flex justify-content-center align-items-center ml-1"><i class="fa fa-edit "></i><small>Edit</small></a>
                        <a style="height: 30px; width:100px;" href="{{route('products.create')}}" class="btn btn-danger d-flex justify-content-center align-items-center ml-1"><i class="fa fa-remove "></i><small>Delete</small></a>
                      </div>
                    </td>
                <tr> 
                @endforeach
               
             
            </tbody>
           
          </table>
          <div class="d-flex justify-content-between align-items-center">
            <div class="">
              {{$products->links()}}
            </div>
            <div class="">
              <p class="text-sm text-gray-700 leading-5">
                {!! __('Showing') !!}
                <span class="font-medium">{{ $products->firstItem() }}</span>
                {!! __('to') !!}
                <span class="font-medium">{{ $products->lastItem() }}</span>
                {!! __('of') !!}
                <span class="font-medium">{{ $products->total() }}</span>
                {!! __('results') !!}
            </p>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

 

    
   
@endsection
  
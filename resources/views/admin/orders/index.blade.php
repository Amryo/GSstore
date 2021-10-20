@extends('layouts.admin')

@section('content')

  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Orders Table</h1>
      <p>Orders This Store</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Control Panel</li>
      <li class="breadcrumb-item active"><a href="#">Orders</a></li>
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
            <h5 class="h5"><i class="fa fa-table"></i><strong> Orders Table</strong></h5>
          </div>
          <div class="row col-md-6 justify-content-end">
              <a style="height: 30px; width:100px;" href="#" class="btn btn-warning d-flex justify-content-center align-items-center ml-1"><i class="fa fa-print "></i><small>PDF</small></a>
          </div>
          
          
        </div>
          <input style="width: 100%; padding:5px ; margin-bottom:5px;" type="text" name="search" placeholder="Search...">
        
        <div class="table-responsive">
          
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Product Count</th>
                <th>Created At </th>
                <th>Total</th>
                <th>Status</th>
                <th>Payment Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
              <tr>
                <td>{{$order->number}}</td> 
                <td>{{$order->billing_name}}</td> 
                <td><address>{{$order->billing_address}}</address></td> 
                <td>
                  {{$order->items_count}}
                </td> 
                <td>{{$order->created_at->diffForHumans()}}</td> 
                <td>$ {{$order->total}}</td> 
                <td>
                  <span class="text-white badge rounded-pill bg-success">{{$order->status}}</span>
                </td>
                <td>
                  <span class="text-white badge rounded-pill bg-success">{{$order->payment_status}}</span>
                </td>
            <tr> 
              @endforeach
              
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

 

    
   
@endsection
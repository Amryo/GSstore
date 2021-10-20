@extends('layouts.admin')

@section('content')

  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Users Table</h1>
      <p>Users This Store</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Control Panel</li>
      <li class="breadcrumb-item active"><a href="#">Users</a></li>
    </ul>
  </div>
  <div class="col-md-12">
       
        
    <div class="tile">
      @if (Session::has('message'))
      <div class="alert alert-success" role="alert">
       {{Session::get('message')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div> 
      @endif
      <div class="tile-body">
        <div  class="col-md-12 p-2 m-2 row ">
          <div class="col-md-6 justify-content-start align-items-center">
            <h5 class="h5"><i class="fa fa-table"></i><strong> Users Table</strong></h5>
          </div>  
        </div>

      </div>
      <form method="POST" action="{{route('user.store',$user->id ?? '')}}" enctype="multipart/form-data">
          @csrf
          @include('admin.users._form' ,[
          'button'=> 'Add'
        ])
      </form>
    </div>
  </div>

 

    
   
@endsection
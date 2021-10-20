@extends('layouts.admin')

@section('content')

  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Roles Table</h1>
      <p>Roles This Store</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Control Panel</li>
      <li class="breadcrumb-item active"><a href="#">Roles</a></li>
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
            <h5 class="h5"><i class="fa fa-table"></i><strong> Roles Table</strong></h5>
          </div>
          <div class="row col-md-6 justify-content-end">
              <a style="height: 30px; width:100px;" href="#" class="btn btn-warning d-flex justify-content-center align-items-center ml-1"><i class="fa fa-print "></i><small>PDF</small></a>
              @can('roles.create')
              <a style="height: 30px; width:100px;" href="{{route('roles.create')}}" class="btn btn-primary d-flex justify-content-center align-items-center ml-1"><i class="fa fa-plus "></i><small>New</small></a>
              @endcan
              
          </div>
          
          
        </div>
          <input style="width: 100%; padding:5px ; margin-bottom:5px;" type="text" name="search" placeholder="Search...">
        
        <div class="table-responsive">
          
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Options</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($roles as $role)
              <tr>
                <td>{{$role->id}}</td> 
                <td>{{$role->name}}</td> 

                <td>
                  <div class="row justify-content-center">
                    @can('roles.update')
                    <a style="height: 30px; width:100px;" href="{{route('roles.edit',$role->id)}}" class="btn btn-warning d-flex justify-content-center align-items-center ml-1"><i class="fa fa-edit "></i><small>edit</small></a>
                    @endcan
                    
                    @can('roles.delete')
                    <a style="height: 30px; width:100px;" href="#" class="btn btn-danger d-flex justify-content-center align-items-center ml-1"><i class="fa fa-delete "></i><small>delete</small></a>
                   @endcan
                </div>
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
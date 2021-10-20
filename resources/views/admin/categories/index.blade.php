@extends('layouts.admin')

@section('content')

  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Categories Table</h1>
      <p>Categories This Store</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Control Panel</li>
      <li class="breadcrumb-item active"><a href="#">Categories</a></li>
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
            <h5 class="h5"><i class="fa fa-table"></i><strong> Categories Table</strong></h5>
          </div>
          <div class="row col-md-6 justify-content-end">
              <a style="height: 30px; width:100px;" href="#" class="btn btn-warning d-flex justify-content-center align-items-center ml-1"><i class="fa fa-print "></i><small>PDF</small></a>
              <a style="height: 30px; width:100px;" href="{{route('categories.create')}}" class="btn btn-primary d-flex justify-content-center align-items-center ml-1"><i class="fa fa-plus "></i><small>New</small></a>
              <a style="height: 30px; width:100px;" id="btn_delete_all" href="#" class="btn btn-danger d-flex justify-content-center align-items-center ml-1" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-plus "></i><small>Delete All</small></a>
          </div>
          
          
        </div>

        <div class="table-responsive">
          
          <table class="table table-hover table-bordered" id="datatable">
            <thead>
              <tr>
                <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)"></th>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>slug</th>
                <th>Description</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
              <tr>
                <td>
                  <input type="checkbox"  value="{{ $category->id }}" class="box1" >
                </td>
                <td>{{$category->id}}</td> 
                <td>{{$category->name}}</td> 
                <td>
                  <img style="height: 100px ; wedth:100px" src="{{asset('storage/'.$category->image)}}">
                  </td> 
                <td>{{$category->slug}}</td> 
                <td>{{$category->description}}</td> 
                <td>
                  <div class="row justify-content-center">
                    <a style="height: 30px; width:100px;" href="{{route('categories.edit',$category->id)}}" class="btn btn-warning d-flex justify-content-center align-items-center ml-1"><i class="fa fa-edit "></i><small>edit</small></a>
                    <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                    <button type="submit" style="height: 30px; width:100px;"  class="btn btn-danger d-flex justify-content-center align-items-center ml-1"><i class="fa fa-remove "></i><small>Delete</small></button>
                    </form>                </div>
                </td>
            <tr> 
              @endforeach
              
             
            </tbody>
          </table>
        </div>
      </div>

      <!-- Modal -->
<div id="delete_all" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Selected Categories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('delete_all') }}" method="POST">
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

    </div>
  </div>

 

    
   
@endsection
@section('scripts')

@include('components.deleteAllSelected');

@endsection
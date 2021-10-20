@extends('layouts.admin')
@section('content')

    <div class="app-title">
      
    </div>
    <div class="row">
   
     
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Chat</h3>
          <div class="messanger">
            <div id="messages" class="messages">
              
            </div>
            <form id="chat-form" method="POST" action="{{route('chat.store')}}">
            @csrf
            <div class="sender">
              <input name="message" type="text" placeholder="Send Message">
              <button class="btn btn-primary" type="submit"><i class="fa fa-lg fa-fw fa-paper-plane"></i></button>
            </div>
            </form>
          </div>
        </div>
      </div>
     
    </div>
  
@endsection
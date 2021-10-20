
   @if ($errors->any())
     <div class="alert alert-danger">
       <ul>
         @foreach ($errors->all() as $message)
             <li>{{$message}}</li>
         @endforeach
       </ul>
     </div>
   @endif
    <div class="form-group">
      <label for="exampleFormControlInput1">Name</label>
      <input type="text" name="user_id" class="form-control" id="exampleFormControlInput1"  value="{{$user->name ?? ''}}" disabled readonly>
    </div>
    <div class="form-group">
      @foreach ($roles as $role)
      <div class="form-check">
        <input class="form-check-input" type="radio" name="role_id" value="{{$role->id}}">
        <label class="form-check-label" for="flexRadioDefault1">
          {{$role->name}}
        </label>
      </div>
      @endforeach
    </div>
    
    <button type="submit" class="btn btn-primary">{{$button}}</button>
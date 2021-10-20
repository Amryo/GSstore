
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
      <label for="exampleFormControlInput1">Role Name</label>
      <input type="text" name="name" class="form-control" id="exampleFormControlInput1"  value="{{$role->name ?? ''}}" placeholder="name of category">
    </div>
    <div class="form-group">
      @foreach (config('abilities') as $key=>$value)
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="abilities[]" value="{{$key}}" @if(in_array($key , $role->abilities ?? [])) checked @endif >
        <label class="form-check-label" for="flexCheckDefault">
          {{$value}}
        </label>
      </div>
      @endforeach
    </div>
    
    <button type="submit" class="btn btn-primary">{{$button}}</button>
<div class="form-group">
    <label for="{{ $id ?? $name }}">{{$label}}</label>
    <input 
     type="{{$type ?? 'text'}}"
     name="{{$name}}" 
     id="{{$id ?? $name}}"
     class="form-control" 
     value="{{old($name , $value ?? null) }}" 
     >
</div>
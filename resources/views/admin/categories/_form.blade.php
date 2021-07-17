
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
      <label for="exampleFormControlInput1">Category Name</label>
      <input type="text" name="name" class="form-control" id="exampleFormControlInput1"  value="{{$category->name}}" placeholder="name of category">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Parent</label>
      <select name="parent_id" class="form-control" id="parent_id">
        <option>--Select Parent--</option>
        @foreach ($categories as $parent)
        <option value="{{$parent->id}}" @if ($parent->id == $category->parent_id) selected @endif>{{$parent ->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea name="description" class="form-control" id="description"  rows="3">{{$category->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control" id="image"   value="{{$category->image}}">
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="status" value="Active" @if ($category->status == "Active") checked @endif >
        <label class="form-check-label" for="status">
          Active
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="status" value="Draft" @if ($category->status == "Draft") checked @endif>
        <label class="form-check-label" for="status">
          Draft
        </label>
      </div>
      <button type="submit" class="btn btn-primary">{{$button}}</button>
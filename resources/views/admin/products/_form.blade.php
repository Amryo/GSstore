
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
      <label for="exampleFormControlInput1">Name *</label>
      <input type="text" name="name" class="form-control" id="exampleFormControlInput1"  value="{{$product->name}}" placeholder="Ex : HP , Samsung , iPhone Product">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Parent</label>
      <select name="category_id" class="form-control" id="exampleFormControlSelect1">
        <option>--Select Parent--</option>
        @foreach ($categories as $parent)
        <option value="{{$parent->id}}" @if ($parent->id == $product->category_id) selected @endif>{{$parent ->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description *</label>
      <textarea name="description" class="form-control" id="description" placeholder="Ex : info for product"  rows="3">{{$product->description}}</textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Price *</label>
      <input type="text" name="price" class="form-control" id="exampleFormControlInput1"  value="{{$product->price}}" placeholder="Ex : 500 $">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Price Sale *</label>
      <input type="text" name="sale_price" class="form-control" id="exampleFormControlInput1"  value="{{$product->sale_price}}" placeholder="Ex : 550 $">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Weight</label>
      <input type="text" name="weight" class="form-control" id="exampleFormControlInput1"  value="{{$product->weight}}" placeholder="Ex : 55 kg">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Height</label>
      <input type="text" name="height" class="form-control" id="exampleFormControlInput1"  value="{{$product->height}}" placeholder="Ex : 120cm">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Wedth</label>
      <input type="text" name="weight" class="form-control" id="exampleFormControlInput1"  value="{{$product->wedth}}" placeholder="Ex: 120cm">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Length</label>
      <input type="text" name="weight" class="form-control" id="exampleFormControlInput1"  value="{{$product->length}}" placeholder="Ex : 220cm">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Sku</label>
      <input type="text" name="sku" class="form-control" id="exampleFormControlInput1"  value="{{$product->sku}}" placeholder="sku : any unique code">
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control" id="image"  >
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="status" value="Active" @if ($product->status == "Active") checked @endif >
        <label class="form-check-label" for="status">
          Active
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="status" value="Draft" @if ($product->status == "Draft") checked @endif>
        <label class="form-check-label" for="status">
          Draft
        </label>
      </div>
      <button type="submit" class="btn btn-primary">{{$button}}</button>
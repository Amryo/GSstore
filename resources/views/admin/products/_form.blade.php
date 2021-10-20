
   @if ($errors->any())
     <div class="alert alert-danger">
       <ul>
         @foreach ($errors->all() as $message)
             <li>{{$message}}</li>
         @endforeach
       </ul>
     </div>
   @endif

   <x-form-input name="name" type="text" label="Name" :value="$product->name" />
   
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

    <x-form-input   name="price" type="number" label="Price" :value="$product->price" />

    <x-form-input   name="sale_price" type="number" label="Sale Price" :value="$product->sale_price" />

    <x-form-input   name="weight"  type="number"   label="Weight"  :value="$product->weight" />

    <x-form-input   name="height"  type="number"   label="Height"  :value="$product->height" />

    <x-form-input   name="length"  type="number"   label="Length"  :value="$product->length" />

    <x-form-input   name="wedth"   type="number"   label="Wedth"   :value="$product->wedth" />
    
    <x-form-input   name="sku"   type="text"      label="SKU"   :value="$product->sku" />

    <x-form-input   name="image"   type="file"   label="Product Image"   :value="$product->image" />
  

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
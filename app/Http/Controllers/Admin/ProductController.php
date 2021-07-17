<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //where('status', '=', 'active')->orderBy('name', 'ASC')->orderBy('price', 'DESC')->get();
        $products = Product::paginate();
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::all();
        return view('admin.products.create', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->get('name'))
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image'); //Upload file
            $image_path = $file->store('uploads', 'public');
            $request->merge([
                'image' => $image_path,
            ]);



            // $file->getClientOriginalName(); //return file name ;
            // $file->getClientOriginalExtension(); //return 
            // $file->getClientMimeType(); //EX :image/jpg ;
            // $file->getType();
            // $file->getSize();



        }
        $products = Product::create($request->all());

        $success = $request->session()->flash('success', 'Product ' . '(' . $request->name . ')' . ' Add successfully');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $request->merge([
                'image' => $image_path,
            ]);
        }
        $products->update($request->all());
        $success = $request->session()->flash('success', 'Product ' . '(' . $request->name . ')' . ' Update successfully');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

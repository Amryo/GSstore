<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequset;
use App\Models\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'ASC')
            ->orderBy('name', 'DESC')
            ->latest()
            ->limit(10)
            ->paginate(5);

        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', '=', 'Active')->get();
        $category = new Category();
        return view('admin.categories.create', ['categories' => $categories, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(Category::validateRule());
        //requset Merge ^_^ 
        $request->merge([
            'slug' => Str::slug($request->get('name'))
        ]);
        $categories = Category::create($request->all());
        //  Write into session 
        $success = $request->session()->flash('success', $request->name . 'add successfully');
        return redirect()->route('categories.index', ['categories' => $categories]);

        /* if($request->hasFile('image'))
        {
            $file = $request->file('image'); //UploadedFile Object
            $file->store('uploads');
            //Filesystem-Disks
            //local:storage/app
            //public:storage/app/public 
            //s3: Amazon Drive
            $request->merge([
                'image'=>$image_path ,
            ]);
           
        }*/
        # Validate By requset ^_^

        //return array of all form fields
        //$request->all();

        //return single field value 
        //$request->description ;


        //Method #2
        /*  $categories= Category::create([
            'field' => 'value' //$request->post('name');
        ]);*/

        //Method #3
        /*  $categories= new Category([
        'field' => 'value' //$request->post('name');
        ]);
        $categories->save();*/
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
        $category = Category::findorfail($id);
        $categories = Category::where('status', '=', 'Active')->get();

        return view('admin.categories.edit', ['categories' => $categories, 'category' => $category]);
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
        $request->validate(Category::validateRule($id));
        $category = Category::find($id);
        #Method 4 : Mass assignment
        $request->merge([
            'slug' => Str::slug($request->get('name')) . '-2',
        ]);

        $category->update($request->all());
        $success = $request->session()->flash('success', $request->name . ' ' . 'Update successfully');
        // 
        #Method 2 : Mass assignment

        // $category->update($request->all());

        #Method 3 : Mass assignment
        //  $category->fill($request->all())->save();


        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequset;
use App\Models\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;
use Student;

class CategoriesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        Gate::authorize('categories.view-any');
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
        Gate::authorize('categories.create');

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
        Gate::authorize('categories.create');

        $request->validate(Category::validateRule());

        //requset Merge ^_^ 
        $request->merge([
            'slug' => Str::slug($request->get('name'))
        ]);
        $input = $request->all();
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $input['image'] = $image_path;
        }
        $categories = Category::create($input);
        //  Write into session 
        //$success = $request->session()->flash('success', $request->name . 'add successfully');
        Alert::success('Success Title', 'Success Message');

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
        Gate::authorize('categories.update');

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
        Gate::authorize('categories.update');

        $request->validate(Category::validateRule($id));
        $category = Category::find($id);

        #Method 4 : Mass assignment
        $request->merge([
            'slug' => Str::slug($request->get('name')) . '-2',
        ]);

        $input = $request->all();
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $input['image'] = $image_path;
        }
        $category->update($input);

        //$success = $request->session()->flash('success', $request->name . ' ' . 'Update successfully');
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
        $category = Category::findorFail($id);
        $category->delete();
        return redirect()->back();
    }

    public function DeleteAllSelectedCategory(Request $request)
    {

        $delete_all_id = explode(",", $request->delete_all_id);
        Category::whereIn('id', $delete_all_id)->Delete();
        Alert::success('Success Title', 'Success Message');
        return redirect()->back();
    }
}

<?php
 
namespace App\Http\Controllers\AdminControllers; 

use App\Category ;
use App\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }


    public function create(){
        $categories = Category::all();
        return view('admin.category.add',compact('categories'));
    }


    public function store(Request $request){
        $validation = $request->validate(Category::$rules);
        return(Category::saveCategory($request->all(), null));
    }

    public function show($id){
        $category = Category::where('id',$id)->first();
        return view('admin.category.show',compact('category'));
    }


   
    public function edit($id){
        $categories=Category::all();
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('category','categories'));
    }

    
     
    public function update(Request $request){
        $validation = $request->validate(Category::$rules);
        return(Category::saveCategory($request->all(),$request->id));
    }

    public function destroy($id)
    {
        $category = Category::where('id',$id)->first();
        if ($category) {
           /* unlink($category->image);
            unlink($category->icon);*/
            $category->delete(); 
            toastr( 'Successful Delete',  'danger',  'Category');
            return redirect('admin/category');
        }
        toastr()->error('Opps ! An error has occurred.');
        return redirect('admin/category');
    }



    
}

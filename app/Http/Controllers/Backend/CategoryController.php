<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    //Category Functions
    public function AllCategory(){
        $categories = Category::latest()->get()  ;
        return view('admin.category.category_all',compact('categories'));
    }

    public function AddCategory(){
        return view('admin.category.category_add');
    }

    public function StoreCategory(Request $request){

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),

        ]);


         $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('all.category')->with($notification);


    }


    public function EditCategory($id){
        $category = Category::findOrFail($id);
        return view('admin.category.category_edit',compact('category'));
    }


    public function UpdateCategory(Request $request){

        $cat_id = $request->id;

        Category::findOrFail($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),

        ]);


         $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('all.category')->with($notification);


    }

    public function DeleteCategory($id){

        Category::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }



    //SubCategory Functions

    public function AllSubCategory(){
        $subcategories = SubCategory::latest()->get()  ;
        return view('admin.subcategory.subcategory_all',compact('subcategories'));
    }

    public function AddSubCategory(){
        $categories = Category::latest()->get();
        return view('admin.subcategory.subcategory_add',compact('categories'));
    }

    public function StoreSubCategory(Request $request){

        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),

        ]);


         $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function EditSubCategory($id){

        $categories = Category::latest()->get();
        $subcategory = Subcategory::findOrFail($id);
        return view('admin.subcategory.subcategory_edit',compact('categories','subcategory'));
    }


 public function UpdateSubCategory(Request $request){

       $subcat_id = $request->id;

        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),

        ]);


         $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('all.subcategory')->with($notification);


    }

     public function DeleteSubCategory($id){

        Subcategory::findOrFail($id)->delete();

         $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }

}

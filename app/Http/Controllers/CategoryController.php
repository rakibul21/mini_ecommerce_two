<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create(Request $request)
    {
        Category::newCategory($request);
        return redirect('add/category')->with('massage','Category info save successfully');
    }

    public function manage()
    {
        return view('admin.category.manage',['categories' => Category::orderBy('id','desc')->get()]);
    }

    public function edit($id)
    {
        return view('admin.category.edit',['category' => Category::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id) ;
        return redirect('manage/category')->with('message', 'Category info update successfully');
    }

    public function delete($id)
    {
//        $this->courses = Course::where('category_id' , $id)->get();
//        if ($this->courses)
//        {
//            foreach ($this->courses as $course)
//            {
//                if ($course->status == 1)
//                {
//                    return redirect()->back()->with('message','Sorry, You can not delete this.Because This something active here ');
//                }
//            }
//        }
        Category::deleteCategory($id);
        return redirect('/manage/category')->with('message', 'Category info delete successfully.');

    }
}

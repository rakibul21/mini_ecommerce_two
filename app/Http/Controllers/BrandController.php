<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }

    public function create(Request $request)
    {
        Brand::newBrand($request);
        return redirect('/brand/add')->with('message','Brand info create successfully');

    }

    public function manage()
    {
        return view('admin.brand.manage',['brands' => Brand::orderBy('id' , 'desc')->get()]);
    }

    public function edit($id)
    {
        return view('admin.brand.edit',['brand' => Brand::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Brand::updateBrand($request, $id) ;
        return redirect('/brand/manage')->with('message', 'Brand info update successfully');
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
        Brand::deleteBrand($id);
        return redirect('/brand/manage')->with('message', 'Brand info delete successfully.');

    }
}

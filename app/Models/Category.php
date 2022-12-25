<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static $image,$imageName,$imageDirectory,$imageExtension,$category, $imageUrl;

    use HasFactory;
    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$imageExtension;
        self::$imageDirectory='admin/assets/images/category-images/';
        self::$image->move(self::$imageDirectory,self::$imageName);

        return self::$imageDirectory.self::$imageName;

    }

    public static function newCategory($request)
    {
        self::$category                   = new Category();
        self::$category->name             = $request->name;
        self::$category->description      = $request->descripion;
        self::$category->status           = $request->status;
        self::$category->image            = self::getImageUrl($request);
        self::$category->save();
    }

    public static function updateCategory($request,$id)
    {
        self::$category = Category::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$category->image;
        }
        self::$category->name             = $request->name;
        self::$category->description      = $request->descripion;
        self::$category->status           = $request->status;
        self::$category->image = self::$imageUrl;
        self::$category->save();

    }

    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if (file_exists(self::$category->image))
        {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }

}

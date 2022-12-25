<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    private static $brand,$image,$imageName,$imageDirectory,$imageExtension,$imageUrl;
    use HasFactory;

    public static function newBrand($request){
        self::$brand = new Brand();
        self::$brand->name = $request->name;
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    public static function updateBrand($request, $id){
        self::$brand = Brand::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$brand->image;
        }
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->status = $request->status;
        self::$brand->image = self::$imageUrl;
        self::$brand->save();
    }

    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        if (file_exists(self::$brand->image))
        {
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }




}

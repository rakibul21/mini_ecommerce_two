<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    private static $product, $image,$imageName,$imageDirectory,$imageExtension, $imageUrl , $message;
    use HasFactory;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$imageExtension;
        self::$imageDirectory = 'admin/assets/images/product-image/';
        self::$image->move(self::$imageDirectory,self::$imageName);

        return self::$imageDirectory.self::$imageName;
    }

    public static function newProduct($request)
    {
        self::$product = new Product();
        self::$product->name = $request->name;
        self::$product->category_name = $request->category_name;
        self::$product->brand_name = $request->brand_name;
        self::$product->description = $request->description;
        self::$product->image = self::getImageUrl($request);
        self::$product->status = $request->status;
        self::$product->save();
    }

    public static function updateProductStatus($id)
    {
        self::$product = Product::find($id);
        if (self::$product->status == 1)
        {
            self::$product->status = 0;
            self::$message = 'Product info Unpublished successfully';
        }
        else
        {
            self::$product->status = 1;
            self::$message = 'Product info published successfully';
        }
        self::$product->save();
        return self::$message;

    }

    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$product->image;
        }
        self::$product->name = $request->name;
        self::$product->category_name = $request->category_name;
        self::$product->brand_name = $request->brand_name;
        self::$product->description = $request->description;
        self::$product->image = self::$imageUrl;
        self::$product->status = $request->status;
        self::$product->save();

    }

    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
    }

//    public static function deleteCategoryProduct($id)
//    {
//        self::$products = Product::where('product_id' , $id)->get();
//        foreach (self::$products as $product)
//        {
//            if(file_exists($product->image))
//            {
//                unlink($product->image);
//            }
//            $product->delete();
//        }
//    }
}

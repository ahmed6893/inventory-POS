<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable= [
        'name','email','phone','address','experiance','employee_image','salary','vacation','status'
    ];

    public static function getImageUrl($image){
        $imageName = uniqid().'.' .$image->getClientOriginalExtension();
        $directory ='admin/images/empoleyee';
        $image->move(public_path($directory),$imageName);
        return $directory . $imageName ;
    }
    public static function saveNewEmployee($request){
        $data= $request->only(['name','email','phone','address','experiance','employee_image','salary','vacation','status'
        ]);

        if($request->hasFile('image')){
            $data['employee_image'] = self::getImageUrl($request->file('image'));
        }
        $product= self::create($data);

        return $product->id;
    }
}

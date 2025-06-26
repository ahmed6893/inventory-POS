<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable= [
        'name','email','phone','address','experiance','employee_image','salary','vacation','status'
    ];

    public static function getImageUrl($image){
        $imageName = uniqid().'.' .$image->getClientOriginalExtension();
        $directory ='admin/images/employee/';
        $image->move(public_path($directory),$imageName);
        return $directory . $imageName ;
    }
    public static function saveNewEmployee($request){
        $data= $request->only(['name','email','phone','address','experiance','salary','vacation','status'
        ]);

        if($request->hasFile('employee_image')){
            $data['employee_image'] = self::getImageUrl($request->file('employee_image'));
        }
        $employee= self::create($data);
        return $employee->id;
    }

    public function updateEmployee($request, $id){
        $data = $request->only(['name','email','phone','address','experiance','salary','vacation','status']);

        $employee = self::findOrFail($id);

        if($request->hasFile('employee_image')){
            if ($employee->employee_image && file_exists(public_path($employee->employee_image))) {
                unlink(public_path($employee->employee_image));
            }
            $data['employee_image'] = self::getImageUrl($request->file('employee_image'));
        } else {
            $data['employee_image'] = $employee->employee_image;
        }
        return $employee->update($data);
    }

    public static function deleteEmployee($id){
        $employee = self::findOrFail($id);
        if ($employee->employee_image && file_exists(public_path($employee->employee_image))) {
            unlink(public_path($employee->employee_image));
        }
        return $employee->delete();
    }
}

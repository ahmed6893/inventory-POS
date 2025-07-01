<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'company_name',
        'account_holder',
        'account_number',
        'bank_name',
        'bank_branch',
        'city',
        'suppliers_image',
        'status'
    ];

    public function getImageUrl($image)
    {
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        $directory = 'admin/images/supplier/';
        $image->move(public_path($directory), $imageName);
        return $directory . $imageName;
    }
    public function saveSupplier($request)
    {
        $data=$request->only([
            'name', 'email', 'phone', 'address', 'company_name',
            'account_holder', 'account_number', 'bank_name',
            'bank_branch', 'city', 'status'
        ]);
        $data['suppliers_image'] = $this->getImageUrl($request->file('suppliers_image'));
        $supplier = Suppliers::create($data);
        return $supplier->id;
    }

    public function updateSupplier($id, $request)
    {
        $supplier = Suppliers::findOrFail($id);
        $data = $request->only([
            'name', 'email', 'phone', 'address', 'company_name',
            'account_holder', 'account_number', 'bank_name',
            'bank_branch', 'city', 'status'
        ]);
        if ($request->hasFile('suppliers_image')) {
            if ($supplier->suppliers_image && file_exists(public_path($supplier->suppliers_image))) {
                unlink(public_path($supplier->suppliers_image));
            }
            $data['suppliers_image'] = $this->getImageUrl($request->file('suppliers_image'));
        }else {
            $data['suppliers_image'] = $supplier->suppliers_image;
        }
        $supplier->update($data);
        return $supplier->id;
    }
    public function deleteSupplier($id)
    {
        $supplier = Suppliers::findOrFail($id);
        if ($supplier->suppliers_image && file_exists(public_path($supplier->suppliers_image))) {
            unlink(public_path($supplier->suppliers_image));
        }
        return $supplier->delete();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'shop_name',
        'customer_image',
        'account_holder',
        'account_number',
        'bank_name',
        'bank_branch',
    ];

    public function getImageUrl($image)
    {
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        $directory = 'admin/images/customer/';
        $image->move(public_path($directory), $imageName);
        return $directory . $imageName;
    }
    public function saveCustomer($request)
    {
        $data = $request->only([
            'name','email','phone','address','shop_name','account_holder','account_number','bank_name','bank_branch'
        ]);

        if($request->hasFile('customer_image')) {
            $data['customer_image'] = self::getImageUrl($request->file('customer_image'));
        }

        $customer = Customer::create($data);
        return $customer->id;
    }

    public function updateCustomer($request, $id)
    {
        $customer = Customer::findOrFail($id);
        $data = $request->only([
            'name',
            'email',
            'phone',
            'address',
            'shop_name',
            'account_holder',
            'account_number',
            'bank_name',
            'bank_branch'
        ]);

        if($request->hasFile('customer_image')) {
            if ($customer->customer_image && file_exists(public_path($customer->customer_image))) {
                unlink(public_path($customer->customer_image));
            }
            $data['customer_image'] = self::getImageUrl($request->file('customer_image'));
        }else {
            $data['customer_image'] = $customer->customer_image;
        }

        $customer->update($data);
        return $customer->id;
    }

    public static function deleteCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        if ($customer->customer_image && file_exists(public_path($customer->customer_image))) {
            unlink(public_path($customer->customer_image));
        }
        return $customer->delete();
    }
}

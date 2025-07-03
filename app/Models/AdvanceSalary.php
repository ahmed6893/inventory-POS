<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvanceSalary extends Model
{
    protected $fillable = [
        'employee_id',
        'amount',
        'payment_date',
        'month',
        'status',
        'notes',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

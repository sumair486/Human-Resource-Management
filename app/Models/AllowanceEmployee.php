<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllowanceEmployee extends Model
{
    use HasFactory;
    protected $guraded=[];
    protected $table="allowance_employees";

    

    protected $fillable=['gosi','housing_allowance','family'];

    // public function employee()
    // {
    //     return $this->belongsTo(Employee::class);
    // }
}

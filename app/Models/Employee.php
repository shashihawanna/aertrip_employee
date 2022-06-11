<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'dep_id', 'name', 'age', 'job', 'salary', 'deleted_at'
    ];

    /**
     * Get the contact for the each employee.
     */
    public function contact()
    {
        return $this->hasMany(Contact::class, 'emp_id');
    }

    /**
     * Get the address for the each employee.
     */
    public function address()
    {
        return $this->hasMany(Addresses::class, 'emp_id');
    }

    /**
     * Get the employee department.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'dep_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addresses extends Model
{
    use HasFactory,SoftDeletes;
 
    protected $fillable = [
        'emp_id',  'address', 'deleted_at'
    ];
}

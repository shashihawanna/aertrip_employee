<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'emp_id',  'number', 'deleted_at'
    ];

    public function store($contacts,$emp_id)
    {
        foreach ($contacts as $contact) {
            $obj = new Self(); 
            $obj->emp_id = $emp_id;
            $obj->number = $contact;
            $obj->save();
        }
    }
}

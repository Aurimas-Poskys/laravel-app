<?php

namespace App\Models;

use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;


    protected $fillable = [
        'full_name'
    ];

    
    public function myGroup()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}

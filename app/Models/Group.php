<?php

namespace App\Models;

use App\Models\Project;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $primaryKey = 'id';

    protected $fillable = [
        'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}

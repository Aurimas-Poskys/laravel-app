<?php

namespace App\Models;

use App\Models\Group;
use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'groups', 'students'
    ];

    public function studentGroups()
    {
        return $this->hasMany(Group::class);
    }
}

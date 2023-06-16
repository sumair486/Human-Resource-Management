<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    public function project()
    {
        return $this->belongsTo(Project::class)->withTrashed();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function taskProject()
    {
        return Task::get()->load('Project');
    }

    public function task_attachment()
    {
        return $this->hasMany(TaskAttachment::class);
    }
}

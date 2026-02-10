<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has; 

class ToDo extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'task_id',
        'title',
        'is_done',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}

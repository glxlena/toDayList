<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'title',
        'due_date',
        'color',
    ];

    public function toDos()
    {
        return $this->hasMany(ToDo::class);
    }
}

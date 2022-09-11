<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolists extends Model
{
    use HasFactory;
    protected $table = 'todolist';
    protected $fillable = [
        'id',
        'to_do',
        'desc',
        'status',
        'start_date',
        'due_date',
    ];
}

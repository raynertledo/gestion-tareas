<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Define los atributos que pueden ser asignados en masa
    protected $fillable = ['title', 'description', 'status'];
}

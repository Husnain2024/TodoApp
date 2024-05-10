<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // Table name

    protected $table = "todo";

    // primaryKey

    protected $primaryKey = "id";
    
    // Filable  colums
    protected $fillable = ['title', 'content']; 


}

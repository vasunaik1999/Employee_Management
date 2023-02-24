<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'notes';
    protected $fillable = ['topic', 'notes', 'user_id', 'category_id'];
}

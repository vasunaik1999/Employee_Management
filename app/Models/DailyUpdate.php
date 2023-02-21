<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyUpdate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'daily_updates';
    protected $fillable = ['task_brief','description','user_id','remark','date','status','keypoints'];
}

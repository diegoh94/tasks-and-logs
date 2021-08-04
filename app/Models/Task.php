<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Task extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
    	'description', 'deadline', 'user_created_id', 'user_assigning_id',
    ];

    public function user_created() {
        return $this->belongsTo(User::class);
    }

    public function user_assigning() {
        return $this->belongsTo(User::class);
    }

    // $task->logs
    public function logs() {
        return $this->hasMany(TaskLog::class);   
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackReply extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
    public function teacher(){
        return $this->belongsTo(User::class, 'teacher_id');
    }    
    public function course(){
        return $this->belongsTo(User::class, 'course_id');
    }
        
    public function feedbacks(){
        return $this->belongsTo(User::class, 'feedback_id');
    }
}

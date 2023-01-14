<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class StudentCase extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'student_case';

    protected $primaryKey = 'case_id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'complaint_id',
        'complaint_desc',
        'status_id',
        'complaint_comment',
        'complaint_remark',
        'department_id',
        'user_id',
    ];

    public static function getStudentCase(){
        $student_case = StudentCase::all();
        return $student_case;
    }

    public function complaint(){
        return $this->belongsTo(SettingComplaint::class, 'complaint_id');
    }

    public function department(){
        return $this->belongsTo(SettingDepartment::class, 'department_id');
    }

    public function status(){
        return $this->belongsTo(SettingStatus::class, 'status_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function notification(){
        return $this->hasMany(Notification::class, 'case_id');
    }
}

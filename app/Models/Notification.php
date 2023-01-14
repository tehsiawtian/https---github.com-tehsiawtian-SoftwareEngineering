<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notification';

    protected $primaryKey = 'notification_id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'notification_comment',
        'case_id',
        'user_id',
        'department_id',
    ];

    public static function getNotification(){
        $notifications = Notification::all();
        return $notifications;
    }
}

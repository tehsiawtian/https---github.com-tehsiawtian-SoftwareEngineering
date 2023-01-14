<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingStatus extends Model
{
    use HasFactory;

    protected $table = 'setting_status';

    protected $primaryKey = 'status_id';

    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;

    protected $fillable = [
        'status_name',
    ];

    public static function getStatus(){
        $status = SettingStatus::all();
        return $status;
    }
}

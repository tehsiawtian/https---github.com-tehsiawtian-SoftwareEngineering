<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingDepartment extends Model
{
    use HasFactory;

    protected $table = 'setting_department';

    protected $primaryKey = 'department_id';

    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;

    protected $fillable = [
        'department_name',
    ];

    public static function getDepartment(){
        $departments = SettingDepartment::all();
        return $departments;
    }
}

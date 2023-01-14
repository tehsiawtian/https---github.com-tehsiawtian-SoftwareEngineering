<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingComplaint extends Model
{
    use HasFactory;

    protected $table = 'setting_complaint';

    protected $primaryKey = 'complaint_id';

    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;

    protected $fillable = [
        'complaint_name',
    ];

    public static function getComplaint(){
        $complaints = SettingComplaint::all();
        return $complaints;
    }
}

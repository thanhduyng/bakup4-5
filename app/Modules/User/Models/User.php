<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table ="m_user";
    protected $fillable = ['user_cd', 'user_nm_j','user_ab_j','user_nm_e','user_ab_e'];
}

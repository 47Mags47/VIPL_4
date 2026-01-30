<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Traits\RoleAndPermissions;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends BaseModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use
        Authenticatable,
        Authorizable,
        CanResetPassword,
        MustVerifyEmail;

    use HasFactory, RoleAndPermissions;

    ### Настройки
    ##################################################
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'full_name',
        'login',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'password_expired',
        'remember_token',
        'email_verified_at',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'password_expired' => 'boolean',
            'email_verified_at' => 'datetime',
        ];
    }

    ### Методы
    ##################################################
    //

    ### Связи
    ##################################################
    public function divisions(): BelongsToMany
    {
        return $this->belongsToMany(Division::class, 'user_to_division');
    }
}

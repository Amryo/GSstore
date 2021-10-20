<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\PersonalAccessToken;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasApiTokens;
    use TwoFactorAuthenticatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id')->using(RoleUser::class);
    }

    public function isSuperAdmin($user)
    {
        if (!$user->type = 'super_admin') {
            return true;
        }
    }

    public function receivesBroadcastNotifcationsOn()
    {
        return 'Notifications.' . $this->id;
    }

    public function routeNotificationForNexmo($notification)
    {
        return $this->mobile;
    }

    public function createToken(string $name, array $abilities = ['*'], $ip = null)
    {
        $token = new PersonalAccessToken();
        $token->forceFill([
            'name' => $name,
            'token' => hash('sha256', $plainTextToken = Str::random(40)),
            'abilities' => $abilities,
            'ip' => $ip,
            'tokenable_type' => static::class,
            'tokenable_id' => $this->id,
        ])->save();


        return new \Laravel\Sanctum\NewAccessToken($token, $token->getKey() . '|' . $plainTextToken);
    }
}

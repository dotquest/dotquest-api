<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;


class Login extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

   /* protected $table = "logins";
    public $timestamps = false;
    protected $fillable = [
        'email',
        'password'
    ];
    */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'passoword',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }  
}

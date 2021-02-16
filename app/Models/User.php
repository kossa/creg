<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
    ];

    public static function rules($for_update = false, $id=null)
    {
        $rules = [
            'name'     => 'required|min:2|max:255',
            'email'    => 'required|email|max:255|unique:users,email',
            'phone'    => 'required|max:255',
            'address'  => 'required|max:255',
            'password' => 'required|confirmed|max:255',
            'fonction' => 'required|confirmed|max:255',
        ];

        if ($for_update) { // creating
            $rules['email']    = 'required|email|max:255|unique:users,email,'.$id;
            $rules['password'] = 'nullable|confirmed|max:255';
        }

        return $rules;
    }

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
}

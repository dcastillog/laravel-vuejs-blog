<?php

namespace App\Models;

use App\Models\Post;

use Spatie\Permission\Traits\HasRoles;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Scope para  asignar quien puede ver los usuarios
    public function scopeAllowed($query)
    {
        if( auth()->user()->can('view', $this) )
        { 
            return $query; // Si posee el permiso view no agrega restricción al query
        }

        return $query->where('id', auth()->id()); // Caso contrario retorna a los usuarios que tengan el mismo id que el usuario autenticado, es decir 1
    }

    public function setPasswordAttribute($password)
    {
        // Se debe sacar la encriptación en el RegisterController por defecto
        $this->attributes['password'] = bcrypt($password);
    }

    public function getRoleDisplayName()
    {
        return $this->roles->pluck('display_name')->implode(', ');
    }
}

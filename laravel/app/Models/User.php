<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'tipo_documento',
        'documento',
        'password',
    ];
    /**
     * The validation rules for the model.
     *
     * @return array<string, string>
     */
    public static function rules(): array
    {
        return [
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'tipo_documento' => 'required|string|max:255',
            'documento' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
        ];
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function getNombreCompletoAttribute()
    {
        return trim("{$this->nombres} {$this->apellidos}");
    }
    
    public function getDocumentoCompletoAttribute()
    {
        return trim("{$this->tipo_documento}-{$this->documento}");
    }
}

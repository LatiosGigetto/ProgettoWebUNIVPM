<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'utente';

    public $timestamps = false;
    protected $fillable = [
        'Nome',
        'Mail',
        'password',
        'Cognome',
        'username',
        'Telefono',
        'Età',
        'Genere'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $primaryKey = 'username';
    public $incrementing = false;

    // è statico perchè mi serve chiamarlo nel controller senza dover istanziare un ogg di user
    public static function getUtenti(){
        return User::where('Livello', 1)->get();
    }

    public static function getStaff(){
        return User::where('Livello', 2)->get();
    }
}

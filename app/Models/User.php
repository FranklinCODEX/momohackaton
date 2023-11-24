<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * @property integer $id
 * @property string $fullName
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $phoneNumber
 * @property string $profileImagePath
 * @property string $livingAddress
 * @property string $profession
 * @property string $statusMatrimonial
 * @property string $birthday
 * @property string $nationalCardID
 * @property string $revenuAnnuel
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['fullName', 'email', 'email_verified_at', 'password', 'phoneNumber', 'profileImagePath', 'livingAddress', 'profession', 'statusMatrimonial', 'birthday', 'nationalCardID', 'revenuAnnuel', 'remember_token', 'created_at', 'updated_at'];
}

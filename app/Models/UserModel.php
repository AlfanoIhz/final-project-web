<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $guarded = ['id'];

    // protected $fillable = ['name', 'email', 'password', 'role'];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser ()
    {
        return $this->role === 'user';
    }
}

<?php
namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {

    protected $table    = 'user';
    protected $fillable = ['username', 'email', 'password'];
    protected $hidden   = ['password', 'remember_token'];

}

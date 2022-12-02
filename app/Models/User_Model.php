<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
 
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'email', 'password', 'username', 'full_name', 'bio', 'profil_pict'];
}
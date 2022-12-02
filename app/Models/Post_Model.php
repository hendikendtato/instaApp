<?php

namespace App\Models;

use CodeIgniter\Model;

class Post_Model extends Model
{
    protected $table      = 'posts';
    protected $primaryKey = 'id_post';
 
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_post', 'image', 'caption', 'user_id', 'created_at'];
}
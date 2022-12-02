<?php

namespace App\Models;

use CodeIgniter\Model;

class Likes_Model extends Model
{
    protected $table      = 'likes';
    protected $primaryKey = 'id_likes';
 
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_likes', 'user_id', 'post_id', 'poster_id', 'liked_at'];
}
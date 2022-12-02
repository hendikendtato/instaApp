<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment_Model extends Model
{
    protected $table      = 'comment';
    protected $primaryKey = 'id_comment';
 
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_comment', 'user_id', 'post_id', 'comment', 'created_at'];
}
<?php

namespace App\Controllers;
use App\Models\Post_Model;

class Home extends BaseController
{

    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->postModel = new Post_Model();        
        
        //meload validation
        $this->validation = \Config\Services::validation();
        
        //meload session
        $this->session = \Config\Services::session();
    }    
    public function index()
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/');
        }

        $data['Posts'] = $this->postModel->join('users', 'posts.user_id = users.id')->orderBy('id_post', 'DESC')->findAll();
        return view('v_home', $data);
    }
}
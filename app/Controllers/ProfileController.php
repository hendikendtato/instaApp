<?php

namespace App\Controllers;
use App\Models\User_Model;
use App\Models\Post_Model;

class ProfileController extends BaseController
{   
    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->userModel = new User_Model();

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
                
        $data['myPost'] = $this->postModel->where('user_id', $this->session->get('id_user'))->orderBy('id_post', 'DESC')->findAll();
        return view('profile/v_profile', $data);
    }
}
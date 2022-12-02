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
        $data['profile'] = $this->userModel->where('id', $this->session->get('id_user'))->first(); 
        
        return view('profile/v_profile', $data);
    }

    public function edit_page($id)
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/');
        }
        
        $data['profile'] = $this->userModel->where('id', $id)->first();
        return view('profile/v_edit_profile', $data);
    }

    public function save_profile()
    {
        $x_file = $this->request->getFile('profile_pict');
        
        $filename = $x_file->getRandomName();
        $image = \Config\Services::image()
            ->withFile($x_file)
            ->resize(100, 100, true, 'auto')
            ->save('public/image_profile/'. $filename);

        $this->userModel->update($this->session->get('id_user'), [
            'full_name' => $this->request->getPost('full_name'),
            'username'=> $this->request->getPost('username'),
            'bio'=> $this->request->getPost('bio'),
            'email'=> $this->session->get('email'),
            'profil_pict'=> $filename
        ]);

        return redirect('profile');
    }
}
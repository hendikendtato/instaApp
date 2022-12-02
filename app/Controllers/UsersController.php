<?php

namespace App\Controllers;
use App\Models\User_Model;

class UsersController extends BaseController
{
    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->userModel = new User_Model();
        
        //meload validation
        $this->validation = \Config\Services::validation();
        
        //meload session
        $this->session = \Config\Services::session();
    }

    public function login_page()
    {
        return view('users/v_login');
    }

    public function loginAuth()
    {
        //ambil data dari form
        $data = $this->request->getPost();
        
        //ambil data user di database yang usernamenya sama 
        $user = $this->userModel->where('email', $data['email'])->first();

        //cek apakah username ditemukan
        if($user){
            //cek password
            //jika salah arahkan lagi ke halaman login
            if(md5($data['password']) == $user['password']){
                //jika benar, arahkan user masuk ke aplikasi 
                $sessLogin = [
                    'isLogin' => true,
                    'id_user' => $user['id'],
                    'full_name' => $user['full_name'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'profile_pict' => $user['profil_pict']
                    ];
                $this->session->set($sessLogin);
                return redirect()->to('/home');
            }
            else{
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to('/');
            }
        }
        else{
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('email', 'Email tidak ditemukan');
            return redirect()->to('/');
        }
    }

    public function register_page()
    {
        return view('users/v_register');
    }

    public function save_register()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'email' => 'required',
            'password' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        // jika data valid, simpan ke database
        if($isDataValid){
            $this->userModel->insert([
                "email" => $this->request->getPost('email'),
                "password" => md5($this->request->getPost('password')),
                "username" => $this->request->getPost('username'),
                "full_name" => $this->request->getPost('full_name')
            ]);

            session()->setFlashData('success', 'Berhasil Tambah Data!');
            return redirect('/');
        }

        return redirect('register');
    }
    
    public function logout()
    {
        //destroy session 
        $this->session->destroy();
        return redirect()->to('/');
    }   
}
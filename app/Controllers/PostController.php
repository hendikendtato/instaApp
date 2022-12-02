<?php

namespace App\Controllers;
use App\Models\Post_Model;
use App\Models\Comment_Model;
use App\Models\Likes_Model;

class PostController extends BaseController
{   
    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->postModel = new Post_Model();
        $this->commentModel = new Comment_Model();
        $this->likesModel = new Likes_Model();
        
        //meload validation
        $this->validate = \Config\Services::validation();
        
        //meload session
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/');
        }
        
        return view('post/v_posting');
    }

    public function save_posting()
    {
        $x_file = $this->request->getFile('image_upload');
        
        $filename = $x_file->getRandomName();
        $image = \Config\Services::image()
            ->withFile($x_file)
            ->resize(640, 493, false, 'auto')
            ->save('public/image_post/'. $filename);

        $this->postModel->insert([
            'image' => $filename,
            'caption'=> $this->request->getPost('caption'),
            'user_id'=> $this->session->get('id_user'),
            'created_at'=> date('Y-m-d h:i:s')
        ]);

        return redirect('profile');
    }

    public function comment()
    {
        $this->commentModel->insert([
            'user_id' => $this->session->get('id_user'),
            'post_id'=> $this->request->getPost('post_id'),
            'comment'=> $this->request->getPost('comment'),
            'created_at'=> date('Y-m-d h:i:s')
        ]);   
        
        $response = [
            'status' => true
        ];

        return json_encode($response);
    }

    public function likes()
    {
        $this->likesModel->insert([
            'user_id' => $this->session->get('id_user'),
            'post_id'=> $this->request->getPost('post_id'),
            'poster_id'=> $this->request->getPost('poster'),
            'liked_at'=> date('Y-m-d h:i:s')
        ]);   
        
        $response = [
            'status' => true
        ];

        return json_encode($response);
    }

    public function unlikes()
    {

        $this->likesModel->where('user_id', $this->session->get('id_user'))->where('post_id', $this->request->getPost('post_id'))->where('poster_id', $this->request->getPost('poster'))->delete();  
        
        $response = [
            'status' => true
        ];

        return json_encode($response);
    }
}
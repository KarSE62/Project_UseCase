<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\PostModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestTrait;
use CodeIgniter\API\ResponseTrait;

class LoginController extends ResourceController
{
    use RequestTrait;
    public function index()
    {
        //include helper form
        helper(['form']);
        echo view('login');
    }


    public function showdata()
    {
        //include helper form
        $session = session();
        helper(['form']);
        $modelpost = new PostModel();
        $datapost['posts'] = $modelpost->viewPost();
        return view('showdata', $datapost);
        
    }




    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $userName = $this->request->getVar('userName');
        $password = $this->request->getVar('password');
        $data = $model->login($userName, $password);
        if ($data) {
            $session = session();
            $session->set($data);
            $statusUser = $session->get("statusUser");
            if ($statusUser == "0" || $statusUser == "1") {
                $modelpost = new PostModel();
                $datapost['posts'] = $modelpost->viewPost();
                return view('showdata',$datapost);
            } else {
                return redirect()->to('/savedata');
            }
        } else {
            $session->setFlashdata('msg', 'ไม่สามารถเข้าสู่ระบบได้ !!!');
            return redirect()->to('/');
        }
    }






    public function Logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}

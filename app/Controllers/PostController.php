<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PostModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestTrait;
use CodeIgniter\API\ResponseTrait;

class PostController extends ResourceController
{
    use RequestTrait;
    public function index()
    {
        helper(['form']);
        echo view('createPost');
    }
     

    public function deletePost($id=null)
    {
        $model = new PostModel();
        $deleted = $model->where('postId', $id)->delete();
        if($deleted){
            $session = session();
            $session->setFlashdata('msg', 'ลบโพสต์ประกาศกิจกรรม');
            $modelpost = new PostModel();
            $datapost['posts'] = $modelpost->viewPost();
            echo view('showdata',$datapost);
            return redirect()->to('/showdata');
        }
    }
    public function createpost()
    {
        $session = session();
        $userId = $session->get("userId");
        $statusPost = "1";
        $model = new PostModel();
        $dataPost = [
            'postTitle' => $this->request->getVar('postTitle'),
            'categoryId' => $this->request->getVar('categoryId'),
            'imagePost' => $this->request->getVar('imagePost'),
            'detailPost' => $this->request->getVar('detailPost'),
            'note' => $this->request->getVar('note'),
            'num_people' => $this->request->getVar('num_people'),
            'expenses' => $this->request->getVar('expenses'),
            'province' => $this->request->getVar('province'),
            'district' => $this->request->getVar('district'),
            'subDistrict' => $this->request->getVar('subDistrict'),
            'date_start' => $this->request->getVar('date_start'),
            'date_end' => $this->request->getVar('date_end'),
            'userId' => $this->request->getVar('userId'),
            'statusPost' => $statusPost,
            'userId' => $userId,
        ];
        //var_dump($dataPost);
        $post = $model->createpost($dataPost);
        if ($post) {
            $modelpost = new PostModel();
            $datapost['posts'] = $modelpost->viewPost();
            echo view('showdata', $datapost);
            return redirect()->to('/showdata');
        }
    }

    public function showDetailPost($id=null)
    {
        helper(['form']);
        echo view('editpost');
        
    }

    public function editPost($id)
    {
        //$id = 35;
        $model = new PostModel();
        $datapost['posts'] = $model->viewsinglepost($id);
        //var_dump($datapost);
        echo view('editpost', $datapost);
        
    }
    public function editPostSave()
    {
        $model = new PostModel();
        $id = [
            'postId' => $this->request->getVar('postId'),
        ];
        $dataPost = [
            'postTitle' => $this->request->getVar('postTitle'),
            'categoryId' => $this->request->getVar('categoryId'),
            'imagePost' => $this->request->getVar('imagePost'),
            'detailPost' => $this->request->getVar('detailPost'),
            'note' => $this->request->getVar('note'),
            'num_people' => $this->request->getVar('num_people'),
            'expenses' => $this->request->getVar('expenses'),
            'province' => $this->request->getVar('province'),
            'district' => $this->request->getVar('district'),
            'subDistrict' => $this->request->getVar('subDistrict'),
            'date_start' => $this->request->getVar('date_start'),
            'date_end' => $this->request->getVar('date_end'),
        ];
        $save = $model->updatepost($dataPost,$id);
        if($save){
            $modelpost = new PostModel();
                $datapost['posts'] = $modelpost->viewPost();
                echo view('showdata',$datapost);
                return redirect()->to('/showdata');
        }
        
    }
    
}

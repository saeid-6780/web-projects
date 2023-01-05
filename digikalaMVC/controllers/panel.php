<?php

class Panel extends controller{
    public $checklogin='';
    function __construct()
    {
        Model::sessionInit();
        $this->checklogin=Model::sessionGet('userid');
        if ($this->checklogin==false){
            header('location:'.URL.'login');
        }
    }

    function index($activetab='message'){
        $userinfo=$this->model->getuserinfo();
        $stat=$this->model->getstatistics();
        $message=$this->model->getmessage();
        $order=$this->model->getorder();
        $favoritfolder=$this->model->getfolder();
        $comment=$this->model->getcomment();
        $code=$this->model->getcode();

        $data=['userinfo'=>$userinfo,'stat'=>$stat,'message'=>$message,'order'=>$order,'favoritfolder'=>$favoritfolder,'comment'=>$comment,'code'=>$code,'activetab'=>$activetab];
        $this->view('panel/index',$data);
    }

    function getfavorit(){
        $folderid=$_POST['folderid'];
        $favorit=$this->model->getfavorit($folderid);
        echo json_encode($favorit);
    }

    function saveedit(){
        $folderid=$_POST['folderid'];
        $newname=$_POST['newname'];
        $this->model->saveedit($folderid,$newname);
    }

    function deletefavorit(){
        $favoritid=$_POST['favoritid'];
        $this->model->deletefavorit($favoritid);
    }

    function deletecomment($commentid){
        $this->model->deletecomment($commentid);
    }

    function savecode(){
        $this->model->savecode($_POST);
    }

    function profile(){
        $userinfo=$this->model->getuserinfo();
        $data=['userinfo'=>$userinfo];
        $this->view('panel/profile',$data);
    }

    function editprofile(){
        $data=$_POST;
        $this->model->editprofile($data);
        header('location:'.URL.'panel/profile');
    }

    function changepass(){
        if (isset($_POST['pass_old'])){
            $this->model->changepass($_POST);
        }
        $this->view('panel/changepass');
    }

    function logout(){
        $this->model->logout();
        header('location:'.URL.'index');
    }



}

?>
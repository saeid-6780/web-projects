<?php

class adminCategory extends Controller{

    function __construct()
    {
        parent::__construct();
        $level=Model::getuserlevel();
        if ($level!=1){
            header('location:'.URL.'adminlogin');
        }
    }

    function index(){
        $category=$this->model->getChildren(0);
        $data=['category'=>$category];
        $this->view('admin/category/index',$data);
    }

    function showchildren($categoryid=0){
        $children=$this->model->getChildren($categoryid);
        $parents=$this->model->getParent($categoryid);
        $categoryinfo=$this->model->categoryinfo($categoryid);

        $data=['category'=>$children,'parents'=>$parents,'categoryinfo'=>$categoryinfo];

        $this->view('admin/category/index',$data);
    }

    function addcategory($categoryid=0,$edit=''){

        if (isset($_POST['title'])){

            $title= $_POST['title'];
            $parents= $_POST['parents'];
            if (is_numeric($parents)){
            $this->model->addcategory($title,$parents,$edit,$categoryid);}
            else {$this->model->addcategory($title,0,$edit,$categoryid);}
        }
        $category=$this->model->getCategory();
        $categoryinfo=$this->model->categoryinfo($categoryid);
        $data=['category'=>$category,'parentid'=>$categoryid,'edit'=>$edit,'categoryinfo'=>$categoryinfo];
        $this->view('admin/category/addcategory',$data);
    }

    function deletecategory($parentid=0){
        $categoryid=$_POST['id'];
        $this->model->deletecategory($categoryid);
        header('location:'.URL.'admincategory/showchildren/'.$parentid);
    }

    function showattr($categoryid,$attrid=0){
        $attr=$this->model->getattr($categoryid,$attrid);
        $categoryinfo=$this->model->categoryinfo($categoryid);
        $attrinfo=$this->model->attrinfo($attrid);
        $data=['attr'=>$attr,'categoryinfo'=>$categoryinfo,'attrinfo'=>$attrinfo];
        $this->view('admin/category/showattr',$data);
    }

    function addattr($categoryid,$parentid=0,$editid=''){

        if (isset($_POST['title'])){
            if (!is_numeric($_POST['parents'])) {
                $_POST['parents']=0;
            }
                $this->model->addattr($_POST, $categoryid, $editid);

            header('location:'.URL.'admincategory/showattr/'.$categoryid.'/'.$parentid);
        }
        $attr=$this->model->getattr($categoryid,0);
        $categoryinfo=$this->model->categoryinfo($categoryid);
        $editinfo=$this->model->attrinfo($editid);
        $data=['attr'=>$attr,'categoryinfo'=>$categoryinfo,'parentid'=>$parentid,'editinfo'=>$editinfo];
        $this->view('admin/category/addattr',$data);
    }

    function deleteattr($categoryid,$attrid){
        $this->model->deleteattr($_POST['id']);
        header('location:'.URL.'admincategory/showattr/'.$categoryid.'/'.$attrid);
    }

    function attrval($attrid){
        if (isset($_POST['submited'])){
            $this->model->saveattrval($_POST,$attrid);
        }

        $attrval=$this->model->getattrval($attrid);
        $attrinfo=$this->model->attrinfo($attrid);
        $data=['attrval'=>$attrval,'attrinfo'=>$attrinfo];
        $this->view('admin/category/attrval',$data);
    }

}

?>
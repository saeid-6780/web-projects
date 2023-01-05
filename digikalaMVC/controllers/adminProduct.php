<?php

class adminProduct extends controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $product=$this->model->getproduct();
        $data=['product'=>$product];
        $this->view('admin/product/index',$data);
    }

    function addproduct($productid=''){

        if (isset($_POST['title'])){
            $this->model->addproduct($_POST,$productid,$_FILES['image']);
        }

        $category=$this->model->getcategory();
        $color=$this->model->getcolor();
        $gauranty=$this->model->getgauranty();
        $productinfo = $this->model->productinfo($productid);
        $data=['category'=>$category,'color'=>$color,'gauranty'=>$gauranty,'productinfo'=>$productinfo];
        $this->view('admin/product/addproduct',$data);
    }

    function naghd($productid){
        $naghd=$this->model->getnaghd($productid);
        $productinfo=$this->model->productinfo($productid);
        $data=['naghd'=>$naghd,'productinfo'=>$productinfo];
        $this->view('admin/product/naghd',$data);
    }

    function addnaghd($productid,$naghdid=''){

        if (isset($_POST['title'])){
            $this->model->addnaghd($productid,$_POST,$naghdid);
            header('location:'.URL.'adminproduct/naghd/'.$productid);
        }
        $productinfo=$this->model->productinfo($productid);
        $naghdinfo=$this->model->naghdinfo($naghdid);
        $data=['productinfo'=>$productinfo,'naghdinfo'=>$naghdinfo];
        $this->view('admin/product/addnaghd',$data);
    }

    function deletenaghd($productid){
        $this->model->deletenaghd($_POST['id']);
        header('location:'.URL.'adminproduct/naghd/'.$productid);
    }

    function deleteproduct(){
        $this->model->deleteproduct($_POST['id']);
        header('location:'.URL.'adminproduct/index');
    }

    function attr($productid){

        if (isset($_POST['submited'])){
            $this->model->editattr($_POST,$productid);
        }
        $attr=$this->model->getproductattr($productid);
        $productinfo=$this->model->productinfo($productid);
        $data=['attr'=>$attr,'productinfo'=>$productinfo];
        $this->view('admin/product/attr',$data);
    }

    function gallery($productid){

        if (isset($_FILES['image'])){
            $this->model->addgallery($productid,$_FILES['image']);
        }
        $galley=$this->model->getgallery($productid);
        $productinfo=$this->model->productinfo($productid);
        $data=['gallery'=>$galley,'productinfo'=>$productinfo];
        $this->view('admin/product/gallery',$data);
    }

    function deletegallery($productid){
        $this->model->deletegallery($_POST['id']);
        header('location:'.URL.'adminproduct/gallery/'.$productid);
    }

}

?>
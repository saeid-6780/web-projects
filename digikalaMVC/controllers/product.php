<?php


class Product extends Controller{

    function __construct()
    {
    }

    function index($id,$activetab='naghd'){

        $productInfo=$this->model->productInfo($id);
        $only_digikala=$this->model->only_digikala();
        $gallery=$this->model->getGallery($id);
        $data=['productinfo'=>$productInfo,'onlydigikala'=>$only_digikala,'gallery'=>$gallery,'activetab'=>$activetab];
        $this->view('product/index',$data);
    }

    function tab($productid,$categoryid){
        $number= $_POST['number'];
        if($number==0){
            $naghd=$this->model->naghd($productid);
            $data=[$naghd];
            $this->view('product/tab1',$data,1,1);
        }
        if($number==1){
            $fanni=$this->model->fanni($categoryid,$productid);
            $data=[$fanni];
            $this->view('product/tab2',$data,1,1);
        }
        if($number==2){
            $comment_param=$this->model->comment_param($categoryid,$productid);
            $comment_param_name=$comment_param[0];
            $comment_param_score=$comment_param[1];
            $comments=$this->model->getComment($productid);
            $data=[$comment_param_name,$comments,$comment_param_score];
            $this->view('product/tab3',$data,1,1);
        }
        if($number==3){
            $getquestions=$this->model->getQuestion($productid);
            $questions=$getquestions[0];
            $answers=$getquestions[1];
            $data=[$questions,$answers];
            $this->view('product/tab4',$data,1,1);
        }
    }

    function addtobasket($productid,$color=0,$gauranty=0){

        $this->model->addtobasket($productid,$color,$gauranty);
    }

}


?>
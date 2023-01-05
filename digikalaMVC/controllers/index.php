<?php

class index extends Controller {
    function __construct()
    {

    }
    function index(){
        $slider1= $this->model->getSlider1();
        $slider2=$this->model->getSlider2();
        $only_digikala=$this->model->only_digikala();
        $most_view=$this->model->most_view();
        $last_product=$this->model->last_product();
        $slider2_items= $slider2[0];
        $slider2_date_end= $slider2[1];
        $data=[$slider1,$slider2_items,$slider2_date_end,$only_digikala,$most_view,$last_product];
        $this->view('index/index',$data);
    }

    function method1($name='',$family=''){
        echo 'we are in index method1 ba aradete faravan khedmate jenab '.$name.' '.$family.'<br>';
    }
}
?>
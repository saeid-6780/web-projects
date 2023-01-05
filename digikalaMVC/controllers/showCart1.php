<?php

class ShowCart1 extends controller{

    function __construct()
    {
        Model::sessionInit();
        $check=Model::sessionGet('userid');
        if ($check!=false){
            header('location:'.URL.'showCart2');
        }
    }

    function index(){
        $this->view('showCart1/index');
    }
}

?>
<?php

class adminSetting extends controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        if (isset($_POST['limit_for_slider'])){
            $this->model->savesetting($_POST);
        }
        $this->view('admin/setting/index');
    }
}

?>
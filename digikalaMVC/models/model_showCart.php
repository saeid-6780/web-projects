<?php

class model_showCart extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function deletebasket($basketid){
        $sql='delete from tbl_basket WHERE id=?';
        $result=$this->doInsUpDel($sql,[$basketid]);
    }

    function updatebasket($data){
        $sql='update tbl_basket set tedad=? WHERE id=?';
        $this->doInsUpDel($sql,[$data['tedad'],$data['basketid']]);

    }

}

?>
<?php

class model_adminSetting extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function savesetting($data){
        echo '($data)';
        foreach ($data as $settingname=>$value){
            $sql='update tbl_option set value=? WHERE setting=?';
            $this->doInsUpDel($sql,[$value,$settingname]);
        }

    }

}
?>
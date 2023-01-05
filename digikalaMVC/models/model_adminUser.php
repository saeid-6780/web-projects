<?php

class model_adminUser extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getuser(){
        $sql='select u.*,ul.title as leveltitle from tbl_user u LEFT JOIN tbl_user_level ul on u.level=ul.id ORDER by id DESC ';
        $result=self::doSelect($sql);
        return $result;
    }

    function chengelevel1($ids){
        $ids=implode(',',$ids);
        $sql='update tbl_user set level=1 WHERE id IN ('.$ids.')';
        $this->doInsUpDel($sql);
    }
    function chengelevel2($ids){
        $ids=implode(',',$ids);
        $sql='update tbl_user set level=2 WHERE id IN ('.$ids.')';
        $this->doInsUpDel($sql);
    }

}
?>
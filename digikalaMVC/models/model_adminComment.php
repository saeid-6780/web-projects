<?php

class model_adminComment extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getcomment(){
        $sql='select * from tbl_comment ORDER BY id DESC ';
        $result=$this->doSelect($sql);
        return $result;
    }

    function confirm($data){
        //$ids=$data['id'];
        //$ids=implode(',',$ids);
        foreach ($data['id'] as $id){
            $sql='update tbl_comment set title=?,positive=?,negative=?,matn=?,confirm=0 WHERE id=?';
            $this->doInsUpDel($sql,[$data['title'.$id],$data['positive'.$id],$data['negative'.$id],$data['matn'.$id],$id]);
        }
    }

    function unconfirm($ids){
        $ids=implode(',',$ids);
        $sql='update tbl_comment set confirm=0 WHERE id in ('.$ids.')';
        $this->doInsUpDel($sql);
    }

    function delete($ids){
        $ids=implode(',',$ids);
        $sql='delete from tbl_comment WHERE id in ('.$ids.')';
        $this->doInsUpDel($sql);
    }

}

?>
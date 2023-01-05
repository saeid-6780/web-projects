<?php

class model_addComment extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function index(){

    }

    function productinfo($productid){
        $sql='select * from tbl_product WHERE id=?';
        $resutl=$this->doSelect($sql,[$productid],1);
        return $resutl;
    }

    function getparam($productid){
        $productinfo=$this->productinfo($productid);
        $categoryid=$productinfo['categoryid'];

        $sql='select * from tbl_comment_param WHERE categoryid=?';
        $resutl=$this->doSelect($sql,[$categoryid]);
        return $resutl;
    }

    function savecomment($data,$productid){

        self::sessionInit();
        $userid=self::sessionGet('userid');

        $commentparam=$this->getparam($productid);
        $paramresult=[];
        foreach ($commentparam as $row){
            $paramid=$row['id'];
            $value=$data['param'.$paramid];
            $paramresult[$paramid]=$value;
        }

        $sql='select * from tbl_comment WHERE userid=? AND productid=?';
        $result=$this->doSelect($sql,[$userid,$productid]);
        if (isset($result[0])){
            $commentid=$result[0]['id'];
            $sql = 'update tbl_comment set title=?,matn=?,positive=?,negative=?,param=? WHERE id=?';
            $this->doInsUpDel($sql, [$data['title'], $data['comment'], $data['positive'], $data['negative'], serialize($paramresult),$commentid]);
        }
        else {

            $sql = 'insert into tbl_comment (title,matn,positive,negative,productid,param,userid) VALUES (?,?,?,?,?,?,?)';
            $this->doInsUpDel($sql, [$data['title'], $data['comment'], $data['positive'], $data['negative'], $productid, serialize($paramresult), $userid]);
        }

        header('location:'.URL.'addcomment/index/'.$productid);

    }

    function commentinfo($productid){

        self::sessionInit();
        $userid=self::sessionGet('userid');

        $sql='select * from tbl_comment WHERE productid=? AND userid=?';
        $resutl=$this->doSelect($sql,[$productid,$userid],1);
        return $resutl;
    }

}

?>
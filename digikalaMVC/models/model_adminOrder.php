<?php

class model_adminOrder extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getorders(){
        $sql='select * from tbl_order ORDER BY id DESC ';
        $result=$this->doSelect($sql);
        return $result;
    }

    function getorderinfo($orderid){
        $sql='select o.*,pt.title as paytypetitle,pot.title as posttypetitle from tbl_order o 
LEFT JOIN tbl_pay_type pt on o.paytype=pt.id 
 LEFT JOIN tbl_post_type pot on o.posttype=pot.id 
 WHERE o.id=?';
        $result=$this->doSelect($sql,[$orderid],1);
        return $result;
    }

    function editorder($orderid,$data){
        $sql='update tbl_order set address=?,codeposti=?,mobile=?,tel=?,paymentstatus=?,status=? WHERE id=?';
        $this->doInsUpDel($sql,[$data['address'],$data['codeposti'],$data['mobile'],$data['tel'],$data['paymentstatus'],$data['orderstatus'],$orderid]);
        header('location:'.URL.'adminOrder/details/'.$orderid);
    }

    function orderstatus(){
        $sql='select * from tbl_order_status';
        $result=$this->doSelect($sql);
        return $result;
    }

    function delete($data){
        $ids=implode(',',$data['id']);
        echo $ids;
        $sql='delete from tbl_order WHERE id IN ('.$ids.')';
        $this->doInsUpDel($sql);
    }

}

?>
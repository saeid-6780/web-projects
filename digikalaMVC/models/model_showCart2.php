<?php

class model_showCart2 extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function addaddress($data,$editaddressid=''){

        Model::sessionInit();
        $userId=Model::sessionGet('userid');
echo $editaddressid;
        if ($editaddressid=='') {
            $sql = 'insert into tbl_user_address (userid,family,mobile,tel,ostan,city,ostan_name,shahr_name,mahale,address,codeposti) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
            $this->doInsUpDel($sql, [$userId, $data['family'], $data['mobile'], $data['tel'], $data['state'], $data['city'], $data['ostan_name'], $data['city_name'], $data['mahale'], $data['address'], $data['codeposti']]);
        }else{
            $sql = 'update tbl_user_address set family=?,mobile=?,tel=?,ostan=?,city=?,ostan_name=?,shahr_name=?,mahale=?,address=?,codeposti=? WHERE id=?';
            $this->doInsUpDel($sql, [$data['family'], $data['mobile'], $data['tel'], $data['state'], $data['city'], $data['ostan_name'], $data['city_name'], $data['mahale'], $data['address'], $data['codeposti'],$editaddressid]);
        }
    }

    function getaddress(){
        $sql='select * from tbl_user_address WHERE userid=?';
        Model::sessionInit();
        $userId=Model::sessionGet('userid');
        $result=$this->doSelect($sql,[$userId]);
        return $result;
    }

    function addressinfo($addressid){
        $sql='select * from tbl_user_address WHERE id=?';
        $result=$this->doSelect($sql,[$addressid],1);
        return $result;
    }

    function editaddress($addressid){


    }

    function getposttype(){
        $sql='select * from tbl_post_type ';
        $result=$this->doSelect($sql);
        return $result;
    }

    function getpostprice($data){

        $cityid=$data['cityid'];
        $addressid=$data['addressid'];
        /*$postid=$data['postid'];*/
        $sql='select * from tbl_user_address WHERE id=?';
        $result=$this->doSelect($sql,[$addressid],1);

        self::sessionInit();
        self::sessionSet('addressinfo',serialize($result));

        $postprice=$this->calculatepostprice($cityid);
        echo json_encode($postprice);

    }

    function sessionposttype($data){
        self::sessionInit();
        self::sessionSet('posttype',$data['posttypeid']);
        echo self::sessionGet('posttype');
    }

    function deleteaddress($id){
        $sql='delete from tbl_user_address WHERE id=?';
        $this->doInsUpDel($sql,[$id]);
    }

}


?>
<?php

class model_panel extends Model{
    private $userid;
    function __construct()
    {
        parent::__construct();
        self::sessionInit();
        $this->userid=self::sessionGet('userid');
    }

    function getuserinfo(){

        $sql='select * from tbl_user WHERE id=?';
        $result=$this->doSelect($sql,[$this->userid],1);
        return $result;
    }

    function getstatistics(){

        $stat=[];



        $sql='select * from tbl_order WHERE userid=?';
        $result=$this->doSelect($sql,[$this->userid]);
        $stat['ordernumber']=sizeof($result);

        $sql='select * from tbl_order WHERE userid=? and status=1';
        $result=$this->doSelect($sql,[$this->userid]);
        $stat['ordertaeidnumber']=sizeof($result);

        $sql='select * from tbl_order WHERE userid=? and status=2';
        $result=$this->doSelect($sql,[$this->userid]);
        $stat['orderpardazeshnumber']=sizeof($result);

        $sql='select * from tbl_comment WHERE userid=?';
        $result=$this->doSelect($sql,[$this->userid]);
        $stat['commentnumber']=sizeof($result);

        $sql='select * from tbl_message WHERE userid=? AND status=0';
        $result=$this->doSelect($sql,[$this->userid]);
        $stat['messagenumber']=sizeof($result);

        return $stat;
    }

    function getmessage(){
        $userid=$this->userid;

        $sql='select * from tbl_message WHERE userid=?';
        $result=$this->doSelect($sql,[$this->userid]);

        foreach ($result as $row){
            $sql='update tbl_message set status=1 WHERE id=?';
            $this->doInsUpDel($sql,[$userid]);
        }

        return $result;
    }

    function getorder(){
        $userid=$this->userid;

        $sql='select o.*,os.title AS statustitle from tbl_order o LEFT JOIN tbl_order_status os ON o.status=os.id WHERE userid=?';
        $result=$this->doSelect($sql,[$this->userid]);
        return $result;
    }

    function getfolder(){
        $userid=$this->userid;
        $sql='select * from tbl_favorit WHERE userid=? and parent=0';
        $result=$this->doSelect($sql,[$userid]);
        return $result;
    }

    function getfavorit($folderid){
        $userid=$this->userid;

        if ($folderid!=0) {
            $sql = 'select f.* ,p.title as producttitle,p.view_num from tbl_favorit f LEFT JOIN tbl_product p on f.productid=p.id WHERE userid=? and parent=?';
        }else if ($folderid==0){
            $sql = 'select f.* ,p.title as producttitle,p.view_num from tbl_favorit f LEFT JOIN tbl_product p on f.productid=p.id WHERE userid=? and parent!=?';
        }
        $result=$this->doSelect($sql,[$userid,$folderid]);
        return $result;
    }

    function saveedit($folderid,$newname){
        $sql='update tbl_favorit set title=? WHERE id=?';
        $this->doInsUpDel($sql,[$newname,$folderid]);
    }

    function deletefavorit($favoritid){
        $sql='delete from tbl_favorit WHERE id=?';
        $this->doInsUpDel($sql,[$favoritid]);
    }

    function getcomment(){
        $userid=$this->userid;
        $sql='select c.*,p.title as producttitle from tbl_comment c LEFT JOIN tbl_product p ON c.productid=p.id WHERE userid=?';
        $result=$this->doSelect($sql,[$userid]);
        return $result;
    }

    function deletecomment($commentid){
        $sql='delete from tbl_comment WHERE id=?';
        $this->doInsUpDel($sql,[$commentid]);
    }

    function getcode(){
        $userid=$this->userid;
        $sql='select * from tbl_code WHERE userid=?';
        $result=$this->doSelect($sql,[$userid]);

        $today_date=self::jalalidate();

        foreach ($result as $key=>$row){
            $sql='select * from tbl_order WHERE code=? AND userid=?';
            $orders=$this->doSelect($sql,[$row['code'],$userid]);
            $result[$key]['orders']=$orders;

            $tarikh_end=$row['tarikh_end'];

            $today=new DateTime($today_date);
            $expire=new DateTime($tarikh_end);

            $status='';

            if ($expire->format('Y-m-d')>=$today->format('Y-m-d')){
                $status='جاری';
            }else{
                $status='منقضی شده';
            }
            $result[$key]['status']=$status;
        }

        return $result;
    }

    function savecode($data){
        $code=$data['code'];
        $userid=$this->userid;
        $sql='update tbl_code set userid=? WHERE code=?';
        $this->doInsUpDel($sql,[$userid,$code]);
    }

    function editprofile($data){
        $userid=$this->userid;
        $sql='update tbl_user set family=?,codemelli=?,tel=?,mobile=?,tavallod=?,address=?,jensiat=?,khabarnameh=? WHERE id=?';
        $day=$data['day'];
        $month=$data['month'];
        $year=$data['year'];
        $date=$year.'/'.$month.'/'.$day;
        if (isset($data['khabarnameh'])){
            $khabarnameh=$data['khabarnameh'];
        }else{
            $khabarnameh=0;
        }
        $this->doInsUpDel($sql,[$data['family'],$data['codemelli'],$data['tel'],$data['mobile'],$date,$data['address'],$data['jensiat'],$khabarnameh,$userid]);
    }

    function changepass($data){
        $pass_old=$data['pass_old'];
        $pass_new=$data['pass_new'];
        $pass_confirm=$data['pass_confirm'];

        $userinfo=$this->getuserinfo();
        $password=$userinfo['password'];

        $userid=$this->userid;

        $error='';
        if ($pass_old==$password and $pass_new==$pass_confirm){
            $sql='update tbl_user set password=? WHERE id=?';
            $this->doInsUpDel($sql,[$pass_new,$userid]);
            $error=0;
        }else if ($pass_new!=$pass_confirm){
            $error=2;
        }else{
            $error=1;
        }

        header('location:'.URL.'panel/changepass?error='.$error);
    }

    function logout(){
        self::sessionInit();
        unset($_SESSION['userid']);
    }

}

?>
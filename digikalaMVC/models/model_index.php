<?php

class model_index extends Model{


    function __construct()
    {
        parent::__construct();
    }

    function test(){
        return 10;
    }

    function getSlider1(){

        $sql="SELECT * FROM tbl_slider1";

        $result=$this->doSelect($sql);
        return $result;

    }

    function getSlider2(){
        $sql="SELECT * FROM tbl_product WHERE special=?";
        $result=$this->doSelect($sql,[1]);

        foreach ($result as $key=>$row){
            $discount=$row['discount'];
            $price=$row['price'];
            $price_total=((100-$discount)*$price)/100;
            $result[$key]['price_total']=$price_total;
        }

        $first_row=$result[0];
        $time_special=$first_row['time_special'];

        $options=self::get_option();
        $duration_special=$options['special_time'];

        $time_end= $time_special+$duration_special;
        date_default_timezone_set('Asia/Tehran');
        $date=date('F d,Y H:i:s',$time_end);
        return [$result,$date];
    }

    function only_digikala(){
        $sql="SELECT * FROM tbl_product WHERE only_digikala=1 ";
        $result=$this->doSelect($sql);
        foreach ($result as $key=>$row){
            $discount=$row['discount'];
            $price=$row['price'];
            $price_total=((100-$discount)*$price)/100;
            $result[$key]['price_total']=$price_total;
        }
        return $result;
    }

    function most_view(){
        $sql="SELECT * FROM tbl_option WHERE setting='limit_for_slider' ";
        $sresult=$this->doSelect($sql,[],1);
        $limit=$sresult['value'];

        $sql="SELECT * FROM tbl_product ORDER BY view_num DESC limit ".$limit." ";
        $result=$this->doSelect($sql);
        return $result;
}

    function last_product(){
        $sql="SELECT * FROM tbl_option WHERE setting='limit_for_slider' ";
        $sresult=$this->doSelect($sql,[],1);
        $limit=$sresult['value'];

        $sql="SELECT * FROM tbl_product ORDER BY id DESC limit ".$limit." ";
        $result=$this->doSelect($sql);
        return $result;
    }

}

?>
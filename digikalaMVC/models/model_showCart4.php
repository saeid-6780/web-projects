<?php

class model_showCart4 extends Model{

    function __construct()
    {
        parent::__construct();
    }

    function index(){

    }

    function checkcode($code){
        $sql='select * from tbl_code WHERE code=? AND usenum=0';
        $result=$this->doSelect($sql,[$code]);
        if (sizeof($result)>0) {
            return $result[0]['darsad'];
        }else{
            return 0;
        }
    }

    function calculatetotalprice($code){
        $basketinfo=$this->getbasket();
        $basketprice=$basketinfo[1];
        $basketdiscount=$basketinfo[2];

        self::sessionInit();
        $addressinfo=self::sessionGet('addressinfo');
        $addressinfo=unserialize($addressinfo);
        $cityid=$addressinfo['city'];
        $postpriceBoth=$this->calculatepostprice($cityid);

        $posttype=self::sessionGet('posttype');
        $postprice=0;
        if ($posttype==1){
            $postprice=$postpriceBoth['pishtaz'];
        }else{
            $postprice=$postpriceBoth['sefareshi'];
        }

        $check=$this->checkcode($code);
        $codediscount=0;
        if ($check !=0){
            $codediscount=($check*$basketprice)/100;
            $codediscount=intval($codediscount);
        }

        $prictotal=$basketprice-$basketdiscount+$postprice-$codediscount;
        return $prictotal;
    }

    function saveorder($data)
    {
        self::sessionInit();
        $addressinfo = self::sessionGet('addressinfo');
        $addressinfo = unserialize($addressinfo);

        $basketinfo = $this->getbasket();
        $basket = $basketinfo[0];
        $basket = serialize($basket);
        $basketprice = $basketinfo[1];
        $basketdiscount = $basketinfo[2];

        $postprice = $this->calculatepostprice($addressinfo['city']);
        $posttype = self::sessionGet('posttype');
        if ($posttype == 1) {
            $postprice = $postprice['pishtaz'];
        } else {
            $postprice = $postprice['sefareshi'];
        }

        $code = $data['code'];
        $darsaddiscount = $this->checkcode($code);
        $amountdiscount = 0;
        if ($darsaddiscount != 0) {
            $amountdiscount = ($darsaddiscount * $basketprice) / 100;
            $amountdiscount = intval($amountdiscount);
        }

        $pricetotal = $basketprice + $postprice - $basketdiscount - $amountdiscount;
        //$pricetotal=ceil($pricetotal);

        $userid = self::sessionGet('userid');

        $beforepay = '';
        $description = 'خرید از دیجی کالا';

        $paytype = $data['paytype'];
        if ($paytype == 1) {
            $payment = new Payment();
            $result = $payment->zarinpalrequest($pricetotal, $description, 'saeid6780@gmail.com', $addressinfo['mobile']);
            $status = $result['Status'];
            $authority = $result['Authority'];
            $beforepay = $authority;
        }

        $time=time();

        $sql = 'insert into tbl_order (family,ostan,city,codeposti,mobile,tel,address,basket,posttype,amount,postprice,userid,beforepay,paytype,time_sabt) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $this->doInsUpDel($sql, [$addressinfo['family'], $addressinfo['ostan_name'], $addressinfo['shahr_name'], $addressinfo['codeposti'], $addressinfo['mobile'], $addressinfo['tel'], $addressinfo['address'], $basket, $posttype, $pricetotal, $postprice, $userid, $beforepay,$paytype,$time]);

        if ($paytype == 1){

            if ($status == 100) {

                header('location:https://zarinpal.com/pg/StartPage/' . $authority);

            } else {
                header('location:' . URL . 'showCart4/index/' . $status);
            }
        }

        if ($paytype==4){
            $sql='select * from tbl_order ORDER BY id DESC limit 1 ';
            $result=$this->doSelect($sql,[],1);
            header('location:' . URL . 'checkout/index/'.$result['id']);
        }


    }

}

?>
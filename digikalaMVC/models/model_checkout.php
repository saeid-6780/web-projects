<?php

class model_checkout extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function getorderinfo($orderid){
        $sql='select * from tbl_order WHERE id=? ';
        $result=$this->doSelect($sql,[$orderid],1);
        return $result;
    }

    function zarinpalcheckout($data){
        $status=$data['Status'];
        $authority=$data['Authority'];

        $payment=new Payment();

        $sql='select * from tbl_order WHERE beforepay=?';
        $result=$this->doSelect($sql,[$authority],1);
        $amount=$result['amount'];

        $result=$payment->zarinpalverify($amount,$authority);

        if ($result['Status']==100){
            $sql='update tbl_order set pay=1,afterpay=? WHERE beforepay=?';
            $this->doInsUpDel($sql,[$result['$RefID'],$authority]);
        }

        $sql='select * from tbl_order WHERE beforepay=?';
        $result=$this->doSelect($sql,[$authority],1);
        return $result;

    }

    function payonline($orderid){

        $orderinfo=$this->getorderinfo($orderid);
        $paytype=$orderinfo['paytype'];
        if ($paytype==4) {
            $sql = 'update tbl_order set paytype=1 WHERE id=?';
            $this->doInsUpDel($sql, [$orderid]);
            $paytype = 1;
        }

        if ($paytype==4)
        if ($paytype==1){
            //zarinpal
            $payment=new Payment();
            $result=$payment->zarinpalrequest($orderinfo['amount'],'پرداخت در دیجی کالا','saeid6780@gmail.com',$orderinfo['mobile']);

            $status=$result['Status'];
            $authority=$result['Authority'];
            if ($status == 100) {

                header('location:https://zarinpal.com/pg/StartPage/' . $authority);

            } else {
                header('location:'.URL.'checkout/showerror?error='.$result['Error'].'&orderid='.$orderid);
                //header('location:' . URL . 'showCart4/index/' . $status);
            }

        }
        if ($paytype==2){
            //saman
        }
        if ($paytype==3){
            //pasargan
        }
        if ($paytype==4){

        }
    }

    function updatecreditcard($data,$orderid){







        $sql='update tbl_order set pay_day=?,pay_month=?,pay_year=?,pay_card=?,pay_bankname=?,pay_hour=?,pay_minute=?,paytype=4 WHERE id=?';
        $this->doInsUpDel($sql,[$data['day'],$data['month'],$data['year'],$data['creditcard'],$data['bank'],$data['hour'],$data['minute'],$orderid]);
    }

}


?>
<?php

class model_adminStats extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function comparedate($date1,$date2){
        $date1=new DateTime($date1);
        $date2=new DateTime($date2);
        $date1=$date1->format('Y-m-d');
        $date2=$date2->format('Y-m-d');
        if ($date1>$date2){
            return 1;
        }
        if ($date1==$date2){
            return 2;
        }
        if ($date1<$date2){
            return 3;
        }
    }

    function order($data){
        $startdate=$data['year1'].'/'.$data['month1'].'/'.$data['day1'];
        $enddate=$data['year2'].'/'.$data['month2'].'/'.$data['day2'];


        $sql='select * from tbl_order';
        $result=$this->doSelect($sql);

        $resulttotal=[];
        $orderspaied=0;
        $amounttotal=0;

        foreach ($result as $row){
            $tarikh=$row['date'];

            $compare1=$this->comparedate($tarikh,$startdate);
            $compare2=$this->comparedate($tarikh,$enddate);

            if (($compare1==1 or $compare1==2) and ($compare2==2 or $compare2==3)){
                array_push($resulttotal,$row);
                if ($row['paymentstatus']==1){
                    $orderspaied=$orderspaied+1;
                    $amounttotal=$amounttotal+$row['amount'];
                }
            }

        }
        return ['result'=>$resulttotal,'amount'=>$amounttotal,'order_paid'=>$orderspaied,'startdate'=>$startdate,'enddate'=>$enddate];

        //print_r($resulttotal);
    }

}

?>
<?php

class model_adminDashboard extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getorder(){
        $sql='select * from tbl_order';
        $result=$this->doSelect($sql);
        return $result;
    }

    function getstats(){
        $todaydate=date('Y/m/d');
        $lastweektime=strtotime('-1 week');
        $lastweekdate=date('Y-m-d',$lastweektime);
        $dates=$this->getrange($lastweekdate,$todaydate);

        $order=$this->getorder();
        $orderstat=[];

        foreach ($dates as $date){
            $jalalidate=self::miladitojalali($date);
            $orderstat[$jalalidate]=0;
        }

        foreach ($order as $row){
            $datejalali=$row['date'];
            $datemiladi=self::jalalitomiladi($datejalali,'/');
            if (in_array($datemiladi,$dates)) {
                $orderstat[$datejalali] = $orderstat[$datejalali] + 1;
            }
        }
        return $orderstat;
    }

    function getrange($startdate,$enddate){
        $dates=[];

        $current=strtotime($startdate);
        $last=strtotime($enddate);
        while ($current<=$last){
            $dates[]=date('Y/m/d',$current);
            $current=strtotime('+1 day',$current);
        }

        return $dates;

    }

}

?>
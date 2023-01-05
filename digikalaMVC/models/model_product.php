<?php

class model_product extends model{

    function __construct()
    {
        parent::__construct();
    }

    function productInfo($id){

        $sql="SELECT * FROM tbl_product WHERE id=?";
        $result=$this->doSelect($sql,[$id],1);

        $price=$result['price'];
        $discount=$result['discount'];
        $price_descount=$this->calculate_discount($price,$discount);
        $result['price_discount']=$price_descount[0];
        $result['price_total']=$price_descount[1];

        $first_row=$result;
        $time_special=$first_row['time_special'];

        $options=self::get_option();
        $duration_special=$options['special_time'];

        $time_end= $time_special+$duration_special;
        date_default_timezone_set('Asia/Tehran');
        $date=date('F d,Y H:i:s',$time_end);
        $result['date_special']=$date;

        $colors=$result['color'];
        $colors=explode(',',$colors);
        $colors=array_filter($colors);
        $all_colors=[];
        foreach ($colors as $color){
            $colorInfo=$this->colorInfo($color);
            array_push($all_colors,$colorInfo);
        }
        $result['all_colors']=$all_colors;

        $gaurantys=$result['gauranty'];
        $gaurantys=explode(',',$gaurantys);
        $gaurantys=array_filter($gaurantys);
        $all_gaurantys=[];
        foreach ($gaurantys as $gauranty){
            $gaurantysInfo=$this->gaurantyInfo($gauranty);
            array_push($all_gaurantys,$gaurantysInfo);
        }
        $result['all_gauranty']=$all_gaurantys;


        return $result;

    }

    function colorInfo($colorID){
        $sql='select * from tbl_color WHERE id=?';
        $result=$this->doSelect($sql,[$colorID],1);
        return $result;
    }

    function gaurantyInfo($gaurantyID){
        $sql='select * from tbl_gauranty WHERE id=?';
        $result=$this->doSelect($sql,[$gaurantyID],1);
        return $result;
    }

    function only_digikala(){
        $sql="SELECT * FROM tbl_product WHERE only_digikala=1 ";
        $result=$this->doSelect($sql);
        return $result;
    }

    function naghd ($id){
        $sql='select * from tbl_naghd WHERE productid=?';
        $result=$this->doSelect($sql,[$id]);
        return $result;
    }

    function fanni($categoryid,$productid){
        $sql='select * from tbl_attr WHERE categoryid=? and parent=0' ;
        $result=$this->doSelect($sql,[$categoryid]);
        foreach ($result as $key=>$row){
            $sql2='select tbl_attr.title,tbl_pro_attr.value from tbl_attr LEFT JOIN tbl_pro_attr ON tbl_attr.id=tbl_pro_attr.attrid AND tbl_pro_attr.productid=? WHERE tbl_attr.parent=? ' ;
            $result2=$this->doSelect($sql2,[$productid,$row['id']]);
            $result[$key]['children']=$result2;
        }
        return $result;
    }

    function comment_param($categoryid,$productid){
        $sql='select * from tbl_comment_param WHERE categoryid=? ' ;
        $result=$this->doSelect($sql,[$categoryid]);

        $sql='select * from tbl_comment WHERE productid=?';
        $result2=$this->doSelect($sql,[$productid]);
        $scores_total=[];
        foreach ($result2 as $row){
            $params_score=unserialize($row['param']);
            foreach ($params_score as $key=>$val){
                $param_id=$key;
                $score=$val;
                if(!isset($scores_total[$param_id])){
                    $scores_total[$param_id]=0;
                }
                $scores_total[$param_id]=$scores_total[$param_id]+$score;
            }
        }
        $total_product_comment=sizeof($result2);

        foreach ($scores_total as $key=>$val){
            $scores_total[$key] = $val/$total_product_comment;
        }

        return [$result,$scores_total];
    }

    function getComment($productid){
        $sql='select * from tbl_comment WHERE productid=?';
        $result=$this->doSelect($sql,[$productid]);
        return $result;
    }

    function getQuestion($productid){
        $sql='select * from tbl_question WHERE productid=? and parent=0';
        $questions=$this->doSelect($sql,[$productid]);

        $sql='select * from tbl_question WHERE parent!=0';
        $all_answer=$this->doSelect($sql);
        foreach ($all_answer as $answer){
            $parent=$answer['parent'];
            $new_all_answer=[];
            $new_all_answer[$parent]=$answer;
        }
       /* foreach ($questions as $key=>$question){
            $sql='select * from tbl_question WHERE parent=?';
            $data=[$question['id']];
            $answer=$this->doSelect($sql,$data,1);
            $questions[$key]['answer']=$answer;
        }*/
        return [$questions,$new_all_answer];
    }

    function getGallery($productid){
        $sql='select * from tbl_gallery WHERE productid=? ORDER BY threed DESC ';
        $result=$this->doSelect($sql,[$productid]);
        return $result;
    }

    function addtobasket($productid,$color,$gauranty){
        $cookie=self::getbasketcookie();
        $sql='select * from tbl_basket WHERE productid=? AND cookie=? AND color=? AND gauranty=?';
        $result=$this->doSelect($sql,[$productid,$cookie,$color,$gauranty]);

        if (isset($result[0])){
            $sql='update tbl_basket set tedad=tedad+1 WHERE productid=? AND cookie=? AND color=? AND gauranty=?';
            $this->doInsUpDel($sql,[$productid,$cookie,$color,$gauranty]);
        }else{
            $sql='insert into tbl_basket (cookie,productid,color,gauranty) VALUES (?,?,?,?)';
            $this->doInsUpDel($sql,[$cookie,$productid,$color,$gauranty]);
        }

        echo $cookie;
    }

}

?>
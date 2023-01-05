<?php

class model_adminSlider extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getslider(){
        $sql='select * from tbl_slider1 ORDER by id DESC ';
        $result=$this->doSelect($sql);
        return $result;
    }

    function addslider ($data,$files){
        $file=$files['image'];
        $title=$data['title'];
        $link=$data['link'];

        $uploadOK=1;
        $targetmain='public/images/slider/';
        $newname=time();

        if (!$file['type']=='image/jpeg' and !$file['type']=='image/jpg'){
            $uploadOK=0;
        }
        if($file['size']>5242880){
            $uploadOK=0;
        }
        if ($uploadOK==1){
            $ext=pathinfo($file['name'],PATHINFO_EXTENSION);
            $target=$targetmain.$file['name'].'_'.$newname.'.'.$ext;
            move_uploaded_file($file['tmp_name'],$target);

            $sql='insert into tbl_slider1 (title,link,img) VALUES (?,?,?)';
            $result=$this->doInsUpDel($sql,[$title,$link,$target]);
        }

    }

    function delete($data){
        $ids=$data['id'];
        $ids=implode(',',$ids);
        $sql='delete from tbl_slider1 WHERE id IN ('.$ids.')';
        $this->doInsUpDel($sql);

    }

}
?>
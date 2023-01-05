<?php

class model_adminProduct extends Model{

    function __construct()
    {
        parent::__construct();
    }

    function getproduct(){
        $sql='select * from tbl_product';
        $result=$this->doSelect($sql);
        return $result;
    }

    function getcategory(){
        $sql='select * from tbl_category ';
        $result=$this->doSelect($sql);
        return $result;
    }

    function getcolor(){
        $sql='select * from tbl_color ';
        $result=$this->doSelect($sql);
        return $result;
    }

    function getgauranty(){
        $sql='select * from tbl_gauranty ';
        $result=$this->doSelect($sql);
        return $result;
    }

    function addproduct($data=[],$productid,$file=[])
    {

        if ($productid == '') {

            $sql = 'insert into tbl_product (title,price,categoryid,introduction,discount,tedad_mojood,color,gauranty) VALUES (?,?,?,?,?,?,?,?)';
            $value=[$data['title'],$data['price'],$data['categoryid'],$data['introduction'],$data['discount'],$data['tedad_mojood'],join(',',$data['color']),join(',',$data['gauranty'])];
            $this->doInsUpDel($sql,$value);
            $productid=parent::$conn->lastInsertId();
            if (!is_dir('public/images/products/'.$productid)) {
                mkdir('public/images/products/' . $productid);
            }

        }else{
            $sql='update tbl_product set title=?,price=?,categoryid=?,introduction=?,discount=?,tedad_mojood=?,color=?,gauranty=? WHERE id=?';
            $value=[$data['title'],$data['price'],$data['categoryid'],$data['introduction'],$data['discount'],$data['tedad_mojood'],join(',',$data['color']),join(',',$data['gauranty']),$productid];
            $this->doInsUpDel($sql,$value);
        }




        $uploadOK=1;
        $targetmain='public/images/products/'.$productid.'/';
        $newname='product';

        if (!$file['type']=='image/jpeg' and !$file['type']=='image/jpg'){
            $uploadOK=0;
        }
        if($file['size']>5242880){
            $uploadOK=0;
        }
        if ($uploadOK==1){
            $ext=pathinfo($file['name'],PATHINFO_EXTENSION);
            $target=$targetmain.$newname.'.'.$ext;
            move_uploaded_file($file['tmp_name'],$target);
            $target220=$targetmain.$newname.'_220.'.$ext;
            $target350=$targetmain.$newname.'_350.'.$ext;
            $this->create_thumbnail($target,$target220,220,220);
            $this->create_thumbnail($target,$target350,350,350);
        }

    }

    function productinfo($productid){
        $sql='select * from tbl_product WHERE id=?';
        $result=$this->doSelect($sql,[$productid],1);
        $colors=$result['color'];
        $gauranty=$result['gauranty'];

        $colors=explode(',',$colors);
        $gaurantys=explode(',',$gauranty);
        $result['colorinfo']=[];
        foreach ($colors as $color){
            $sql='select * from tbl_color WHERE id=?';
            $colorinfo=$this->doSelect($sql,[$color],1);
            array_push($result['colorinfo'],$colorinfo);
        }
        $result['gaurantyinfo']=[];
        foreach ($gaurantys as $gauranty){
            $sql='select * from tbl_gauranty WHERE id=?';
            $gaurantyinfo=$this->doSelect($sql,[$gauranty],1);
            array_push($result['gaurantyinfo'],$gaurantyinfo);
        }

        return $result;
    }

    function getnaghd($productid){
        $sql='select * from tbl_naghd WHERE productid=? order BY id DESC ';
        $result=$this->doSelect($sql,[$productid]);
        return $result;
    }

    function addnaghd($productid,$data=[],$naghdid=''){
        if ($naghdid=='') {
            $sql = 'insert into tbl_naghd (title,description,productid) VALUES (?,?,?)';
            $this->doInsUpDel($sql,[$data['title'],$data['description'],$productid]);
        }else{
            $sql='update tbl_naghd set title=?,description=? WHERE id=?';
            $this->doInsUpDel($sql,[$data['title'],$data['description'],$naghdid]);
        }

    }

    function naghdinfo($naghdid){
        $sql='select * from tbl_naghd WHERE id=? ';
        $result=$this->doSelect($sql,[$naghdid],1);
        return $result;
    }

    function deletenaghd($ids=[]){
        $ids=join(',',$ids);
        $sql='delete from tbl_naghd WHERE id in ('.$ids.')';
        $this->doInsUpDel($sql);
        }

    function deleteproduct($ids=[]){
        $ids=join(',',$ids);
        $sql='delete from tbl_product WHERE id in ('.$ids.')';
        $this->doInsUpDel($sql);

            $sql = 'delete from tbl_naghd WHERE productid in ('. $ids . ')';
            $this->doInsUpDel($sql);
    }

    function getattrval($attrid){
        $sql='select * from tbl_attr_val WHERE attrid=?';
        $result=$this->doSelect($sql,[$attrid]);
        return $result;
    }

    function getproductattr($productid){
        $productinfo=$this->productinfo($productid);
        $catid=$productinfo['categoryid'];
        $sql='select tbl_attr.* ,tbl_pro_attr.valueid from tbl_attr LEFT JOIN tbl_pro_attr ON tbl_attr.id=tbl_pro_attr.attrid and tbl_pro_attr.productid=? WHERE categoryid=? AND parent !=0';
        $result=$this->doSelect($sql,[$productid,$catid]);

        foreach ($result as $key=>$attr){
            $values=$this->getattrval($attr['id']);
            $result[$key]['values']=$values;
        }
        return $result;
    }

    function editattr($data=[],$productid){
        $ids=$data['id'];
        print_r($data);
        echo $productid;

        foreach ($ids as $id){

            $sql='delete from tbl_pro_attr WHERE productid=? AND attrid=?';
            $params=[$productid,$id];
            $this->doInsUpDel($sql,$params);

            $sql='insert into tbl_pro_attr (productid,attrid,valueid) values (?,?,?)';
            $params=[$productid,$id,$data['value'.$id]];
            $this->doInsUpDel($sql,$params);
        }
    }

    function getgallery($productid){
        $sql='select * from tbl_gallery  WHERE productid=? ';
        $result=$this->doSelect($sql,[$productid]);
        return $result;
    }

    function addgallery ($productid,$file){
        $uploadOK=1;
        $targetmain='public/images/products/'.$productid.'/gallery/large/';
        $newname=time();

        if (!$file['type']=='image/jpeg' and !$file['type']=='image/jpg'){
            $uploadOK=0;
        }
        if($file['size']>5242880){
            $uploadOK=0;
        }
        if ($uploadOK==1){
            $ext=pathinfo($file['name'],PATHINFO_EXTENSION);
            $target=$targetmain.$newname.'.'.$ext;
            move_uploaded_file($file['tmp_name'],$target);
            $targetSmall=$targetmain.'../small/'.$newname.'.'.$ext;
            $this->create_thumbnail($target,$targetSmall,115,115);

            $sql='insert into tbl_gallery (img,productid) VALUES (?,?)';
            $result=$this->doInsUpDel($sql,[$newname.'.'.$ext,$productid]);
        }

    }

    function deletegallery($ids=[]){

        foreach ($ids as $galleryid) {
            $sql='select * from tbl_gallery WHERE id=? ';
            $result=$this->doSelect($sql,[$galleryid],1);
            $filename=$result['img'];
            $directory='public/images/products/8/gallery/';
            $dirsmall=$directory.'small/'.$filename;
            $dirlarge=$directory.'large/'.$filename;

            unlink($dirsmall);
            unlink($dirlarge);
        }

        $ids_str=join(',',$ids);
        $sql='delete from tbl_gallery WHERE id in ('.$ids_str.')';
        $this->doInsUpDel($sql);

    }

}

?>
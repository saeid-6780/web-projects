<?php

class model_adminCategory extends Model{

    public $all_children_ids=[];

    function __construct()
    {
        parent::__construct();
    }

    function index(){

    }

    function getCategory(){
        $sql='select * from tbl_category ';
        $result=$this->doSelect($sql);
        return $result;
    }

    function getChildren($categoryid){
        $sql='select * from tbl_category WHERE parent=?';
        $result=$this->doSelect($sql,[$categoryid]);
        return $result;
    }

    function getParent($categoryid){
        $categoryinfo=$this->categoryinfo($categoryid);
        $parent=$categoryinfo['parent'];
        $all_parents=[];
        while ($parent!=0) {
            $sql = 'select * from tbl_category WHERE id=?';
            $categoryparent = $this->doSelect($sql, [$parent], 1);
            $parent=$categoryparent['parent'];
            array_push($all_parents,$categoryparent);
        }
        return $all_parents;
    }

    function categoryinfo($categoryid){
        $sql = 'select * from tbl_category WHERE id=?';
        $result = $this->doSelect($sql, [$categoryid], 1);
        return $result;
    }

    function addcategory($title,$parent,$edit,$categoryid){
        if ($edit=='') {
            $sql = 'insert into tbl_category (title,parent) VALUES (?,?)';
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1, $title);
            $stmt->bindValue(2, $parent);
            $stmt->execute();
        }else{
            $sql = 'update tbl_category set title=?,parent=? WHERE id=?';
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1, $title);
            $stmt->bindValue(2, $parent);
            $stmt->bindValue(3, $categoryid);
            $stmt->execute();
        }
    }

    function getchild($catids){
        $childrenids=[];
        foreach ($catids as $catid){
            $children=$this->getChildren($catid);
            foreach ($children as $child){
                array_push($childrenids,$child['id']);
            }
        }
        return $childrenids;
    }

    function deletecategory($ids=[]){

        $this->all_children_ids = array_merge($this->all_children_ids, $ids);

        while (sizeof($ids)>0) {
            $childrenids = $this->getchild($ids);
            $ids=$childrenids;
            $this->all_children_ids = array_merge($this->all_children_ids, $childrenids);
        }

        $x=join(',',$this->all_children_ids);
        $sql='delete from tbl_category WHERE id IN ('.$x.')';
        $stmt = self::$conn->prepare($sql);
            $stmt->execute();
    }

    function getattr($categoryid,$attrid){
        $sql = 'select * from tbl_attr WHERE categoryid=? AND parent=? ORDER BY id DESC ';
        $result = $this->doSelect($sql, [$categoryid,$attrid]);
        return $result;
    }

    function attrinfo($attrid){
        $sql = 'select * from tbl_attr WHERE id=? ';
        $result = $this->doSelect($sql, [$attrid],1);
        return $result;
    }

    function addattr($data,$categoryid,$editid)
    {
        if ($editid == '') {
            $sql = 'insert into tbl_attr (title,parent,categoryid) VALUES (?,?,?)';
            $this->doInsUpDel($sql, [$data['title'], $data['parents'], $categoryid]);
        } else {
            $sql = 'update tbl_attr set title=?,parent=? WHERE id=?';
            $this->doInsUpDel($sql, [$data['title'], $data['parents'], $editid]);
        }
    }

    function deleteattr($ids=[]){

        $sql='select * from tbl_attr';
        $attr=$this->doSelect($sql);
        foreach ($attr as $row){
            $parent=$row['parent'];
            if (in_array($parent,$ids)){
                array_push($ids,$row['id']);
            }
        }

        $x=join(',',$ids);
        $sql='delete from tbl_attr WHERE id IN ('.$x.')';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
    }

    function getattrval($attrid){
        $sql='select * from tbl_attr_val WHERE attrid=?';
        $result=$this->doSelect($sql,[$attrid]);
        return $result;
    }

    function saveattrval($data,$attrid){

        $attrvalnew=$data['attrvalnew'];
        $attrvalnew=array_filter($attrvalnew);
        foreach ($attrvalnew as $val){
            $sql='insert into tbl_attr_val (attrid,val) VALUES (?,?)';
            $this->doInsUpDel($sql,[$attrid,$val]);
        }
        unset($data['attrvalnew']);

        foreach ($data as $key=>$item){
            $key=explode('-',$key);
            if (isset($key[1])) {
                $valid = $key[1];
                if ($item!='') {
                    $sql = 'update tbl_attr_val set val=? WHERE id=?';
                    $this->doInsUpDel($sql, [$item, $valid]);
                }else{
                    $sql = 'delete from tbl_attr_val WHERE id=?';
                    $this->doInsUpDel($sql, [$valid]);
                }
            }

        }

    }

}

?>
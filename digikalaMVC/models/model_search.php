<?php

class model_search extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getattr($categoryid)
    {

        $sql = "select * from tbl_attr where categoryid=? and filter=1";
        $result = $this->doSelect($sql, array($categoryid));
        foreach ($result as $key => $row) {

            $sql = "select * from tbl_attr_val where attrid=?";
            $res = $this->doSelect($sql, array($row['id']));
            $result[$key]['values'] = $res;

        }

        return $result;

    }

    function getattrright($categoryId)
    {

        $sql = "select * from tbl_attr where categoryid=? and filter_right=1 ";
        $result = $this->doSelect($sql, array($categoryId));

        foreach ($result as $key => $row) {

            $sql = "select * from tbl_attr_val where attrid=?";
            $res = $this->doSelect($sql, array($row['id']));
            $result[$key]['values'] = $res;

        }

        return $result;

    }


    function getproducts($exist, $keyword, $orderType1, $orderType2)
    {
        $string = ' where 1=1 ';
        $order = 'order by';


        if ($exist == 1) {
            $string = $string . ' and tedad_mojood > 0';
        }

        if ($keyword != '') {
            $string = $string . ' and title  like "%' . $keyword . '%" ';
        }
        if ($orderType1 == 1) {
            $order = $order . ' price ';
        }
        if ($orderType1 == 2) {
            $order = $order . ' view_num ';
        }
        if ($orderType1 == 3) {
            $order = $order . ' id ';
        }
        if ($orderType2 == 1) {
            $order = $order . ' asc';
        }

        if ($orderType2 == 2) {
            $order = $order . ' desc';
        }
        $sql = "select * from tbl_product " . $string . " " . $order . " ";
        $result = $this->doSelect($sql);
        return $result;
    }

    function productattrval()
    {

        $sql = "select * from tbl_pro_attr";
        $result = $this->doSelect($sql);
        $productAttrVal = array();
        foreach ($result as $row) {

            $productId = $row['productid'];
            $attrId = $row['attrid'];
            $valId = $row['valueid'];
            if (!isset($productAttrVal[$productId])) {
                $productAttrVal[$productId] = array();
            }
            $productAttrVal[$productId][$attrId] = $valId;
        }

        return $productAttrVal;

    }


    function doSearch($data)
    {

        //print_r($data);

        $exist = $data['exist'];
        $keyword = $data['keyword'];
        @$colors = $data['colorSelected'];
        $orderType1 = $data['orderType1'];
        $orderType2 = $data['orderType2'];


        $products = $this->getproducts($exist, $keyword, $orderType1, $orderType2);
        $productAttrVal = $this->productattrval();
        $productTotal = array();


        foreach ($products as $productKey => $product) {

            foreach ($data as $key => $arrayValId) {
                $attr = explode('-', $key);
                @$attrId = $attr[1];
                $productId = $product['id'];
                @$productVal = $productAttrVal[$productId][$attrId];
                if (isset($productVal)) {
                    if (!in_array($productVal, $arrayValId)) {
                        unset($products[$productKey]);
                    }
                }
            }

            if (isset($data['colorSelected'])) {
                $productColors = $product['color'];
                $productColors = explode(',', $productColors);
                $common = array_intersect($colors, $productColors);//common=anasore moshtarak dar 2 araye

                if (sizeof($common) == 0) {
                    unset($products[$productKey]);
                }
            }


        }

        $productTotal = array_filter($products);
        $current_page = $data['current_page'];
        $limit = $data['limit'];
        $offset = ($current_page - 1) * $limit;
        $page_number=sizeof($productTotal)/$limit;
        $page_number=ceil($page_number);

        $productTotal = array_slice($productTotal, $offset, $limit);//dar araye productTotal be andazeh offset miparad va limit ta az araye ra joda mikonad

        return array($productTotal,$page_number);


    }

    function getColors()
    {

        $sql = "select * from tbl_color ";
        $result = $this->doSelect($sql);
        return $result;

    }


}


?>










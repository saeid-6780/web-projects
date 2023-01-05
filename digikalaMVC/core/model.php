<?php

class Model{
    public static $conn='';
    //const $option=''
    function __construct()
    {
        $servername='localhost';
        $username='root';
        $password='';
        $databasename='db_digikala_test';

        self::$conn=new PDO('mysql:host='.$servername.';dbname='.$databasename,$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES "utf8"'));
        self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        if (function_exists('jdate')==false) {
            require('public/jdf/jdf.php');
        }

    }

    public static function get_option(){

        $sql="SELECT * FROM tbl_option";
        $stmt=self::$conn->prepare($sql);
        $stmt->execute();
        $options=$stmt->fetchAll();

        $options_new=[];
        foreach ($options as $option){
            $setting=$option['setting'];
            $value=$option['value'];
            $options_new[$setting]=$value;
        }
        return $options_new;

    }

    function calculate_discount($price,$discount){
        $price_discount=($discount*$price)/100;
        $price_total=$price-$price_discount;
        return[$price_discount,$price_total];
    }

    public static function doSelect($sql,$values=[],$fetch='',$fetchStyle=PDO::FETCH_ASSOC){
        $stmt=self::$conn->prepare($sql);
        foreach ($values as $key=>$value){
            $stmt->bindValue($key+1,$value);
        }
        $stmt->execute();
        if ($fetch=='') {
            $result = $stmt->fetchAll($fetchStyle);
        }
        else{
            $result = $stmt->fetch($fetchStyle);
        }
        return $result;
    }

    function doInsUpDel($sql,$values=[]){
        $stmt=self::$conn->prepare($sql);
        foreach ($values as $key=>$value){
            $stmt->bindValue($key+1,$value);
        }
        $stmt->execute();
    }

    function create_thumbnail($file, $pathToSave = '', $w, $h = '', $crop = FALSE)
    {

        $new_height = $h;

        list($width, $height) = getimagesize($file);

        $r = $width / $height;

        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }

        $what = getimagesize($file);

        switch (strtolower($what['mime'])) {
            case 'image/png':
                $src = imagecreatefrompng($file);

                break;
            case 'image/jpeg':
                $src = imagecreatefromjpeg($file);
                break;
            case 'image/gif':
                $src = imagecreatefromgif($file);
                break;
            default:
                //die();
        }

        if ($new_height != '') {
            $newheight = $new_height;
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);//the new image
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);//az function

        imagejpeg($dst, $pathToSave, 95);//pish farz in tabe 75 darsad quality ast

        return $dst;


    }

    public static function sessionInit(){
        @session_start();
    }

    public static function sessionSet($name,$value){
        $_SESSION[$name]=$value;
    }

    public static function sessionGet($name){
        if (isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
        else{
            return false;
        }
    }

    public static function getbasketcookie(){
        if (isset($_COOKIE['basket'])){
            $cookie=$_COOKIE['basket'];
        }else{
            $expiretime=time()+30*24*3600;
            $value=time().rand(1000,100000);
            setcookie('basket',$value,$expiretime,'/');
            $cookie=$value;
        }
        return $cookie;
    }

    function getbasket(){
        $sql='select b.tedad,b.id AS basketrow, p.*, c.title as colortitle, g.title as gaurantytitle 
        from tbl_basket b
         LEFT JOIN tbl_product p ON b.productid=p.id
         LEFT JOIN tbl_color c ON b.color=c.id
         LEFT JOIN tbl_gauranty g ON b.gauranty=g.id WHERE cookie=?';

        $cookie=self::getbasketcookie();
        $result=$this->doSelect($sql,[$cookie]);

        $discounttotalall=0;
        foreach ($result as $key=>$row){
            $discount=($row['discount']*$row['price'])/100;
            $discounttotal=$row['tedad']*$discount;
            $result[$key]['discounttotal']=$discounttotal;
            $discounttotalall=$discounttotalall+$discounttotal;
        }

        $price_total_all=0;
        foreach ($result as $row){
            $price=$row['price'];
            $tedad=$row['tedad'];
            $price_total=$price*$tedad;
            $price_total_all=$price_total_all+$price_total;
        }

        return [$result,$price_total_all,$discounttotalall];
    }

    function calculatepostprice($cityid){

        $basketinfo=$this->getbasket();
        $basket=$basketinfo[0];
        $priceTotal=$basketinfo[1];
        $payType=1;

        $weightTotalAll=0;
        foreach ($basket as $row){
            $weight=$row['weight'];
            $tedad=$row['tedad'];
            $weightTotal=$weight*$tedad;
            $weightTotalAll=$weightTotalAll+$weightTotal;
        }


        $helper=new helper('http://webservice1.link/ws/v1/rest/');

        $postid=1;
        $price=$helper->getPrices($cityid,$priceTotal,$weightTotalAll,$payType,$postid);
        //echo json_encode($price['posti']);
        if ($payType==1){
            $postprice_pishtaz=$price['posti'][$postid]['post'];
        }else{
            $postprice_pishtaz=$price['naghdi'][$postid]['post'];
        }

        $postid=2;
        $price=$helper->getPrices($cityid,$priceTotal,$weightTotalAll,$payType,$postid);

        if ($payType==1){
            $postprice_sefareshi=$price['posti'][$postid]['post'];
        }else{
            $postprice_sefareshi=$price['naghdi'][$postid]['post'];
        }

        $data=['pishtaz'=>$postprice_pishtaz/10,'sefareshi'=>$postprice_sefareshi/10];
        return $data;

    }

    public static function jalalidate($format='Y/n/j'){

        $date=jdate($format);
        return $date;
    }

    public static function jalalitomiladi($jalali,$format='/'){
        $jalali=explode('/',$jalali);
        $year=@$jalali[0];
        $month=@$jalali[1];
        $day=@$jalali[2];
        $date=jalali_to_gregorian($year,$month,$day);
        $date=implode($format,$date);

        $date=new DateTime($date);
        $date=$date->format('Y/m/d');

        return $date;
    }

    public static function miladitojalali($miladi,$format='/'){
        $miladi=explode('/',$miladi);
        $year=@$miladi[0];
        $month=@$miladi[1];
        $day=@$miladi[2];
        $date=gregorian_to_jalali($year,$month,$day);
        $date=implode($format,$date);

        /*$date=new DateTime($date);
        $date=$date->format('Y/m/d');*/

        return $date;
    }

    function getmenu($parentid=0){

        $sql='select * from tbl_category where parent=?';
        $result=$this->doSelect($sql,[$parentid]);

        foreach ($result as $row){
            $children=$this->getmenu($row['id']);
            if (sizeof($children)>0){
                $row['children']=$children;
            }
            @$data[]=$row;
        }
        return @$data;

    }

    public static function getuserlevel(){
        self::sessionInit();
        $userid=self::sessionGet('userid');
        $sql='select * from tbl_user WHERE id=?';
        $result=Model::doSelect($sql,[$userid],1);
        return $result['level'];
    }

}


class helper
{
    private $url;
    private $api_key;
    const METHOD_POST = 'post';
    const METHOD_GET = 'get';
    /**
     * list of errors
     *
     * @var array
     */
    private $errors = array();

    /**
     * @param string $webserviceUrl
     * @param string $apiKey
     */
    public function __construct($webserviceUrl)
    {
        $this->url = $webserviceUrl;
        $this->api_key = 'F4960daa89D73A33332382fE661E7a18';
    }

    public function getPrices($des_city, $price, $weight, $buy_type, $delivery_type)
    {
        $params = array(
            'des_city' => $des_city,
            'price' => $price,
            'weight' => $weight,
            'buy_type' => $buy_type,
            'send_type' => $delivery_type
        );
        return $this->call('order/getPrices.json', $params);
    }


    private function call($url, $params, $methodType = helper::METHOD_POST)
    {
        // flush error list
        $this->errors = array();
        if (stripos($url, 'http://') === false)
            $url = $this->url . $url;
        $params['api'] = $this->api_key;
        $data = http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, $methodType === helper::METHOD_POST);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        $result = json_decode($result, true);
        if (json_last_error() == JSON_ERROR_NONE)
            return $this->parseResponse($result);
        throw new FrotelResponseException('Failed to Parse Response (' . json_last_error() . ')');
    }

    /**
     * parse webservice response
     *
     * @param array $response
     * @return bool
     * @throws FrotelResponseException
     * @throws FrotelWebserviceException
     */
    private function parseResponse($response)
    {
        if (!isset($response['code'], $response['message'], $response['result']))
            throw new FrotelResponseException('پاسخ دریافتی از سرور معتبر نیست.');
        if ($response['code'] == 0)
            return $response['result'];
        $this->errors[] = $response['message'];
        throw new FrotelWebserviceException($response['message']);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}

class FrotelResponseException extends Exception
{
}

class FrotelWebserviceException extends Exception
{
}





?>
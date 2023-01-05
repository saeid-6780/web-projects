<?php

$model=new Model();
$options=Model::get_option();

define('URL',$options['root']);
define('zarinpalMerchantID',$options['zarinpalmid']);
define('callbackURL','http://gusht.ir/checkout');


define('zarinpalWebAdress', 'https://www.zarinpal.com/pg/services/WebGate/wsdl');
define('mohlatPay',$options['mohllatpay']);
define('menu_color', $options['menucolor']);
define('body_color', $options['bodycolor']);


$zarinpalErrors = array(

    '-1' => 'اطلاعات ارسال شده ناقص شده است',
    '-2' => 'IP یا مرچنت کد صحیح نیست',
    '-3' => 'سطح تایید پذیرنده کمتر از نقره ای است'

);
define('zarinpalErrors', serialize($zarinpalErrors))

?>
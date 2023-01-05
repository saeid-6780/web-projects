<?php

$servername='localhost';
$username='root';
$password='';
$databasename='db_digikala_test';

//mysqli-procedural style
/*$conn=mysqli_connect($servername,$username,$password,$databasename);
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
    die();
}*/

//mysqli-OOP(object oriented programming)
$conn=new mysqli($servername,$username,$password,$databasename);
if($conn->connect_errno){
    echo $conn->connect_error;
}
$conn->set_charset('utf8');
$productname='گوشی';
$price=10000;
$sql='insert into tbl_product (title,price) VALUES (?,?)';
$stmt=$conn->prepare($sql);
$stmt->bind_param('si',$productname,$price);
$stmt->execute();

//$results=$conn->query($sql);
/*while($row=$results->fetch_object()){
    print_r($row);
    echo '<br>';
}*/

?>
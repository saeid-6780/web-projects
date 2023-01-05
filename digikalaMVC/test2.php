<?php

$servername='localhost';
$username='root';
$password='';
$databasename='db_digikala_test';

$conn=new PDO('mysql:host='.$servername.';dbname='.$databasename,$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES "utf8"'));
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='update tbl_product set title=? WHERE id=?';
$stmt=$conn->prepare($sql);
/*$id1=3;$id2=4;
$stmt->bindParam(1,$id1);
$stmt->bindParam(2,$id2);*/
$stmt->bindValue(1,'موبایل');
$stmt->bindValue(2,4);
$stmt->execute();
//$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

/*$stmt=$conn->query($sql);
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) {
    print_r($row);
    echo '<br>';
}*/

?>
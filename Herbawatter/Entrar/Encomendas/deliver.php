<?php
session_start();

include('../../../.config.php');
$host = "db.ist.utl.pt";
$user = $CONFIG['istid'];
$password = $CONFIG['pass'];
$dbname = $user;
$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql=$db->prepare("SELECT email,name,password FROM persona WHERE email=?");
$sql->execute(array($_SESSION['email']));

$delivers = $_REQUEST['delivers'];
$address = $_REQUEST['address'];
$nif = $_REQUEST['nif'];
$email=$_SESSION['email'];


$sql=$db->prepare("INSERT INTO request (number_orders, morada, nif) VALUES (?, ?, ?);");
$sql->execute(array($delivers, $address, $nif));

$sql=$db->prepare("SELECT request_id FROM request ORDER BY request_id DESC LIMIT 1");
$sql->execute();
$id=$sql->fetch();

$sql=$db->prepare("INSERT INTO shopping (email, request_id) VALUES (?, ?);");
$sql->execute(array($_SESSION['email'], $id['request_id']));

header("Location:../Carrinho%20de%20Compras");

?>
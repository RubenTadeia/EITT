<?php
session_start();

$host = "db.ist.utl.pt";
include('../../.config.php');
$user = $CONFIG['istid'];
$password = $CONFIG['pass'];
$dbname = $user;

$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_SESSION['user']) && $_SESSION['user']!=''){header("Location:../Entrar/Home/");}

$email=$_POST['email'];
$name=$_POST['name'];
$password=$_POST['pass'];

if(isset($_POST) && $email!='' && $password!=''){
 $sql=$db->prepare("SELECT email FROM persona WHERE email=?");
 $sql->execute(array($email));
 $nrows = $sql->rowCount();
 
 /* Novo Utilizador */
 if($nrows==0){
 	$hash = password_hash($password, PASSWORD_DEFAULT);
 	$stmt = $db->prepare("INSERT INTO persona(name, password, email) VALUES(:name, :password, :email)");
	$stmt->execute(array(':name' => $name, ':password' => $hash, ':email' => $email));
	header("Location:../Entrar/");
 }
 else{
 	echo "<h2>Esse utilizador encontra-se inscrito na nossa Base de Dados!</h2>";
 }
  
 }

?>
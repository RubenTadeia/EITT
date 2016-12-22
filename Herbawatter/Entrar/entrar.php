<?php
session_start();

$host = "db.ist.utl.pt";
include('../../.config.php');
$user = $CONFIG['istid'];
$password = $CONFIG['pass'];
$dbname = $user;

$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_SESSION['email']) && $_SESSION['email']!=''){header("Location:./As%20Minhas%20Plantas/");}

$email=$_POST['email'];
$password=$_POST['pass'];

if($email=='' or $password==''){
  echo "<h2>Email Ou Palavra passe nulos ou inv&aacute;lidos</h2>";
 }

if(isset($_POST) && $email!='' && $password!=''){
 $sql=$db->prepare("SELECT email,password,name FROM persona WHERE email=?");
 $sql->execute(array($email));
 
 while($r=$sql->fetch()){
  $p=$r['password'];
  $n=$r['name'];
 }


 if(password_verify($password, $p)){
  $_SESSION['email']=$email;
  $_SESSION['name']=$n;
  header("Location:./As%20Minhas%20Plantas/");
 }else{
  echo "<h2>Username/Password is Incorrect.</h2>";
 }
}
?>
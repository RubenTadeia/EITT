<!DOCTYPE html>
<html lang="pt">
<head>
  <title>A Pagar!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      position: fixed;
      width: 100%;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #0e9e1e;
      padding: 20px;
      width:100%;
      height:80px;
      position:absolute;
      bottom:0;
      left:0;
    }
  </style>
  <?php
		session_start();


		if($_SESSION['email']==''){
			header("Location:../");
		
		}else{
			include('../../../.config.php');
			$host = "db.ist.utl.pt";
			$user = $CONFIG['istid'];
			$password = $CONFIG['pass'];
			$dbname = $user;
			$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql=$db->prepare("SELECT email,name,password FROM persona WHERE email=?");
			$sql->execute(array($_SESSION['email']));
			while($r=$sql->fetch()){
				$username = $r['name'];
			}
		}
		?>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand">Herbawatter</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../As%20Minhas%20Plantas">As Minhas Plantas</a></li>
        <li><a href="../Nova%20Planta/">Adicionar Nova Planta</a></li>
        <li><a href="../Encomendas/">Encomendar Produto</a></li>
        <li class="active"><a href="./">Carrinho de Compras</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a>Ol&aacute; <?php echo "$username"; ?></a></li>
        <li><a href="../sair.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron" style="background-color: #399bce;">
  <div class="container text-center" style="background-color: #0e9e1e;">
    <h1 style="color:white;">Carrinho de Compras!</h1>      
    <p style="color:white;"><strong>Lista de compras actual!</strong></p>
  </div>
</div>
  
<div class="container-fluid bg-3 text-center">    
  <h3><strong>Lista de Compras a realizar</strong></h3><br>
   <div class="row">
    <?php
    /*loop print plants*/
  $sql=$db->prepare("SELECT number_orders, morada, nif FROM request natural join shopping WHERE email=?");
  $sql->execute(array($_SESSION['email']));
  $nrows = $sql->rowCount();
  if($nrows > 0 ) {
    while($r=$sql->fetch()){
      $number_orders=$r['number_orders'];
      $morada=$r['morada'];
      $nif=$r['nif'];

      echo "<div class='col-sm-3'>";
      echo "<center><strong>";
      echo "<br>";
        echo "<p>N&uacute;mero de Encomendas: " . $number_orders . "</p>";
        echo "<p>Morada: " . $morada . "</p>";
        echo "<p>NIF: " . $nif . "</p>";
        echo "<p><font color=\"red\">Total: " . $number_orders * 105 . " €</font></p>";
        echo "</strong></center>";
      echo "</div>";
    }
  }else {
    echo "<br><br>";
    echo "<center><strong>";
    echo "<h2>Ainda n&atilde;o tens encomendas feitas!</h2><br>";
    echo "</strong></center>";
  }
  ?>
  </div>
  </div>

<footer class="container-fluid text-center"  style="color:white;">
  <p><strong><font size="6">Herbawatter</font></strong></p>
</footer>

</body>
</html>
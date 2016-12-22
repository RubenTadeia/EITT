<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<head>
<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['email']!=''){header("Location:./As%20Minhas%20Plantas/");}
?>
    <title>Entrar</title>
    <style>
        .fundo {
		    background-color: lightgreen;
		    opacity: 0.5;
		    width:500px;
		    height:430px;
		    border: 12px dashed rgb(0, 255, 136);
		}
		.fundo:hover {
			background-color: lightgreen;
		    opacity: 1.0;
		    width:500px;
		    height:430px;
		    border: 12px dashed rgb(0, 255, 136);
		}
    </style>
</head>

<body background="../imagens/cacto.jpg">
    <!-- Referências Bibliográficas: Link: http://www.allmacwallpaper.com/mac-wallpaper/The-Flower/11025-->
    <center>
            <br><br><br><br>
            <div class="fundo">
                <br>
                <img src="../imagens/herbawatter.png" alt="yes" style="width:100px;height:100px;">
                <br>
                <h2 style="color:rgb(0,0,0);"><strong>S&ecirc; Bem Vindo!</strong></h2>
                <h3 style="color:rgb(30,30,30);">Entrar</h3>
                <form method="POST" action="entrar.php" style="border:1px solid black;display:table;margin:0px auto;padding-left:10px;padding-bottom:5px;">
                    <table width="300" cellpadding="4" cellspacing="1">
                        <tr>
                            <td>
                                <td colspan="3"><strong>Fazer Log In</strong></td>
                        </tr>
                        <tr>
                            <td width="78">E-Mail</td>
                            <td width="6">:</td>
                            <td width="294"><input size="25" name="email" type="text"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input name="pass" size="25" type="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><input type="submit" name="Submit" value="Confirmar"></td>
                        </tr>
                    </table>
                </form>
            </div>
    </center>
</body>

</html>
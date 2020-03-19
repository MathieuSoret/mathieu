<?php
	
	
		
		
if(isset($_POST['forminscription']))
{
	$pseudo = $_POST['pseudo'];
	$pass = $_POST['pass'];
	
	$dsn = "mysql:host=localhost;dbname=veretz";
	$user = "root";
	$passwd = "";

	$pdo = new PDO($dsn, $user, $passwd);
	
	
	if($user >= 0)
	{
		$stm = $pdo->prepare("INSERT INTO compte(pseudoCompte, mpCompte) VALUES(:pseudo, :pass)");
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$stm->execute(array(
		':pseudo' => $pseudo, 
		':pass' => $pass
		));
		
		
		$stm = $pdo->query("SELECT * FROM compte WHERE pseudoCompte='" . $pseudo . "'");
        $user = $stm->fetch();
        $stm->execute();
		
		
		
		echo 'Bonjour ' . $pseudo .  ' et ton mdp crypté est ' . $pass ;
		

	}
	else
	{
		
	
	echo "c'est pas bon !";
        
		
	}
	
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="utf-8" />
        <title>Bibliothéque de Veretz</title>
    </head>
<body>

<div align="center">
<h2>Page d'inscription</h2>
<br><br>

<form action="inscription.php" method="post">

	<table>
		<tr>
			<td align="right">
				<label for="pseudo">Nom Compte :</label>
			</td>
			<td>
				<input type="text" placeholder="Mettez votre nom et prénom" id="pseudo" name="pseudo" />
			</td>
		</tr>
		
		<tr>
			<td align="right">
				<label for="pass">Mot de passe :</label>
			</td>
			<td>
				<input type="password" placeholder="Mot de passe" id="pass" name="pass"/>
			</td>
	
		</tr>
		
		<tr>
			<td align="right">
				<label for="pass2">Confirmation Mot de passe :</label>
			</td>
			<td>
				<input type="password" placeholder="Confirmez votre mp" id="pass2" name="pass2"/>
			</td>
	
		</tr>
	</table>
	<br>
	<input type="submit" name="forminscription" value="Je m'inscris"/>
	
</form>
	
<?php

if(isset($erreur))
{
	echo '<font color="red">'.$erreur."</font>";
}


?>

</div>	


</body>
</html>
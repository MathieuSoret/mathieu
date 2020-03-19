<?php

$bdd = new PDO('mysql:host=localhost;dbname=veretz', 'root', '');

if(isset($_POST['formconnexion']))
{
	
	$mpconnect = password_verify($_POST['mpconnect']);	
	if(!empty($pseudoconnect) AND !empty($mpconnect))
	{
		 $requser = $bdd->prepare("SELECT * FROM compte WHERE pseudoCompte = ? AND mpCompte = ?");
		 $requser->execute(array($pseudoconnect, $mpconnect));
		 $userexist = $requser->rowCount();
		 if($userexist == 1)
		 {
			 echo "ok";
		 }
		 else
		 {
			 $erreur = "Mauvais nom prénom ou mot de passe !";
		 }
	}
	else
	{
		$erreur = "Tous les champs doivent être renplit !";
	}
}


?>


<!DOCTYPE html>

        <meta charset="utf-8" />
		<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css" />
        <title>Bibliothéque de Veretz</title>
    </head>

<body>

<form action="Acceuil.php" method="post">

<center>
<div class="brand_logo_container">
	<a href="https://www.veretz.com/"><img src="logo.png" class="brand_logo" alt="Logo"></a>
</div>


	
	
		
		
		
			<div class="user_card">
			

				<div class="d-flex justify-content-center form_container">
					<form>
					
					
						<div class="input-group mb-3">
								<label for="site-search">Page de connexion:</label>	
						</div>


	
						
							<form method="POST" action="">
								<input type="text" name="pseudoconnect" placeholder="Mettez votre nom et prénom"  />								
								<input type="password" name="mpconnect" placeholder="Mot de passe" />
								<input type="submit" name="formconnexion" value="Se conncecter"/>
							</form>	
									
								
								
							
								<div class="form-group">
										<div class="custom-control custom-checkbox">
											<label class="custom-control-label" for="customControlInline">Se souvenir de moi :</label>
											<input type="checkbox" class="custom-control-input" id="customControlInline">
										</div>	
								</div>
								
								
									


							<div class="d-flex justify-content-center mt-3 login_container">
								<label class="custom-control-label" class="btn login_btn"> <a href="inscription.php">Inscription</label>
							</div>
							
							
					</form>
				</div>	
			
	
			</div>				
							
							
	

</form>
	
<?php

	if(isset($erreur))
	{
	echo '<font color="red">'.$erreur."</font>";
	}


?>
	
</center>
</body>
</html>

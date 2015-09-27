<!DOCTYPE html>
<html lang="fr">

	<head>

		<title>Formulaire bleu</title>
		<meta charset="UTF-8" />
		<meta name="description" content="Formulaire pour accéder au cercle de l'ESIAJ">
		<link rel="stylesheet" href="css/style.css">
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
		<?php include("opengraph.inc.php"); ?>

	</head> 
	<body>

		<div class="wrapper">

					<?php 
			function is_valid_email($email) {
				$email = trim($email);
				return filter_var($email, FILTER_VALIDATE_EMAIL);
			}

			if($_POST) {

				if($_POST['user_email'] !='') {
						die('Degage petit spammeur!');
					}

				//nettoyage
				$error = false;
				$prenom = trim (strip_tags($_POST['prenom']));
				$nom = trim (strip_tags($_POST['nom']));
				$email = trim (strip_tags($_POST['email']));
				$date = trim (strip_tags($_POST['date']));
				$adresse = trim (strip_tags($_POST['adresse']));
				$ville = trim (strip_tags($_POST['ville']));
				$commune = trim (strip_tags($_POST['commune']));
				$pourquoi = $_POST['pourquoi'];
				$message = "Message de ". $prenom .' '. $nom ." avec l'adresse mail " . $email .' '. "venant de " . $adresse . ", " . $ville . ", " . $commune .' '. "souhaite devenir bleu pour ". $pourquoi;
				

				//validation
				if(!is_valid_email($email)) {
						echo ('<div class="error"><p>- Est-ce que ton adresse mail est valable?</p></div>');
						$error = true;
					}

				if ($prenom == '') {
						echo ("<div class='error'><p>- Comment t'appelles tu?</p></div>");
						$error = true;
					}

				if ($nom == '') {
						echo ("<div class='error'><p>- Il semble que tu n'as pas introduit ton nom</p></div>");
						$error = true;
					}

				if ($email == '') {
						echo ("<div class='error'><p>- Il semble que le champ email n'a pas été rempli</p></div>");
						$error = true;
					}

				if ($date == '') {
						echo ("<div class='error'><p>- Communique nous ta date de naissance s'il te plaît</p></div>");
						$error = true;
					}

				if ($adresse == '') {
						echo ("<div class='error'><p>- Il semble que ton adresse n'a pas été introduite</p></div>");
						$error = true;
					}

				if ($ville == '') {
						echo ("<div class='error'><p>- Il semble que le champs ville n'a pas été rempli</p></div>");
						$error = true;
					}

				if ($commune == '') {
						echo ("<div class='error'><p>- Il semble que le champs commune n'a pas été rempli</p></div>");
						$error = true;
					}

				if(empty($pourquoi)){
						echo "<div class='error'><p>- Sélectionne une des 3 raisons s'il te plaît</p></div>";
						$error = true;
					}
				
				if($error == false)  {
						$message = $message. "\n\nde: $email";
						$sujet = 'devenir bleu';
						mail('florvandenburg@gmail.com', $sujet, $message);

						die('Merci amour le message a été envoyé');
					}

					else {

					echo("Ouch! Une erreur s'est produite à l'envoi du formulaire, essaye encore une fois");

					}
			}
		?>

			<h1>Rejoins notre cercle!</h1>
			<p class="intro">Le Cercle des étudiants de l’ESIAJ recrute. Ils souhaitent publier une page résumant les bonnes raisons de devenir membre, avec un formulaire d’inscription. Ce formulaire sera, une fois validé par le client, transmis notamment par les réseaux sociaux mais également utilisé par les recruteurs du cercle lors de leurs démarches à l’école via leur smartphone.</p>

			<form method="POST">

					<div class="name--user">
						<label for="user_email">adresse Mail</label>
						<input type="text" name="user_email" id="user_email" />
					</div>

				
						<div>
							<label for="prenom">Ton Prénom</label>
							<input type="text" name="prenom" id="prenom" />
						</div>

						<div>
							<label for="nom">Ton Nom</label>
							<input type="text" name="nom" id="nom" />
						</div>

						<div>
							<label for="email">Ton adresse email</label>
							<input type="text" name="email" id="email" />
						</div>
				

						<div>	
							<label for="date">Ton date de naissance</label>
							<input type="text" name="date" id="date" placeholder="YY/XX/XXYY" />
						</div>

						<div>
							<label for="adresse">Ton adresse</label>
							<textarea id="adresse" name="adresse" rows="3"></textarea>
				
						</div>

						<div>
							<label for="ville">Ta ville</label>
							<input type="text" name="ville" id="ville" />
						</div>

						<div>
							<label for="commune">Ta commune</label>
							<input type="text" name="commune" id="commune" />
						</div>

						<fieldset class="choix">
							<p> Pourquoi souhaites-tu devenir « bleu », qu’espères-tu?</p>
							<label>
								<input type="radio" name="pourquoi" id="gratuit" value="boire" />Avoir des bière gratuites
							</label>
							<label>
								<input type="radio" name="pourquoi" id="filles" value="rencontrer" />Rencontrer des belles filles
							</label>
							<label>
								<input type="radio" name="pourquoi" id="president" value="devenir président" />Devenir le président du cercle
							</label>
						</fieldset>


					<input type="submit" id="button" name="submit" value="Send"></input>			
			</form> 
		</div>

	</body>	
</html>


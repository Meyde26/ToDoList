<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Inscription</title>
</head>
<body>
<header>
        <a href="index.php"><img src="img/logo.jpg" alt="logo_site" class="logo"></a> 
        <nav class="">
            <ul class="nav_links">
                <li><a href="bibliothèque.php">Bibliothèque</a></li>
                <li><a href="todolist.php">To Do List</a></li>
            </ul>
        </nav>
   </header>

   <main>
   <h2>Connexion</h2>
   <form method="POST" action="TraitementFormulaire.php">
		<label for="username">Nom d'utilisateur:</label>
		<input type="text" id="username" name="username"><br><br>
		<label for="password">Mot de passe:</label>
		<input type="password" id="password" name="password"><br><br>
		<input type="submit" value="Se connecter">
        <input type="submit" value="Envoyer">
	</form>
    <h2 class="compte">Créer un compte</h2>
	<form method="POST" action="TraitementFormulaire.php">
		<label for="new-username">Nom d'utilisateur:</label>
		<input type="text" id="new-username" name="new-username"><br><br>
		<label for="new-password">Mot de passe:</label>
		<input type="password" id="new-password" name="new-password"><br><br>
		<label for="confirm-password">Confirmer le mot de passe:</label>
		<input type="password" id="confirm-password" name="confirm-password"><br><br>
		<input type="submit" value="Créer un compte">
        <input type="submit" value="Envoyer">
	</form>
    <div class="esc"></div>

   </main>
</body>
</html>
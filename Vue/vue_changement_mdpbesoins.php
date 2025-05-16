<h3> Changement du Mot de Passe </h3>

<form method="post">
	Ancien MDP <br>
	<input type="password" name="mdp"> <br>

	New MDP <br>
	<input type="password" name="mdp1"><br>

	Confirmation MDP <br>
	<input type="password" name="mdp2"><br>

	<input type="hidden" name="email" value="<?= $unUser['email'] ?>"> <br>

	<input type="submit" name="modifier" value="modifier">
</form>

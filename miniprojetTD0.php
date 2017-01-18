<?php
function creerConnexionBD(){
	try{	
		$bd = new PDO('mysql:host=localhost;dbname=;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	return $bd;	
}
echo "Bonjour les gens";
commit;
push;
?>
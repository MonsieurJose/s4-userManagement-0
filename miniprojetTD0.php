<?php
function creerConnexionBD(){
	try{	
		$bd = new PDO('mysql:host=localhost;dbname=phalcon-td0;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	   return $bd;	
    }
    $bd = creerConnexionBD();
    $req2 = "select name,count(role.id)as nbuti from role join user on role.id=user.idrole group by role.id order by 1;";
    $reponse2 = $bd->query($req2);
    $nbUtilisateur = 0; 
    ?>
    <label for="tri_nom"></label>
		<input type="submit" value="tri_nom" name="true" />
    <label for="tri_nb_utilisateur"></label>
		<input type="submit" value="tri_nb_utilisateur" name="true" />










    <?php
    echo "</br>";
    echo "</br>";

    foreach ($reponse2 as $valeur2) {
        echo "--- ".$valeur2['name']." --> ".$valeur2['nbuti']."</br>";
        $nbUtilisateur = $nbUtilisateur+1; 
    }       
    echo "</br>";
    echo "le nombre de roles est : ".$nbUtilisateur."</br>";


?>
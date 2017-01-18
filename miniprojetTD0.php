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
    $req1 = "select name,count(role.id)as nbuti from role join user on role.id=user.idrole group by role.id order by name;";
    $req2 = "select name,count(role.id)as nbuti from role join user on role.id=user.idrole group by role.id order by name desc;";
    $req3 = "select name,count(role.id)as nbuti from role join user on role.id=user.idrole group by role.id order by nbuti;";
    $req4 = "select name,count(role.id)as nbuti from role join user on role.id=user.idrole group by role.id order by nbuti desc;";
    $reponse1 = $bd->query($req1);
    $reponse2 = $bd->query($req2);
    $reponse3 = $bd->query($req3);
    $reponse4 = $bd->query($req4);
    $nbUtilisateur = 0; 
// 1 = croissant , 2 = decroissant , 3 = non selectionne
    $valeurtri = 1;
    $valeurtribis = 3;
    ?>
    <form method = post>
    <label for="tri_nom"></label>
		<input type="submit" value="<?php echo $valeurtri ?>" name="tri_nom" />
    <label for="tri_nb_utilisateur"></label>
		<input type="submit" value="<?php echo $valeurtribis ?>" name="tri_nb_utilisateur" />
    </form>
    <?php
     if (isset($_POST['tri_nom'])) {
        if ($_POST['tri_nom'] == 1) {
            $valeurtri = 2;
            $valeurtribis = 3;
            foreach ($reponse1 as $valeur1) {
                echo "--- ".$valeur1['name']." --> ".$valeur1['nbuti']."</br>";
            }
        }
        if ($_POST['tri_nom'] == 2) {
            $valeurtri = 1;
            $valeurtribis = 3;
            foreach ($reponse2 as $valeur2) {
                echo "--- ".$valeur2['name']." --> ".$valeur2['nbuti']."</br>";
            }
        }
    }
    if (isset($_POST['tri_nb_utilisateur'])) {
        $valeurtribis = 1;
         $valeurtri = 3;
        
    }
    if ($_POST['tri_nb_utilisateur']==1) {
        $valeurtribis = 2;
        $valeurtri = 3;
        foreach ($reponse3 as $valeur3) {
                echo "--- ".$valeur3['name']." --> ".$valeur3['nbuti']."</br>";
            }
    }
    else if ($_POST['tri_nb_utilisateur']==2) {
        $valeurtribis = 1;
        $valeurtri = 3;
        foreach ($reponse4 as $valeur4) {
                echo "--- ".$valeur4['name']." --> ".$valeur4['nbuti']."</br>";
            
            }
    }
    echo "</br>";
    echo "</br>";
    /*
    foreach ($reponse2 as $valeur2) {
        echo "--- ".$valeur2['name']." --> ".$valeur2['nbuti']."</br>";
        $nbUtilisateur = $nbUtilisateur+1; 
    }  */     
    echo "</br>";
    echo "le nombre de roles est : ".$nbUtilisateur."</br>";


?>
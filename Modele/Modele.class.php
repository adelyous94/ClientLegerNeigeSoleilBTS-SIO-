<?php
error_reporting(E_ALL);
ini_set("",1);
	class Modele {
		private $unPdo ; 

		public function __construct(){

			try {
				$serveur="localhost";
				$bdd = "NeigeSoleil";
				$user = "root"; 
				$mdp = ""; 

				$this->unPdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd, $user, $mdp); 

				
			}

			catch(PDOException $exp){
				echo "<br> Erreur de connexion à la BDD :".$exp->getMessage(); 

			}


		}

		/************* Gestion des fonctions Admin ***********/
		
		public function selectContratDeReservation($filtre = null) {
			$requete = "SELECT * FROM Contrat_de_reservation";
			if ($filtre) {
				$requete .= " WHERE etat LIKE :filtre OR id_locataire IN (SELECT id_locataire FROM locataire WHERE nom LIKE :filtre)";
			}
			$exec = $this->unPdo->prepare($requete);
			$donnees = array(":filtre" => "%" . $filtre . "%");
			$exec->execute($donnees);
			return $exec->fetchAll();
		}

		
	public function insertContratDeReservation($tab) {
    $requete = "INSERT INTO contrat_de_reservation 
        (ID_LOCATAIRE, ID_BATIMENT, NUMERO_APPARTEMENT, DATE_RESERVATION, ARRHES, SOLDE, ETAT, url_contrat_pdf) 
        VALUES (:id_locataire, :id_batiment, :numero_appartement, :date_reservation, :arrhes, :solde, :etat, :url_contrat_pdf)";
    
    $exec = $this->unPdo->prepare($requete);
    $donnees = array(
        ":id_locataire" => $tab['id_locataire'],
        ":id_batiment" => $tab['id_batiment'],
        ":numero_appartement" => $tab['numero_appartement'],
        ":date_reservation" => $tab['date_reservation'],
        ":arrhes" => $tab['arrhes'],
        ":solde" => $tab['solde'],
        ":etat" => $tab['etat'],
        ":url_contrat_pdf" => isset($tab['url_contrat_pdf']) ? $tab['url_contrat_pdf'] : null // Valeur par défaut si non fournie
    );

    $exec->execute($donnees);
}


		public function updateContratDeReservation($tab) {
			$requete = "UPDATE contrat_de_reservation SET id_locataire = :id_locataire, date_reservation = :date_reservation, arrhes = :arrhes, solde = :solde, etat = :etat WHERE numero_contrat = :numero_contrat";
			$exec = $this->unPdo->prepare($requete);
			$donnees = array(
				":id_locataire" => $tab['id_locataire'],
				":date_reservation" => $tab['date_reservation'],
				":arrhes" => $tab['arrhes'],
				":solde" => $tab['solde'],
				":etat" => $tab['etat'],
				":numero_contrat" => $tab['numero_contrat']
			);
			$exec->execute($donnees);
		}

		public function deleteContratDeReservation($numero_contrat) {
			$requete = "DELETE FROM contrat_de_reservation WHERE numero_contrat = :numero_contrat";
			$exec = $this->unPdo->prepare($requete);
			$donnees = array(":numero_contrat" => $numero_contrat);
			$exec->execute($donnees);
		}
public function insertLocataire($tab) {
    $requete = "INSERT INTO locataire (ID_VILLE, NOM, PRENOM, ADRESSE, CODE_POSTAL, TELEPHONE, EMAIL, MDP, ROLE) 
                VALUES (:id_ville, :nom, :prenom, :adresse, :code_postal, :telephone, :email, :mdp, :role)";

    $exec = $this->unPdo->prepare($requete);
    
    $donnees = array(
        ":id_ville" => $tab['id_ville'],
        ":nom" => $tab['nom'],
        ":prenom" => $tab['prenom'],
        ":adresse" => $tab['adresse'],
        ":code_postal" => $tab['code_postal'],
        ":telephone" => $tab['telephone'],
        ":email" => $tab['email'],
        ":mdp" => password_hash($tab['mdp'], PASSWORD_DEFAULT), // Hachage du mot de passe
        ":role" => isset($tab['role']) ? $tab['role'] : 'Locataire' // Valeur par défaut "Locataire"
    );

    return $exec->execute($donnees);
}


		public function updateLocataire($tab) {
			$requete = "UPDATE locataire SET id_ville = :id_ville, nom = :nom, prenom = :prenom, adresse = :adresse, code_postal = :code_postal, telephone = :telephone, email = :email, mdp = :mdp, role = :role WHERE id_locataire = :id_locataire";
			$exec = $this->unPdo->prepare($requete);
			$donnees = array(
				":id_ville" => $tab['id_ville'],
				":nom" => $tab['nom'],
				":prenom" => $tab['prenom'],
				":adresse" => $tab['adresse'],
				":code_postal" => $tab['code_postal'],
				":telephone" => $tab['telephone'],
				":email" => $tab['email'],
				":mdp" => $tab['mdp'],
				":role" => $tab['role'],
				":id_locataire" => $tab['id_locataire']
			);
			$exec->execute($donnees);
		}

		public function selectWhereLocataire($id_locataire) {
			$requete="SELECT * from locataire WHERE :id_locataire=id_locataire;";
			 $exec = $this->unPdo->prepare($requete);
			 $donnees = array(":id_locataire"=>$id_locataire);
			 $exec->execute($donnees);
			 return $exec->fetch();
		}

		 public function copyLocataire($id_locataire) {
			$locataire = $this->selectWhereLocataire($id_locataire);
			$locataire['id_locataire'] = null; // Reset ID for new entry
			$this->insertLocataire($locataire);
		}

		 public function deleteLocataire($id_locataire) {
			$requete = "DELETE FROM locataire WHERE id_locataire = :id_locataire";
			$exec = $this->unPdo->prepare($requete);
			$donnees = array(":id_locataire" => $id_locataire);
			$exec->execute($donnees);
		}

		public function selectLocations($filtre = null) {
			$requete = "SELECT * FROM locations";
			if ($filtre) {
				$requete .= " WHERE id_locataire IN (SELECT id_locataire FROM locataire WHERE nom LIKE :filtre)";
			}
			$exec = $this->unPdo->prepare($requete);
			$donnees = array(":filtre" => "%" . $filtre . "%");
			$exec->execute($donnees);
			return $exec->fetchAll();
		}

		public function deleteLocation($id_batiment, $numero_appartement, $numero_contrat, $id_locataire) {
			$requete = "DELETE FROM locations WHERE id_batiment = :id_batiment AND numero_appartement = :numero_appartement AND numero_contrat = :numero_contrat AND id_locataire = :id_locataire";
			$exec = $this->unPdo->prepare($requete);
			$donnees = array(
				":id_batiment" => $id_batiment,
				":numero_appartement" => $numero_appartement,
				":numero_contrat" => $numero_contrat,
				":id_locataire" => $id_locataire
			);
			$exec->execute($donnees);
		}

		public function updateSemainesLouees($tab) {
			$requete = "UPDATE semaines_louees SET date_debut = :date_debut, date_fin = :date_fin WHERE id_semaine = :id_semaine";
			$exec = $this->unPdo->prepare($requete);
			$donnees = array(
				":date_debut" => $tab['date_debut'],
				":date_fin" => $tab['date_fin'],
				":id_semaine" => $tab['id_semaine']
			);
			$exec->execute($donnees);
		}


		/************* Gestion des Fonctions Proprietaires ***********/
		public function selectAnnoncesProprietaire($id_proprietaire) {
			$requete = "SELECT * FROM appartement WHERE id_proprietaire = :id_proprietaire";
			$exec = $this->unPdo->prepare($requete);
			$donnees = array(":id_proprietaire" => $id_proprietaire);
			$exec->execute($donnees);
			return $exec->fetchAll();
		}

		public function selectContratsProprietaire($id_proprietaire) {
			$requete = "SELECT * FROM contrat_de_mandat_locatif WHERE id_proprietaire = :id_proprietaire";
			$exec = $this->unPdo->prepare($requete);
			$donnees = array(":id_proprietaire" => $id_proprietaire);
			$exec->execute($donnees);
			return $exec->fetchAll();
		}

			/************* Gestion des Fonctions Locataires ***********/
			public function selectAnnonces($ville, $type, $debut, $fin) {
				$requete = "SELECT apt.*, v.nom AS ville 
							FROM appartement apt 
							JOIN ville v ON apt.id_ville = v.id_ville 
							JOIN contrat_de_mandat_locatif cloc ON apt.id_batiment = cloc.id_batiment 
								AND apt.numero_appartement = cloc.numero_appartement 
							LEFT JOIN exclusions ex ON cloc.id_contrat = ex.id_contrat 
							LEFT JOIN contrat_de_reservation cres ON cres.id_batiment = apt.id_batiment 
								AND cres.numero_appartement = apt.numero_appartement 
							LEFT JOIN semaines_louees sl ON sl.numero_contrat = cres.numero_contrat 
							WHERE (ex.id_exclusions IS NULL OR CURDATE() NOT BETWEEN ex.date_debut AND ex.date_fin) 
							  AND (sl.id_semaine IS NULL OR CURDATE() NOT BETWEEN sl.date_debut AND sl.date_fin)";
			
				$donnees = array();
			
				
				if (!empty($ville)) {
					$requete .= " AND v.nom LIKE :ville";
					$donnees[':ville'] = "%".$ville."%";
				}
				if (!empty($type)) {
					$requete .= " AND apt.type LIKE :type";
					$donnees[':type'] = "%".$type."%"; 
				}
				if (!empty($debut) && !empty($fin)) {
					$requete .= " AND (:debut NOT BETWEEN sl.date_debut AND sl.date_fin) AND (:fin >= sl.date_fin)";
					$donnees[':debut'] = $debut;
					$donnees[':fin'] = $fin;
				}
				
				
				$exec = $this->unPdo->prepare($requete);
				echo $requete;
				$exec->execute($donnees);
				return $exec->fetchAll();
			}
			

			public function selectReservationsLocataire($id_locataire) {
				$requete = "SELECT apt.*, c.*, sl.* FROM contrat_de_reservation c JOIN appartement apt on apt.id_batiment=c.id_batiment and apt.numero_appartement=c.numero_appartement JOIN semaines_louees sl on sl.numero_contrat=c.numero_contrat WHERE id_locataire = :id_locataire";
				$exec = $this->unPdo->prepare($requete);
				$donnees = array(":id_locataire" => $id_locataire);
				$exec->execute($donnees);
				return $exec->fetchAll();
			}

			public function selectLaReservation($numero_contrat,$id_batiment,$numero_appartement) {
				$requete = "SELECT apt.*, c.*, sl.* FROM contrat_de_reservation c JOIN appartement apt on apt.id_batiment=c.id_batiment and apt.numero_appartement=c.numero_appartement JOIN semaines_louees sl on sl.numero_contrat=c.numero_contrat WHERE :numero_contrat = c.numero_contrat and :id_batiment = c.id_batiment and :numero_appartement = c.numero_appartement;";
				$exec = $this->unPdo->prepare($requete);
				$donnees = array(":numero_contrat" => $numero_contrat, ":id_batiment" => $id_batiment, ":numero_appartement" => $numero_appartement);
				$exec->execute($donnees);
				return $exec->fetch();
			}

			
			public function selectAppartementEkip($id_batiment, $numero_appartement) {
				$requete = "SELECT apt.*, ekip.*, v.nom as ville FROM Ville v JOIN appartement apt ON apt.id_ville=v.id_ville LEFT JOIN Equipements ekip ON apt.id_batiment=ekip.id_batiment AND apt.numero_appartement=ekip.numero_appartement where :id_batiment = apt.id_batiment and :numero_appartement = apt.numero_appartement;";
				$exec = $this->unPdo->prepare($requete);
				$donnees = [":id_batiment" => $id_batiment, ":numero_appartement" => $numero_appartement];
				$exec->execute($donnees);
				return $exec->fetch();
			}

			public function insertContratDeReservationLocataire($tab) {
				$requete = "INSERT INTO contrat_de_reservation 
					(ID_LOCATAIRE, ID_BATIMENT, NUMERO_APPARTEMENT, DATE_RESERVATION, ARRHES, SOLDE, ETAT) 
					VALUES (:id_locataire, :id_batiment, :numero_appartement, :date_reservation, :arrhes, :solde, :etat)";
				
				$exec = $this->unPdo->prepare($requete);
				$donnees = array(
					":id_locataire" => $tab['id_locataire'],
					":id_batiment" => $tab['id_batiment'],
					":numero_appartement" => $tab['numero_appartement'],
					":date_reservation" => $tab['date_reservation'],
					":arrhes" => $tab['arrhes'],
					":solde" => $tab['solde'],
					":etat" => $tab['etat']
				);
			
				$exec->execute($donnees);
				return $this->unPdo->lastInsertId();
			}

			public function deleteReservation($numero_contrat){
				$requete = 'DELETE FROM contrat_de_reservation WHERE numero_contrat = :numero_contrat;';
				echo $requete;
				$exec = $this->unPdo->prepare($requete);
				$donnees = array(":numero_contrat" => $numero_contrat);
				$exec->execute($donnees);
			}
				
				
			public function insertSemainesLouees($tabl) {
				$requete = "INSERT INTO SEMAINES_LOUEES (numero_contrat, date_debut, date_fin)
						VALUES (:numero_contrat, :date_debut, :date_fin)";
				
				$exec = $this->unPdo->prepare($requete);
				$donnees = array(":numero_contrat" => $tabl['numero_contrat'], ":date_debut" => $tabl['date_debut'], ":date_fin" => $tabl['date_fin']);
				$exec->execute($donnees);
			}

			public function verifierLocation($numero_contrat){
				$requete = 'Call verifierLocation(:numero_contrat);';
				$exec = $this->unPdo->prepare($requete);
				$donnees = array(':numero_contrat'=> $numero_contrat);
				$exec->execute($donnees);
				return $exec->fetch();
			}

			public function updateContratDeReservationLocataire($tab) {
				$requete = "UPDATE contrat_de_reservation c JOIN Semaines_louees sl on c.numero_contrat=sl.numero_contrat SET sl.date_debut=:date_debut, sl.date_fin=:date_fin WHERE sl.numero_contrat = :numero_contrat and c.id_batiment = :id_batiment and c.numero_appartement = :numero_appartement;";
				$exec = $this->unPdo->prepare($requete);
				$donnees = array(
					":numero_contrat" => $tab['numero_contrat'],
					":id_batiment" => $tab['id_batiment'],
					":numero_appartement" => $tab['numero_appartement'],
					":date_debut" => $tab['date_debut'],
					":date_fin" => $tab['date_fin']);
				$exec->execute($donnees);
			}
			

			/************* Gestion des Fonctions Propsect ***********/

			public function insertUser($tab) {
				$requete = "INSERT INTO Locataire (id_ville, nom, prenom, adresse, code_postal, telephone, email, mdp, Role) VALUES (:id_ville, :nom, :prenom, :adresse, :code_postal, :telephone, :email, :mdp, 'Locataire')";
				$exec = $this->unPdo->prepare($requete);
				$donnees = array(
					":id_ville" => $tab['id_ville'],
					":nom" => $tab['nom'],
					":prenom" => $tab['prenom'],
					":adresse" => $tab['adresse'],
					":code_postal" => $tab['code_postal'],
					":telephone" => $tab['telephone'],
					":email" => $tab['email'],
					":mdp" => $tab['mdp']
				);
				$exec->execute($donnees);
			}

	/*********************INSERER UN APPARTEMENT***************************/
 		
 		public function selectAllAppartements() {
        $requete = "SELECT * FROM appartement;";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll();
    }

     public function selectCountAppartement() {
    $requete = "SELECT COUNT(*) FROM appartement;";
    $exec = $this->unPdo->prepare($requete);
    $exec->execute();
    return  $exec->fetch(); // Récupère la valeur et la convertit en entier
}
   public function selectCountProprietaire() {
     $requete = "SELECT COUNT(*) from Proprietaire;";
     $exec=$this->unPdo->prepare($requete);
     $exec -> execute();
     return $exec->fetch();
 }

 public function selectCountCDR(){
 	$requete = " SELECT COUNT(*) from contrat_de_reservation;";
 	$exec = $this->unPdo->prepare($requete);
 	$exec ->execute();
 	return $exec->fetch();


 }
			public function insertAppartement($tab) {
        $requete = "INSERT INTO Appartement (id_batiment, numero_appartement, id_ville, id_proprietaire, adresse, code_postal, img1, img2, img3, img4, type, exposition, surface_habitable, surface_balcon, capacite, distance) 
        VALUES (:id_batiment, :numero_appartement, :id_ville, :id_proprietaire, :adresse, :code_postal, :img1, :img2, :img3, :img4, :type, :exposition, :surface_habitable, :surface_balcon, :capacite, :distance)";
        
        $exec = $this->unPdo->prepare($requete);

        $donnees = [
            ":id_batiment" => $tab['id_batiment'],
            ":numero_appartement" => $tab['numero_appartement'],
            ":id_ville" => $tab['id_ville'],
            ":id_proprietaire" => $tab['id_proprietaire'],
            ":adresse" => $tab['adresse'],
            ":code_postal" => $tab['code_postal'],
            ":img1" => $tab['img1'] ?? null,
            ":img2" => $tab['img2'] ?? null,
            ":img3" => $tab['img3'] ?? null,
            ":img4" => $tab['img4'] ?? null,
            ":type" => $tab['type'],
            ":exposition" => $tab['exposition'],
            ":surface_habitable" => $tab['surface_habitable'],
            ":surface_balcon" => $tab['surface_balcon'] ?? null,
            ":capacite" => $tab['capacite'],
            ":distance" => $tab['distance']
        ];

        $exec->execute($donnees);
        return true;

    } 


	public function deleteAppartement($numero_appartement) {
			$requete = "DELETE FROM appartement WHERE numero_appartement = :numero_appartement";
			$exec = $this->unPdo->prepare($requete);
			$donnees = array(":numero_appartement" => $numero_appartement);
			$exec->execute($donnees);
		}

	



/************************************GESTION DES SESSIONS*************************************/


/*********************************  UTILES  *************************************/

//sert a afficher les villes lors de l'inscription client dans c_inscription.php
public function selectAllVille (){
	$requete="select * from Ville;";
	$exec = $this->unPdo->prepare($requete); 
	$exec->execute(); 
	return $exec->fetchAll(); 
}
// afficher les locataires dans contratres
public function selectAllLocataires (){
	$requete="select * from locataire ;";
	$exec = $this->unPdo->prepare($requete); 
	$exec->execute(); 
	return $exec->fetchAll(); 
}

// Sert à afficher les ID des bâtiments lors de la création du contrat de reservation par l'admin
public function selectAllBatiments() {
    $requete = "SELECT ID_BATIMENT FROM batiment;";
    $exec = $this->unPdo->prepare($requete);
    $exec->execute();
    return $exec->fetchAll();
}

 
public function selectAllProprietaires() {
    $requete = "SELECT * FROM Proprietaire;";
    $exec = $this->unPdo->prepare($requete);
    $exec->execute();
    return $exec->fetchAll();
}


public function selectAllContratDeReservation() {
    $requete = "SELECT * FROM contrat_de_reservation;";
    $exec = $this->unPdo->prepare($requete);
    $exec->execute();
    return $exec->fetchAll();
}



//Sert a afficher le bon tarif a la bonne date dans les c_appartement.php

public function selectWhereTarifHaute ($id_batiment,$numero_appartement){
	$requete="SELECT tarif_haute FROM contrat_de_mandat_locatif WHERE :ID_BATIMENT = ID_BATIMENT AND :NUMERO_APPARTEMENT = NUMERO_APPARTEMENT;";
	$exec = $this->unPdo->prepare($requete);  
	$donnees = array(":ID_BATIMENT"=>$id_batiment, ":NUMERO_APPARTEMENT"=>$numero_appartement);
	$exec->execute($donnees); 
	return $exec->fetch(); 
}


public function selectWhereTarifMoyen($id_batiment, $numero_appartement) {
	$requete = "SELECT tarif_moyen FROM contrat_de_mandat_locatif WHERE :id_batiment = ID_BATIMENT AND :numero_appartement = NUMERO_APPARTEMENT;";
	$exec = $this->unPdo->prepare($requete);
	$donnees = array(":id_batiment" => $id_batiment, ":numero_appartement" => $numero_appartement);
	$exec->execute($donnees);
	return $exec->fetch();
}

public function selectWhereTarifBasse($id_batiment, $numero_appartement) {
	$requete = "SELECT tarif_basse FROM contrat_de_mandat_locatif WHERE :id_batiment = ID_BATIMENT AND :numero_appartement = NUMERO_APPARTEMENT;";
	$exec = $this->unPdo->prepare($requete);
	$donnees = array(":id_batiment" => $id_batiment, ":numero_appartement" => $numero_appartement);
	$exec->execute($donnees);
	return $exec->fetch();
}
	

	public function selectWhereAppartement($id_batiment, $numero_appartement) {
		$requete = "SELECT * FROM appartement WHERE :id_batiment = ID_BATIMENT AND :numero_appartement = NUMERO_APPARTEMENT;";
		$exec = $this->unPdo->prepare($requete);
		$donnees = array(":id_batiment"=> $id_batiment,":numero_appartement"=>$numero_appartement);
		$exec->execute($donnees);
		return $exec->fetch();}
	
	// procédure stockée pour que vérifier que l'appartement existe bel et bien dans la liste des appartements
	// (évite que l'utilisateur modifie manuellement le get)

	public function verifierAppartement($id_batiment, $numero_appartement){
		$requete = "CALL verifierAppartement(:id_batiment, :numero_appartement, @existe);";
		$exec = $this->unPdo->prepare($requete);
		$donnees = array(":id_batiment"=> $id_batiment,":numero_appartement"=>$numero_appartement);
		$exec->execute($donnees);
		$resultat=$this->unPdo->query("SELECT @existe as 'existe';")->fetch();
		return $resultat['existe'];

	}

	public function verifierIdBat(){
		$requete = "SELECT ID_BATIMENT FROM appartement;";
		$exec = $this->unPdo->prepare($requete);
		$exec->execute();
		return $exec->fetchAll();
	}

	public function verifierAppart(){
		$requete = "SELECT NUMERO_APPARTEMENT FROM appartement;";
		$exec = $this->unPdo->prepare($requete);
		$exec->execute();
		return $exec->fetchAll();
	}

	public function verifConnexion($email,$mdp) {
		$requete = "select * from user where email = :email and mdp= :mdp;";
		$exec = $this->unPdo->prepare($requete);
		$donnees = array(":email" => $email, "mdp"=>$mdp );
		$exec-> execute($donnees);
		return $exec->fetch();
	}



	public function verifierPrixHaute($id_batiment,$numero_appartement) {
		$requete = "SELECT tarif_haute FROM contrat_de_mandat_locatif where id_batiment = :id_batiment and numero_appartement = :numero_appartement;";
		$exec = $this->unPdo->prepare($requete);
		$donnees = array(":id_batiment" => $id_batiment, ":numero_appartement" => $numero_appartement);
		$exec->execute($donnees);
		return $exec->fetch();}

	public function verifierPrixMoyen($id_batiment,$numero_appartement) {
		$requete = "SELECT tarif_moyen FROM contrat_de_mandat_locatif WHERE :id_batiment = id_batiment and :numero_appartement = numero_appartement;";	
		$exec = $this->unPdo->prepare($requete);
		$donnees = array(":id_batiment" => $id_batiment, ":numero_appartement" => $numero_appartement);
		$exec->execute($donnees);
		return $exec->fetch();}
	
	public function verifierPrixBas($id_batiment,$numero_appartement) {
		$requete = "SELECT tarif_basse FROM contrat_de_mandat_locatif WHERE :id_batiment = id_batiment and :numero_appartement = numero_appartement;";
		$exec = $this->unPdo->prepare($requete);
		$donnees = array(":id_batiment" => $id_batiment, ":numero_appartement" => $numero_appartement);
		$exec->execute($donnees);
		return $exec->fetch();}

		public function getSelHashé(){
			$requete = "SELECT grain_de_sel from SALIERE";
			$exec = $this->unPdo->prepare($requete);
			$exec->execute();
			return $exec->fetch();
		}

		// Récupérer un utilisateur à partir de son email
		public function getUser($email) {
			$requete = "SELECT * FROM user WHERE EMAIL = :email";
			$exec = $this->unPdo->prepare($requete);
			$exec->execute(['email' => $email]);
			return $exec->fetch(PDO::FETCH_ASSOC);
		}
	
		// Sauvegarder le token de réinitialisation en base (table « password_resets »)
		public function saveResetToken($iduser, $token, $expiration) {
			// On utilise ici un INSERT avec UPDATE en cas de doublon (selon la structure de votre table)
			$requete = "INSERT INTO password_resets (ID_USER, token, expiration)
					VALUES (:id_user, :token, :expiration)
					ON DUPLICATE KEY UPDATE token = :token, expiration = :expiration";
			$exec = $this->unPdo->prepare($requete);
			$exec->execute([
				'id_user'    => $iduser,
				'token'      => $token,
				'expiration' => $expiration
			]);
		}
	
		// Récupérer les informations liées à un token
		public function getUserByToken($token) {
			$requete = "SELECT pr.ID_USER, pr.token, pr.expiration, u.PRENOM, u.NOM 
					FROM password_resets pr
					JOIN user u ON pr.ID_USER = u.ID_USER
					WHERE token = :token";
			$exec = $this->unPdo->prepare($requete);
			$exec->execute(['token' => $token]);
			return $exec->fetch(PDO::FETCH_ASSOC);
		}
	
		// Mettre à jour le mot de passe de l'utilisateur
		public function updateUserPassword($userId, $hashedPassword) {
			$requete = "UPDATE user SET MDP = :mdp WHERE ID_USER = :id_user";
			$exec = $this->unPdo->prepare($requete);
			$exec->execute([
				'mdp'     => $hashedPassword,
				'id_user' => $userId
			]);
		}
	
		// Supprimer le token après utilisation
		public function deleteResetToken($userId) {
			$requete = "DELETE FROM password_resets WHERE ID_USER = :id_user";
			$exec = $this->unPdo->prepare($requete);
			$exec->execute(['id_user' => $userId]);
		}


		public function verifierNumeroContrat($id_user) {
			$requete = 'SELECT numero_contrat FROM contrat_de_reservation WHERE id_locataire = :id_locataire';
			$exec = $this->unPdo->prepare($requete);
			$exec->execute([':id_locataire' => $id_user]);
			return $exec->fetchAll();
	}

		public function verifierAppartLocataire($id_user){
			$requete = "SELECT id_batiment, numero_appartement FROM contrat_de_reservation WHERE id_locataire = :id_locataire";
			$exec = $this->unPdo->prepare($requete);
			$exec->execute([':id_locataire' => $id_user]);
			return $exec->fetchAll();
		}
		public function getUserByEmail($email) {
    $sql = "SELECT * FROM user WHERE EMAIL = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    return $result->fetch_assoc(); // Retourne les données si trouvées, sinon NULL
}


	

	public function selectContratParNumero($numero_contrat){
		$requete = "SELECT apt.*, c.* from Contrat_de_reservation c join appartement apt on c.id_batiment = apt.id_batiment and c.numero_appartement=apt.numero_appartement where c.numero_contrat = :numero_contrat";
		$exec = $this->unPdo->prepare($requete);
		$exec->execute([":numero_contrat"=> $numero_contrat]);
		return $exec->fetch();}
	
}

	?> 
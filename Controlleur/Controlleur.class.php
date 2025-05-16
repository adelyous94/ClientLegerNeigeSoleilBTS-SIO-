    <?php 
   require_once __DIR__ . "/../Modele/Modele.class.php";
    class Controleur {
        private $unModele;

        public function __construct (){
            $this->unModele = new Modele();
        }

        /******************* Gestion des contrats de réservation **********************/
        
        public function selectContratDeReservation($filtre = null){
            return $this->unModele->selectContratDeReservation($filtre);
        }


        public function insertContratDeReservation($tab){
            if ($this->verifDonnees($tab)) {
                $this->unModele->insertContratDeReservation($tab);
                return true;
            }
            return false;
        }

        public function insertContratDeReservationLocataire($tab) {
                return $this->unModele->insertContratDeReservationLocataire($tab);
            }

        public function insertSemainesLouees($tabl) {
                $this->unModele->insertSemainesLouees($tabl);
        }

        public function updateContratDeReservation($tab){
            $this->unModele->updateContratDeReservation($tab);
        }

        public function deleteContratDeReservation($numero_contrat){
            $this->unModele->deleteContratDeReservation($numero_contrat);
        }

        /******************* Gestion des locataires **********************/

        public function selectWhereLocataire($id_locataire){
            return $this->unModele->selectWhereLocataire($id_locataire);
        }

        public function insertLocataire($tab){
            if ($this->verifDonnees($tab)) {
                $this->unModele->insertLocataire($tab);
                return true;
            }
            return false;
        }

        public function updateLocataire($tab){
            $this->unModele->updateLocataire($tab);
        }

        public function deleteLocataire($id_locataire){
            $this->unModele->deleteLocataire($id_locataire);
        }

        public function copyLocataire($id_locataire){
            $this->unModele->copyLocataire($id_locataire);
        }

        /******************* Gestion des locations **********************/

        public function selectLocations($filtre = null){
            return $this->unModele->selectLocations($filtre);
        }

        public function deleteLocation($id_batiment, $numero_appartement, $numero_contrat, $id_locataire){
            $this->unModele->deleteLocation($id_batiment, $numero_appartement, $numero_contrat, $id_locataire);
        }

        /******************* Gestion des semaines louées **********************/

        public function updateSemainesLouees($tab){
            $this->unModele->updateSemainesLouees($tab);
        }

        /******************* Gestion des annonces pour propriétaires **********************/

        public function selectAnnoncesProprietaire($id_proprietaire){
            return $this->unModele->selectAnnoncesProprietaire($id_proprietaire);
        }

        public function selectContratsProprietaire($id_proprietaire){
            return $this->unModele->selectContratsProprietaire($id_proprietaire);
        }

        /******************* Gestion des annonces pour locataires **********************/

        public function selectAnnonces($ville, $type, $debut, $fin){
            return $this->unModele->selectAnnonces($ville,$type, $debut,$fin);
        }

        public function selectReservationsLocataire($id_locataire){
            return $this->unModele->selectReservationsLocataire($id_locataire);
        }

        public function selectLaReservation($numero_contrat,$id_batiment,$numero_appartement) {
            return $this->unModele->selectLaReservation($numero_contrat,$id_batiment,$numero_appartement);
        }

        public function verifierAppartLocataire($id_user){
            return $this->unModele->verifierAppartLocataire($id_user);
        }

            
        public function verifierNumeroContrat($id_user){
            return $this->unModele->verifierNumeroContrat($id_user);
        }

        public function selectAppartementEkip($id_batiment, $numero_appartement) {
            return $this->unModele->selectAppartementEkip($id_batiment, $numero_appartement);
        }

        public function deleteReservation($numero_contrat){
            $this->unModele->deleteReservation($numero_contrat);
        }

        public function verifierLocation($numero_contrat){
            return $this->unModele->verifierLocation($numero_contrat);
        }

        public function updateContratDeReservationLocataire($tab) {
             $this->unModele->updateContratDeReservationLocataire($tab);
        }

        /******************* Gestion des utilisateurs **********************/

        public function insertUser($tab){
            if ($this->verifDonnees($tab)) {
                $this->unModele->insertUser($tab);
                return true;
            }
            return false;
        }

       public function verifConnexion($email, $mdp){
       return $this->unModele->verifConnexion($email, $mdp);
        }

        public function getUserByEmail($email){
            return $this->unModele->getUserByEmail($email);
        }
        /******************* Utilitaires **********************/

        public function verifDonnees($tab){
            $verif = true; 
            foreach ($tab as $cle => $valeur) {
                if($valeur == " " || $valeur == null){
                    $verif = false; 
                    break; 
                }
            }
            return $verif; 
        }
    

/*********************** Appartement*******************************/
 
    public function insertAppartement($tab){
            $this->unModele->insertAppartement($tab) ;
          }
    
    public function deleteAppartement($numero_appartement) {
        $this->unModele->deleteAppartement($numero_appartement);
    }
   
/*********************************************************************************/
    public function selectAllProprietaires() {
        return $this->unModele->selectAllProprietaires();
    }

    public function selectWhereTarifHaute($id_batiment, $numero_appartement) {
        return $this->unModele->selectWhereTarifHaute($id_batiment, $numero_appartement);
    }

    public function selectWhereTarifMoyen($id_batiment, $numero_appartement) {
        return $this->unModele->selectWhereTarifMoyen($id_batiment, $numero_appartement);
    }

    public function selectWhereTarifBasse($id_batiment, $numero_appartement) {
        return $this->unModele->selectWhereTarifBasse($id_batiment, $numero_appartement);
    }

    public function selectWhereAppartement($id_batiment, $numero_appartement) {
        return $this->unModele->selectWhereAppartement($id_batiment, $numero_appartement);
    }

    public function verifierAppartement($id_batiment, $numero_appartement){
        return $this->unModele->verifierAppartement($id_batiment, $numero_appartement);}

    /***************SELECT ALL FONCTION ************************/


    public function selectAllVille(){
        return $this->unModele->selectAllVille();
    }   

    public function selectCountAppartement() {
        return $this->unModele->selectCountAppartement();
    }

      public function selectAllLocataires(){
        return $this->unModele->selectAllLocataires();
    }   

    public function selectCountProprietaire() {
        return $this->unModele->selectCountProprietaire();
    }

    public function selectCountCDR(){
        return $this->unModele->selectCountCDR();
    }

    public function selectAllBatiments(){
        return $this->unModele->selectAllBatiments();
    }   

       public function selectAllAppartements(){
        return $this->unModele->selectAllAppartements();

    }

    public function selectAllContratDeReservation(){
     return $this->unModele->selectAllContratDeReservation();
    
    }

    
    public function verifierIdBat(){
        return $this->unModele->verifierIdBat();
    }

    public function verifierAppart(){
        return $this->unModele->verifierAppart();
    }

    public function verifierPrixHaute( $id_batiment, $numero_appartement){
        return $this->unModele->verifierPrixHaute($id_batiment, $numero_appartement);
    }

    public function verifierPrixMoyen( $id_batiment, $numero_appartement){
        return $this->unModele->verifierPrixMoyen($id_batiment, $numero_appartement);
    }

    public function verifierPrixBas( $id_batiment, $numero_appartement){
        return $this->unModele->verifierPrixBas($id_batiment, $numero_appartement);
    }

    public function getSelHashé(){
        return $this->unModele->getSelHashé();
    }
    public function getUser($email) {
        return $this->unModele->getUser($email);
    }

    public function saveResetToken($iduser, $token, $expiration) {
        return $this->unModele->saveResetToken($iduser, $token, $expiration);
    }

    public function getUserByToken($token) {
        return $this->unModele->getUserByToken($token);
    }

    public function updateUserPassword($userId, $hashedPassword) {
        $this->unModele->updateUserPassword($userId, $hashedPassword);
    }

    public function deleteResetToken($userId) {
        $this->unModele->deleteResetToken($userId);
    }

    public function selectContratParNumero($numero_contrat){
        return $this->unModele->selectContratParNumero($numero_contrat);}


}
   
?>
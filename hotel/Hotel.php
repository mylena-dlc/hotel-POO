<?php

class Hotel {

    private string $nom;
    private string $adresse;
    private string $codePostal;
    private string $ville;
    private array $chambres;
    private array $reservations;

    public function __construct(string $nom, string $adresse, string $codePostal, string $ville) {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->ville = $ville;

        $this->chambres = [];
        $this->reservations = [];
    }

// *************************************** Getters / Setters ***************************************
    public function getNom():string{
        return $this->nom;
    }
    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function getAdresse():string{
        return $this->adresse;
    }
    public function setAdresse(string $adresse) {
        $this->adresse = $adresse;
    }

    public function getCodePostal():string{
        return $this->codePostal;
    }
    public function setCodePostal(string $codePostal) {
        $this->codePostal = $codePostal;
    }

    public function getVille():string{
        return $this->ville;
    }
    public function setVille(string $ville) {
        $this->ville = $ville;
    }

// ************************************************************************************************

    // fonction pour ajouter des chambres à une réservation
    public function addChambres(Chambre $chambre) {
        $this->chambres[] = $chambre;
    }

    // fonction pour ajouter l'hôtel à une réservation
    public function addHotel(Reservation $reservation) {
        $this->reservations[] = $reservation;
    }

    // fonction pour afficher le nombre de chambres
    public function afficherNbChambres() {
        echo "Nombre de chambres : ";
        $nbChambre = count($this->chambres);
        echo $nbChambre;
        }

    // calcul nombre de chambres réservées
    public function afficherChambresReservees(){
        $nbChambreReservee = 0;
        echo "Nombre de chambres réservées : ";
        foreach($this->chambres as $chambre) {
            if($chambre->getStatut() == false){
                $nbChambreReservee++;
            }
        }
        echo $nbChambreReservee;
    }

    // calcul nombre de chambres disponibles
    public function afficherChambresDispo(){
        $nbChambresDispo = 0;
        echo "Nombre de chambres disponibles : ";
        foreach($this->chambres as $chambre) {
            if($chambre->getStatut() == true) {
                $nbChambresDispo++;
            } 
        }
        echo $nbChambresDispo;
    }

    // fonction pour afficher les réservations d'un hôtel
    public function afficherReservationsHotel() {
		echo "<p class='hotel-nom'> Réservation de l'hôtel " . $this->getNom() . " " . $this->getVille() . "</p>";
		$totalPrix = 0;
		if(count($this->reservations) == 0){
			echo "<p class='paragraphe'> Aucune réservation ! </p> <br>";
		} else {
			echo "<p class='reservations'>".count($this->reservations) . " réservation(s) </p>";
			foreach($this->reservations as $reservation) {
				echo "<p class='paragraphe'> " . $reservation->getClient() . " - Chambre " . $reservation->getChambre()->getNumero() . " - du " . $reservation->getDateDebut()->format("d-m-Y" ) . " au " . $reservation->getDateFin()->format("d-m-Y" ) . "<br>" ;
			}  
		}
    }

    // fonction pour afficher le statut des chambres d'un hôtel
    public function afficherStatutsChambres() { 
        echo "<p class='titre-tableau'> Satuts des chambres de <em>" . $this->getNom() . " " . $this->getVille() . "<em> </p>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Chambre</th>"; 
        echo "<th> Prix </th>";
        echo "<th> Wifi </th>";
        echo "<th> Etat </th>";
        echo "</tr>";
    foreach($this->chambres as $chambre) {
        echo "<tr> <td> Chambre " . $chambre->getNumero() . "</td>  
         <td> " . $chambre->getPrix() . " € </td> 
         <td> " . ($chambre->getWifi() ? "<p><i class='fa-solid fa-wifi'></i></p>" : " ") . "</td>
         <td> " . ($chambre->getStatut() ? "<p class='disponible-tableau'>DISPONIBLE</p>" : "<p class='reservee-tableau'>RÉSERVÉE</p>") . "</td> </tr> " ;
        }
        echo "</table>";
    }

    // fonction toString
    public function __toString() {
        return "<p class='hotel-nom-card'> " . $this->getNom() . "  " . $this->getVille() . " </p> " . $this->getAdresse() . "<br> " . $this->getCodePostal(). " " . $this->getVille()  ;
    }
}
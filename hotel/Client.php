<?php

class Client {

    private string $nom;
    private string $prenom;
    private array $reservations;

    public function __construct(string $nom, string $prenom) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->reservations = [];
    }

// *************************************** Getters / Setters ***************************************

    public function getNom():string{
        return $this->nom;
    }
    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function getPrenom():string{
        return $this->prenom;
    }
    public function setPrenom(string $prenom) {
        $this->prenom = $prenom;
    }

// *****************************************************************************************************
    
    // fonction pour ajouter des réservations à un client
    public function addReservationsClient(Reservation $reservation) {
        $this->reservations[] = $reservation;
    }


    // fonction pour calculer prix reservation
    public function getPrixTotal() {
        foreach($this->reservations as $reservation) {
        $prixTotal = $reservation->$this->chambre->getPrix() * $reservation->nbJours->format("%d");
        echo "prix total:". $prixTotal ;
        }
    }

    // fonction pour afficher les réservations d'un client
    public function afficherReservationClient() {
		echo "<p class='hotel-nom'>Réservation de $this </p>";
		$totalPrix = 0;
		if(count($this->reservations) == 0){
			echo "Aucune réservation !<br>";
		} else {
			echo "<p class='reservations'>" . count($this->reservations) . " réservation(s) </p>";
			foreach($this->reservations as $reservation) {
				$totalPrix += $reservation->getChambre()->getPrix() * $reservation->getNbJours();
                echo "<p class='paragraphe'><em> Hôtel : " . $reservation->getHotel()->getNom() . " " . $reservation->getHotel()->getVille() . "</em> / " . $reservation->getChambre() . " du ". $reservation->getDateDebut()->format("d-m-Y") . " au " . $reservation->getDateFin()->format("d-m-Y") . "</p>" ;	
			}
			echo "<p class='paragraphe'> Total : ".$totalPrix." € </p>";
           
		}
    }

    // fonction pour annuler une réservation 
    public function annulerReservation() {
        foreach($this->reservations as $reservation) {
            if($reservation->getChambre()->setStatut(true)) {
                $reservation->getChambre()->setStatut(false);
                unset($this->reservations[$reservation]);
            }  
         }
        
        echo " La réservation " . $reservation . " a été annulée. <br>";
    }

    // fonction toString
    public function __toString() {
        return  $this->getPrenom() . " " . $this->getNom();
    }
}





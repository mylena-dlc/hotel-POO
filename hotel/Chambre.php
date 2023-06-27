<?php

class Chambre {

    private string $numero;
    private bool $wifi;
    private float $prix;
    private int $lits;
    private Hotel $hotel;
    private array $reservations;
    private bool $statut;

    public function __construct(string $numero, bool $wifi, float $prix, int $lits, Hotel $hotel) {
        $this->numero = $numero;
        $this->wifi = $wifi;
        $this->prix = $prix;
        $this->lits = $lits;
        $this->hotel = $hotel;

        $hotel->addChambres($this);
        $this->reservations = [];
        $this->statut = true;
    }

// *************************************** Getters / Setters ***************************************
    public function getNumero():string{
        return $this->numero;
    }
    public function setNumero(string $numero) {
        $this->numero = $numero;
    }

    public function getWifi():bool{
        return $this->wifi;
    }
    public function setWifi(bool $wifi) {
        $this->wifi = $wifi;
    }

    public function getPrix():float{
        return $this->prix;
    }
    public function setPrix(float $prix) {
        $this->prix = $prix;
    }

    public function getLits():int{
        return $this->lits;
    }
    public function setLits(int $lits) {
        $this->lits = $lits;
    }

    public function getStatut():bool{
        return $this->statut;
    }
    public function setStatut(bool $statut) {
        $this->statut = $statut;
    }

// *******************************************************************************************


    // fonction pour ajouter des réservations à une chambre
    public function addReservationsChambre(Reservation $reservation) {
        $this->reservations[] = $reservation;
    }

    // fonction pour afficher les réservations d'une chambre
    public function afficherReservations() {
        if(empty($this->reservations)) {
            echo "Aucune réservation !";
        } else {
            foreach($this->reservations as $reservation) {
            echo $reservation;
        } }
    }

    // fonction toString
    public function __toString() {
        return " Chambre " . $this->numero . " (" . $this->lits . " lits - " . $this->getPrix() . " € - Wifi: " . ($this->wifi ? "oui" : "non") . ") ";
    }

}
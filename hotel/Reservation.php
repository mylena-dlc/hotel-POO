<?php

class Reservation {

    private Client $client;
    private Chambre $chambre;
    private Hotel $hotel;
    private DateTime $dateDebut;
    private DateTime $dateFin;

    public function __construct(Client $client, Chambre $chambre, Hotel $hotel, string $dateDebut, string $dateFin) {
        $this->client = $client;
        $client->addReservationsClient($this);

        $this->chambre = $chambre;
        $chambre->addReservationsChambre($this);

        $this->hotel = $hotel;
        $hotel->addHotel($this);

        $this->chambre->setStatut(false); // le statut par défaut d'une chambre du tableau réservation est "réservée"
        
        $this->dateDebut = new DateTime($dateDebut);
        $this->dateFin = new DateTime($dateFin);
    }

// *************************************** Getters / Setters ***************************************

    public function getClient():Client{
        return $this->client;
    }
    public function setClient(Client $client) {
        $this->client = $client;
    }

    public function getChambre():Chambre{
        return $this->chambre;
    }
    public function setChambre(Chambre $chambre) {
        $this->chambre = $chambre;
    }

    public function getHotel():Hotel{
        return $this->hotel;
    }
    public function setHotel(Hotel $hotel) {
        $this->hotel = $hotel;
    }

    public function getDateDebut():DateTime{
        return $this->dateDebut;
    }
    public function setDateDebut(string $dateDebut) {
        $this->dateDebut = new DateTime($dateDebut);
    }

    public function getDateFin():DateTime{
        return $this->dateFin;
    }
    public function setDateFin(string $dateFin) {
        $this->dateFin = new DateTime($dateFin);
    }

// ***********************************************************************************************


    // fonction pour calculer le nombre de jour(s) d'une réservation 
    public function getNbJours() {
        $nbJours = $this->dateDebut->diff($this->dateFin);
        return  $nbJours->format("%d");
    }

    // fonction toString
    public function __toString(){
        return $this->client . " - Chambre " . $this->chambre->getNumero(). " - du ". $this->dateDebut->format("d-m-Y" ). " au " . $this->dateFin->format("d-m-Y" ) . "<br>" ;
    }

}
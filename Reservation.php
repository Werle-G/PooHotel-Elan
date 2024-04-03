<?php

class Reservation{

    private Chambre $chambre;
    private Client $client;
    private Hotel $hotel;
    private DateTime $date_debut;
    private DateTime $date_fin;

    
//--------------construct--------------

    public function __construct(Chambre $chambre, Client $client, Hotel $hotel, string $date_debut, string $date_fin){
        
        $this->chambre = $chambre;
        $this->client = $client;
        $this->hotel = $hotel;

        $this->date_debut = new DateTime($date_debut);
        $this->date_fin = new DateTime($date_fin);

        $this->chambre->ajouter_reservation($this);
        $this->client->ajouter_reservation($this);
        $this->hotel->ajouter_reservation($this);
    }

//---------------methode-----------------

    public function jour(){
    
        $jour = $this->date_debut->diff($this->date_fin);
        return $jour->format('%a') + 1 ;
    }

//----------------getters-----------------

    public function getChambre(){
        return $this->chambre;
    }

    public function getClient(){
        return $this->client;
    }

    public function getHotel(){
        return $this->hotel;
    }

    public function getDate_debut(){
        return $this->date_debut;
    }

    public function getDate_fin(){
        return $this->date_fin;
    }

    
//-----------------setters----------------

    public function setDate_debut($date_debut){
        $this->date_debut = $date_debut;
    }

    public function setDate_fin($date_fin){
        $this->date_fin = $date_fin;
    }
    
    //-----------------methode-----------------

    public function date_entiere(){
        return " du {$this->date_debut->format('d-m-Y')} au
        {$this->date_fin->format('d-m-Y')}";
    }

    public function info(){
        echo  "{$this->getHotel()}";
    }

}
?>
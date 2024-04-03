<?php

class Chambre{

    private int $numero;

    private int $nb_lit;

    private bool $wifi = false;

    private float $tarif;

    private bool $statut;

    private Hotel $hotel;

    private array $reservations;

//--------------construct--------------

    public function __construct(int $numero, int $nb_lit, bool $wifi, float $tarif, bool $statut, Hotel $hotel){

        $this->numero = $numero;
        $this->nb_lit = $nb_lit;
        $this->wifi = $wifi;
        $this->tarif = $tarif;
        $this->statut = $statut;
        $this->hotel = $hotel;

        $this->reservations = [];

        $this->hotel->ajouter_chambre($this);
    }

//----------------methode-----------------


    public function ajouter_reservation(Reservation $reservation){
        $this->reservations[] = $reservation;
    }


    public function __toString(){
        return "{$this->numero}";
    }


    public function chambre_statut(){

        echo "Chambre : $this->numero || Prix : $this->tarif €  || Wifi : {$this->etat_wifi()} || Etat : {$this->etat_statut()}";
        }

    public function info(){

        echo "Chambre : {$this->getNumero()} <br>
        - Nb Lit(s) : {$this->getNb_lit()} <br>
        - Wifi : {$this->etat_wifi()} <br>
        - Prix : {$this->getTarif()} € <br>
        - Etat : {$this->etat_statut()} <br>
        - Hotel : {$this->getHotel()} <br>
        Reservation : ";

        foreach($this->reservations as $reservation) {
            echo "{$reservation->info($this)}";
        }

    }



    public function etat_wifi()
    {
        if($this->getWifi()) {    //  true ( wifi )
            return '<div class="wifi"></div>';
        }
        else{
            return "";
        }
    }

    public function etat_statut()
    {
        if($this->getStatut()){      //  true ( disponible )
            return '<div class = "dispo"> ' .  'Disponible ';
        }
        else{
            return '<div class = "ocup"> ' .  'Réservée';
        }
    }




//----------------getters-----------------

    public function getNumero(){
        return $this->numero;
    }

    public function getNb_lit(){
        return $this->nb_lit;
    }

    public function getWifi(){
        return $this->wifi;
    }

    public function getTarif(){
        return $this->tarif;
    }

    public function getStatut(){
        return $this->statut;
    }

    public function getHotel(){
        return $this->hotel;
    }

//-----------------setters----------------

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setNb_lit($nb_lit){
        $this->nb_lit = $nb_lit;
    }

    public function setWfi($wifi){
        return $this->wifi = $wifi;
    }

    public function setTarif($tarif){
        return $this->tarif = $tarif;
    }

    public function setStatut($statut){
        return $this->statut = $statut;
    }


}
?>
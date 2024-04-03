<?php

class Client{

    private string $nom;
    private string $prenom;
    private array $reservations;


//--------------construct----------------

    public function __construct(string $nom, string $prenom){
        $this->nom = $nom;
        $this->prenom = $prenom;

        $this->reservations = [];
    }


// ------------------methode----------------

    public function ajouter_reservation(Reservation $reservation){

        $this->reservations[] = $reservation;
    }

    // public function info(){
    //     echo " $this";
    //     foreach ($this->reservations as $reservation){
    //         echo "- {$reservation->info($this)";
    //     }
    // }

    public function __toString(){
        return "{$this->nom} {$this->prenom}";
    }

    public function reservation_client() {
        echo '<h2>Réservations de '.$this->nom .' '. $this->prenom .' :</h2>';
        echo '<div class = "dispo"> ' . $this->nb_reservation() .' RESERVATIONS<br></div>';
        foreach ($this->reservations as $reservation) {
            echo " Hotel : {$reservation->getHotel()->fullname()} / Chambre : {$reservation->getChambre()->getNumero()} ({$reservation->getChambre()->getNb_lit()} lit(s) - {$reservation->getChambre()->getTarif()} € - Wifi : {$reservation->getChambre()->etat_wifi()}) {$reservation->date_entiere()}<br> ";
            }
        echo "Total : {$this->prix_total()} € <br>";
    }

    
    public function prix_total(){
        foreach ($this->reservations as $reservation) {
            $prix = $reservation->jour()* $reservation->getChambre()->getTarif();
        }
        return $prix_total = $this->nb_reservation() * $prix;
    }


    public function nb_reservation() {
        $nb = 0;

        foreach ($this->reservations as $reservation) {
            $nb++;
        }
        return $nb;
    }

    // public function jour_passer() {
    //     $jour = 0;
        
    //     foreach ($this->reservations as $reservation) {
    //         echo $reservation->getDate_debut();
    //     }
    // }

    // public function jour(){
    //     foreach($this->$reservations as $reservation) {
    //         echo "{$reservation->jour($this)}";
    //     }
    // }

    // public function prix_total() {
    //     $total = 0;
    //     foreach
    // }

//----------------getters-----------------

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }
//-----------------setters----------------

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

}

?>
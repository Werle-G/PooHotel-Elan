

<?php

class Hotel{

    private string $nom;

    private string $ville;

    private int $etoile;

    private int $nb_chambre;

    private array $chambres;

    private array $reservations;

//-----------------------construct------------------------

    public function __construct(string $nom, string $ville, int $etoile, int $nb_chambre){
        $this->nom = $nom;
        $this->ville = $ville;
        $this->etoile = $etoile;
        $this->nb_chambre = $nb_chambre;

        $this->chambres = [];
        $this->reservations = [];
    }

//-----------------------METHODES----------------------------

    public function ajouter_chambre(Chambre $chambre){
        $this->chambres[] = $chambre;
    }

    public function ajouter_reservation(Reservation $reservation){
        $this->reservations[] = $reservation;
    }

    //----------fonction convertir int en étoile-------------

    public function convertir_etoile(){
        $etoileString = '';

        for($i = 0; $i < $this->getEtoile(); $i++){
            $etoileString .= "*";
        }
        return $etoileString;
    }

    //----------fonction calcul chambres réservées------------- 

    // public function nb_chambre_reserver() {             
    //     $chambres_reservees = 0;

    //     foreach ($this->chambres as $chambre) {
    //         if ($chambre->getStatut() == false){
    //             $chambres_reservees++;
    //         }
    //     }
    //     return $chambres_reservees;
    // }

    public function nb_chambre_reserver() {             
        $chambres_reservees = 0;

        foreach($this->reservations as $reservation){
            $reservation->getChambre()->setStatut(false);
            $chambres_reservees++;
        }
        return $chambres_reservees;
    }


    public function info(){
        $chambres_reservees = $this->nb_chambre_reserver();
        $chambres_disponibles = $this->nb_chambre - $chambres_reservees;

        echo "<h2> L'hôtel $this </h2>";
        echo "Nb de chambres : $this->nb_chambre <br>
        Nb de chambres réservées : $chambres_reservees <br>
        Nb de chambres disponible : $chambres_disponibles <br>";
    }

    // public  function avoir_statut(){
    //     echo "Statuts des chambres de $this <br>";
    //     foreach($this->chambres as $chambre) {
    //         echo "{$chambre->chambre_statut($this)} <br>";
    //     }
    // }

    public  function avoir_statut(){

        // <thead><tbody><tfoot>     Le tag <thead> est utilisé avec les tag <tbody> <tfoot> pour séparer le contenu de la table en blocs logiques - en-tête, corps et pied de page/ par défaut n'affecte pas l'apparence externe de la table mais peut être personnalisé  avec css.

        //<tr> définit une ligne de cellules dans un tableau.
        //<th> définit une cellule d'un tableau comme une cellule d'en-tête pour un groupe de cellule
        // <td> définit une cellule d'un tableau qui contient des données

        echo "<h2>Statuts des chambres de $this </h2> ";
        echo '<table>'; 
        echo '<thead><tr><th>CHAMBRE</th><th>PRIX</th><th>WIFI</th><th>ETAT</th></tr></thead>'; 
        echo '<tbody>'; 
        foreach($this->chambres as $chambre) {    
                                              
            echo '<tr><td>  Chambre ' . $chambre->getNumero($this) . '</td><td> '. $chambre->getTarif($this) . '€ </td><td> '. $chambre->etat_wifi($this) . ' </td><td>'. $chambre->etat_statut($this) . ' </div></td></tr>'; 
                                                                
        }
        echo'<tbody>';      
        echo '</table>';                                           
    }
    

    public function reservation(){
        echo "<h2>Reservations de l'Hôtel $this </h2>";
        if ($this->reservations == null){
            echo "Aucune réservation !<br>";
        }
        else{
        echo '<div class = "dispo"> ' . $this->nb_reservation() .' RESERVATIONS<br></div>';
        foreach ($this->reservations as $reservation){
            echo "{$reservation->getClient($this)} - Chambre {$reservation->getChambre($this)}
            - {$reservation->date_entiere($this)} <br>";
        }
    }
        

    }   

    public function nb_reservation() {   //-------Calculer nombre de reservation hotel
        $nb = 0;

        foreach ($this->reservations as $reservation) {
            $nb++;
        }
        return $nb;
    }

    
    public function __toString(){
        return "{$this->nom} {$this->convertir_etoile()} {$this->ville}";
    }

    public function fullname(){
        return "{$this->nom} {$this->convertir_etoile()} {$this->ville}";
    }

    
//----------------getters-----------------

    public function getNom(){
        return $this->nom;
    }

    public function getVille(){
        return $this->ville;
    }

    public function getEtoile(){
        return $this->etoile;
    }

    public function getNb_chambre(){
        return $this->nb_chambre;
    }
    
//-----------------setters----------------

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setVille($ville){
        $this->ville = $ville;
    }

    public function setEtoile($etoile){
        $this->etoile = $etoile;
    }

    public function setNb_chambre($nb_chambre){
        $this->nb_chambre = $nb_chambre;
    }
}
?>
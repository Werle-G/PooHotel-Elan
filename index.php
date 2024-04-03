<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <title>Hotel</title>
</head>
<body>
    <article>
<?php
require 'Hotel.php';
require 'Chambre.php';
require 'Reservation.php';
require 'Client.php';

$hotel1 = new Hotel("Hilton", "Strasbourg", 4, 30);
$hotel2 = new Hotel("Regent", "Paris", 4, 20);

$chambre1 = new Chambre(1, 2, false, 120, true, $hotel1);
$chambre2 = new Chambre(2, 1, false, 120, true, $hotel1);
$chambre3 = new Chambre(3, 2, false, 120, true, $hotel1);
$chambre4 = new Chambre(4, 2, false, 120, true, $hotel1);

$chambre16 = new Chambre(16, 1, true, 300, true, $hotel1);
$chambre17 = new Chambre(17, 1, true, 300, true, $hotel1);
$chambre18 = new Chambre(18, 1, true, 300, true, $hotel1);
$chambre19 = new Chambre(19, 2, true, 300, true, $hotel1);

$client1 = new Client("Werle", "Guillaume");
$client2 = new Client("Werle", "Camille");

$reservation1 = new Reservation($chambre17, $client1, $hotel1, "01-01-2021", "03-01-2021");
$reservation2 = new Reservation($chambre3, $client2, $hotel1, "15-03-2021", "15-03-2021");
$reservation3 = new Reservation($chambre4, $client2, $hotel1, "01-04-2021", "02-04-2021");


$hotel1->info();
echo '<br>';
$hotel2->info();
echo '<br>';
$hotel1->reservation();
echo '<br>';
$hotel2->reservation();
echo '<br>';
$client2->reservation_client();
?><?php
echo '<br>';
$hotel1->avoir_statut();

?>

  </article>
</body>
</html>
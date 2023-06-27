
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>POO Hôtel</title>
</head>
<body>
    <?php
    require "Hotel.php";
    require "Client.php";
    require "Reservation.php";
    require "Chambre.php";

// **************************instanciations des classes*********************************************
    

    $hotel1 = new Hotel("Hilton ****", "10 route de la Gare", "67000", "Strasbourg");
    $hotel2 = new Hotel("Regent ****", "61 rue Dauphine", "75006", "Paris");

    $client1 = new Client("GIBELLO", "Virgile");
    $client2 = new Client("MURMANN", "Micka");
    $client3 = new Client("MEYER", "Pierre");

    $chambre1 = new Chambre("1", false, 120, 2, $hotel1);
    $chambre2 = new Chambre("2", false, 120,2, $hotel1);
    $chambre3 = new Chambre("3", false, 120,2, $hotel1);
    $chambre4 = new Chambre("4", false, 120,2, $hotel1);
    $chambre5 = new Chambre("5", false, 120,2, $hotel1);
    $chambre6 = new Chambre("6", false, 120,2, $hotel1);
    $chambre7 = new Chambre("7", false, 120,2, $hotel1);
    $chambre8 = new Chambre("8", false, 120,2, $hotel1);
    $chambre9 = new Chambre("9", false, 120,2, $hotel1);
    $chambre10 = new Chambre("10", false, 120,2, $hotel1);
    $chambre11 = new Chambre("11", false, 120,2, $hotel1);
    $chambre12 = new Chambre("12", false, 120,2, $hotel1);
    $chambre13 = new Chambre("13", false, 120,2, $hotel1);
    $chambre14 = new Chambre("14", false, 120,2, $hotel1);
    $chambre15 = new Chambre("15", false, 120,2, $hotel1);
    $chambre16 = new Chambre("16", true, 300,2, $hotel1);
    $chambre17 = new Chambre("17", true, 300,2, $hotel1);
    $chambre18 = new Chambre("18", true, 300,2, $hotel1);
    $chambre19 = new Chambre("19", true, 300,2, $hotel1);

    $reservation1 = new Reservation($client1, $chambre17, $hotel1, "01-01-2021", "01-01-2021");
    $reservation2 = new Reservation($client2, $chambre3, $hotel1, "11-03-2021", "15-03-2021");
    $reservation3 = new Reservation($client2, $chambre4, $hotel1, "01-04-2021", "17-04-2021");
?>


<!-- ********************************************************************************************* -->
    
<!-- // Affichage -->

    <div class="card" style="width: 18rem;">
        <img src="hotel-hilton-strasbourg.jpg" class="card-img-top" alt="Chambre de l'hôtel Hilton à Strasbourg">
        <div class="card-body">
            <!-- <h5 class="card-title">Hôtel Hilton</h5> -->
            <p class="card-text"> <?php  echo $hotel1; ?> </p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"> <?php  $hotel1->afficherNbChambres(); ?> </li>
            <li class="list-group-item"> <?php  $hotel1->afficherChambresReservees(); ?> </li>
            <li class="list-group-item"> <?php  $hotel1->afficherChambresDispo(); ?> </li>
        </ul>
        <div class="card-body">
            <a href="https://www.hilton.com/en/brands/hilton-hotels/" class="card-link">Site internet</a>
        </div>
    </div>


<?php  $hotel1->afficherReservationsHotel(); ?>
<br>
<?php $hotel2->afficherReservationsHotel(); ?>
<br>
<?php $client2->afficherReservationClient(); ?>
<br>
<?php $hotel1->afficherStatutsChambres(); ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</html>





<!DOCTYPE html>
<html lang="fr" dir="ltr">
        <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="main.css"> -->
        <title>PDO- PART 1 </title>
        </head>
        <body>
        <div class="container">
        <div class="row">
                <h1 class="col-12 text-center border border-dark"><span class="badge bg-success">Part1-PDO</span></h1>
                <!-- EXo 1 -->
                <div class="col-12 col-md-4 border border-dark">
                <h2 class="text-center"><span class="badge bg-primary">Exo1</span></h2>
                <p class="alert alert-dark text-center" role="alert">Afficher tous les clients.</p>
                <?php
                        try
                {
                $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'agnes', 'wordpress');
                echo "Cool";
                }
                catch (Exception $e)
                {
                        die('Erreur : ' . $e->getMessage());
                }
                $recup = $bdd->query('SELECT * FROM clients');
                while ($donnees = $recup->fetch()) // On affiche chaque entrée une à une
                {
                ?>
                        <p>
                        Le id Client est : <?php echo $donnees['id']; ?><br/>
                        Le nom du client : <?php echo $donnees['lastName']; ?><br/>
                        Le prenom du client : <?php echo $donnees['firstName']; ?><br/>
                        La birthDate du client : <?php echo $donnees['birthDate']; ?><br/>
                        La carte du client : <?php echo $donnees['card']; ?><br/>
                        Le nmr de la carte du client : <?php echo $donnees['cardNumber']; ?>
                        </p>
                <?php
                }
                $recup->closeCursor(); // Termine le traitement de la requête
                ?>
                </div>
                <!-- EXo 2 -->
                <div class="col-12 col-md-4 border border-dark">
                <h2 class="text-center"><span class="badge bg-primary">Exo2</span></h2>
                <p class="alert alert-dark text-center" role="alert">Afficher tous les types de spectacles possibles.</p>
                <?php
                $recuptypes = $bdd->query('SELECT * FROM showTypes');
                while ($donnees = $recuptypes->fetch()) // On affiche chaque entrée une à une
                {
                ?>
                <p>
                        Le id spectacle est : <?php echo $donnees['id']; ?><br/>
                        Le type spectacle : <?php echo $donnees['type']; ?>
                </p> 
                <?php
                }
                $recuptypes->closeCursor(); // Termine le traitement de la requête
                ?>
                </div>

                <!-- EXo 3  -->
        <div class="col-12 col-md-4 border border-dark">
                <h2 class="text-center"><span class="badge bg-primary">Exo3</span></h2>
                <p class="alert alert-dark text-center" role="alert">Afficher les 20 premiers clients</p>
                <?php
                $recupclients = $bdd->query('SELECT * FROM clients LIMIT 20');
                while ($donnees = $recupclients->fetch()) // On affiche chaque entrée une à une
                {
                ?>
                        <p>
                        Le id Client est : <?php echo $donnees['id']; ?><br/>
                        Le nom du client : <?php echo $donnees['lastName']; ?><br/>
                        Le prenom du client : <?php echo $donnees['firstName']; ?><br/>
                        La birthDate du client : <?php echo $donnees['birthDate']; ?><br/>
                        La carte du client : <?php echo $donnees['card']; ?><br/>
                        Le nmr de la carte du client : <?php echo $donnees['cardNumber']; ?>
                        </p>
                <?php
                }
                $recupclients->closeCursor(); // Termine le traitement de la requête
                ?>
                </p>
                
        </div>
                <!-- EXo 4 -->
                <div class="col-12 col-md-6 border border-dark">
                <h2 class="text-center"><span class="badge bg-primary">Exo4</span></h2>
                <p class="alert alert-dark text-center" role="alert">N'afficher que les clients possédant une carte de fidélité.</p>
                <?php
                $recupcarte = $bdd->query('SELECT * FROM clients WHERE cardNumber IS NOT NULL');
                while ($donnees = $recupcarte->fetch()) // On affiche chaque entrée une à une
                {
                ?>
                        <p>
                        Le id Client est : <?php echo $donnees['id']; ?><br/>
                        Le nom du client : <?php echo $donnees['lastName']; ?><br/>
                        Le prenom du client : <?php echo $donnees['firstName']; ?><br/>
                        La birthDate du client : <?php echo $donnees['birthDate']; ?><br/>
                        La carte du client : <?php echo $donnees['card']; ?><br/>
                        Le nmr de la carte du client : <?php echo $donnees['cardNumber']; ?>
                        </p>
                <?php
                }
                $recupcarte->closeCursor(); // Termine le traitement de la requête
                ?>
                </p>
                </div>
                <!-- EXo 5-->
                <div class="col-12 col-md-6 border border-dark">
                <h2 class="text-center"><span class="badge bg-primary">Exo5</span></h2>
                <p class="alert alert-dark text-center" role="alert">Afficher uniquement nom et prénom des clients dont nom commence par "M".:Trier les noms par ordre alphabétique.</p>
                <h5 class="alert alert-info text-center" role="alert">
                <?php
                $recup = $bdd->query('SELECT * FROM clients WHERE lastName LIKE "M%"');
                while ($donnees = $recup->fetch()) // On affiche chaque entrée une à une
                {
                ?>
                
                        <p>
                        Le id spectacle est : <?php echo $donnees['lastName']; ?><br/>
                        Le type spectacle : <?php echo $donnees['firstName']; ?>
                        </p> 
                <?php
                }
                $recup->closeCursor(); // Termine le traitement de la requête
                ?>
                </h5>
                <h5 class="alert alert-info text-center" role="alert">
                <?php
                $recup = $bdd->query('SELECT lastName, firstName FROM clients WHERE lastName LIKE "M%"');
                $recupfirstName = $recup->fetchAll(PDO::FETCH_ASSOC);
                foreach ($recupfirstName as $recup) {
                        ?>
                
                        <p>
                        Le id spectacle est : <?php echo $recup['lastName']; ?><br/>
                        Le type spectacle : <?php echo $recup['firstName']; ?>
                        </p> 
                <?php
                }
                $recup = NULL ; // Termine le traitement de la requête
                ?>
                </h5>
                </div>
                <div class="col-12 col-md-6 border border-dark">
                <h2 class="text-center"><span class="badge bg-primary">Exo6</span></h2>
                <p class="alert alert-dark text-center" role="alert">
                Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.  
                </p>
                <h5 class="alert alert-info text-center" role="alert">
                <?php
                $recupShows = $bdd->query('SELECT title, performer, `date`, startTime  FROM shows ORDER BY title ASC');
                while ($donnees = $recupShows->fetch()) // On affiche chaque entrée une à une
                {
                ?>
                
                        <p>
                        Le spectacle est : <?php echo $donnees['title']; ?><br/>
                        Le performer est : <?php echo $donnees['performer']; ?><br/>
                        La date est : <?php echo $donnees['date']; ?><br/>
                        Le time spectacle : <?php echo $donnees['startTime']; ?>
                        </p> 
                <?php
                }
                $recupShows->closeCursor(); // Termine le traitement de la requête
                ?>
                </h5>
                </div>
                <div class="col-12 col-md-6 border border-dark">
                <h2 class="text-center"><span class="badge bg-primary">Exo7</span></h2>
                <p class="alert alert-dark text-center" role="alert">
                Afficher tous les clients comme ceci :

                        Nom : Nom de famille du client

                        Prénom : Prénom du client

                        Date de naissance : Date de naissance du client

                        Carte de fidélité : Oui (Si le client en possède une) ou Non (s'il n'en possède pas)

                        Numéro de carte : Numéro de la carte fidélité du client s'il en possède une.   
                </p>
                <h5 class="alert alert-info text-center" role="alert">

                <?php
                  $recup = $bdd->query('SELECT * FROM clients');
                  while ($donnees = $recup->fetch()) // On affiche chaque entrée une à une
                        {
                        ?>
                        <p>
                        Le id Client est : <?php echo $donnees['id']; ?><br/>
                        Le nom du client : <?php echo $donnees['lastName']; ?><br/>
                        Le prenom du client : <?php echo $donnees['firstName']; ?><br/>
                        La birthDate du client : <?php echo $donnees['birthDate']; ?><br/>
                        La carte du client : <?php
                                                if ($donnees['card'] == 0){
                                                        echo 'Non';
                                                        } else {
                                                        echo 'Oui';
                                                }?><br/>
                        Le numero de la carte : <?php
                                                if ($donnees['cardNumber'] == ''){
                                                        echo 'Pas de carte';
                                                        } else {
                                                        echo $donnees['cardNumber'];
                                                }?>
                        </p>
                        <?php
                        }
                        $recup->closeCursor(); // Termine le traitement de la requête
                        ?>
                        
                </h5>
                </div>
        </div>
        </div>
        </body>
</html>
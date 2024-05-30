<?php
require 'connexion.php';

/* Initialiser les variables pour les filtres et la recherche */
$prix = isset($_POST['prix']) ? $_POST['prix'] : '';
$search = isset($_POST['search']) ? $_POST['search'] : '';

/* Construire la requête SQL en fonction des filtres et de la recherche */
$sql = "SELECT * FROM hh_atelier WHERE 1=1";
$params = array();

if (!empty($prix) && !isset($_POST['tout_voir'])) {
    $sql .= " AND prix = :prix";
    $params[':prix'] = $prix;
}

if (!empty($search)) {
    $sql .= " AND nom_img LIKE :search";
    $params[':search'] = '%' . $search . '%';
}

/* Préparer et exécuter la requête */
$sth = $db->prepare($sql);
$sth->execute($params);
$results = $sth->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HH - Concept</title>
<link rel="stylesheet" href="styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/ac86f9bd86.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

</head>

<body>
<!-- début header -->
<header>
    <section class="header">
        <nav>
        <a class="evitement" href="#concept">Aller au contenu</a>
    
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"> </i>
        </label>
        <a href="index.php" class="logo">Hommade Hommous</a>
        <ul>
            <li><a class="a_nav" href="index.php">Home</a></li>
            <li><a href="about.php" class="a_nav">Nous</a></li>
            <li><a href="concept.php" class="active a_nav">Nos Ateliers</a></li>
             <li><a href="contact.php" class=" a_nav">Contact</a></li>
        </ul>
        </nav>
    </section>
</header>
<!-- fin header -->
    
<!-- début section concept -->
<img class='concept-header' src="images/concept_header.jpg" alt="">
<section class="concept" id="concept">  
    <div class="heading2">
        <span>PERSONNALISEZ VOS MOMENTS DU QUOTIDIEN</span>
        <h1>Hommade Hommous, comment ça marche ?</h1>
    </div>
    
    <div class="card-container">
        <div class="card">
            <img src="images/number-1.png" alt="">
            <div class="card-content">
                <h1>Réservez le créneau qui vous convient</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam non delectus quas blanditiis officiis fugiat, pariatur ad in ut, et voluptatum.</p>
            </div>
        </div>
    
        <div class="card">
            <img src="images/number-2.png" alt="">
            <div class="card-content">
                <h1>Réservez le créneau qui vous convient</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam non delectus quas blanditiis officiis fugiat, pariatur ad in ut, et voluptatum.</p>
            </div>
        </div>
    
        <div class="card">
            <img src="images/number-3.png" alt="">
            <div class="card-content">
                <h1>Réservez le créneau qui vous convient</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam non delectus quas blanditiis officiis fugiat, pariatur ad in ut, et voluptatum.</p>
            </div>
        </div>
    </div>
</section>
<!-- fin section concept -->

<!-- début section ateliers -->
<section class="ateliers_2" id="ateliers_2">
    <div class="lineh">
        <div class="line"></div>
        <h2 id="concept">Nos Ateliers</h2>
        <div class="line"></div>
    </div>
    <br>

    <div class="fonctions">
        <!-- barre de recherche en php -->
        <div class="search_container">
            <form method="post">
                <label>ATELIER<input type="search" name="search" placeholder="mezze, knefeh,..." class="search"></label>
                <input type="submit" name="submit" value="Rechercher" class="btn">
            </form>
        </div>

        <!-- tri en js -->
        <div class="tri_container">
            <select id="critere" class="tri">
                <option value="">---</option>
                <option value="prix">Prix</option>
                <option value="duree">Durée</option>
            </select>
            <button id="triButton" class="btn">Trier</button>
        </div>
    </div>

    <!-- filtre en php -->
    <div class="filtre_container">
        <form action="concept.php" method="POST">
            <span>Filtrer :</span>
            <select name="prix" id="prix" class="filtre">
                <option value="">Par prix</option>
                <?php
                $requete = "SELECT DISTINCT prix FROM hh_atelier ORDER BY prix";
                $stmt = $db->query($requete);
                $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($resultat as $atelier){
                    echo "<option value='".($atelier["prix"])."'>".($atelier["prix"])."</option>";
                }
                ?>
            </select>
            <input type="submit" name="filtrer" value="Valider" class="btn">
            
            <?php if (!empty($prix) || !empty($search)): ?>
                <input type="submit" name="tout_voir" value="Tout voir" class="btn tout_voir">
            <?php endif; ?>
            
            <br><br>
        </form>
    </div>

<div class="swiper" id="AteliersList">

    <?php
    /* Afficher les résultats */
    if ($results) {
        foreach ($results as $row) {
            echo '<div class="slide" data-prix="' . ($row->prix) . '" data-duree="' . ($row->duree) . '">
                    <div class="image">
                        <img src="' . ($row->img) . '" alt="">
                        <span>' . ($row->nom_img) . '</span>
                    </div>
                    <div class="content">
                        <div class="icon">
                            <span name="duree" id="duree"><i class="fa-regular fa-clock"></i> ' . ($row->duree) . '</span> 
                            <span><i class="fas fa-user"></i> ' . ($row->capacite) . ' </span>
                            <span name="prix" id="prix"><i class="fa-solid fa-money-bill-1-wave"></i> ' . ($row->prix) . ' </span>
                        </div>
                        <h3 class="title">' . ($row->activité) . '</h3>
                        <p>' . ($row->description) . '</p>
                        <a href="reserve.php?id_atelier=' . ($row->id_atelier) . '" class="btn">Réserver</a>
                    </div>
                </div>';
        }
    } else {
        echo '<p>Aucun résultat trouvé.</p>';
    }
    ?>

    </div>
    
</section>
<!-- fin section ateliers -->

<!-- début footer -->
<section class="footer">
    <div class="icons-container">
        <div class="icons">
             <i class="fas fa-clock"></i>
             <h3>Heures d'ouverture</h3>
             <p>7 j / 7</p>
             <p>de 11h à 22h</p>
        </div>

        <div class="icons">
             <i class="fas fa-address-book"></i>
             <h3>Contact</h3>
             <p>07 83 62 45 20</p>
             <p>poischiche@gmail.com</p>
        </div>

        <div class="icons">
             <i class="fas fa-map"></i>
             <h3>Adresse</h3>
             <p>156 Boulevard Voltaire, 75011</p>
        </div>

        <div class="icons">
             <i class="fa-solid fa-info"></i>
             <h3>Infos Pratiques</h3>
             <p><a href="#">Mentions Légales</a></p>
             <p><a href="#">Accéssibilité</a></p>
             <p><a href="#">FAQ</a></p>
        </div>
    </div> 
    
    <div class="share">
        <a href="#"><span class="sr-only">Facebook</span><i class="fab fa-facebook-f"></i></a>
        <a href="#"><span class="sr-only">Twitter</span><i class="fab fa-twitter"></i></a>
        <a href="#"><span class="sr-only">Instagram</span><i class="fab fa-instagram"></i></a>
    </div>
    
    <div class="credit"> Créé par <span>Clara Moubarak</span> | tous droits réservés</div>
</section>
<!-- fin footer -->

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="script.js"></script>
</body>

</html>

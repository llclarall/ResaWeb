<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HH - Concept</title>
<link rel="stylesheet" href="styles.css">
<script src="https://kit.fontawesome.com/ac86f9bd86.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

</head>

<body>
<!-- début header -->
    <section class="header">
        <nav>        
        <a class="evitement" href="#home">Aller au contenu</a>
        
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"> </i>
        </label>
        <a href="home.php" class="logo">Hommade Hommous</a>
        <ul>
            <li><a class="a_nav" href="home.php">Home</a></li>
            <li><a href="about.php" class="a_nav">Nous</a></li>
            <li><a href="concept.php" class="active a_nav">Notre Concept</a></li>
             <li><a href="reserve.php" class=" a_nav book_btn">Réserver</a></li>
        </ul>
        </nav>
 
    </section>

    <!-- fin header -->
    

<!-- début section concept -->


    <img class='concept-header' src="images/concept_header.jpg" alt="">
    
    <section class="concept">  

    <div class="heading2">
        <span>PERSONNALISEZ VOS MOMENTS DU QUOTIDIEN</span>
        <h3>Hommade Hommous, comment ça marche ?</h3>
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
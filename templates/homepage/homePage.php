<!DOCTYPE html>
<html>
<head>

<link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" 
crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php require "nav.php"?>
    <?php require "header.php"?>

    <!--- PAGE ACCUEIL --->
    <section>
        <div class="content">
            <div class="textBox">
                <h2><br> <span>nightLife</span>.</h2>
                <p>Get in touch, un tout nouveau genre d'expérience.<br>Cliquez sur le bouton en dessous pour avoir accès aux différents évènements près de chez vous !</p>
                <a href="#">En savoir plus</a>
            </div>
            <div class="imgBox"><img src="images.png" class="geomap"></div>
        </div>
    </section>--->

    <!--- PAGE LOGIN 
    <div class="login-box">

       <h1>Connexion</h1>

       <div class="textboxs">
            <i class="fas fa-user"></i>
           <input type="text" placeholder="Nom de compte" name="" value="">
       </div>

       <div class="textboxs">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Mot de passe" name="" value="">
       </div>

       <input class="btnlog" type="button" name="" value="Se connecter">

    </div>

    <!--- PAGE INSCRIPTION 
    <div class="login-box">

       <h1>Inscription</h1>

       <div class="textboxs">
            <i class="fas fa-user"></i>
           <input type="text" placeholder="Nom de compte" name="" value="">
       </div>

       <div class="textboxs">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Mot de passe" name="" value="">
       </div>

       <div class="textboxs">
        <i class="fas fa-envelope"></i>
        <input type="email" placeholder="E-mail" name="" value="">
       </div>

       <input class="btnlog" type="button" name="" value="S'inscrire">

    </div>--->

    <?php require "footer.php"?>
</body>
</html>
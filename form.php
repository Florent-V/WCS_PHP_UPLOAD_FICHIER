<?php 

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $infosImg = array_map('trim', $_POST);
    $infosImg = array_map('htmlspecialchars', $infosImg);
    
    if (file_exists($infosImg['imagePath'])) {
        unlink($infosImg['imagePath']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>WCS Form 01</title>
</head>
<body>
  <header>
    <h1 id="title">Formulaire de contact</h1>
    <p id="description">Merci de prendre le temps de nous envoyer un message</p>
  </header>

  <main>

    <form action="thanks.php" method="post" id="survey-form" enctype="multipart/form-data">
        <fieldset class="personnal-info">
            <div class="field">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Entrer votre prénom" required/>
            </div>

            <div class="field">
                <label for="lastname">Nom</label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Entrer votre nom" required/>
            </div>

            <div class="field">
                <label for="birthDate">Date de Naissance</label>
                <input type="date" name="birthDate" id="birthDate" class="form-control" required/>
            </div>
        
            <div class="field">
                <label for="adress">Adresse :</label>
                <input type="text" name="adress" id="adress" class="form-control" placeholder="Entrer votre adresse" required/>
            </div>

            <div class="field">
                <label for="driverPicture">Ajoutez votre photo ici :</label>
                <input type="file" name="driverPicture" id="driverPicture" accept="image/*"/>
            </div>

            <button type="submit" value="submit" id="submit">
                Envoyer
            </button>
        </fieldset>
    </form>



  </main>

  

  


    
</body>
</html>
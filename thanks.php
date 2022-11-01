<?php 

$errors = [];

$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $infos = array_map('trim', $_POST);
    $infos = array_map('htmlspecialchars', $infos);

    foreach ($infos as $field => $input) {
        $input ?: $errors[$field] = 'Ce champ doit être complété';
    }

    if (!preg_match('/^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/', $infos['birthDate'])) {
        $errors['birthDate'] = "Le format de la date n'est pas bon";
    }

    if (!$_FILES['driverPicture']['error']) {
        // Je sécurise et effectue mes tests
        // Je récupère l'extension du fichier
        $extension = pathinfo($_FILES['driverPicture']['name'], PATHINFO_EXTENSION);
        // Les extensions autorisées
        $authorizedExtensions = ['jpg','jpeg','png', 'gif', 'webp'];
        // Le poids max géré par PHP par défaut est de 2M
        $maxFileSize = 2000000;
        
        /****** Si l'extension est autorisée *************/
        if( (!in_array($extension, $authorizedExtensions)) ){
            $errors['format'] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png !';
        }
        /****** On vérifie si l'image existe et si le poids est autorisé en octets *************/
        if( file_exists($_FILES['driverPicture']['tmp_name']) && filesize($_FILES['driverPicture']['tmp_name']) > $maxFileSize){
            $errors['size'] = "Votre fichier doit faire moins de 2M !";
        }
    } else {
        $errors['error'] = $phpFileUploadErrors[$_FILES['driverPicture']['error']];
    }
    


    if (empty($errors)) {
        
        // ON récupère l'extension
        $file_extension = pathinfo($_FILES['driverPicture']['full_path'])['extension'];
        //ON donne un nom unique au fichier avec son extension
        $_FILES['driverPicture']['name'] = uniqid() . '.' . $file_extension;
        // chemin vers un dossier sur le serveur qui va recevoir les fichiers transférés (attention ce dossier doit être accessible en écriture)
        $uploadDir = 'uploads/';
        // le nom de fichier sur le serveur est celui du nom d'origine du fichier sur le poste du client (mais d'autre stratégies de nommage sont possibles)
        $uploadFile = $uploadDir . basename($_FILES['driverPicture']['name']);
        //pour récupérer le type MIME
        //var_dump(mime_content_type($_FILES['driverPicture']['tmp_name']));
        // on déplace le fichier temporaire vers le nouvel emplacement sur le serveur. Ça y est, le fichier est uploadé
        move_uploaded_file($_FILES['driverPicture']['tmp_name'], $uploadFile);
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
        <h1 id="title">Confirmation</h1>
        <p id="description">Votre Permis a bien été fabriqué !</p>
    </header>
    <main>
        <?php

            
                if(empty($errors)) {
                    // traitement du formulaire
                    // puis redirection
                    include '_valid.php';
                } else {
                    //include '_invalid.php';
                    var_dump(($errors));
                }
        
        ?>



        














        
    </main>

</body>
</html>
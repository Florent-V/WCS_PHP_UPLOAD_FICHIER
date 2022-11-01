<?php // Affichage des éventuelles erreurs 
    if (count($errors) > 0) : ?>
        <div class="danger">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <a href="./form.php">Revenir au formulaire</a>
<?php endif; ?>
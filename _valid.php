<div class="card">
    <div class="card_head">
        <h1>SPRINGFIELD, IL</h1>
    </div>
    <div class="card_info_01">
        <p>LICENCE#<br>64209</p>
        <p>BIRTH DATE<br><?= $infos['birthDate'] ?? "" ?></p>
        <p>EXPRIRES<br>4-24-2025</p>
        <p>CLASS<br>NONE</p>
    </div>
    <div class="main_content">
        <div class="picture">
            <img src="<?= $uploadFile  ?? ""  ?>" alt="">

        </div>
        <div class="card_info_02">
            <h2>DRIVERS LICENSE</h2>
            <div class="address">
                <p><?= $infos['firstname'] ?? ""  ?> <?= $infos['lastname'] ?? ""  ?></p>
                <p><?= $infos['adress'] ?? ""  ?></p>
                <p>SPRINGFIELD, IL 62701</p>
            </div>
            <div class="card_info_01">
                <p>SEX<br>OK</p>
                <p>HEIGHT<br>MEDIUM</p>
                <p>WEIGHT<br>239</p>
                <p>HAIR<br>NONE</p>
                <p>EYES<br>OVAL</p>
            </div>
        </div>

    </div>

  </div>

<?= $header?>
<div class='container'>
                <h1 class='text-center'>Bienvenue dans le village !</h1>
            </div>
            <div class="container">
            <a href='index.php?p=/destination&name=<?=$_GET['name']?>' class='btn btn-primary'>Retourner au choix de destination</a>
            </div>
                <div class='card' style='width: 18rem;'>
                   
                    <div class='card-body'>
                        <h5 class='card-title'><?=$player->getName()?></h5>
                        <div class='card-text'>
                            <ul>
                               <li>Race: <?=$player->getRace()?></li>
                               <li>Classe: <?=$player->getClasse()?></li>
                               <li>Point de vie: <?=$player->getHp()?></li>
                               <li>Force: <?=$player->getStrength()?></li>
                               <li>Intelligence: <?=$player->getIntel()?></li>
                               <li>Agilité: <?=$player->getAgility()?></li>
                               <li>Endurance: <?=$player->getStamina()?></li>
                               <li>Items: <ul>
                                        <?php foreach ($player->getItems()->getValues() as $item): ?>
                                            <li><?= $item->getName() ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                               </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href='index.php?p=/magasin&village=<?=$_GET['village']?>&name=<?=$player->getName()?>' class='btn btn-primary'>Boutique</a>
            <div class='container'>
            
            <?php foreach ($monsters as $monster):?>
                <a href='index.php?p=/fight&village=<?=$_GET['village']?>&name=<?=$player->getName()?>&monster=<?=$monster->getName()?>'><?=$monster->getName()?></a>
                </br>
            <?php endforeach?>
</div>
<?= $footer?>
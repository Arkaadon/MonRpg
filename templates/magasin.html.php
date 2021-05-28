<?= $header?>
<div class='container'>
                <h1 class='text-center'>Bienvenue dans le magasin !</h1>
            </div>
            <?php foreach ($magasins->getItems()->getValues() as $item):?>
                <div class='card' style='width: 18rem;'>
                   
                    <div class='card-body'>
                        <h5 class='card-title'><?=$item->getName()?></h5>
                        <div class='card-text'>
                            <ul>
                               <li>Description: <?=$item->getDescription()?></li>
                               <li>Prix: <?=$item->getPrice()?></li>
                               <li>Type: <?=$item->getType()?></li>
                            </ul>
                        </div>
                        <a href='index.php?p=/achat&name=<?=$_GET['name']?>&item=<?=$item->getId()?>' class='btn btn-primary'>Acheter</a>
                    </div>
                </div>
            <?php endforeach?>
            <a href='index.php?p=/village&name=<?=$_GET['name']?>' class='btn btn-primary'>Retour au village</a>
            <div class='container'>
       
</div>
<?= $footer?>

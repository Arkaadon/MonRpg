<?= $header?>
<div class='container'>
                <h1 class='text-center'>Choisissez votre destination !</h1>
            </div>
            <?php foreach ($villages as $village):?>
                
                <a href='index.php?p=/lvlchk&village=<?=$village->getId()?>&name=<?=$_GET['name']?>' class='btn btn-primary'>Aller au <?=$village->getName() ?></a>
                    
                
            <?php endforeach?>
            
<?= $footer?>

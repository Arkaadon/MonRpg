<?= $header?>;
<div class='container' >
    <h1 class=' text-center' >
    Mon Rpg
    </h1>
</div>
<div class='container' >
<form action='index.php?p=/'  method='post' >
    <div class='mb-3' >
        <label for=' pseudo'  class=' form-label' >Pseudo</label>
        <input name=' pseudo'  type=' text'  class=' form-control'  id=' pseudo' >
    </div>
    <div class='mb-3' >
        <select name='race'  class='form-select' >
            <option value='Elfe' >Elfe</option>
            <option value='Humain' >Humain</option>
            <option value='Naim' >Naim</option>
        </select>
    </div>
    <div class='mb-3' >
        <select name='classe'  class='form-select' >
            <option value='Guerrier' >Guerrier</option>
            <option value='Mage' >Mage</option>
            <option value='Archer' >Archer</option>
        </select>
    </div>
    <button type='submit'  class=' btn btn-primary' >Commencer !</button>
</form>
</div>
<?= $footer?>;
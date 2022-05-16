<form action="" method="POST">
    <input type="text" name="name" value="<?=$viewData['product']->getName()?>">
    <input type="text" name="description" value="<?=$viewData['product']->getDescription()?>">
    <input type="text" name="description-totale" value="<?=$viewData['product']->getDescription_totale()?>">
    <input type="text" name="content" value="<?=$viewData['product']->getContenance()?> ">
    <input type="text" name="price" value="<?=$viewData['product']->getPrice()?>">
    <button>Valider</button>
</form>
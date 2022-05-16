
<div class="page-product">
    <img src="<?=$viewData['produit']->getPicture(); ?>"" class ="img-produit">
    <div class='info-produit'>
        <h1 class="name-produit"><?=$viewData['produit']->getName();?></h1>
        <ul>
        <?php $rate = $viewData['produit']->getRate(); ?>
        <?php for($i = 1; $i <= 5; $i++) : ?>
            <?php if($rate >= $i) : ?> <i class="fa fa-star"></i><?php else : ?><i class="fa fa-star-o"></i>
                <?php endif; ?>
                <?php endfor; ?>
        </ul>
        <h3 class="description-produit"><?=$viewData['produit']->getDescription_totale();?></h3>
        <p class="contenant-produit"><?= $viewData['produit']->getContenance()?></p>
        <p class="price-produit">Prix : <?= $viewData['produit']->getPrice();?> euros</p>
    <button>Ajouter au panier</button>
    </div>
</div>
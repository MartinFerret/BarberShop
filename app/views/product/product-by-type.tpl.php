<?php $typeProducts = $viewData['singleType']; ?>

<div class="container-products-page">
    <?php foreach ($typeProducts as $products) : ?>
        <div class="product-page">
            <img src="<?=$products->getPicture();?>" alt="Produit">
            <h1><?=$products->getName();?></h1>
            <h4><?= $products->getDescription();?></h4>
            <a href="<?= $router->generate('product');?><?=$products->getId();?>">Voir plus</a>
            <p>Prix : <?= $products->getPrice();?> euros</p>
        </div>
    <?php endforeach;?>
    </div>
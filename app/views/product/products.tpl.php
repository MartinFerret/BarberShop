
    <div class="tri">
        <select name="select" id="select">
            <option value="0">-- Tous les produis --</option>
            <option value="1">Huile à barbe</option>
            <option value="2">Beaume à barbe</option>
            <option value="3">Rasoirs & lames</option>
            <option value="4">Peignes et brosses</option>
        </select>
    </div>

    <div class="container-products-page">
    <?php foreach ($viewData['allProduct'] as $product) : ?>
        <div class="product-page" data-type="<?=$product->getType_id() ?>">
            <img src="<?=$product->getPicture();?>" alt="Produit">
            <h1><?=$product->getName();?></h1>
            <h4><?= $product->getDescription();?></h4>
            <a href="<?= $router->generate('product');?><?=$product->getId();?>">Voir plus</a>
            <p>Prix : <?= $product->getPrice();?> euros</p>
        </div>
    <?php endforeach;?>
    </div>
 
 
 
 
 
 
 
 
 
 

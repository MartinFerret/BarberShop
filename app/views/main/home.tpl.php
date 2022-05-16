    <div class="presentation">
        <header>
            <h1>Titre</h1>
        </header>
        <main>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil delectus expedita quisquam ab eligendi, distinctio est, debitis quo doloremque molestias natus, sunt aliquid ipsum animi eaque. Accusantium corrupti ullam tempore quos ipsum quas animi debitis veniam eaque, ea, labore officia. Minus laboriosam eligendi praesentium corporis fugiat eos doloribus repudiandae cumque ab, inventore libero magnam autem veritatis nesciunt sint, hic qui dicta iure quia. Accusamus excepturi id doloremque laboriosam placeat quae, et quos, sapiente molestias error voluptatum debitis voluptatibus quasi minus.</p>
        </main>
    </div>
   
   
   <div class="wrapper-home">
    <?php foreach($viewData['allTypes'] as $type) : ?>
        <div class="type" style="background: linear-gradient(rgba(47, 23, 15, 0.65), rgba(47, 23, 15, 0.35)), url(<?=$type->getPicture()?>); background-position: center;
    background-size: cover; background-repeat: no-repeat;">
            <h1><?=$type->getName()?></h1>
            <p><?=$type->getDescription()?></p>
            <a href="<?=$router->generate('product-by-type', ['id' => $type->getId()])?>">Voir les produits</a>
        </div>
    <?php endforeach;?>
</div>



  
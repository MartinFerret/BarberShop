<div class="add-product-backoff">
  <h3>Liste des produits</h3>
  <div class="bouton-add-product">
  <a class="btn btn-primary" href="#" role="button">Ajouter</a>
  </div>
</div>

<table class="table table-dark">
  <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Prix</th>
      <th scope="col">Contenance</th>
      <th scope="col">Status</th>
      <th scope="col">Marque</th>
      <th scope="col">Type</th>
      <th scope="col">Boutons</th>
    </tr>
  </thead>
  <tbody>

      <?php foreach($viewData['productsList'] as $product) : ?>
    <tr>
      <th scope="row"><?= $product->getId() ?></th>
      <td><?=$product->getName() ?></td>
      <td><?=$product->getDescription() ?></td>
      <td><?=$product->getPrice() ?> euros</td>
      <td><?= $product->getContenance() ?> </td>
      <td><?= $product->getStatus() == 1 ? 'Disponible' : 'Indisponible' ?> </td>
      <td><?php if($product->getBrand_id() == 1) {
          echo 'Barb\'Art';
      } else if($product->getBrand_id() == 2) {
        echo  'Slikhaart';
      } else if($product->getBrand_id() == 3) {
        echo  'Horace';
      } else {
          echo  'BeardBrand';
      } ?></td>
      <td><?php if($product->getType_id() == 1) {
          echo 'Huile à barbe';
      } else if($product->getType_id() == 2) {
        echo  'beaume à barbe';
      } else if($product->getType_id() == 3) {
        echo  'Rasoirs & lames';
      } else {
          echo  'Peignes & Brosses';
      } ?> </td>

<td class="text-end">
    <a href="<?= $router->generate('product-update', ['id'=> $product->getId()]) ?>" class="btn btn-sm btn-warning">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </a>
    
    <!-- Example single danger button -->
    <div class="btn-group">
        <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-trash-o" aria-hidden="true"></i>
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Oui, je veux supprimer</a>
            <a class="dropdown-item" href="#" data-bs-toggle="dropdown">Oups !</a>
        </div>
    </div>
</td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
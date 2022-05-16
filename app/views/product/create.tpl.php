<div class="container my-4">
    <a href="<?=$router->generate('product-list') ?>" class="btn btn-primary  float-end">Retour</a>
    <h2 style="color:white;">Ajouter un produit</h2>

    
    <form action="" method="POST" class="mt-5">
        <div class="mb-3">
            <label for="name" class="form-label text-light">Nom</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom du produit" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label text-light">Description</label>
            <textarea id="description" name="description" class="form-control" placeholder="Description du produit"></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label text-light">Description Totale</label>
            <textarea id="description" name="description_totale" class="form-control" placeholder="Description du produit"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label text-light">Price</label>
            <input type="number" min="0" step="0.01" class="form-control" id="price" name="price" placeholder="Prix du produit" required>
        </div>
        <div class="mb-3">
            <label for="rate" class="form-label text-light">Rate</label>
            <input type="number" min="1" max="5" class="form-control" id="rate" name="rate" placeholder="Note du produit" required>
        </div>
        <div class="mb-3">
            <label for="rate" class="form-label text-light">Contenance</label>
            <input type="text" min="1" max="5" class="form-control" id="rate" name="contenance" placeholder="Note du produit" required>
        </div>
        <div class="mb-3 text-light">
            <label class="form-label text-light">Statut du produit</label><br>
            <label for="status_available" class="form-check-label">Disponible</label>
            <input class="form-check-input" type="radio" id="status_available" name="status" value="1" checked required>
            <label for="status_not_available" class="form-check-label">Indisponible</label>
            <input class="form-check-input" type="radio" id="status_not_available" name="status" value="2" required>
        </div>

        <div class="mb-3">
            <label for="brand_id" class="form-label text-light">Marque</label>
            <select class="form-select" name="brand_id" id="brand_id" required>
                <option value="">--Choix de la marque--</option>
                <?php foreach($viewData['brands'] as $brand) : ?>
                <option value="<?= $brand->getId() ?>"><?= $brand->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label text-light">Type</label>
            <select class="form-select" name="type_id" id="type_id">
                <option value="">--Choix de la catégorie--</option>
                <?php foreach($viewData['types'] as $type) : ?>
                <option value="<?= $type->getId() ?>"><?=$type->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary mt-5">Valider</button>
        </div>
    </form>
</div>

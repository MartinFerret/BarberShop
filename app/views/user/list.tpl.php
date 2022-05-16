<table class="table table-dark">
  <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Status</th>
      <th scope="col">Role</th>
      <th scope="col">Modifications</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($viewData['users'] as $user) : ?>
    <tr>
      <th scope="row"><?= $user->getId() ?></th>
      <td><?=$user->getEmail() ?></td>
      <td><?=$user->getFirstname() ?></td>
      <td><?=$user->getLastname() ?></td>
      <td><?= $user->getStatus() == 2 ?  "Bloqué" :  "Actif" ?></td>
      <td><?=$user->getRole() ?></td>
      <td class="text-end">
          <a href="#" class="btn btn-sm btn-warning">
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
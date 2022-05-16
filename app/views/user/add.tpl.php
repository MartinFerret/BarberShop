
<?php if (isset($viewData['errors_list'])) : ?>

<?php foreach($viewData['errors_list'] as $error) : ?>
  <div class="alert alert-danger col-6 mx-auto" role="alert">
                <?= $error ?>
            </div>
<?php endforeach; ?>
<?php endif; ?>
<form class="connexion" action="" method="POST">
  <div>
    <input type="email" name="email" placeholder="blabla@hotmail.com">
  </div>
  <div>
    <input type="password" name="password" placeholder="Password">
  </div>
  <div>
    <input type="text" name="firstname" placeholder="Jean">
  </div>

  <div>
    <input type="text" name="lastname" placeholder="Bon">
  </div>
    <div>
    <button>Se Connecter</button>
    </div>
</form>
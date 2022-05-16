<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/e8caa3937d.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $absoluteURL ?>/assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
    <nav role="navigation">
  <div id="menuToggle">
    <!--
    A fake / hidden checkbox used as click reciever¬.
    -->
    <input type="checkbox" />
    
    <!--
    Some spans acting as the hamburger icon.
    These will be animated into a cross when clicked.
    -->
    <span></span>
    <span></span>
    <span></span>

    
    
    <!--
    The menu itself.
    -->
    <ul id="menu">
      <a href="<?= $router->generate('home')?>"><li>Home</li></a>
      <a href="<?= $router->generate('products')?>"><li>Products</li></a>
      <a href="<?= $router->generate('store')?>"><li>Store</li></a>
      <a href="<?= $router->generate('contact')?>"><li>Contact</li></a>
      <div class="underbar"></div>
      <?php if(isset($_SESSION['id']) && $_SESSION['userObject']->getRole() == "admin") : ?>
      <a href="<?=$router->generate('user-list')?>"><li>Utilisateurs</li></a>
      <a href="<?=$router->generate('product-list')?>"><li>Produits</li></a>
      <a href="<?=$router->generate('logout')?>"><li>Deconnexion</li></a>
      <?php else : ?>
        <a href="<?=$router->generate('login')?>"><li>Connexion</li></a>
      <a href="<?=$router->generate('signup')?>"><li>S'inscrire</li></a>
      <?php endif; ?>
      
    </ul>
  </div>
</nav>
    </header>

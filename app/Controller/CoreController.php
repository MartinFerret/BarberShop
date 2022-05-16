<?php

namespace App\Controller;
use App\Models\Brand;
use App\Models\Type;


abstract class CoreController

{
    public function __construct ($routeId = '') {

        $accessControlList = [
           'product-create' => ['admin'], 
           'product-create-post' => ['admin'], 
           'product-update' => ['admin'], 
           'product-update-post' => ['admin'],
           'user-list' => ['admin'],
           'product-list' => ['admin'],
        ];
        
        if(array_key_exists($routeId, $accessControlList)) {
            $authorizedRoles = $accessControlList[$routeId];
            $this->checkAuthorization($authorizedRoles);
        } 
       
    }

    public static function checkCsrfToken($routeId)
    {
        // Liste des routes nécessitant un token CSRF en POST
        $csrfTokenToCheckInPost = [
            'product-create'
            
            // etc...
        ];

        // Si la route actuelle nécessite la vérification d'un token anti-csrf ?
        if (in_array($routeId, $csrfTokenToCheckInPost)) {

            // On récupère le token en POST
            $formToken = filter_input(INPUT_POST, 'token');

            // On récupère le token en SESSION
            $sessionToken = isset($_SESSION['token']) ? $_SESSION['token'] : '';
            /*if (isset($_SESSION['token'])) {
                $sessionToken = $_SESSION['token'];
            } else {
                $sessionToken = ''; // valeur par défaut
            }*/

            // dump($routeId);
            // dump($formToken);
            // dump($_SESSION);
            // dump($sessionToken);
            if (empty($formToken) || empty($sessionToken) || $formToken !== $sessionToken) {
                // Alors on affiche une 403 Accès interdit
                $controller = new ErrorController();
                $controller->err403();
                exit();
            } else {
                // Sinon tout va bien : accès autorisé
                // on peut alors supprimer le token pour ne pas qu'il puisse resservir une deuxième fois
                unset($_SESSION['token']);
            }
            // dump($_SESSION);
        }
        // Sinon, on ne fait rien, il n'y a rien à vérifier

        // TODO faire les mêmes vérifications pour les routes en GET
        // On pourrait traier les routes en GET et POST mais ça compliquerait encore plus les choses
    }

   

    protected function redirect ($routeId) {
        
        global $router;
        header('Location: ' . $router->generate($routeId));
    }

    protected function checkAuthorization($authorizedRoles)
    {
        // Si l'utilisateur est connecté ?
        if (isset($_SESSION['userObject'])) {

            // $_SESSION est un tableau associatif contenant ces types de données :
            // - 'userID' => integer
            // - 'userObject' => object de la class \App\Models\AppUser

            // Alors on récupère l'utilisateur en question
            // $user
            $user = $_SESSION['userObject'];
            // dump($user);

            // Puis on récupère son role
            $role = $user->getRole();
            // on aurait pu faire directement pour récupérer le role :
            // $role = $_SESSION['userObject']->getRole();
            //dump($role);

            // Si le role fait partie des roles autorisées (fournis en paramètre)
            if (in_array($role, $authorizedRoles)) {
                // Alors on retourne vrai
                return true;
            } else {
                // Sinon l'utilisateur connecté n'a pas la permission d'accéder
                // à la page => on envoie le header "403 Forbidden"
                $errorController = new ErrorController();
                $errorController->err403();
                exit;
            }
            
        } else {
            // Sinon on redirige vers la page de connexion
            $this->redirect('login');
        }
    }

    protected function show($viewName, $viewData = [])
    {

        global $router;

        $absoluteURL = $_SERVER['BASE_URI'];
        

        require_once __DIR__ . '/../views/layout/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';

        $brandFooterModel = new Brand();
        $brandForFooter = $brandFooterModel->getBrandInFooter();

        $typeModelFooter = new Type();
        $typeForFooter = $typeModelFooter->getTypeInFooter();
        require_once __DIR__ . '/../views/layout/footer.tpl.php';
    }
}
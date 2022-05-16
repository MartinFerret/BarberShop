<?php

namespace App\Controller;
use App\Models\AppUser;

class UserController extends CoreController
{
    public function viewLogin()
    {
        $this->show('user/connexion');
    }

    public function login()
    {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        //dump($_POST);

        $user = AppUser::findByEmail($email);
        if ($user !== false) {
            if (password_verify($password, $user->getPassword())) {
                $_SESSION['id'] = $user->getId();
                $_SESSION['userObject'] = $user;
                $this->redirect('home');
            //dump($_SESSION);
            } else {
                echo 'Pas ok';
            }
        } else {
            echo 'Pas ok !';
        }
    }

    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['userObject']);
        $this->redirect('main-home');
    }

    public function add()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);

        $errorsList = [];

        // On n'est pas du tout exhaustif sur les vérifications de nos données
        // TODO on pourrait et même on devrait aller plus loin pour vérifier/valider les données
        if ($lastname === '') {
            // Ajout du message d'erreur dans le tableau des erreurs
            $errorsList[] = 'Le nom doit être renseigné';
        }
        if ($firstname === '') {
            $errorsList[] = 'Le prénom doit être renseigné';
        }
        if ($email === false) {
            $errorsList[] = 'L\'email n\'a pas un format valide';
        }
        if (strlen($password) < 8) {
            $errorsList[] = 'Le mot de passe doit comporter au moins 8 caractères';
        }




        $userInserted = new AppUser();

        $userInserted->setEmail($email);
        $userInserted->setPassword(password_hash($password, PASSWORD_DEFAULT));
        $userInserted->setFirstname($firstname);
        $userInserted->setLastname($lastname);

        if (!empty($errorsList)) {
            // Si on passe ici, c'est qu'il y a des erreurs
            // on va donc réafficher le formulaire d'ajout
            // avec les champs préremplis et la liste des erreurs rencontrées
            $this->show('user/add', [
                'errors_list' => $errorsList,
            ]);
            
        } else {
            // Si pas d'erreur, on ajoute l'utilisateur dans la BDD

            // On peut ensuite tenter d'insérer les données dans la BDD
            if ($userInserted->insert()) {
                // Si l'ajout en BDD a fonctionné, alors on redirige vers 
                // la liste des utilisateurs
                $this->redirect('login');
            } else {
                // TODO Ecrire un message à notre utilisateur pour lui dire
                // qu'il y a eu un souci
                echo 'L\'utilisateur n\'a pas pu être rajouté suite à une erreur';
            }

        }
    }

    public function userList () {
        $userList = AppUser::findAll();
        $this->show('user/list', ['users' => $userList]);
    }


    

    public function signupView () {
        
        $this->show('user/add');
    }
}
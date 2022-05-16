<?php

namespace App\Controller;

class ErrorController  extends CoreController
{
    /**
     * Méthode gérant l'affichage de la page 404
     *
     * @return void
     */
     function err404()
    {
        // On envoie le header 404
        header('HTTP/1.0 404 Not Found');

        // Puis on gère l'affichage
        $this->show('error/error404');
    }

     public function err403()
    {
        // On envoie le header 404
        header('HTTP/1.0 403 Not Found');

        // Puis on gère l'affichage
        $this->show('error/error403');
    }
}
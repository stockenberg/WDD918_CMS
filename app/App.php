<?php

require './app/core/Navigation.php';

class App
{
    public function init()
    {
        /**
         * Prüfung navigation:
         * komische Zeichen
         * empty || != '' length > 0
         * is die seite vorhanden? file_exists() => 404
         */


    }

    /**
     * Takes the GET-P Parameter and concatenates it with
     * the template file in pages
     * @return string
     */
    public function getCurrentPageTemplate()
    {
        $nav = new Navigation();
        return './pages/' .  $nav->getPageName($_GET['page'] ?? '') . '.php';
    }

}
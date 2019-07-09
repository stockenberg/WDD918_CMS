<?php


class App
{
    public function init()
    {
    }

    /**
     * Takes the GET-P Parameter and concatenates it with
     * the template file in pages
     * @return string
     */
    public function getCurrentPageTemplate()
    {
        return 'pages/' . $_GET['page'] . '.php';
    }
}
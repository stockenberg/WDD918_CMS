<?php
require('app/interfaces/INavigation.php');

/**
 * General navigation purposes
 * Class Navigation
 */
class Navigation implements INavigation
{
    /** @var string  */
    private $pagename = 'home';

    /** @var string  */
    private $param_name = 'page';

    /** @var array  */
    private $whitelist = ['home', 'about', 'contact'];

    /**
     * Get the validated Page-Name if:
     *  - param exists
     *  - is not empty
     *  - template exists
     *  - is valid
     * @param String $GET_page_param
     * @return String
     */
    public function getPageName(String $GET_page_param = ''): String
    {

        if(!$this->pageParamExists($_GET)){
            return $this->pagename;
        }

        if($this->isEmpty($GET_page_param)){
            return $this->pagename;
        }

        if(!$this->isValid($GET_page_param)){
            return $this->pagename;
        }

        if(!$this->templateExists($GET_page_param)){
            return $this->pagename;
        }

        $this->pagename = $GET_page_param;
        return $this->pagename;
    }

    /**
     * @param String $GET_page_param
     * @return bool
     */
    private function isValid(String $GET_page_param) : bool
    {
        return in_array($GET_page_param, $this->whitelist);
    }

    /**
     * @param String $GET_page_param
     * @return bool
     */
    private function isEmpty(String $GET_page_param) : bool
    {
        return empty($GET_page_param);
    }

    /**
     * @param String $GET_page_param
     * @return bool
     */
    private function templateExists(String $GET_page_param)  : bool
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . "/pages/" . $GET_page_param . '.php';
        return file_exists($path);
    }

    /**
     * @param array $get
     * @return bool
     */
    private function pageParamExists(Array $get) : bool
    {
        return array_key_exists($this->param_name, $get);
    }




}
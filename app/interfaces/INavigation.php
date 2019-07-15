<?php


interface INavigation
{
    public function getPageName(String $insecure_page_name) : String;
}
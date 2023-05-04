<?php

namespace Wynd\ApiBundle\Tests\Mock;

use Wynd\ApiBundle\Service\Search\SearchModul;
use Wynd\ApiBundle\Service\Login\LoginSFTP;

class CheckFunction
{
    private $searchModul;
    private $loginSFTP;
    public function __construct(SearchModul $searchModul, LoginSFTP $loginSFTP)
    {
        $this->searchModul = $searchModul;
        $this->loginSFTP = $loginSFTP;
    }
    public static function chechConnexion()
    {
       
        $sftp = loginSFTP::sftpConnexion();
        if($sftp != false)
        {
            $test = true;
        }else $test = false;
         
        return $test;
    }
    
    public static function fileFoundCheck($file)
    {
        $foundfile = false;
        $listSearch = searchModul::fileSearch();
        $findSearch = [];
        foreach ($listSearch as $value) {
            foreach ($value as $k => $v) {
                if (($k === "nom") && (strpos($v, $file) !== false)) {
                    $findSearch[] = $value;
                }
            }
        }
        if (!empty($findSearch)) {
            $foundfile = true;
        }
        return $foundfile;
    }
    public static function directoryFoundCheck($file)
    {
        $foundDirectory = false;
        $listSearch = searchModul::directorySearch();
        $findSearch = [];
        foreach ($listSearch as $value) {
            foreach ($value as $k => $v) {
                if (($k === "nom") && (strpos($v, $file) !== false)) {
                    $findSearch[] = $value;
                }
            }
        }
        if (!empty($findSearch)) {
            $foundDirectory = true;
        }
        return $foundDirectory;
    }
}



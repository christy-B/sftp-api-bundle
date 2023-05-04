<?php
namespace Wynd\ApiBundle\Service\Search;

use Wynd\ApiBundle\Service\Login\LoginSFTP;

class SearchModul{
    public function __construct(LoginSFTP $loginSFTP)
    {
        $this->loginSFTP = $loginSFTP;
    }
    //fonction recuperation des repertoires et des fichiers
    public static function listAll()
    {
        $sftp = loginSFTP::sftpConnexion(); 
        $dir = $sftp->pwd();
        $tab = [];
        $files = $sftp->nlist($dir);

        for ($i = 0; $i < count($files); $i++) {
            $type = $sftp->is_dir($dir.'/'.$files[$i]) ? "directory" : "file";
            $path = $files[$i];
            if($path != "."){
                if (strpos($path, "..") === false) {
                    $path = str_replace("/.", "", $path);
                    $tab[] = ["nom" => $path, "type" => $type];
                }
            }
            $files = $sftp->nlist($dir, $files[$i]);
        }
        return $tab;
    }

    //recuperation des fichiers 
    public static function fileSearch()
    {
        $listSearch =  SearchModul::listAll();
        $findFile = [];
        foreach ($listSearch as $value) {

            foreach ($value as $k => $v) {
                if ($v === "file") {
                    $findFile[] = $value;
                }
            }
        }
        return $findFile;
    }
    //recuperation des repertoires
    public static function directorySearch()
    {
        $listSearch =  SearchModul::listAll();
        $findDirectory = [];
        foreach ($listSearch as $value) {

            foreach ($value as $k => $v) {
                if ($v === "directory") {
                    $findDirectory[] = $value;
                }
            }
        }
        return $findDirectory;
    }

}
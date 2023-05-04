<?php

namespace Wynd\ApiBundle\Service\Search;

use phpseclib3\Net\SFTP\Stream;
use Symfony\Component\HttpFoundation\RequestStack;

class FilterModul
{
    private $request;
    private $searchModul;
    private $host;
    private $user;
    private $password;
    public function __construct(SearchModul $searchModul, RequestStack $requestStack, string $host, string $user, string $password)
    {
        $this->searchModul = $searchModul;
        $this->request = $requestStack->getCurrentRequest();
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
    }
    //trier les fichiers par nom
    public function searchFilter()
    {
        $listSearch = $this->searchModul->listAll();
        $findSearch = [];
        $search = $this->request->query->get('search');
        foreach ($listSearch as $value) {
            $valueArray = $value;
            foreach ($valueArray as $k => $v) {
                if (($k === "nom") && (strpos($v, $search) !== false)) {
                    $findSearch[] = $valueArray;
                }
            }
        }
        return $findSearch;
    }
    //
    public function wordSearchFilter()
    {
        Stream::register();
        $findWordSearch = [];
        $wordSearch = $this->request->query->get('word');
        $host = $_ENV['SFTP_HOST'] ?? null;
        $user = $_ENV['SFTP_USER'] ?? null;
        $password = $_ENV['SFTP_PASSWORD'] ?? null;
        $fileList = $this->searchModul->fileSearch();
        foreach ($fileList as $value) {
            foreach ($value as $v) {
                if ($v !== "file") {
                    $handle = fopen("sftp://$user:$password@$host/$v", 'r');
                    $content = fgets($handle);
                    if (strpos($content, $wordSearch) !== false) {
                        $findWordSearch[] = $value;
                    }
                    fclose($handle);
                }
            }
        }

        return $findWordSearch;
    }
}

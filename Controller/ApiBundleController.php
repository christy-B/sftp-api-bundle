<?php

namespace Wynd\ApiBundle\Controller;
use Wynd\ApiBundle\Service\Search\FilterModul;
use Wynd\ApiBundle\Service\Search\SearchModul;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiBundleController extends AbstractController
{
    /**
     * @Route("/api/sftp/list", name="api-sftp")
     */
    public function index(SearchModul $searchModul): Response
    {
        $list = $searchModul->listAll();
        $json = json_encode($list, JSON_UNESCAPED_SLASHES);
        return new Response($json);
    }
    //recherche par fichier
    /**
     * @Route("/api/sftp/list/search", name="api-sftp_search")
     */
    public function findFileSearch(FilterModul $filterModul): Response
    {
        $findSearch = $filterModul->searchFilter();
        return new Response(json_encode($findSearch, JSON_UNESCAPED_SLASHES));
    }
    //recherche par contenu du fichier  
    /**
     * @Route("/api/sftp/list/search/content", name="api-sftp_search_content")
     */
    public function wordSearch(FilterModul $filterModul): Response
    {
        $findWordSearch = $filterModul->wordSearchFilter();
        return new Response(json_encode($findWordSearch, JSON_UNESCAPED_SLASHES));
    }
}

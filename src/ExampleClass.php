<?php

namespace Shtarev\PaketExample;

use Symfony\Component\HttpFoundation\JsonResponse;
use Pimcore\Version;
use Doctrine\DBAL\Connection;

class ExampleClass extends Connection
{
    private $id = '';
    private $baseUri = '';
    private $installationName = '';
    private $installationType = '';
    private $installationVersion = '';
    private $phpVersion = '';
    private $lastCheck = '';
    private $sites = ["test.de","hallo.com"];
    private $additionalInformations = [];

    private $connection;



    public function __construct()
    {
       
    }

    public function testFunction(): JsonResponse
    {

        //dd($this->getDomains());

        $data = [
            'id' => 'Test',
            'baseUrl' => $this->baseUrl(),
            'installationName' => $this->baseUrl(),
            'installationType' => '',
            'installationVersion' => Version::getVersion(),
            'phpVersion' => phpversion(),
            'lastCheck' => '',
            // 'sites' => $this->sites,
            //'sites' => $this->sites,
            'additionalInformations' => [],
        ];

        return new JsonResponse($data);
    }
    private function baseUrl()
    {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $baseUrl = $scheme . '://' . $host;

        return $baseUrl;
    }

    public function getDomains(): array
    {
        $sql = 'SELECT domain FROM sites'; // или просто `sites`, уточни в БД
        $domains = $this->fetchFirstColumn($sql);
        
        return $domains;
    }



}

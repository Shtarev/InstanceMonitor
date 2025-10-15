<?php

namespace Shtarev\PaketExample;

use Symfony\Component\HttpFoundation\JsonResponse;
use Pimcore\Version;
use Pimcore\Model\Site;

class ExampleClass
{    public function __construct()
    {
       //parent::__construct();
    }

    public function testFunction(): JsonResponse
    {
        $data = [
            'id' => 'Test',
            'baseUrl' => $this->baseUrl(),
            'installationName' => $this->baseUrl(),
            'installationType' => '',
            'installationVersion' => Version::getVersion(),
            'phpVersion' => phpversion(),
            'lastCheck' => '',
            'sites' => $this->getAllDomains(),
            'additionalInformations' => [],
        ];

        return new JsonResponse($data);
    }
    private function baseUrl()
    {

        $site = Site::getCurrentSite();
        $baseUrl = $site ? $site->getMainDomain() : null;

        // $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        // $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        // $baseUrl = $scheme . '://' . $host;

        return $baseUrl;
    }

    public function getAllDomains(): array
    {
        $sites = new Site\Listing();
        $domains = [];

        foreach ($sites as $site) {
            $domain = $site->getMainDomain();
            if ($domain) {
                $domains[] = $domain;
            }
        }
        return $domains;
    }
}

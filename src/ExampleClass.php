<?php

namespace Shtarev\PaketExample;

use Symfony\Component\HttpFoundation\JsonResponse;
use Pimcore\Version;
use Pimcore\Model\Site;
use Carbon\Carbon;

class ExampleClass
{    
    public static function testFunction(): JsonResponse
    {
        $data = [
            'id' => base64_encode(self::baseUrl()),
            'baseUrl' => self::baseUrl(),
            'installationName' => self::baseUrl(),
            'installationType' => 'Pimcore',
            'installationVersion' => Version::getVersion(),
            'phpVersion' => phpversion(),
            'lastCheck' =>  Carbon::now(),
            'sites' => self::getAllDomains(),
            'additionalInformations' => [],
        ];

        return new JsonResponse($data);
    }
    private static function baseUrl()
    {

        $site = Site::getCurrentSite();
        $baseUrl = $site ? $site->getMainDomain() : null;

        // $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        // $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        // $baseUrl = $scheme . '://' . $host;

        return $baseUrl;
    }

    public static function getAllDomains(): array
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

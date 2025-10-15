<?php

namespace Shtarev\InstanceMonitor;

use Symfony\Component\HttpFoundation\JsonResponse;
use Pimcore\Version;
use Pimcore\Model\Site;
use Carbon\Carbon;

class InstanceMonitorPimcore
{    
    public static function execute(): JsonResponse
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

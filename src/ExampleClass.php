<?php

namespace Shtarev\PaketExample;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class ExampleClass
{
    private $id = '';
    private $baseUrl = '';
    private $installationName = '';
    private $installationType = '';
    private $installationVersion = '';
    private $phpVersion = '';
    private $lastCheck = '';
    private $sites = '';
    private $additionalInformations = '';
    
    public function testFunction(SerializerInterface $serializer)
    {
        $data = [
            'name' => 'Test',
            'version' => '1.0.0',
        ];

        $json = $serializer->serialize($data, 'json');

        return new Response($json, 200, ['Content-Type' => 'application/json']);
    }
}

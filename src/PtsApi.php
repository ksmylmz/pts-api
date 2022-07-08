<?php
namespace ksmylmz\ptsapi;
use ksmylmz\ptsapi\Config;
use ksmylmz\ptsapi\model\Tracking;

class PtsApi 
{
    private $service;


    public function __construct()
    {
        $this->service = new Service();
    }

    public function Tracking($ptsRefferance,$customerRefferance,$language="EN")
    {
        $payload  = new Tracking();
        $payload->kullanici = Config::USERNAME;
        $payload->sifre = Config::PASSWORD;
        $payload->ptsno = (empty($ptsRefferance))?"":$ptsRefferance;
        $payload->siparisno = (empty($customerRefferance))?"":$customerRefferance;
        $payload->dil = $language;
        return $this->service->sendRequest("tracking",$payload);
    }
}
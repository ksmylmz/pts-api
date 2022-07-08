<?php
namespace ksmylmz\ptsapi;
use ksmylmz\ptsapi\Config;
use ksmylmz\ptsapi\model\GetLabel;
use ksmylmz\ptsapi\model\Tracking;

class PtsApi 
{
    private $service;


    public function __construct()
    {
        $this->service = new Service();
    }
    
    /**
     * Tracking
     *
     * @param  string $ptsRefferance
     * @param  string $customerRefferance
     * @param  string $language
     * @return \ksmylmz\ptsapi\model\Response
     */
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
    /**
     * GetLabel
     *
     * @param  string $ptsRefferance
     * @param  string $customerRefferance
     * @param  string $labelCode
     * @return \ksmylmz\ptsapi\model\Response
     */
    public function GetLabel($ptsRefferance,$customerRefferance,$labelCode=1)
    {
        $payload  = new GetLabel();
        $payload->kullanici = Config::USERNAME;
        $payload->sifre = Config::PASSWORD;
        $payload->ptsno = (empty($ptsRefferance))?"":$ptsRefferance;
        $payload->siparisno = (empty($customerRefferance))?"":$customerRefferance;
        $payload->etiket = $labelCode;
        return $this->service->sendRequest("tracking",$payload);
    }
}
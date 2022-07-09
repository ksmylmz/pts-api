<?php
namespace ksmylmz\ptsapi;
use ksmylmz\ptsapi\Config;
use ksmylmz\ptsapi\model\GetLabel;
use ksmylmz\ptsapi\model\Tracking;
use ksmylmz\ptsapi\model\GetConsignment;

class PtsApi 
{
    private $service;
    
    /**
     * config
     *
     * @var Config
     */
    private $config;
    
    /**
     * __construct
     *
     * @param  Config $config
     * @return void
     */
    public function __construct($config)
    {
        $this->config = $config;
        $this->service = new Service($config->getWsdl_url());
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
        $payload->kullanici = $this->config->getUsername();
        $payload->sifre = $this->config->getPassword();
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
        $payload->kullanici = $this->config->getUsername();;
        $payload->sifre = $this->config->getPassword();;
        $payload->ptsno = (empty($ptsRefferance))?"":$ptsRefferance;
        $payload->siparisno = (empty($customerRefferance))?"":$customerRefferance;
        $payload->etiket = $labelCode;
        return $this->service->sendRequest("getlabel",$payload);
    }
    /**
     * GetConsignment
     *
     * @param  string $ptsRefferance
     * @param  string $customerRefferance
     * @return \ksmylmz\ptsapi\model\Response
     */
    public function GetConsignment($ptsRefferance,$customerRefferance)
    {
        $payload  = new GetConsignment();
        $payload->kullanici = $this->config->getUsername();;
        $payload->sifre = $this->config->getPassword();;
        $payload->ptsno = (empty($ptsRefferance))?"":$ptsRefferance;
        $payload->siparisno = (empty($customerRefferance))?"":$customerRefferance;
        return $this->service->sendRequest("getConsignment",$payload);
    }
    
    /**
     * addShipment
     *
     * @param  Shipment $shipment
     * @return \ksmylmz\ptsapi\model\Response
     */
    public function addShipment($shipment)
    {
        $shipment->kullanici = $this->config->getUsername();;
        $shipment->sifre = $this->config->getPassword();;
        return $this->service->sendRequest("addshipment",$shipment);
    }

    /**
     * addShipmentWithPickup
     *
     * @param  ShipmentWithPickup $shipment
     * @return \ksmylmz\ptsapi\model\Response
     */
    public function addShipmentWithPickup($shipment)
    {
        $shipment->kullanici = $this->config->getUsername();;
        $shipment->sifre = $this->config->getPassword();;
        return $this->service->sendRequest("addShipmentWithPickUp",$shipment);
    }

    public function updateInvoice($updateInvoice)
    {
        $updateInvoice->kullanici = $this->config->getUsername();;
        $updateInvoice->sifre = $this->config->getPassword();;
        return $this->service->sendRequest("updateInvoiceInfo",$updateInvoice);
    }
}
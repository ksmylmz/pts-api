<?php
namespace ksmylmz\ptsapi;
use ksmylmz\ptsapi\Config;

class PtsApi 
{
    private $service;


    public function __construct()
    {
        $this->service = new Service();
    }
}
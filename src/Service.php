<?php
namespace ksmylmz\ptsapi;

use ksmylmz\ptsapi\Config;
use ksmylmz\ptsapi\model\Response;

class Service 
{
    private $client;
    function __construct()
    {
        $context = stream_context_create(array(
            'ssl' => array('verify_peer' => true, 'verify_peer_name' => false, 'allow_self_signed' => true)
        ));

        $this->client = new \SoapClient(
            Config::WSDL_URL,
            [
                'cache_wsdl' => WSDL_CACHE_NONE,
                'trace' => 1,
                'stream_context' => $context
            ]
        );
    }
    
    /**
     * sendRequest
     *
     * @param  string $method
     * @param  array|object $payload
     * @return Response
     */
    public function sendRequest($method,$payload)
    {
        $response =  new Response();
        try 
        {
            $payloadAsArray = (array) $payload;
            $response->status=true;
            $response->body = $this->client->__soapCall($method,$payloadAsArray);

        } catch (\Throwable $th) 
        {
            $response->status=false;
            $response->error = $th->getMessage();
        }
        finally
        {
            $response->lastRequest =$this->client->__getLastRequest();
            $response->lastResponse =$this->client->__getLastResponse();
        }
        return $response;
    }
}
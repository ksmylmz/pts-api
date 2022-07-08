<?php
namespace ksmylmz\ptsapi\model;
class Response
{    
    /**
     * status
     *
     * @var bool
     */
    public $status;    
    /**
     * error
     *
     * @var string
     */
    public $error;    
    /**
     * body
     *
     * @var string
     */
    public $body;
    
    /**
     * lastRequest
     *
     * @var string xml based request
     */
    public $lastRequest;
        
    /**
     * lastResponse
     *
     * @var string xml based response
     */
    public $lastResponse;
}
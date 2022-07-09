<?php
namespace ksmylmz\ptsapi;
class  Config
{
    private $username;
    private $password;
    private $wsdl_url;

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of wsdl_url
     */ 
    public function getWsdl_url()
    {
        return $this->wsdl_url;
    }

    /**
     * Set the value of wsdl_url
     *
     * @return  self
     */ 
    public function setWsdl_url($wsdl_url)
    {
        $this->wsdl_url = $wsdl_url;

        return $this;
    }
}
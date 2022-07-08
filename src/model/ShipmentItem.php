<?php
namespace ksmylmz\ptsapi\model;
class  ShipmentItem
{    
    /**
     * aciklama
     *
     * @var string product  descritption
     */
    public $aciklama;    
    /**
     * birim
     *
     * @var string unit 
     */
    public $birim;    
    /**
     * birimfiyat unit price
     *
     * @var float
     */
    public $birimfiyat;    
    /**
     * discount
     *
     * @var float discount value
     */
    public $discount;    
    /**
     * gtip
     *
     * @var string  Harmonised Code
     */
    public $gtip;    
    /**
     * itemUrl product web site url for e-commerce orders
     *
     * @var string
     */
    public $itemUrl;    
    /**
     * miktar
     *
     * @var int quantity
     */
    public $miktar;    
    /**
     * sivv
     *
     * @var float amount
     */
    public $sivv;    
    /**
     * vatbase
     *
     * @var float amount
     */
    public $vatbase;
}
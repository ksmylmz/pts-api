<?php
namespace ksmylmz\ptsapi\model;
class  ShipmentWithPickup
{    
    /**
     * kullanici
     *
     * @var string  UserName
     */
    public $kullanici;    
    /**
     * sifre
     *
     * @var string Password
     */
    public $sifre;    
    /**
     * ptsno 
     *
     * @var string if sending 0 new shipment or set with 
     * pts tracking no, it will be update request
     */
    public $ptsno;    
    /**
     * servis 
     *
     * @var string of \ksmylmz\ptsapi\enum\ServiceTypes
     */
    public $servis;    
    /**
     * yetkili
     *
     * @var string responsible receivement person
     */
    public $yetkili;    
    /**
     * sirketadi 
     *
     * @var string receiver company title
     */
    public $sirketadi;    
 
    /**
     * adres
     *
     * @var string receiver free text adress line max 75 char
     */
    public $adres;    
    /**
     * sehir
     *
     * @var string receiver city 
     */
    public $sehir;    
    /**
     * eyalet
     *
     * @var string receiver state code
     */
    public $eyalet;    
    /**
     * postakodu
     *
     * @var string receiver zip code
     */    
    public $postakodu;    
    /**
     * ulkekodu
     *
     * @var  string receiver county 2 digit ISO code
     */
    public $ulkekodu;    
    /**
     * telefon
     *
     * @var string receiver phone number
     */
    public $telefon;    
    /**
     * email
     *
     * @var string receiver email
     */
    public $email;     
    /**
     * gonderici_yetkili
     *
     * @var string sender resposible person
     */
    public $gonderici_yetkili;    
    /**
     * gonderici_unvan 
     *
     * @var string sender company or name
     */
    public $gonderici_unvan;    
    /**
     * gonderici_adres
     *
     * @var string sender full text adress max 75 char
     */
    public $gonderici_adres;    
    /**
     * gonderici_sehir
     *
     * @var string sender city
     */
    public $gonderici_sehir;    
    /**
     * gonderici_postakodu
     *
     * @var string sender zip code
     */
    public $gonderici_postakodu;    
    /**
     * gonderici_ulkekodu 
     *
     * @var string sender country 2 digit iso code
     */
    public $gonderici_ulkekodu;    
    /**
     * gonderici_telefon
     *
     * @var string sender phone
     */
    public $gonderici_telefon;    
    /**
     * gonderici_email
     *
     * @var string sender email
     */
    public $gonderici_email;   
    /**
     * toplamkg
     *
     * @var string total KGS
     */
    public $toplamkg;    
    /**
     * siparisno
     *
     * @var string Customer Refferance no | E-commerce order no
     */
    public $siparisno;    
    /**
     * malcinsi
     *
     * @var string shipment summary description max 35 char
     */
    public $malcinsi;    
    /**
     * toplamadet
     *
     * @var string total pieces
     */
    public $toplamadet;    
    /**
     * toplamdeger
     *
     * @var string shipment value 
     */
    public $toplamdeger;    
    /**
     * parabirimi shipmment value currency (3 digit Money code)
     *
     * @var string
     */
    public $parabirimi;    
    /**
     * fatura
     *
     * @var array of \ksmylmz\ptsapi\model\ShipmentItem
     */
    public $fatura;    
    /**
     * faturano
     *
     * @var string invoice no
     */
    public $faturano;    
    /**
     * faturatarihi
     *
     * @var string invoice date
     */
    public $faturatarihi;    
    /**
     * earsivpdf
     *
     * @var string invoice url
     */
    public $earsivpdf;    
    /**
     * etiket
     *
     * @var string label code | 0 - no label  | 1 - Pts label
     * other labels can be taking with pts permission
     */
    public $etiket;    
    /**
     * gonderici_yetkilisi
     *
     * @var string sender responsible person
     */
    public $gonderici_yetkilisi;    
    /**
     * ebat
     *
     * @var array of Dimension 
     */
    public $ebat;    
    /**
     * payType
     *
     * @var string of  \ksmylmz\ptsapi\enum\PaymentType
     */
    public $payType;    
    /**
     * gbeyanTutar
     *
     * @var string
     */
    public $gbeyanTutar;    
    /**
     * shipAccessCode
     *
     * @var string
     */
    public $shipAccessCode;   
    /**
     * vatno
     *
     * @var string
     */
    public $vatno;    
    /**
     * eorino
     *
     * @var string
     */
    public $eorino;    
    /**
     * gumruktipi
     *
     * @var string \ksmylmz\ptsapi\enum\CustomsType
     */
    public $gumruktipi;    
    /**
     * ioss
     *
     * @var string Europe IOSS number
     */
    public $ioss;    
    /**
     * musteriBeyanTuru
     *
     * @var string
     */
    public $musteriBeyanTuru;    
   
}
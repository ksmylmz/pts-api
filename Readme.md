PTS Cargo Api Integration Package
=================================

This procject contains main methots which is soap based PTS Api. 
PTS wsdl scheme was used during creating models. 
> It is important appliying changes it exist at wsdl scheme. Because any changing on scheme will effect parameters sorting.

<br/>

## 1- Installation

it is compatible any project that follows psr-4 standards 

### A-install with composer 
````
 composer require kasim.yilmaz/pts-api
 ````

### B-install without composer

 Download project to where you include

````
require vendor/autoload.php
````

<br/>
<br/>
<br/>
<br/>

## 2- Initialize

We need setting credentials before init PTS Api object

The credentials will provide from PTS;

````php 
use ksmylmz\ptsapi\PtsApi;

use ksmylmz\ptsapi\Config;

$config = new Config();

$config->setUsername("*******");
$config->setPassword("*******");
$config->setWsdl_url("********");


$ptsApi = new PtsApi($config);
````

# 3- Response Handling 

All Method of PtsApi Object Return with type of 
````php 
use ksmylmz\ptsapi\model\Response
````
You can check the response  been succes or fault status via Status parameter.
In addition, Response Object contains request and response xml values.

For Eg.
````php
$response = $ptsApi->GetConsignment("1234567", "2222222222");
if($response->status)
{
   var_dump($response->body);
}else
{
   echo $response->error;
}

echo $response->lastRequest;
echo $response->lastResponse;
````

<br/>
<br/>
<br/>
<br/>

## 4- Create Shipment Request

````php
use ksmylmz\ptsapi\enum\PaymentType;
use ksmylmz\ptsapi\enum\ServiceTypes;
use ksmylmz\ptsapi\model\Dimension;
use ksmylmz\ptsapi\model\Shipment;
use ksmylmz\ptsapi\model\ShipmentItem;
use ksmylmz\ptsapi\model\UpdateInvoice;

$shipment = new Shipment();
/**
 *  ptsno  = 0 means creating new shipment
 *  setting ptsno with  existing any ptsno, it means 
 *  update shipment 
 */
$shipment->ptsno = 0;
$shipment->servis  = ServiceTypes::Eco;
$shipment->yetkili = "receiver name";
$shipment->sirketadi = "receiver company A.Ş.";
$shipment->adres = "test test adres test street no.1";
$shipment->sehir = "AMSTERDAM";
/*
 state code if exist
 $shipment->eyalet = "LA";
 */
$shipment->postakodu = "11111";
$shipment->ulkekodu = "NL";
$shipment->toplamkg = 1;
/**
 * Customer refferance or E-commerce 
 * order no
 */
$shipment->siparisno = "abc124";
$shipment->malcinsi = "Dress";
$shipment->toplamadet = 10;
$shipment->toplamdeger = 100;
$shipment->parabirimi = "EUR";


$item  = new ShipmentItem();
$item->aciklama = "Dress";
$item->birim = "PCS";
$item->birimfiyat = 10;
$item->miktar = 10;
/**
 *  12 digit HS code for conforming to Turkish norms
 */
$item->gtip = "621143000000";

$shipment->fatura = [
    $item
];
$shipment->faturano = "abc20220202";
/** yyyy-mm-dd */
$shipment->faturatarihi = "2022-01-01";

$shipment->earsivpdf = "http://invoice-pdf-url/invoice.pdf";

/**getting label with creating shipment request */
$shipment->etiket = 1;

$box1 = new Dimension();
$box1->en = 10;
$box1->boy = 10;
$box1->yukseklik = 10;
$box1->kg = 1;

$box2 = new Dimension();
$box2->en = 10;
$box2->boy = 10;
$box2->yukseklik = 10;
$box2->kg = 3;

$shipment->ebat = [
    $box1, $box2
];

$shipment->payType = PaymentType::PREPAID;

$shipment->gumruktipi = CustomsType::DDP;


$ptsApi->addShipment($shipment);

````
<br/>
<br/>
<br/>

## 5- Creating Shipment With Pickup Request

> This method needs special permission

All parameters are the same as in the shipment model except the parameters marked below

```php
use ksmylmz\ptsapi\model\ShipmentWithPickup;

$shipment = new ShipmentWithPickup();
/***difference parameters from shipment **/

$shipment->gonderici_unvan ="sender compnay a.ş";
$shipment->gonderici_adres = "test sender adres test street no 1";
$shipment->gonderici_sehir = "ISTANBUL";
$shipment->gonderici_email = "sender@sender.com";
$shipment->gonderici_postakodu="341111";
$shipment->gonderici_telefon ="+905500000000";
$shipment->gonderici_ulkekodu ="TR";

$ptsApi->addShipmentWithPickup($shipment);

````

<br/>
<br/>
<br/>

## 6- Tracking Request

You may passing customer refferance  or PTS refferance 

````php
use ksmylmz\ptsapi\enum\Language;

$ptsApi->Tracking("customerRef", "PTSRef", Language::ENGLISH);

````


<br/>
<br/>
<br/>

## 7- Get Label Request

You may passing customer refferance  or PTS refferance 

label code parameter value 1  returns with pts label.
For last mile label codes you need PTS permission for each label code.

The label size is  4X6 inch thermal label;
In generaly, PDF format.

````php

$ptsApi->GetLabel("1234567", "222222222", 1);

````

<br/>
<br/>
<br/>

## 8- Get Consignment Request

You may passing customer refferance  or PTS refferance 

It returns A4 size and PDF  format
````php

$ptsApi->GetConsignment("1234567", "222222222");

````


<br/>
<br/>
<br/>

## 9- Update Invoice Information Request

Sometimes, Your invoice may not be ready while creating
shipment. In this cases you may update shipment invoice informations. 

> For using that method, shipment must be unprocessed as pysicaly

````php

$updateInvoice = new UpdateInvoice();
$updateInvoice->ptsno = "22222222222";
$updateInvoice->siparisno = "abc123456";


$updateInvoice->faturano = "abc20220202";
/** yyyy-mm-dd */
$updateInvoice->faturatarihi = "2022-01-01";

$updateInvoice->arsivpdf = "http://invoice-pdf-url/invoice.pdf";

$ptsApi->updateInvoice($updateInvoice);

````
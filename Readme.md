PTS Cargo Api Integration Package
=================================

This procject contains main methots which is soap based PTS Api. 
PTS wsdl scheme was used during creating models. 
> It is important appliying changes it exist at wsdl scheme. Because any changing on scheme will effect parameters sorting.


# 1- Installation

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

## 2- Initiation

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
You can control the response  succes or fault status via Status paranmeter.
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


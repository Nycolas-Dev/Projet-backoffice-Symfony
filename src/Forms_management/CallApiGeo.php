<?php
 
namespace App\Forms_management;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpClient\HttpClient;
 
class CallApiGeo
{
    private $client;
 
    public function __construct(HttpClientInterface $client, ParameterBagInterface $params)
    {
        $this->client = $client;
        $this->params = $params;
    }

    // Method: POST, PUT, GET etc
    // Data: array("param" => "value") ==> index.php?param=value

    function callAPI()
    {
        $ch			= curl_init();
    	// dd($cFile);        

        // curl_setopt($ch, CURLOPT_HEADER,0);
        // curl_setopt($ch, CURLOPT_VERBOSE,0);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        // curl_setopt($ch, CURLOPT_URL, 'https://api-adresse.data.gouv.fr/search/?q=21bis%20Boulevard%20Victor%20Hugo%2044200%20Nantes&type=housenumber&autocomplete=1');
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
        // $result		= curl_exec($ch);
        
        

        $httpClient = HttpClient::create();

        $response = $httpClient->request('POST', 'https://api-adresse.data.gouv.fr/search/?q=21bis%20Boulevard%20Victor%20Hugo%2044200%20Nantes&type=housenumber&autocomplete=1');

        $result = $response->getContent();
        return $result;

    }
    

}
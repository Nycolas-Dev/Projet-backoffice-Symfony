<?php
 
namespace App\Forms_management;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
 
class CallApiRecruit
{
    private $client;
 
    public function __construct(HttpClientInterface $client, ParameterBagInterface $params)
    {
        $this->client = $client;
        $this->params = $params;
    }
 
    public function updateCandidat($id, $dataToModify)
    {
        if($dataToModify === []){
            return null;     
        }

        else {

            $xmlData	= '<Candidates><row no="1">';

            foreach($dataToModify as $key => $data) {
                $xmlData .= '<FL val="'.$key.'"><![CDATA['.$data.']]></FL>';
            };

            $xmlData .= '</row></Candidates>';

            $postdata	= http_build_query(
                array(
                    'authtoken' 	=> $this->params->get('zoho.token'),
                    'scope' 		=> 'recruitapi',
                    'version'		=> 2,
                    'xmlData'		=> $xmlData,
                    'newFormat'		=> 2,
                    'id'			=> $id
                )
            );

            $opts 		= array('http' =>
                            array(
                                'method'  	=> 'POST',
                                'header'  	=> 'Content-Type: application/x-www-form-urlencoded',
                                'content' 	=> $postdata
                            )
                        );
            $context  	= stream_context_create($opts);
            $result 	= file_get_contents($this->params->get('zoho.url').'/xml/Candidates/updateRecords', false, $context);
            $result		= simplexml_load_string($result);
    
            
            return $result;
        }
    }

    public function updateTabular($id, $dataToModify, $tabularName)
    {
        if($dataToModify === []){
            return null;     
        }

        else {

            $xmlData	= '<Candidates><FL val="'.$tabularName.'"><TR no="0">';

            foreach($dataToModify as $key => $data) {
                $xmlData .= '<TL val="'.$key.'"><![CDATA['.$data.']]></TL>';
            };

            $xmlData .= '</TR></FL></Candidates>';

            $postdata	= http_build_query(
                array(
                    'authtoken' 	=> $this->params->get('zoho.token'),
                    'scope' 		=> 'recruitapi',
                    'xmlData'		=> $xmlData,
                    'id'			=> $id
                )
            );

            $opts 		= array('http' =>
                            array(
                                'method'  	=> 'POST',
                                'header'  	=> 'Content-Type: application/x-www-form-urlencoded',
                                'content' 	=> $postdata
                            )
                        );
            $context  	= stream_context_create($opts);
            $result 	= file_get_contents($this->params->get('zoho.url').'/xml/Candidates/updateTabularRecords', false, $context);
            $result		= simplexml_load_string($result);
    
            
            return $result;
        }
    }

    public function deleteTabular($idUser, $idPortfolio, $tabularName)
    {
        if($idPortfolio === null){
            return null;     
        }

        else {

            $postdata	= http_build_query(
                array(
                    'authtoken' 	=> $this->params->get('zoho.token'),
                    'scope' 		=> 'recruitapi',
                    'tabularName'	=> $tabularName,
                    'deleteType'	=> 'partial',
                    'tabularRowIds'	=> $idPortfolio,
                    'id'			=> $idUser
                )
            );

            $opts 		= array('http' =>
                            array(
                                'method'  	=> 'POST',
                                'header'  	=> 'Content-Type: application/x-www-form-urlencoded',
                                'content' 	=> $postdata
                            )
                        );
            $context  	= stream_context_create($opts);
            $result 	= file_get_contents($this->params->get('zoho.url').'/xml/Candidates/deleteTabularRecords', false, $context);
            $result		= simplexml_load_string($result);
    
            
            return $result;
        }
    }

    public function updatePhoto($id, $p) {

        //dd($p);
        $photo	= md5(time());
        // $photo	= '/var/www/me-test/public/tmp/'.md5(time()).$p->getFileInfo()->getFilename();
        // move_uploaded_file($p->getFileInfo()->getPathname(), $photo);
        $newPhoto = $p->move('/var/www/me-test/public/tmp/', $photo.$p->getClientOriginalName());
        //dd($newPhoto);

        $ext	= $p->getClientOriginalExtension();
        $ext	= strtolower($ext);
        if($ext != "png"
            && $ext != "jpeg"
            && $ext != "jpg") {
            dd(array("Format de photo incorrect (png/jpg)"));
        }

        //dd($p->getClientOriginalExtension());

        $ch			= curl_init();
        $cFile 		= new \CURLFile($newPhoto,'image/jpeg');
    	// dd($cFile);        

        curl_setopt($ch, CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_VERBOSE,0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_URL, $this->params->get('zoho.url').'/xml/Candidates/uploadPhoto?authtoken='.$this->params->get('zoho.token').'&scope=recruitapi&version=2');
        curl_setopt($ch, CURLOPT_POST, true);
        $post		= array("id" => $id, "content" => $cFile);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
        $result		= curl_exec($ch);
		$result		= simplexml_load_string($result);

        if(isset($result->error)) {
            
            dd(array($result->error->message));
        }

        return($newPhoto);
    
    }

    function getCandidateTabularRecordByID($ID) {

		//$ID		= 12741000001756115;

		$tmp	= array();
		$url	= $this->params->get('zoho.url').'/json/Candidates/getTabularRecords?authtoken='.$this->params->get('zoho.token').'&tabularNames=(Experience+Details,Educational+Details,Portefeuille+projet)&scope=recruitapi&version=2&newFormat=2&id='.$ID;
		$res	= file_get_contents($url, 'r');
		$res	= json_decode($res, true);
		
		if(isset($res['response']['error'])) {
            dd('ERROR');
		}
		
		foreach($res['response']['result']['Candidates']['FL'] as $x => $tab) {
			if(array_key_exists('TR', $tab)) {
				// 1 record
				if(array_key_exists('TL', $tab['TR'])) {
					foreach($tab['TR']['TL'] as $k => $v) {
						$tmp[$tab['val']][$tab['TR']['TL'][0]['content']][$v['val']]	= $v['content'];
					}
				// > 1 records
				} else {
					foreach($tab['TR'] as $k => $v) {
						foreach($v['TL'] as $k2 => $v2) {
							$tmp[$tab['val']][$v['TL'][0]['content']][$v2['val']]	= $v2['content'];
						}
					}
				}
			}
		}
		
		return $tmp;
	}

    function getCandidateRecordByID($ID) {

		//$ID		= 12741000001756115;

		$tmp	= array();
		$url	= $this->params->get('zoho.url').'/json/Candidates/getRecords?authtoken='.$this->params->get('zoho.token').'&scope=recruitapi&version=2&newFormat=2&selectColumns=Candidates('.urlencode('First Name,Last Name,Salutation,Mobile,Street,Complement,City,Zip Code,State,Country').')&id='.$ID;
		$res	= file_get_contents($url, 'r');
		$res	= json_decode($res, true);
		
		if(isset($res['response']['error'])) {
            dd('ERROR');
		}

        foreach($res['response']['result']['Candidates']['row']['FL'] as $k => $v) {

            $tmp[$v['val']]	= ($v['content'] == 'null' ? null : $v['content']);

        }

        //unset($tmp['CANDIDATEID'], $tmp['Candidate ID'], $tmp['Email'], $tmp['Associated Tags'], $tmp['Skill Set'], $tmp['Highest Qualification Held'], $tmp[''], $tmp[''], $tmp[''], $tmp[''],$tmp[''], $tmp[''], $tmp[''])

        $tmp['State'] = '';
        return $tmp;

    }

}
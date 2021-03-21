<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobilepulsa extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->client = new \GuzzleHttp\Client;
	}
	
	public function getBalance()
	{
		$client = $this->client->request('POST', 'https://testprepaid.mobilepulsa.net/v1/legacy/index', [
			'header' => [
				'Content-Type' => 'application/json'
			],
			'json' => [
				'commands' => 'balance',
				'username' => '082214515603',
				'sign' => '75b0bfcac5ccbd4fd98e39bc413c4b30'
			]
		]);
		$result = json_decode($client->getBody()->getContents(), true);
		var_dump($result);
		die;	
	}

	public function getPriceList()
	{
		$client = $this->client->request('POST', 'https://testprepaid.mobilepulsa.net/v1/legacy/index', [
			'header' => [
				'Content-Type' => 'application/json'
			],
			'json' => [
				'commands' => 'pricelist',
				'username' => '082214515603',
				'sign' => '0dd363e12437a170232dc2b032cbafbd'
			]
		]);
		$result = json_decode($client->getBody()->getContents(), true);
		var_dump($result);
		die;
	}

}

/* End of file Controllername.php */
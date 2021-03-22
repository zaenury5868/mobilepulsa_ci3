<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Exception\BadResponseException;

class Mobilepulsa extends CI_Controller {

	private static $mainUrl_Prepaid = 'https://testprepaid.mobilepulsa.net/v1/legacy/index';
	private static $mainUrl_Postpaid = 'https://testpostpaid.mobilepulsa.net/api/v1/bill/check';
	private static $username = '082214515603';
	private static $apiKey = '46760532de382c5e';
	

	
	public function __construct()
	{
		parent::__construct();
		$this->client = new \GuzzleHttp\Client;
	}

	public function index(){
		redirect('bca');
	}
	
	public function getBalance()
	{
		// $client = $this->client->request('POST', 'https://testprepaid.mobilepulsa.net/v1/legacy/index', [
		// 	'header' => [
		// 		'Content-Type' => 'application/json'
		// 	],
		// 	'json' => [
		// 		'commands' => 'balance',
		// 		'username' => '082214515603',
		// 		'sign' => '75b0bfcac5ccbd4fd98e39bc413c4b30'
		// 	]
		// ]);
		// $result = json_decode($client->getBody()->getContents(), true);
		// var_dump($result);
		// die;	

		try {
			//code...
			$output = $this->client->request('POST', self::$mainUrl_Prepaid, [
				'header' => [
					'Content-Type' => 'application/json'
				],
				'json' => [
					'commands' => 'balance',
					'username' => self::$username,
					'sign' => md5(self::$username.self::$apiKey. "bl")
				]
			]);
			$output = json_decode($output->getBody()->getContents());
        } catch (BadResponseException $exception) {
            $output = json_decode($exception->getResponse()->getBody()->getContents());
        }
        return $output;
	}

	public function dashboard()
	{
		$data   = [
            'judul'         => 'Dashboard Mobile Pulsa',
			'saldo'  		=> $this->getBalance()->data->balance
        ];
		$page   =    '/mobilepulsa/dashboard';
        page($page, $data);
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
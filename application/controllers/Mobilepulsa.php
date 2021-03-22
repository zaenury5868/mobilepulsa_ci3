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

	public function dashboard()
	{
		$data   = [
            'judul'         => 'Dashboard Mobile Pulsa',
			'saldo'  		=> $this->getBalance()->data->balance
        ];
		$page   =    '/mobilepulsa/dashboard';
        page($page, $data);
	} 

	public function index(){
		redirect('bca');
	}

	public function pulsa()
	{
		$pulsaprabayar = $this->input->get('pulsa-prabayar');
		if($pulsaprabayar){
			$operator = $this->_prefixList($pulsaprabayar);
			$pricelist = $this->_pricelist('pulsa', $operator)->data;
			// echo json_encode($pricelist->data); die;
		}else {
			$operator = null;
			$pricelist = null;
		}
		$data   = [
            'judul'         => 'Top Up Mobile Pulsa',
			'topup'			=> $pricelist,
			'operator'		=> $operator
        ];
		$page   =    '/mobilepulsa/pulsa';
        page($page, $data);
	}

	private function _prefixList($nohp)
	{
		$prefix = substr($nohp, 0, 4);
		$indosat 	= ['0','0814','0815','0816','0855','0856','0857','0858'];
		$xl 		= ['0','0817','0818','0819','0859','0878','0877'];
		$axis 		= ['0','0838','0837','0831','0832'];
		$telkomsel 	= ['0','0812','0813','0852','0853','0821','0823','0822','0851'];
		$smartfren 	= ['0','0881','0882','0883','0884','0885','0886','0887','0888'];
		$three 		= ['0','0896','0897','0898','0899','0895'];
		if(array_search($prefix, $indosat)){
			$output = 'indosat';
		}elseif (array_search($prefix, $xl)) {
			$output = 'indosat';
		}elseif (array_search($prefix, $axis)) {
			$output = 'axis';
			# code...
		}elseif (array_search($prefix, $telkomsel)) {
			$output = 'telkomsel';
			# code...
		}elseif (array_search($prefix, $smartfren)) {
			$output = 'smartfren';
			# code...
		}elseif (array_search($prefix, $three)) {
			$output = 'three';
			# code...
		}else {
			# code...
			$output = false;
		}

		if ($output != false) {
			# code...
			return $output;
		}else {
			# code...
			$this->session->set_flashdata('error', '<p class="text-danger">Nomor yang anda masukkan salah</p>');
			redirect('pulsa');
			
		}
		var_dump($output); die;
	}
	
	private function _pricelist($type, $operator)
	{
		try {
			//code...
			$output = $this->client->request('POST', self::$mainUrl_Prepaid.'/'.$type.'/'.$operator,[
				'header' => [
					'Content-Type' => 'application/json'
				],
				'json' => [
					'commands' => 'pricelist',
					'username' => self::$username,
					'sign' => md5(self::$username.self::$apiKey. "pl"),
					'status' => 'active'
				]
			]);
			$output = json_decode($output->getBody()->getContents());
		} catch (BadResponseException $exception) {
			//throw $th;
			$output = json_decode($exception->getResponse()->getBody()->getContents());
		}
		return $output;
	}

	private function getBalance()
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
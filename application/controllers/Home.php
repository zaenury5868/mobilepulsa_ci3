<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private static $main_url = 'https://sandbox.bca.co.id';
	private static $api_key = '6b356c47-0c9e-45d4-840b-f28b45f1cc28';
	private static $api_secret = '98566c4d-bc3d-4485-9b64-9d674473eb46';
	private static $client_id = '7eaf4e7b-b876-48ff-ae89-944369e1740a';
	private static $client_secret = 'fc3d9282-ef06-4f68-83d9-ef18af8727c9';
	private static $corporateid = 'BCAAPI2016';
	private static $account_number = '0201245680';
	private static $access_token    = null;
	private static $timeStamp       = null;
	

	public function __construct()
    {
        parent::__construct();
        $this->guzzle       = new \GuzzleHttp\Client;
        self::$timeStamp    = date('o-m-d') . 'T' . date('H:i:s') . '.' . substr(date('u'), 0, 3) . date('P');
		$this->getToken();
    }

	public function index()
	{
		var_dump(self::$access_token);
		die;
		// $this->load->view('template/header');
		// $this->load->view('template/topbar');
		// $this->load->view('template/sidebar');
		// $this->load->view('page/home/index');
		// $this->load->view('template/footer');

		// api key = 6b356c47-0c9e-45d4-840b-f28b45f1cc28
		// api secret = 98566c4d-bc3d-4485-9b64-9d674473eb46
		// cliend id = 7eaf4e7b-b876-48ff-ae89-944369e1740a
		// client secret = fc3d9282-ef06-4f68-83d9-ef18af8727c9
		// Authorization = Basic N2VhZjRlN2ItYjg3Ni00OGZmLWFlODktOTQ0MzY5ZTE3NDBhOmZjM2Q5MjgyLWVmMDYtNGY2OC04M2Q5LWVmMThhZjg3MjdjOQ==

		$page = '/home/index';
		page($page);
	}
	private function getToken()
	{
		$url        = '/api/oauth/token';
        $output     = $this->guzzle->request('POST', self::$main_url . $url, [
            'verify'        => false,
            'headers'       => [
                'Authorization'     => 'Basic ' . base64_encode(self::$client_id . ':' . self::$client_secret),
                'Content-Type'      => 'application/x-www-form-urlencoded'
            ],
            'form_params'   => [
                'grant_type'        => 'client_credentials'
            ]
        ]);
        $output     = json_decode($output->getBody()->getContents(), true);
        return self::$access_token = $output['access_token'];
	}
	

}

/* End of file Home.php */
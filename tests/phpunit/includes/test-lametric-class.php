<?php

class Lametric_TestCase extends Structure_TestCase {
	/**
	 * @var \APIAPI\Core\APIAPI
	 */
	protected $apiapi;

	/**
	 * @var \APIAPI\Structure_Lametric\Structure_Lametric
	 */
	protected $api;

	protected function setUp() {
		$api_key = getenv( 'LAMETRIC_API_KEY' );

		$config = array(
			'transporter'            => 'curl',
			'lametric'                => array(
				'authentication_data' => array(
					'password'   => $api_key,
				),
				'params'   => array(
					'host'         => '192.168.1.39'
				)
			)
		);

		$this->apiapi = apiapi( 'test-api', $config );
	}
}

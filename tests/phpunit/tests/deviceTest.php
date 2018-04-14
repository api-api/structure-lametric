<?php

require_once dirname( dirname( __FILE__ ) ) . '/includes/bootstrap.php';

class UsersTests extends Lametric_TestCase {
	public function testDevice() {
		$request = $this->apiapi->get_request_object( 'lametric', '/device' );
		$response = $this->apiapi->send_request( $request );

		$this->assertEquals( 200, $response->get_response_code() );
	}

	public function testDeviceNotifications() {
		$request = $this->apiapi->get_request_object( 'lametric', '/device/notifications', 'POST' );

		$request->set_subparam( 'model', 'frames', 'icon', 'i298' );
		$request->set_subparam( 'model', 'frames', 'text', 'My Text' );

		$response = $this->apiapi->send_request( $request );

		$this->assertEquals( 200, $response->get_response_code() );
	}
}
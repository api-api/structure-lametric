<?php
/**
 * Structure_Lametric class
 *
 * @package APIAPI\Structure_Billomat
 * @since   1.0.0
 */

namespace APIAPI\Structure_Lametric;

use APIAPI\Core\Structures\Structure;
use APIAPI\Core\Request\Method;

if ( ! class_exists( 'APIAPI\Structure_Lametric\Structure_Lametric' ) ) {

	/**
	 * Structure implementation for Lametric.
	 *
	 * @since 1.0.0
	 */
	class Structure_Lametric extends Structure {
		/**
		 * Sets up the API structure.
		 * This method should populate the routes array, and can also be used to
		 * handle further initialization functionality, like setting the authenticator
		 * class and default authentication data.
		 *
		 * @since 1.0.0
		 */
		protected function setup() {
			$this->title         = 'Lametric API';
			$this->description   = 'Allows to access and manage the data in your Lametric account.';

			$this->base_uri      = 'http://{host}:8080/api/v2/';
			$this->base_uri_params[ 'host' ] = array(
				'description' => 'Host address of device.',
				'internal'    => true,
			);

			$this->authenticator = 'basic';
			$this->authentication_data_defaults = array(
				'username' => 'dev'
			);

			$this->routes['/device'] = array(
				'methods' => array(
					Method::GET  => array(
						'description'          => 'Get Lists',
						'needs_authentication' => true,
						'request_data_type'    => 'json',
						'properties'        => array(
							'fields'    => array(
								'description'   => 'Comma separated list of field you want to receive in response. Possible values are: id, name, serial_number, os_version, mode, model, audio, display, bluetooth and wifi.',
								'type'          => 'string'
							)
						)
					)
				)
			);

			$this->routes['/device/notifications'] = array(
				'methods' => array(
					Method::POST  => array(
						'description'          => 'Sending a notification',
						'needs_authentication' => true,
						'request_data_type'    => 'json',
						'params'        => array(
							'priority'    => array(
								'description'   => 'Priority of notification. Possible values are info, warning or critical.',
								'type'          => 'string'
							),
							'icon_type'    => array(
								'description'   => 'Icon type of notification. Possible values are none, info, alert.',
								'type'          => 'string'
							),
							'lifeTime'    => array(
								'description'   => 'Livetime of notification in milliseconds.',
								'type'          => 'integer'
							),
							'model'    => array(
								'description'   => 'Livetime of notification in milliseconds.',
								'type'          => 'object',
								'properties'    => array(
									'frames'    => array(
										'description' => 'Frames to show',
										'type'    => 'object',
										'properties'  => array(
											'icon'      => array(
												'description' => 'Icon id or base64 encoded binary',
												'type' => 'string'
											),
											'text'      => array(
												'description' => 'Text to show.',
												'type'        => 'string'
											)
										)
									)
								)
							),

						)
					)
				)
			);
		}
	}
}

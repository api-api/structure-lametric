<?php
/**
 * Structure loader.
 *
 * @package APIAPI\Structure_Billomat
 * @since 1.0.0
 */

if ( ! function_exists( 'apiapi_register_structure_lametric' ) ) {

	/**
	 * Registers the structure for Billomat.
	 *
	 * It is stored in a global if the API-API has not yet been loaded.
	 *
	 * @since 1.0.0
	 */
	function apiapi_register_structure_lametric() {
		if ( function_exists( 'apiapi_manager' ) ) {
			apiapi_manager()->structures()->register( 'lametric', 'APIAPI\Structure_Lametric\Structure_Lametric' );
		} else {
			if ( ! isset( $GLOBALS['_apiapi_structures_loader'] ) ) {
				$GLOBALS['_apiapi_structures_loader'] = array();
			}

			$GLOBALS['_apiapi_structures_loader']['lametric'] = 'APIAPI\Structure_Lametric\Structure_Lametric';
		}
	}

	apiapi_register_structure_lametric();

}

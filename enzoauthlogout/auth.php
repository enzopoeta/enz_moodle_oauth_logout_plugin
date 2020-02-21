<?php
require_once($CFG->libdir.'/authlib.php');
//require_once('../../config.php');


class auth_plugin_enzoauthlogout extends auth_plugin_base {


    const COMPONENT_NAME = 'auth_enzoauthlogout';
    const LEGACY_COMPONENT_NAME = 'auth/enzoauthlogout';



  /**
     * Constructor.
     */
    public function __construct() {
        $this->authtype = 'enzoauthlogout';
        $config = get_config(self::COMPONENT_NAME);
        $legacyconfig = get_config(self::LEGACY_COMPONENT_NAME);
        $this->config = (object)array_merge((array)$legacyconfig, (array)$config);
    }


    function logoutpage_hook() {
        global $CFG, $SESSION;

		
		if ($CFG->oauthlogoutendpoint) {
			//$redirect = $CFG->logoutredir;
			require_logout();
                        redirect($CFG->oauthlogoutendpoint);
			
		}
		else {
			error_log("'oauthlogoutendpoint' not set in config.php. Not redirecting.");
		}
    }
}

?>

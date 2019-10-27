<?php
/*
=====================================================
 DataLife Engine v13.3
-----------------------------------------------------
 Persian support site: http://datalifeengine.ir
-----------------------------------------------------
 Contact us with: info@datalifeengine.ir
=====================================================
 Copyright (c) 2006-2019, All rights reserved.
=====================================================
*/

@ob_start ();
@ob_implicit_flush (0);

@error_reporting ( E_ALL ^ E_WARNING ^ E_DEPRECATED ^ E_NOTICE );
@ini_set ( 'error_reporting', E_ALL ^ E_WARNING ^ E_DEPRECATED ^ E_NOTICE );

@ini_set ( 'display_errors', true );
@ini_set ( 'html_errors', false );

define ( 'DATALIFEENGINE', true );
define ( 'ROOT_DIR', dirname ( __FILE__ ) );
define ( 'ENGINE_DIR', ROOT_DIR . '/engine' );

require_once (ENGINE_DIR . '/classes/plugins.class.php');
require_once (DLEPlugins::Check(ROOT_DIR . '/engine/init.php'));

?>
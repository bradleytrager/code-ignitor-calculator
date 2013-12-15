<?php

/* CI_BootStrap by Anidear
 * 
 * This file is used for starting up CodeIgniter without calling Router.
 * After require/inclide this file, a Controller can be created by using:
 *   $class = 'main';
 *   include_once(APPPATH.'controllers/'.$class.'.php');
 *   $CI = new $class();
 * 
 * Model and Library can be loaded after getting a Controller, such as:
 *   $CI->load->model('Data_model');
 *   $CI->load->library('database');
 * 
 */

//disable E_STRICT in phpspec for codeigniter
error_reporting(E_ALL|~E_STRICT);
$system_path = '../system';
/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	// ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';

	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	// this global constant is deprecated.
	define('EXT', '.php');

	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));

	$application_folder = '../src';
	// The path to the "application" folder
	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}
// define('BASEPATH',realpath('../system/').'/'); //set absolute path to CI system/
// define('APPPATH', '../application/'); //set relative path to CI application
// set_include_path(
//                  get_include_path().PATH_SEPARATOR.
//                  realpath(APPPATH).PATH_SEPARATOR.
//  realpath(BASEPATH).PATH_SEPARATOR.'phpspec');  //adding both path for short-name class calling.
 /* If using
 *  - require_once(BASEPATH.'core/CodeIgniter.php');
 * or
 *  - require 'index.php';
 * It needs URL for Router to load specific class & method.
 * But we need to load it manually (by-pass Router)
 */

//load CI (manually)
require BASEPATH.'core/Common.php';
require APPPATH.'config/constants.php';
require BASEPATH.'core/Controller.php';
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
function &get_instance() { return CI_Controller::get_instance(); }
$CFG =& load_class('Config', 'core');
$GLOBALS['CFG'] = $CFG;     //fix by Anidear
$UNI =& load_class('Utf8', 'core');
$URI =& load_class('URI', 'core');
//$RTR =& load_class('Router', 'core');  //bypass router
//$RTR->_set_routing();  //bypass router
$OUT =& load_class('Output', 'core');
$SEC =& load_class('Security', 'core');
$GLOBALS['SEC'] = $SEC;     //fix by Anidear
$IN =& load_class('Input', 'core');
$LANG =& load_class('Lang', 'core');

//load controller (by Router)
//include(APPPATH.'controllers/'.$RTR->fetch_directory().$RTR->fetch_class().'.php');

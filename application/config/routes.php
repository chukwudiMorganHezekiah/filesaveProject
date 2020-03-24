<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//these are the customed routes

$route['saveTo.net/addfile'] = 'home/addfile';

$route['saveTo.net/addnewfile']="home/addnewfile";


//login route for view

$route['saveTo.net/login']="home/login";


//login route for full login 



$route['saveTo.net/loginUser']="home/loginUser";


//Register route for view

$route['saveTo.net/Register']="home/Register";


//Register route for full Register 



$route['saveTo.net/RegisterUser']="home/RegisterUser";

//viewing a single file

$route['saveTo.net/viewfile/(:num)']="home/viewfile/$1";

//deleting file from files and moving to th recycle bins
$route['saveTo.net/viewfile/deleteFile/(:num)']="home/deleteFile/$1";


//going to the recycled files


$route['saveTo.net/recycledfiles']="home/recycledfiles";

//view a recycled file 

$route['saveTo.net/viewrecycledfile/(:num)']="home/viewrecycledfile/$1";


//retrive file  

$route['saveTo.net/viewrecycledfile/retrievefile/(:num)']="home/retrievefile/$1";

//deleting file permanently
$route['saveTo.net/viewrecycledfile/deleteFilePermanently/(:num)']="home/deleteFilePermanently/$1";

//login user

$route['saveTo.net/loginUser']="home/loginUser";

//logout user


$route['saveTo.net/logout']="home/logout";

//search files 


$route['saveTo.net/searchfiles']="home/searchfiles";







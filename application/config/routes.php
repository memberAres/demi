<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['404_override'] = 'error';
$route['default_controller'] = 'pages/view';
$route['pages/get_autocomplete'] = 'pages/get_autocomplete';


/*********** USER DEFINED ROUTES *******************/

$route['administrator'] = "login";

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['viewReport/(:any)'] = "user/viewReport/$1";



$route['viewReport/(:any)/(:any)'] = "user/viewallReport/$1/$2";
$route['editurl'] = "Reportapproval/editurl";
$route['logout'] = 'user/logout';
$route['userListing'] = 'user/userListing';
$route['otherSetting'] = 'user/otherSetting';
$route['usersReport'] = 'user/usersReport';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";
$route['NewReport'] = "user/NewReport";
$route['Upload/upload_file'] = "Upload/upload_file";

$route['addNewUser'] = "user/addNewUser";
$route['addNewreport'] = "Pages/addNewreport";
$route['report_search/get_autocomplete/?'] = "Report_search/get_autocomplete";
$route['report_search/findReport/'] = "Report_search/findReport";

$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";


// For dashboard admin
$route['report_approval'] = 'Reportapproval';
$route['report_approval/deleteReport'] = 'Reportapproval/deleteReport';
$route['report_approval/viewRportNum'] = 'Reportapproval/viewRportNum';


$route['allReports'] = 'AllReports';





/* End of file routes.php */
/* Location: ./application/config/routes.php */
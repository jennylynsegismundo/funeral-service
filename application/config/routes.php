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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// FOR LOG IN BOTH ADMIN AND CUSTOMER
/*to route in the index wherein the user will log in*/
$route['home'] = 'Welcome/index';
/*to route in the register wherein the user will create an account in the system*/
$route['register'] = 'Welcome/register';
/*to route in the dashboard wherein the user will view the dashboard page*/
$route['dashboard'] = 'Welcome/dashboard';
/*just to view the template login*/
$route['Login'] = 'Welcome/templateLogin';
$route['LoginAccount'] = 'Welcome/logInAcc';
$route['RegisterAccount'] = 'Welcome/registerAcc';
$route['logout'] = 'Welcome/logout';

//SIDE BAR IN ADMIN PAGE
$route['Monitoring_Bill'] = 'MonitoringBillController/monitoring_bill';
$route['scheduling_module'] = 'SchedulingController/scheduler'; // Corrected method name
$route['Customer_Dashboard'] = 'CustomerViewServiceController/customerDashboard';

/*----------------------------------------------------------------------*/
// for funeral service
$route['funeralservices'] = 'FuneralserviceController/funeral_service';
$route['funeralservices/add'] = 'FuneralserviceController/add_service';
$route['funeralservices/store'] = 'FuneralserviceController/store_service';
$route['funeralservices/edit/(:any)'] = 'FuneralserviceController/edit/$1';
$route['funeralservices/update/(:any)'] = 'FuneralserviceController/update/$1';
$route['funeralservices/delete/(:any)'] = 'FuneralserviceController/delete/$1';
$route['archiveFuneralService'] = 'FuneralserviceController/archiveFuneralservicePage';
$route['funeralserv_archive/(:any)'] = 'FuneralserviceController/archiveFuneralServ/$1';
$route['funeralserv_unarchive/(:any)'] = 'FuneralserviceController/unarchiveFuneralServ/$1';
/*----------------------------------------------------------------------*/
//ROUTE TO ALL NEW SERVICE
$route['NewAddService'] = 'FuneralserviceController/AddServiceView';
$route['funeralservices/storeNewService'] = 'NewAddServiceController/storeNewService';
// $route['funeralservices/EditNewService/(:any)'] = 'NewAddServiceModel/EditNewService/$1';
$route['edit/(:any)'] = 'NewAddServiceController/EditNewService/$1';
$route['updateNewService/(:any)'] = 'NewAddServiceController/updateNewService/$1';
$route['deleteNewService/(:any)'] = 'NewAddServiceController/deleteNewService/$1';
$route['archiveNewService/(:any)'] = 'NewAddServiceController/archiveNewService/$1';
$route['unarchiveNewService/(:any)'] = 'NewAddServiceController/unarchiveNewService/$1';
$route['ArchivedNewService'] = 'NewAddServiceController/newserviceArchived';
/*-------------------------------------------------------------------------------*/
/*for casket products*/
$route['casket'] = 'CasketController/View_Casket';
$route['addcasket'] = 'CasketController/Add_Casket';
$route['storedcasket'] = 'CasketController/Store_Casket';
$route['editcasket/(:any)'] = 'CasketController/Edit_Casket/$1';
$route['updatecasket/(:any)'] = 'CasketController/Update_Casket/$1';
$route['deletecasket/(:any)'] = 'CasketController/Delete_Casket/$1';
$route['archive_casket/(:any)'] = 'CasketController/Archive_Casket/$1';
$route['unarchive_casket/(:any)'] = 'CasketController/Unarchive_Casket/$1';
$route['archive_casket'] = 'CasketController/View_Archive_Casket';
/*----------------------------------------------------------------------*/
/*for urn view*/
$route['urn'] = 'UrnController/View_Urn';
$route['add_urn'] = 'UrnController/Add_Urn';
$route['stored_urn'] = 'UrnController/Store_Urn';
$route['edit_urn/(:any)'] = 'UrnController/Edit_Urn/$1';
$route['update_urn/(:any)'] = 'UrnController/Update_Urn/$1';
$route['delete_urn/(:any)'] = 'UrnController/Delete_Urn/$1';
$route['archive_urn/(:any)'] = 'UrnController/Archive_Urn/$1';
$route['unarchive_urn/(:any)'] = 'UrnController/Unarchive_Urn/$1';
$route['archive_urn'] = 'UrnController/View_Archive_Urn';
/*----------------------------------------------------------------------*/
/*for additional service page*/
$route['additional_services'] = 'AdditionalProductController/additionalService';
$route['stored_additional_service'] = 'AdditionalProductController/storeAdditionalService';
$route['edit_additional_service/(:any)'] = 'AdditionalProductController/editAdditionalService/$1';
$route['update_additional_service/(:any)'] = 'AdditionalProductController/updateAdditionalService/$1';
$route['delete_additional_service/(:any)'] = 'AdditionalProductController/deleteAdditionalService/$1';
$route['archive_additional_service/(:any)'] = 'AdditionalProductController/archiveAdditionalService/$1';
$route['unarchive_additional_service/(:any)'] = 'AdditionalProductController/unarchiveAdditionalService/$1';
$route['archiveAdditionalService'] = 'AdditionalProductController/archiveaddserv';
/*----------------------------------------------------------------------*/
/*FOR INVENTORY PAGE ALL ROUTE*/
$route['Inventory'] = 'InventoryController/InventoryManagementView';
$route['StoreAddProduct'] = 'InventoryController/storeinInventory';
$route['EditInventoryProduct/(:any)'] = 'InventoryController/editProductInventory/$1';
$route['UpdateInventoryProduct/(:any)'] = 'InventoryController/updateProductInventory/$1';
/*----------------------------------------------------------------------*/
// FOR SCHEDULING PAGE
$route['scheduling'] = 'SchedulingController/scheduler';
$route['scheduler'] = 'SchedulingController/viewScheduler';
$route['editSchedule/(:any)'] = 'SchedulingController/editschedule/$1';
$route['updateSchedule/(:any)'] = 'SchedulingController/updateschedule/$1';
$route['ChooseService'] = 'SchedulingController/ViewChooseService';
/*----------------------------------------------------------------------*/
$route['archivepage'] = 'FuneralserviceController/archiveFile';
/*----------------------------------------------------------------------*/
$route['Customer-Dashboard'] = 'CustomerViewServiceController/customerDashboard';
$route['ViewScheduleService'] = 'CustomerViewServiceController/viewSchedService';
$route['Show-Casket-Customer-Dashboard'] = 'CustomerViewServiceController/showCasketInCustomerPage';
$route['Show-Urn-Customer-Dashboard'] = 'CustomerViewServiceController/showUrnInCustomerPage';
$route['Show-Additional-Service-Customer-Dashboard'] = 'CustomerViewServiceController/showAdditionalServInCustomerPage';
$route['DashboardCustomer'] = 'CustomerViewServiceController/exampledashboard';
/*----------------------------------------------------------------------*/
$route['AdminDashboard'] = 'AdminDashboardController/Admindashboardview';
$route['CustomersAccount'] = 'AdminDashboardController/ViewCustomerDetails';
$route['EditCustomerAccount/(:any)'] = 'AdminDashboardController/Edit_Customer_Acc/$1';
$route['UpdateCustomerAccount/(:any)'] = 'AdminDashboardController/Update_Customer_Acc/$1';
$route['DeleteCustomerAccount/(:any)'] = 'AdminDashboardController/DeleteCustomerAcc/$1';
$route['ArchiveCustomerAccount/(:any)'] = 'AdminDashboardController/Archive_Customer_Acc/$1';
$route['UnarchiveCustomerAccount/(:any)'] = 'AdminDashboardController/Unarchive_CustomerAcc/$1';
$route['ViewArchiveCustomerAccount'] = 'AdminDashboardController/View_Archive_CustomerAcc';
$route['Service'] = 'AdminDashboardController/ServiceView';
$route['AddService'] = 'FuneralserviceController/AddServiceView';
$route['AddadditionalService'] = 'AdminDashboardController/addAdditionalServiceView';
$route['AddCasketProduct'] = 'AdminDashboardController/AddCasketView';
$route['AddUrnProduct'] = 'AdminDashboardController/AddUrnView';
/*FOR UPLOADING IMAGE*/
$route['AddServiceSchedule']['GET'] = 'SchedulingController/AddServiceScheduleView';
/*route to store the input schedule into database*/
$route['scheduling/addSchedule']['POST'] = 'SchedulingController/addSchedule';

/*----------------------------------------------------------------------*/
$route['DashboardOfCustomer'] = 'CustomerViewServiceController/DashboardOfCustomer';
$route['MarkAsInProgress/(:any)'] = 'SchedulingController/markInProgress/$1';
$route['MarkAsComplete/(:any)'] = 'SchedulingController/markComplete/$1';
$route['ViewDetails/(:any)'] = 'SchedulingController/Details/$1';

$route['AddProduct'] = 'InventoryController/AddProductInventory';
$route['CompleteSchedule'] = 'SchedulingController/ViewCompletedSchedule';
$route['ScheduledStatus'] = 'SchedulingController/ViewStatusScheduled';
// ########################################################################################################
// ROUTE (START TO END)
$route['ViewStartToEnd'] = 'StartToEndController/ViewStartToEnd';
$route['ViewEndServiceRecord'] = 'StartToEndController/ViewEndServiceRecord';
// ###########################################################
$route['ViewBillDetails'] = 'MonitoringBillController/ViewTheBillDetails';

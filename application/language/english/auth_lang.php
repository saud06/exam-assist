<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /**
  * Name:  Auth Lang - English
  *
  * Author: Ben Edmunds
  * 		  ben.edmunds@gmail.com
  *         @benedmunds
  *
  * Author: Daniel Davis
  *         @ourmaninjapan
  *
  * Location: http://github.com/benedmunds/ion_auth/
  *
  * Created:  03.09.2013
  *
  * Description:  English language file for Ion Auth example views
  *
  */

  // Errors
  $lang['error_csrf'] = 'This form post did not pass our security checks.';

  // Login
  $lang['login_heading']         = 'Login';
  $lang['login_subheading']      = 'Please login with your user ID and password below.';
  $lang['login_identity_label']  = 'User ID:';
  $lang['login_password_label']  = 'Password:';
  $lang['login_remember_label']  = 'Remember Me:';
  $lang['login_submit_btn']      = 'Login';
  $lang['login_forgot_password'] = 'Forgot your password?';

  // Index
  $lang['index_email_th']          = 'Email';
  $lang['index_status_th']         = 'Status';
  $lang['index_action_th']         = 'Action';
  $lang['index_active_link']       = 'Active';
  $lang['index_inactive_link']     = 'Inactive';

  // Change Password
  $lang['change_password_heading']                               = 'Change Password';
  $lang['change_password_old_password_label']                    = 'Old Password:';
  $lang['change_password_new_password_label']                    = 'New Password (at least %s characters long):';
  $lang['change_password_new_password_confirm_label']            = 'Confirm New Password:';
  $lang['change_password_submit_btn']                            = 'Change';
  $lang['change_password_validation_old_password_label']         = 'Old Password';
  $lang['change_password_validation_new_password_label']         = 'New Password';
  $lang['change_password_validation_new_password_confirm_label'] = 'Confirm New Password';

  // Forgot Password
  $lang['forgot_password_heading']                 = 'Forgot Password';
  $lang['forgot_password_subheading']              = 'Please enter your %s so we can send you an email to reset your password.';
  $lang['forgot_password_email_label']             = '%s:';
  $lang['forgot_password_submit_btn']              = 'Submit';
  $lang['forgot_password_validation_email_label']  = 'Email Address';
  $lang['forgot_password_identity_label'] 		 = 'Identity';
  $lang['forgot_password_email_identity_label']    = 'Email';
  $lang['forgot_password_email_not_found']         = 'No record of that email address.';

  // Reset Password
  $lang['reset_password_heading']                               = 'Change Password';
  $lang['reset_password_new_password_label']                    = 'New Password (at least %s characters long):';
  $lang['reset_password_new_password_confirm_label']            = 'Confirm New Password:';
  $lang['reset_password_submit_btn']                            = 'Change';
  $lang['reset_password_validation_new_password_label']         = 'New Password';
  $lang['reset_password_validation_new_password_confirm_label'] = 'Confirm New Password';

  // Header
  $lang['header_sign_out'] 			= 'Sign out';
  $lang['header_online'] 				= 'Online';
  $lang['header_main_navidation'] 	= 'MAIN NAVIGATION';
  $lang['header_dashboard'] 			= 'Dashboard';
  $lang['header_exam'] 			= 'Exam';
  $lang['header_list'] 				= 'List';
  $lang['header_add'] 				= 'Add';
  $lang['header_reports'] 			= 'Reports';

  //Exam
  $lang['exam_list'] 			= 'List Exam';
  $lang['configure_exam'] 		= 'Configure Exam';
  $lang['filter_exam'] 		= 'Filter Exam';
  $lang['print_exam'] 		= 'Print Exam';
  $lang['exam_name'] 			= 'Exam Name';
?>
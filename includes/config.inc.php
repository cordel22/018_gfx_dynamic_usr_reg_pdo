<?php # Script 18.3 - config.inc.php
/*  This script:
 * - define constants and settings
 * - dictates how errors are handled
 * - defines useful functions
 */

 // Created by Don Double C, 19/12/2021 

 // ************************************************** //
 // *******************SETTINGS*********************** //

 // Flag vaariable for site status: 
  define ('LIVE', FALSE);

 //  Admin contact address:
  define ('cordelfenevall@gmail.com, Courts of Chaos');

 // Site URL (basee for all redirections):
  define ('BASE_URL', 'http://www.exmple.com/');

 // Loction of the MySQL connection script:
  define ('MYSQL', '/path/to/mysqli_connect.php');

 // Adjust the time zone for PHP 5.1 and greater:
  date_default_timezone_set ('US/Eastern');

 
 // *******************SETTINGS*********************** //
 // ************************************************** //

 // ************************************************** //
 // ****************ERROR MANAGEMENT****************** //

 // Create the error handler:
  function my_error_handler ($e_number, $e_message, $e_file, $e_line, $e_vars) {
    //  Build the error message:
    $message = "An error occured in script 
    '$e_file' on line $e_line: $e_message\n";

    //  Add the date and time:
    $mesage .= "Date/Time: " . date('n-j-Y H:i:s') . "\n";

    if (!LIVE) {
      //  Development (print the error).

      //  Show the error message:
      echo '<div class="error">' . nl2br($message);

      //  add the variables nd a backtrace:
      echo '<pre>' . print_r ($e_vars, 1) . "\n";
      debug_print_backtrace();
      echo '</pre></div>';
    } else {
      //  Don't show the error:
      //  end an email to the admin:
      $body = $mesage . "\n" . print_r($e_vars, 1);
      mail(EMAIL, 'Site Error!', $body, 'From: email@example.com');

      //  Only print an error mesage if the error isn't a notice:
      if ($e_number != E_NOTICE) {
        echo '<div clss="error">A system error occurred. 
        We apologize for the inconvenience.</div><br />';
      }
    } //  End of !LIVE IF.
  } //  End of my_error_handler() definition.

  //  Use my_error_handler:
  set_error_handler ('my_error_handler');
  
  
  
  // ****************ERROR MANAGEMENT****************** //
  // ************************************************** //





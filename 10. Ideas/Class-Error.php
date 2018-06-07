<?php
/*Predefined Constants
E_ERROR (integer) 	Fatal run-time errors. These indicate errors that can not be recovered from, such as a memory allocation problem. Execution of the script is halted.
E_WARNING (integer) 	Run-time warnings (non-fatal errors). Execution of the script is not halted.
E_PARSE (integer) 	Compile-time parse errors. Parse errors should only be generated by the parser.
E_NOTICE (integer) 	Run-time notices. Indicate that the script encountered something that could indicate an error, but could also happen in the normal course of running a script.
E_STRICT (integer) 	Enable to have PHP suggest changes to your code which will ensure the best interoperability and forward compatibility of your code
Furthermore : http://php.net/manual/en/errorfunc.constants.php
*/
class error_management
{
    public function errorReportStop()
    {
        // Turn off all error reporting
        error_reporting(0);
    }

    public function errorReportStart()
    {
        // Report all PHP errors : must -1
        error_reporting(-1);
    }

    public function errorReportIdeal()
    {
        // Reporting E_NOTICE can be good too (to report uninitialized
        // variables or catch variable name misspellings ...)
        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE | E_STRICT);
    }

    public function errorReportNormal()
    {
        // Report all errors except E_NOTICE
        error_reporting(E_ALL & ~E_NOTICE);
    }

    public function errorReportAll()
    {
        // Report all PHP errors (see changelog)
        error_reporting(E_ALL);
    }

    public function errorReportCustom(string $function)
    {
        set_error_handler($function);
    }

    public function errorTrigger(string $mssg, int $code)
    {
        trigger_error($mssg, $code);
    }
}

//error handler function
function customError($errlevel, $errmessage, $errfile, $errline)
{
    echo "<b>Code Error:</b> [$errlevel] $errmessage $errfile $errline";
}

$test = new error_management();
//$test->errorReportStop();
//$test->errorReportAll();
$test->errorReportCustom("customError");
$test->errorTrigger("icikibum", 1024);
echo($teest);

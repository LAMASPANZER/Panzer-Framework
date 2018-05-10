<?php
namespace Panzer;

abstract class Debug
{
   /**
     * Error handler. Convert all errors to Exceptions by throwing an ErrorException.
     *
     * @param int $level  Error level
     * @param string $message  Error message
     * @param string $file  Filename the error was raised in
     * @param int $line  Line number in the file
     *
     * @return void
     */
    public static function errorHandler($level, $message, $file, $line)
    {
        if (error_reporting() !== 0) {  // to keep the @ operator working
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    /**
     * Exception handler.
     *
     * @param Exception $exception  The exception
     *
     * @return void
     */
    public static function exceptionHandler($exception)
    {
        $code = $exception->getCode();
        $http_status_codes = [100 => "Continue", 101 => "Switching Protocols", 102 => "Processing", 200 => "OK", 201 => "Created", 202 => "Accepted", 203 => "Non-Authoritative Information", 204 => "No Content", 205 => "Reset Content", 206 => "Partial Content", 207 => "Multi-Status", 300 => "Multiple Choices", 301 => "Moved Permanently", 302 => "Found", 303 => "See Other", 304 => "Not Modified", 305 => "Use Proxy", 306 => "(Unused)", 307 => "Temporary Redirect", 308 => "Permanent Redirect", 400 => "Bad Request", 401 => "Unauthorized", 402 => "Payment Required", 403 => "Forbidden", 404 => "Not Found", 405 => "Method Not Allowed", 406 => "Not Acceptable", 407 => "Proxy Authentication Required", 408 => "Request Timeout", 409 => "Conflict", 410 => "Gone", 411 => "Length Required", 412 => "Precondition Failed", 413 => "Request Entity Too Large", 414 => "Request-URI Too Long", 415 => "Unsupported Media Type", 416 => "Requested Range Not Satisfiable", 417 => "Expectation Failed", 418 => "I'm a teapot", 419 => "Authentication Timeout", 420 => "Enhance Your Calm", 422 => "Unprocessable Entity", 423 => "Locked", 424 => "Failed Dependency", 424 => "Method Failure", 425 => "Unordered Collection", 426 => "Upgrade Required", 428 => "Precondition Required", 429 => "Too Many Requests", 431 => "Request Header Fields Too Large", 444 => "No Response", 449 => "Retry With", 450 => "Blocked by Windows Parental Controls", 451 => "Unavailable For Legal Reasons", 494 => "Request Header Too Large", 495 => "Cert Error", 496 => "No Cert", 497 => "HTTP to HTTPS", 499 => "Client Closed Request", 500 => "Internal Server Error", 501 => "Not Implemented", 502 => "Bad Gateway", 503 => "Service Unavailable", 504 => "Gateway Timeout", 505 => "HTTP Version Not Supported", 506 => "Variant Also Negotiates", 507 => "Insufficient Storage", 508 => "Loop Detected", 509 => "Bandwidth Limit Exceeded", 510 => "Not Extended", 511 => "Network Authentication Required", 598 => "Network read timeout error", 599 => "Network connect timeout error"];
        if (!array_key_exists($code, $http_status_codes))
        	$code = 500;
        http_response_code($code);

        if (Application::getConfigs('debug')) {
        	$debug = "<!DOCTYPE html><html><head><title>" . $code . " " . $http_status_codes[$code] . "</title>";
        	$debug .= "<style type=\"text/css\">";
			$debug .= "body{font-family: monospace, \"Courier New\", Courier; width: 95%; margin: auto;}";
			$debug .= "pre{white-space: pre-wrap;}";
			$debug .= "table{width: 95%; text-align: left; border-collapse: collapse; word-break: break-word;}";
			$debug .= "table td, table th{padding: 6px 4px;}";
			$debug .= "table tbody td{font-size: 15px; color: #323f4e; line-height: 20px;}";
			$debug .= "table tr.strip{height: 15px;}";
			$debug .= "table tfoot td{font-size: 15px;}";
			$debug .= "</style>";
        	$debug .= "</head><body><table><tbody>";
            $debug .= "<tr class=\"strip\"><td><strong>HTTP Request:</strong> " . $_SERVER['SERVER_PROTOCOL'] . " " . $_SERVER['REQUEST_METHOD'] ." '". htmlentities($_SERVER['REQUEST_URI']) . "'</td></tr>";
            $debug .= "<tr class=\"strip\"><td><strong>HTTP Response status code:</strong> '" . $code . " " . $http_status_codes[$code] . "'</td></tr>";
            $debug .= "<tr class=\"strip\"><td><strong>Uncaught exception:</strong> '" . get_class($exception) . "'</td></tr>";
            $debug .= "<tr class=\"strip\"><td><strong>Message:</strong> '" . htmlentities($exception->getMessage()) . "'</td></tr>";
            $debug .= "<tr class=\"strip\"><td><strong>Execution time:</strong> '" . Application::getTimestart() . "'</td></tr>";
            $debug .= "<tr class=\"strip\"><td>Thrown in '<u>" . $exception->getFile() . "</u>' on <u>line " . $exception->getLine() . "</u></td></tr>";
            $debug .= "<tr><td><strong>Stack trace:</strong><pre>" . preg_replace('/^(#0.*)/', '<span style="color: red;">$1</span>', $exception->getTraceAsString()) . "</pre></td></tr>";

            $debug .= "</tbody></table></body></html>";
            return exit($debug);
        } else {
        	if ($code == 500) {
	            ini_set("display_errors", 1);
	            ini_set("log_errors", 1);
	            ini_set('error_log', '../App/Logs/' . date('Y-m-d') . '.txt');

	            $message =  $_SERVER['SERVER_PROTOCOL'] . " " . $_SERVER['REQUEST_METHOD'] ." '". $_SERVER['REQUEST_URI'] . "' | HTTP Response status code '" . $code . " " . $http_status_codes[$code] . "'";
	            $message .= "\nUncaught exception: '" . get_class($exception) . "' with message '" . $exception->getMessage() . "' and code '" . $exception->getCode()."'";
	            $message .= "\nStack trace:\n" . $exception->getTraceAsString();
	            $message .= "\nThrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "\n";

	            error_log($message);
        	}

            $view = new View;
			$view->RenderError($code);
        }
    }
}

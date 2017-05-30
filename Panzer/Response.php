<?php
namespace Panzer;

class Response
{
	const HTTP_STATUS_CODES = [
		100 => "Continue",
		101 => "Switching Protocols",
		102 => "Processing",
		200 => "OK",
		201 => "Created",
		202 => "Accepted",
		203 => "Non-Authoritative Information",
		204 => "No Content",
		205 => "Reset Content",
		206 => "Partial Content",
		207 => "Multi-Status",
		300 => "Multiple Choices",
		301 => "Moved Permanently",
		302 => "Found",
		303 => "See Other",
		304 => "Not Modified",
		305 => "Use Proxy",
		306 => "(Unused)",
		307 => "Temporary Redirect",
		308 => "Permanent Redirect",
		400 => "Bad Request",
		401 => "Unauthorized",
		402 => "Payment Required",
		403 => "Forbidden",
		404 => "Not Found",
		405 => "Method Not Allowed",
		406 => "Not Acceptable",
		407 => "Proxy Authentication Required",
		408 => "Request Timeout",
		409 => "Conflict",
		410 => "Gone",
		411 => "Length Required",
		412 => "Precondition Failed",
		413 => "Request Entity Too Large",
		414 => "Request-URI Too Long",
		415 => "Unsupported Media Type",
		416 => "Requested Range Not Satisfiable",
		417 => "Expectation Failed",
		418 => "I'm a teapot",
		419 => "Authentication Timeout",
		420 => "Enhance Your Calm",
		422 => "Unprocessable Entity",
		423 => "Locked",
		424 => "Failed Dependency",
		424 => "Method Failure",
		425 => "Unordered Collection",
		426 => "Upgrade Required",
		428 => "Precondition Required",
		429 => "Too Many Requests",
		431 => "Request Header Fields Too Large",
		444 => "No Response",
		449 => "Retry With",
		450 => "Blocked by Windows Parental Controls",
		451 => "Unavailable For Legal Reasons",
		494 => "Request Header Too Large",
		495 => "Cert Error",
		496 => "No Cert",
		497 => "HTTP to HTTPS",
		499 => "Client Closed Request",
		500 => "Internal Server Error",
		501 => "Not Implemented",
		502 => "Bad Gateway",
		503 => "Service Unavailable",
		504 => "Gateway Timeout",
		505 => "HTTP Version Not Supported",
		506 => "Variant Also Negotiates",
		507 => "Insufficient Storage",
		508 => "Loop Detected",
		509 => "Bandwidth Limit Exceeded",
		510 => "Not Extended",
		511 => "Network Authentication Required",
		598 => "Network read timeout error",
		599 => "Network connect timeout error"
	];

	/**
	 * @var Http status code, default is 200 Ok
	 */
	private $statusCode = 200;

	/**
	 * @var type
	 */
	private $bodyType = 'html';

	/**
	 * @var Data
	 */
	private $body = '';

	/**
	 * Return http status code
	 * @return int
	 */
	public function getStatusCode()
	{
		return (int)$this->statusCode;
	}

	/**
	 * Return string from http status code
	 * @return string
	 */
	public function getStringStatusCode()
	{
		return self::HTTP_STATUS_CODES[$this->statusCode];
	}

	/**
	 * Return type of body request
	 * @return string
	 */
	public function getBodyType()
	{
		return $this->bodyType;
	}

	/**
	 * Return content of request
	 * @return mixed
	 */
	public function getBody()
	{
		return $this->body;
	}

	public function setStatusCode($code)
	{
		if (is_null($code) or !array_key_exists($code, self::HTTP_STATUS_CODES))
			$this->statusCode = 500;
		else
			$this->statusCode = $code;
		return $this;
	}

	public function setBodyRaw($body, String $type=null)
	{
		if (!is_null($type))
			$this->bodyType = $type;

		$this->body = $body;
		return $this;
	}

	public function send()
	{
		header("HTTP/1.1 ".$this->statusCode." ".self::HTTP_STATUS_CODES[$this->statusCode]);
		header("Cache-Control: no-cache, must-revalidate");

		switch ($this->bodyType) {
			case 'html':
				header('Content-Type:text/html;charset=utf-8');
				exit($this->body);
				break;
			case 'json':
				header('Content-type:application/json;charset=utf-8');
				exit(json_encode($this->body));
				break;
			case 'text':
				header('Content-type:text/plain;charset=utf-8');
				exit($this->body);
				break;
			default:
				throw new \Exception("Content type is undefined", 415);
				break;
		}
	}

	public function redirect($route, array $params = array())
	{
		header("Cache-Control: no-cache, must-revalidate");
		header('Location: '.View::Path($route, $params));
		exit();
	}
}

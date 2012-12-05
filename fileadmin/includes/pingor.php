<?php
#
# PINGOR := very quickndirty pingback client ;; web edition (php5 required)
# iso            
# (at)
# kapsobor 
# .
# de
#
# BSD License

define('PASSWORD', 'pleaschangethistoarandomstringofyourchoice'); # CHANGE THIS PASSWORD !!1!

# Changelog:
#
# 08-02-18 fixed some minor bugs in the code, removed duplicate url pinging
# 06-09-05 added targetURI auto discovery & cleaned up messy code
# 06-09-04 initial version w/ pb-server auto discovery (http head & html head)

# --------------------------------------------------------- main() {

define('VERSION', '08-02-18');
error_reporting(E_ALL | E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

$sourceURI = stripslashes(trim($_POST['sourceURI']));
$pass  = stripslashes($_POST['pass']);

# allow via command line 
if(empty($sourceURI) && empty($pass) && !empty($argv[0])) {
	if(!empty($_SERVER['SERVER_NAME'])) die("we are not in cli mode");
	$sourceURI = $argv[1];
	$pass = PASSWORD;
}

echo "<html><head><title>kapsobor pingback client</title><style>body { font-face: Verdana, Helvetica, Arial; font-size: 10px; background: black; color: white; } a { text-decoration:none; color: yellow; } .value input { width: 300px; margin-bottom: 8px; } .title input { border: 1px solid white; background-color: #000; color: #fff; } code { color: gray; } </style></head><body><h1>kapsobor pingbank client</h1><hr />";
flush();
ob_flush();

if($pass != PASSWORD || empty($sourceURI)) {
	if($pass) write("[!] Try using the correct password.");	
	display_form($sourceURI);
	_exit();
}

write("[-] Trying to find target in sourceURI");

$targets = getTargets($sourceURI);

write("[-] Found ".sizeof($targets)." targets.");

foreach($targets as $targetURI) {

	write("[+] Pinging ".htmlspecialchars($targetURI)." with link from ".htmlspecialchars($sourceURI)." ...");

	if($targetURI == $sourceURI) {
		write("[-] Skipping target - it's the same as source URL");
		continue;
	}
	
	write("[-] Trying to locate Pingback Server for $targetURI via HTTP Header");

	preg_match("/X-Pingback: (\S+)/i", http_req($targetURI, "HEAD"), $matches);
	if(isset($matches[1])) {
		$pingbackserver = $matches[1];
	} else {
		write("[-] Did not find Pingback-Server in Header. Trying HTML head ..");
		preg_match("/<link rel=\"pingback\" href=\"([^\"]+)\" ?\/?>/i", http_req($targetURI), $matches);
		$pingbackserver = $matches[1];
		if(!$pingbackserver) {
			write("[!] Could not find pingbackserver for ".htmlspecialchars($targetURI));
			continue;
		}
	}

	write("[-] Found Pingback-Server ".htmlspecialchars($pingbackserver));
	$res = ping($pingbackserver, $sourceURI, $targetURI);

	write("[-] Return value:\n<br /><pre>".htmlspecialchars($res)."</pre>");
}

write("[+] There. All done.");
display_form();
_exit();

# --------------------------------------------------------- } // main() 

function getTargets($sourceURI) {
	$src = http_req($sourceURI);
	preg_match_all("/<a[^>]+href=.(http:\/\/[^'\"]+)/i", $src, $matches);
	return array_unique($matches[1]);

}

function http_req($uri, $method = "GET", $add_header = '', $payload =  '') {
	preg_match("/^http:\/\/([^\/]+)(.*)$/", $uri, $matches);
	$hostname = $matches[1];
	$script = $matches[2];
	if(empty($hostname)) { 
		write("[!] Parsing of URL $uri failed.");
		return;
	}
	$fp = fsockopen($hostname, 80, $errno, $errstr, 30);
	if(!$fp) {
		write("[!] Connection to ".htmlspecialchars($hostname)." failed: $errstr ($errno)");
		return;
	}
	fwrite($fp, "$method $script HTTP/1.1
Host: $hostname
User-Agent: kapsobor pingor
$add_header

$payload
");
	stream_set_timeout($fp, 1);
	$res = stream_get_contents($fp); 
	fclose($fp);
	return $res;
}
function ping($pingbackserver, $sourceURI, $targetURI) {

	$payload = <<<ENDE
	<?xml version="1.0"?>
	<methodCall>
		<methodName>pingback.ping</methodName>
		<params>
		<param>
		<value>$sourceURI</value>
		</param>
		<param>
		<value>$targetURI</value>
		</param>
		</params>
	</methodCall>
ENDE;
	$length = strlen($payload);
	$request_head = "Content-Type: text/xml\r\nContent-length: $length";

	return http_req($pingbackserver, "POST", $request_head, $payload);
}

function write($txt) {
	echo(date('Y-m-d H:i:s',time()). ' - ' . $txt . "<br />\n");
	flush();
	ob_flush();
	usleep(50000);
}

function display_form($sourceURI = "") {
	$s = htmlspecialchars($sourceURI);

	echo <<<ENDE_GELAENDE
	<hr />
	<form method="post">
	<div class="title">Password:</div>
	<div class="value"><input type="password" name="pass"></div>
	
	<div class="title">Source URL:</div>
	<div class="value"><input type="text" name="sourceURI" value="$s"></div>
	
	<div class="title"><input type="submit" value="ping!"></div>

	</form>
	<p>
	Source URL has to be in the form of <code>http://host.name/path/to/blog/post.html</code>. It is the URL to your blog posting. _All_ absolute links 
	therein will tried to be pinged.
	</p>
ENDE_GELAENDE;
}

function _exit($txt = '') {
	if(!empty($txt)) write($txt);
	echo "<hr /><h4>v ".VERSION." - Find latest version at <a href='http://blog.kapsobor.de/articles/pingor/'>blog.kapsobor.de</a></h4></body></html>";
	exit;
}


?>

<?php
$url = 'http://localhost/100days_mini_script/php/0001day/redirect.php';
$url_redirect = 'http://localhost/'; 

//test redirect
$headers = get_headers($url);

//check status code
$status_code = get_status_code($headers[0]);
assert($status_code === '302');

//check location url
$header_data = parse_headers($headers);
assert(isset($header_data['location'])
       && $header_data['location'] === $url_redirect);

$url = 'http://localhost/100days_mini_script/php/0001day/redirect_301.php';
$url_redirect = 'http://localhost/'; 

//test redirect
$headers = get_headers($url);

//check status code
$status_code = get_status_code($headers[0]);
assert($status_code === '301');

//check location url
$header_data = parse_headers($headers);
assert(isset($header_data['location'])
       && $header_data['location'] === $url_redirect);

function get_status_code($status_line)
{
    $status = explode(' ', $status_line, 3);
    return count($status) >= 3 ? $status[1] : false;
}

function parse_headers($headers) {
    $result = array();
    foreach ($headers as $header) {
        $header_data = explode(':',$header, 2);
        if (count($header_data) >= 2) {
            $result[$header_data[0]] = trim($header_data[1]);
    	}
    }
    return $result;
}


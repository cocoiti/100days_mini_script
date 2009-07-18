<?php
$redirect_url = 'http://localhost/';
$status_code =  'HTTP/1.0 301 Moved Permanently';
$location_header = sprintf('location: %s', $redirect_url);
header($status_code);
header($location_header);

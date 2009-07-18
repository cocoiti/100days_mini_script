<?php
$redirect_url = 'http://localhost/';
$location_header = sprintf('location: %s', $redirect_url);
header($location_header);

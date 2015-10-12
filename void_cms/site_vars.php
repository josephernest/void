<?php
$void_config = Array(
              0 => (isset($sitename) ? $sitename : "Website"),
	          1 => date('l jS \of F Y'),
    'Webmaster' => "<a href=\"mailto:void@example.com\">VoidMaster</a>",
            'IP'=> $_SERVER['REMOTE_ADDR']
);

$void_sys = Array(
     'brand_name' => 'Void',
      'brand_url' => 'http://www.thisisvoid.org',
    'show_footer' => true
);

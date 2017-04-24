<?php
$sitename = "Void";
$site_header = $sitename; // example of text
// $site_header = "<img src=\"image/header001.png\">"; // example of image
$blogpagename = "blog";

$void_config = Array(
              0 => "Website",
              1 => date('l jS \of F Y'),
    'Webmaster' => "<a href=\"mailto:void@example.com\">VoidMaster</a>",
            'IP'=> $_SERVER['REMOTE_ADDR']
);

$void_sys = Array(
     'brand_name' => 'Void',
      'brand_url' => 'https://github.com/apmuthu/void',
     'footer_txt' => '123 Void Avenue, Timbuktoo. Anyville. Nation.</br>Phone: +999-99-9999999. Fax: +999-99-1111111. <a href="mailto:company@example.com">company@example.com</a>',
    'show_footer' => true,
'show_footer_txt' => true
);

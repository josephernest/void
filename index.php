<?php 
$sitename = "SomeWebsite";
$blogpagename = "blog";

error_reporting(0);

function getpage($page)
{
  $pagestr = file_get_contents($page);
  list($pageheader, $pagecontent) = preg_split('~(?:\r?\n){2}~', $pagestr, 2);  // split into 2 parts : before/after the first blank line
  preg_match("/^TITLE:(.*)$/m", $pageheader, $matches1);                        // for articles: title // for pages: title displayed in top-menu
  preg_match("/^AUTHOR:(.*)$/m", $pageheader, $matches2);                       // for articles only
  preg_match("/^DATE:(.*)$/m", $pageheader, $matches3);                         // for articles only
  preg_match("/^(NOMENU:1)$/m", $pageheader, $matches4);                        // for pages only: if NOMENU:1, no link in top-menu
  preg_match("/^URL:(.*)$/m", $pageheader, $matches5);                          // for articles: article's link    // for pages: top-menu's link 
  return array($pagecontent, $matches1[1], trim($matches2[1]), $matches3[1], $matches4[1], trim($matches5[1]));
}

$siteroot = substr($_SERVER['PHP_SELF'], 0,  - strlen(basename($_SERVER['PHP_SELF']))); // must have trailing slash, we don't use dirname because it can produce antislash on Windows
$requestedpage = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $siteroot) { $requestedpage = ""; }     // check if homepage 
$type =  strpos($_SERVER['REQUEST_URI'], 'article/') ? 'article' : 'page';
$pages = glob("./" . $type ."/*$requestedpage.{txt,md}", GLOB_BRACE);
if ($pages) { $page = $pages[0]; } else { $page = "./page/HIDDEN-404.txt"; $type = 'page'; }                 // default 404 error page
list($pagecontent, $pagetitle, $pageauthor, $pagedate, $pagenomenu, $pageurl) = getpage($page);
if (!$pageurl) { $pageurl = pathinfo($page)['filename']; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo (trim($pagetitle) ? "$sitename - $pagetitle" : "$sitename")?></title>
  <base href="<?php echo $siteroot; ?>">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
  <div class="logo"><a href="."><?php echo $sitename;?></a></div>
  <ul class="menu">
    <?php
    $pages = glob("./page/*.{txt,md}", GLOB_BRACE);
    foreach($pages as $page)
    {
      list($menupagecontent, $menupagetitle, $menupageauthor, $menupagedate, $menupagenomenu, $menupageurl) = getpage($page);
      if (!$menupagenomenu) { echo "<li><a href=\"" . ($menupageurl ? $menupageurl : strtolower($menupagetitle)) . "\">$menupagetitle</a></li>"; }
    }
    ?>
  </ul>
</div>
<div class="main">

<?php
require 'Parsedown.php';

if ($type === "article")
{ 
  echo "<div class=\"article\"><a href=\"article/$pageurl\"><h2 class=\"articletitle\">$pagetitle</h2><div class=\"articleinfo\">by $pageauthor, on $pagedate</div></a>";
  echo (new Parsedown())->text($pagecontent);
  echo "</div>";
} 
else if ($type === "page") { echo "<div class=\"page\">" . (new Parsedown())->text($pagecontent) . "</div>"; }

if ($requestedpage === $blogpagename)
{
  $pages = array_slice(array_reverse(glob("./article/*.{txt,md}", GLOB_BRACE)), $_GET['start'], 10);
  foreach($pages as $page)
  {
    list($pagecontent, $pagetitle, $pageauthor, $pagedate, $pagenomenu, $pageurl) = getpage($page);
    if (!$pageurl) { $pageurl = pathinfo($page)['filename']; }
    echo "<div class=\"article\"><a href=\"article/$pageurl\"><h2 class=\"articletitle\">$pagetitle</h2><div class=\"articleinfo\">by $pageauthor, on $pagedate</div></a>";
    echo (new Parsedown())->text($pagecontent);
    echo "</div>";
  }
  if ($_GET['start'] > 0) { echo "<a href=\"" . $blogpagename . (($_GET['start'] > 10) ? "?start=" . ($_GET['start'] - 10) : "") . "\">Newer articles</a>&nbsp; "; }
  if (count(array_slice(array_reverse(glob("./article/*.{txt,md}", GLOB_BRACE)), $_GET['start'], 11)) > 10) { echo "<a href=\"" . $blogpagename . "?start=" . ($_GET['start'] + 10) . "\">Older articles</a>"; }
}

?>
</div>
<div class="footer">
  <div class="left"><a href="">© <?php echo date('Y') . " " . $sitename; ?></a></div>
  <div class="right">Powered by <a href="http://www.thisisvoid.org">Void</a>.</div>
</div>
</body>
</html>
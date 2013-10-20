<?php
header('Status : 200 OK');
$ori_qs = $_SERVER['QUERY_STRING'];
$pattern = '/[^;]+;[^:]+:\/\/[^\/]+(\/[^\?]*)(?:\?(.*))?/i';
preg_match($pattern,$ori_qs,$matches);
$_SERVER['PATH_INFO']   = $matches[1].'?'.$matches[2];
$_SERVER['REQUEST_URI'] = $_SERVER['PATH_INFO'];
$query_args             = explode('&amp;',$matches[2]);
unset($_GET);
foreach ($query_args as $arg)
{
$the_arg = explode('=',$arg);
$_GET[$the_arg[0]] = $the_arg[1];
}
include('./index.php');
?>
<?php
$s=$_GET['s'];
$s=str_replace('/','',$s);
$s=str_replace('.html','',$s);
$rr=explode("_",$s);
unset($_GET['s']);

switch ($rr[0]){
    case 'channel':
        if($rr[1] != 'home'){
         $_GET['favid']=$rr[1];
        }else{
            $_GET['favid']='';
        }
        include_once ('channel.php');
        break;
    case 'detail':
        $_GET['id']=$rr[1];
        include_once ('info.php');
        break;
    default:
        include_once ('channel.php');
        break;

}
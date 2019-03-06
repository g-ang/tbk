<?php
/**
 * Created by PhpStorm.
 * User: lixuegang
 * Date: 19/2/6
 * Time: 上午12:38
 */

$headLabels=[
    'index' =>['title'=>'￥9元包邮好货','style'=>'color: red;','url'=>'index.php?high_price=9.9'],
    'BabiesToys'    =>['title'=>'儿童玩具','url'=>'index.php?label=BabiesToys'],
    'Outdoor'       =>['title'=>'户外','url'=>'index.php?label=Outdoor'],
    'HomeMandatory' =>['title'=>'居家必需品','url'=>'index.php?label=HomeMandatory'],
    'WomenFashion'  =>['title'=>'女性时尚','url'=>'index.php?label=WomenFashion'],
    'MenFashion'    =>['title'=>'男装','url'=>'index.php?label=MenFashion'],
    'Beauty'        =>['title'=>'美妆','url'=>'index.php?label=Beauty'],
];

$res=Util::Get("favlist");
$headLabels=$res['data'];
if(isset($_GET['favid'])){
    $favId=$_GET['favid'];

foreach ($headLabels as $k=>$label){
    if($label['favorites_id'] == $favId){
        Seo::SetTitle($label['favorites_title']);
    }
}
}
?>
<!DOCTYPE html>
<html lang="zh-CN" style="font-size: 42.6667px;">
<head>
    <meta charset=utf-8>
    <title><?php echo Seo::$title;?>|angbuy.com</title>
    <meta name=”Keywords” Content=”<?php echo Seo::$keyword;?>″ >
    <meta name=”description” Content=”<?php echo Seo::$description;?>″ >
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css?v=0.2">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <style>
        body {
            font-size: 14px;
            line-height: 1.8;
            background: #f2f2f2;
        }
        li{
            list-style: none;
            float: left;
        }

        a{
            text-decoration: none;
        }
        .head a{
            color: #fff;
            text-decoration: none;
        }
        .head li{
            float: left;
            padding-top:4px;
            padding-right: 18px;
            line-height: 24px;
            list-style: none;
            font-size: 14px;
            margin-bottom: 4px;

        }

        img {
            border: 0 none;
            width: auto;
            height: auto;
            max-width: 100%;
            vertical-align: top;
            -ms-interpolation-mode: bicubic;
        }

        .currbox{
            padding: 4px 6px;
            background: red !important;
            color: #fff;
            border-radius: 2px;
        }
        .nocurrbox{
            padding: 4px 6px;
            background: #dfdfdf;

            border-radius: 2px;
        }

    </style>
</head>
<body>
<div class="container-fluid head" style="width: 100%;background: #444;min-height: 32px;   color: #fff; margin:0px;padding:0px;" >
    <div class="container">
    <ul>
        <li><a href="<?php echo  Util::ChannelUrl('home',['high_price'=>'9.9']);?>" title="￥9.9元好货" style="color: red;" >￥9.9元好货</a></li>
        <?php foreach ($headLabels as $k=>$label):?>
        <li ><a href="<?php echo Util::ChannelUrl($label['favorites_id'])?>" <?php if(isset($_GET['favid']) && $_GET['favid'] == $label['favorites_id'] ){ echo 'class="currbox"';};?> title="<?php echo $label['favorites_title'];?>" <?php if(isset($label['style'])){ echo "style='{$label['style']}'";} ?> ><?php echo $label['favorites_title'] ?></a></li>
        <?php endforeach;?>
    </ul>
    </div>
</div>
<div style="clear: both">&nbsp;</div>



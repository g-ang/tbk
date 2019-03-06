<?php
require_once 'util.php';

if(!$_GET['page']){
    $_GET['page']=1;
}

$offset=0;
$limit=12;



if(isset($_GET['offset'])){
    $offset=$_GET['offset'];
}

if(isset($_GET['page'])){
    $page=(int)$_GET['page'];
    $offset=($page-1)*$limit;
}
//
$param=[
    'offset'=>$offset,
    'limit' =>$limit,
];

$res=Util::Get("favorites",array_merge($_GET,$param));
if(!$res['total']){
    $total=0;
}else{
    $total=$res['total'];
}

$pageTotal=ceil($total/$limit);
?>
<div>
<?php foreach ($res['data'] as $i=>$row):?>
<dl class="list-item" style="width: 260px; float: left; padding: 4px 8px; <?php echo (($i+1)%3 == 0 ) ?  'margin-right:20px;' : 'margin-right:20px;'?>" >
    <dt style="height:245px;">
        <img style="width: 100%; height:240px;" src="<?php echo $row['pict_url'];?>" />
    </dt>
    <dd style="word-wrap:break-word;margin: 0px;padding: 0px; ">
        <div class="info-con">
        <p class="list-item-name line2"><a target="_blank" title="<?php echo $row['title']?>" href="<?php echo Util::DetailUrl($row['num_iid'])?>"><?php echo mb_substr($row['title'],0,33);?></a></p>

        <p class="price_sell"><span>现价¥</span> <span><?php echo $row['zk_final_price'];?></span> <span class="sell-num">月销量:<?php echo $row['volume'];?>件</span></p>
            <div class="hr"></div>
        <div class="coupon-con">
            <?php if(isset($row['coupon_click_url']) && $row['coupon_click_url']!="") :?>
            <div class="coupon-amount-icon p-top">
                <div class="icon-left">券</div>
                <span><?php echo preg_replace("/满\d{1,5}元减/","",$row['coupon_info'])?></span>
            </div>
            <?php endif;?>
            <div class="coupon-amount-price">券后价:<span class="c-red">¥</span><span class="c-red big-price"><?php echo round($row['ad_price'],2);?></span></div>
        </div>
        </div>
    </dd>
</dl>
<?php endforeach;?>
    <?php if($total>0):?>
    <div style="clear: both;"></div>
    <div style="text-align: center;">
        <ul class="pagination">
            <?php for($page=1;$page<=$pageTotal;$page++):?>
            <li><a href="<?php echo Util::Url('?',['page'=>$page])?>"   <?php echo Util::IsTrue($_GET['page'] == $page,'style="background: red;color: #fff;"');?> ><?php echo $page ?></a></li>
            <?php endfor;?>

    </div>
</div>
<?php  endif; ?>
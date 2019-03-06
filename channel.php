<?php
/**
 * Created by PhpStorm.
 * User: G
 * Date: 2019/3/5
 * Time: 22:15
 */

require_once 'util.php';

if(!$_GET['sort']){
    $_GET['sort']='cheap';
}

$res=Util::Get("favlist",$_GET);
$types=$res['data'];
if(false == isset($_GET['favid'])){
    // $_GET['favid']=$types[0]['favorites_id'];
}
Seo::SetTitle("淘宝优惠券");
Seo::SetKeyword("angbuy","淘宝优惠券","优惠券网","怎么买最划算","怎么买最便宜");
Seo::SetDescription("angbuy.com 是一个简单的领取优惠券然后在去淘宝购物的网站，我们会在这里可以找到很多优惠商品。在这里您不仅可以得到优惠券，同时还可以得到店家返回的佣金。");
?>
<?php include 'header.php' ?>
    <div class="container">
        <div style="margin-bottom: 6px;">
            <a href="?sort=cheap<?php //echo Util::Url('?',['sort'=>'cheap'])?>" <?php echo Util::IsTrue($_GET['sort']== 'cheap','class="currbox"','class="nocurrbox"');?> >最便宜</a>
            <a href="?sort=coupon<?php // echo Util::Url('?',['sort'=>'coupon'])?>" <?php echo Util::IsTrue($_GET['sort'] == 'coupon','class="currbox"','class="nocurrbox"');?> >最实惠</a>
            <a href="?sort=hot_sale<?php // echo Util::Url('?',['sort'=>'hot_sale'])?>" <?php echo Util::IsTrue($_GET['sort'] == 'hot_sale','class="currbox"','class="nocurrbox"');?> >最畅销</a>
        </div>
    </div>

    <div class="container" style="min-height: 1000px;">
        <?php if(isset($_GET['label']) && count($types)>5):?>
            <div>
                <ul style="margin: 0px;padding: 0px;">
                    <?php foreach ($types as $row):?>
                        <li style="margin-right: 12px;"><a href="<?php echo Util::Url('?',['favid'=>$row['favorites_id']])?>"><?php echo $row['favorites_title']?></a></li>
                    <?php endforeach;?>
                </ul>
                <div style=" clear: both;"></div>
            </div>
        <?php endif; ?>
        <?php include 'favorites.php';?>
    </div>
<?php include 'footer.php' ?>
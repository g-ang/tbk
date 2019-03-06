<?php
require_once 'util.php';
$res=Util::Get("favinfo",$_GET);
$info=$res['data'];

?>

<style>
     .lll{
         height: 60px;
     }
     .yhh-goods-link {
         margin-top: 10px;
        height: 60px;
        display: inline-block;
        text-decoration: none;
        font-size: 24px;
        margin-right: 20px;
        background-color: #1eadfb;
         text-align: center;
    }

    .yhh-goods-price {
        display: inline-block;
        height: 60px;
        line-height: 60px;
        color: #fff;
        padding: 0 25px;
        text-align: center;
    }

   .yhh-goods-view {
        background-color: #ff5000;
        display: inline-block;
        height: 60px;
        line-height: 60px;
        font-size: 20px;
        color: #fff;
        vertical-align: top;
        min-width: 182px;
        text-align: center;

    }

     .item-content .discount {
         height: 1rem;
         line-height: 1rem;
         font-size: .5rem;
         margin: .02rem 0 0;
     }

     .item-content .discount .img-tag {
         vertical-align: middle;
         width: 2.1rem;
     }

     .item-content {

         padding: 1% 3%;
         box-sizing: border-box;
         background: #fff;
         border-radius: 12px;
        margin:%1;
         text-align: left;

     }

     .item-content .title, .item-content .title span {
         overflow: hidden;
         font-size: .4rem;
         line-height: .5rem;
     }

     .item-content .title {
         height: 1.2rem;
     }

     .item-content .tags {
         height: 1rem;
         line-height: 1rem;
         margin-top: .3rem;
     }

     .item-content .discount .sale {
         font-size: 1.2rem;
         vertical-align: middle;
         color: #f40;
         margin-left: .2rem;
     }
     .recommend {
         background: #f6f6f6;
         padding-top: .3rem;
         padding-bottom: .5rem;
     }

     .body-wrap {
         width: 15rem;
         margin: 0 auto;
         position: relative;
         background: #f2f2f2;
         padding-top: .3rem;
         background-size: 15rem auto;
         overflow: hidden;
     }

     .body-wrap {
         background-size: 15rem auto;
     }

     .recommend-title {
         background: url(//gw.alicdn.com/tfs/TB1G_HoQFXXXXbwXFXXXXXXXXXX-343-21.png);
         width: 6.86rem;
         height: .42rem;
         text-align: center;
         background-size: cover;
         margin: .1rem auto .5rem;
     }


     .shop-info .shop-logo img {
         width: 100%;
     }

     .shop-info .shop-title {
         font-size: .5rem;
         color: #fff;
         display: block;
     }
     .price-origin{

     }
     .price-origin .origin {
         color: #333;
         font-size: .5rem;
     }

     .item-content .tags {
         height: 1rem;
         line-height: 1rem;
         margin-top: .3rem;

     }

     .byTag {
         background: 0 0;
         font-size: 12px;
         line-height: 14px;
         height: 14px;
         padding: 0 2px;
         border: 1px solid #f40;
         color: #f40;
     }

     .tmallTag {
         width: .62rem;
         height: .62rem;
     }
     .tags .dealNum {
         float: right;
         color: #9b9b9b;
         top: -.2rem;
         position: relative;
     }

    .item-info{
        width:420px;
        float: left;
    }
</style>

<?php
Seo::SetTitle($info['title']);
Seo::SetKeyword("angbuy","淘宝优惠券","优惠券网","怎么买最划算","怎么买最便宜");
Seo::SetDescription("angbuy.com 是一个简单的领取优惠券然后在去淘宝购物的网站，我们会在这里可以找到很多优惠商品。在这里您不仅可以得到优惠券，同时还可以得到店家返回的佣金。");

include 'header.php' ?>

    <div class="container body-wrap">
        <div class="row item-content shop-info">

            <div class="item-info" style="margin-right: 40px;">
                <img src="<?php echo $info['pict_url']?>" title="" style="width: 420px;">
            </div>
            <div class="item-info">
                <div class="title" style=" margin-top: 10px; word-wrap:break-word">
                    <span><?php echo $info['title']?></span>
                    <?php if($info['coupon_info']!=""):?>
                        <span ><a href="javascript:void(0);" style="color: red;" onclick="go()"><?php echo $info['coupon_info']?></a></span>
                    <?php endif;?>
                </div>
                <div class="tags"  style="margin: 10px 0px;"><span class="tmallTag tag"><img src="//gw.alicdn.com/tps/TB10U2vKFXXXXa3XXXXXXXXXXXX-36-36.png" alt=""><?php echo $info['shop_title'];?> </span> <span class="byTag tag">包邮</span><span class="dealNum">月销量<?php echo $info['volume'];?>笔成交</span></div>

                <div class="price-origin" style="margin: 10px 0px;" ><span class="origin">现价 ¥<?php echo $info['zk_final_price'];?></div>
                <div class="discount"><img class="img-tag" src="//gw.alicdn.com/tps/TB1Y1XlNpXXXXczapXXXXXXXXXX-93-36.png"><span class="sale"><em>¥</em><?php echo Util::Disc($info['coupon_info'],$info['zk_final_price']);?></span> </div>

                <div class="yhh-goods-link"  style="margin: 30px 0px;">
                    <a href="javascript:void(0);" onclick="go()" ><span class="yhh-goods-view">领券去天猫购买</span></a></a>
                </div>
            </div>
            </div>

    </div>
    <div style="clear: both;"></div>

<?php

    $offset=0;
    $limit=4;

    //
    $param=[
    'offset'=>$offset,
    'limit' =>$limit,
    ];

    if(isset($_GET['favid'])){
         $param['favid']=$_GET['favid'];
    }else{
        $param['favid']=$info['favorites_id'];
    }


    $res=Util::Get("favorites",$param);
    ?>
    <div class="container" style="margin-top: 20px;">
    <p class="recommend-title"><span>更多宝贝推荐</span></p>
<?php foreach ($res['data'] as $row):?>
    <dl class="list-item"  class="list-item" style="width: 260px;float: left; padding: 4px 8px; <?php echo (($i+1)%3 == 0 ) ?  'margin-right:20px;' : 'margin-right:20px;'?>">
        <dt >
            <img style="width: 100%; max-height: 240px;" src="<?php echo $row['pict_url'];?>" />
        </dt>
        <dd style="word-wrap:break-word;margin: 0px;padding: 0px;">
            <div class="info-con">
                <p class="list-item-name line2"><a target="_blank" href="<?php echo Util::DetailUrl($row['num_iid'])?>" title="<?php echo $row['title']; ?>"><?php echo mb_substr($row['title'],0,30);?></a></p>

                <p class="price_sell"><span>现价¥</span> <span><?php echo $row['zk_final_price'];?></span>
                  <span class="sell-num">月销量:<?php echo $row['volume'];?>件</span></p>
                <div class="hr"></div>
                <div class="coupon-con">
                    <?php if(isset($row['coupon_click_url']) && $row['coupon_click_url']!="") :?>
                        <div class="coupon-amount-icon p-top">
                            <div class="icon-left">券</div>
                            <span><?php echo preg_replace("/满\d{1,5}元减/","",$row['coupon_info'])?></span>
                        </div>
                    <?php endif;?>
                    <div class="coupon-amount-price">券后价:<span class="c-red">¥</span><span class="c-red big-price"><?php echo Util::Disc($row['coupon_info'],$row['zk_final_price']);?></span></div>
                </div>

            </div>
        </dd>
    </dl>
<?php endforeach;?>
    </div>
    <div style="clear: both;"></div>

<script>
    function go() {
        location.href="<?php echo $info['coupon_click_url']?>"
    }
</script>


<?php include 'footer.php' ?>
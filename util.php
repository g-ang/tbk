<?php
/**
 * Created by PhpStorm.
 * User: lixuegang
 * Date: 19/2/2
 * Time: 上午6:58
 */

class Util {
    static function  Get($act,$param=[]){
        $url="http://localhost:8080/bee/taobaoke/{$act}?".http_build_query($param);

        $res=file_get_contents($url);
        if(isset($_GET['test'])){
            print_r($res);
        }
        return json_decode($res,true);
    }

    static function Url($act,$param=[]){
        $get=$_GET;
        foreach ($param as $k=>$v){
            if($v == 0 ){
                unset($get[$k]);
            }else{
                $get[$k]=$v;
            }
        }
        if ($act!="" && substr($act,-1) !="?" && count($get)>0){
             $act.='?';
        }
        return $act.http_build_query($get);
    }

    static function ChannelUrl($act,$param=[]){
       $param['page']=0;
       $param['favid']=0;
       $param['high_price']=0;
       $param['id']=0;
       return self::Url('/channel_'.$act.'.html',$param);
    }

    static function DetailUrl($act,$param=[]){
        $param['id']=0;
        return self::Url('/detail_'.$act.'.html',$param);
    }

    static function Disc($coupon_info,$price){
        if(!$coupon_info || $coupon_info==""){
            return $price;
        }
       $v=preg_replace("/满\d{1,5}元减/","",$coupon_info);
       $p1=str_replace("元","",$v);
       return $price-$p1;
    }

    static function IsTrue($v,$html,$falseHtml=null){
        if (isset($v) && $v!="" && $v == true){
            return $html;
        }
        return $falseHtml;
    }
}

class Seo{
    public static $title;
    public static $keyword;
    public static $description;
    public static function SetTitle($title){
        self::$title=$title;
        return self;
    }

    public static function SetKeyword(string ...$keyword){
        self::$keyword=implode(",",$keyword);
        return self;
    }

    public static function SetDescription($description){
        self::$description=$description;
        return self;
    }
}


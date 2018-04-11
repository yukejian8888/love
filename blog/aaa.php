<?php
$url = "https://detailskip.taobao.com/service/getData/1/p1/item/detail/sib.htm?itemId=560206545343&sellerId=199138789&modules=dynStock,qrcode,viewer,price,duty,xmpPromotion,delivery,activity,fqg,zjys,couponActivity,soldQuantity,originalPrice,tradeContract&callback=onSibRequestSuccess";

$header = [
        'Accept:*/*',
        'Accept-Encoding:deflate, br',
        'Accept-Language:zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2',
        'Host:detailskip.taobao.com',
        'Referer:https://item.taobao.com/item.htm?id=560206545343',
        'User-Agent:Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36',
        'Cookie:l=AgkJYPrXz5iYTECbxUks6WClmT5jUf2I; UM_distinctid=15ec2e07b0b20b-07f804331e0c07-3a3e5f04-15f900-15ec2e07b0c150; thw=cn; miid=2198375722080126377; _cc_=VFC%2FuZ9ajQ%3D%3D; tg=0; enc=p4a7lv7tuuvafvFVo7JPFBFlQ%2FJrDeobclcvr12IO4w4ZPEF%2BDZ%2FiVIl7%2Bj4%2Bq0grR6cnAhDvgM7MI6jnll4RQ%3D%3D; hng=CN%7Czh-CN%7CCNY%7C156; mt=ci=0_0; uc2=wuf=http%3A%2F%2F121.199.162.194%2Fnewwebhuoniu%2Findex.php%3Fs%3D%2FProhibitWords%2FIndex%2Frecord%2Fid%2F412%2Ftid%2Ff0905cdf0673e90906aa04571a30a418.html; cna=zLBPEkCI5XMCAXxBv9Zbnu1f; x=199138789; uc3=sg2=U%2BIkaz9aD8zc0az%2BCDi2wEI%2FEnHOUcNziODAZoi5MQg%3D&nk2=&id2=&lg2=; uss=Vv8c8f05WmpAk2bMwUDBVPW0y4VyRkXlNP6sUFf850zT5MsCsy2I4RLjgj4%3D; tracknick=; sn=%E6%97%B6%E7%A9%BA%E6%9D%82%E8%B4%A7%E5%BA%97%3A%E8%B0%A2%E5%87%A1; skt=2c605652dd9f45c0; v=0; cookie2=22f724b7fdd7b95bee7d7c341e02e567; unb=3407060803; t=782d839a743b3d965a4648e95d9d4dcb; _m_h5_tk=8f6a6cec4c1e7672f098e1f7e4ad93bb_1516844771276; _m_h5_tk_enc=2da0d64492a52f15923f974a89f89dc4; ali_ab=124.65.191.214.1506329357335.5; uc1=cookie14=UoTdfY32TAsxfA%3D%3D&lng=zh_CN; ubn=p; _tb_token_=e0346541b357f; ucn=unzbyun; isg=BMDAv0GajuqmIHFPKI0UIAnBkU5S4aVsF_omcDpRnFtutWDf4ll0o5blyR11BVzr',
        'Connection:keep-alive',
        'Pragma:no-cache',
        'Cache-Control:no-cache',
];

$curl = curl_init();
curl_setopt($curl, CURLOPT_HTTPHEADER  , $header);
curl_setopt($curl, CURLOPT_HEADER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl,   CURLOPT_URL, $url);   // url
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
$result = curl_exec($curl);
curl_close($curl);
echo $result;
//file_put_contents('1.txt', $result);

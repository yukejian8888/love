








789; uc3=sg2=U%2BIkaz9aD8zc0az%2BCDi2wEI%2FEnHOUcNziODAZoi5MQg%3D&nk2=&id2=&lg2=; uss=Vv8c8f05WmpAk2bMwUDBVPW0y4VyRkXlNP6sUFf850zT5MsCsy2I4RLjgj4%3D; tracknick=; sn=%E6%97%B6%E7%A9%BA%E6%9D%82%E8%B4%A7%E5%BA%97%3A%E8%B0%A2%E5%87%A1; skt=2c605652dd9f45c0; v=0; cookie2=22f724b7fdd7b95bee7d7c341e02e567; unb=3407060803; t=782d839a743b3d965a4648e95d9d4dcb; _m_h5_tk=8f6a6cec4c1e7672f098e1f7e4ad93bb_1516844771276; _m_h5_tk_enc=2da0d64492a52f15923f974a89f89dc4; ali_ab=124.65.191.214.1506329357335.5; uc1=cookie14=UoTdfY32TAsxfA%3D%3D&lng=zh_CN; ubn=p; _tb_token_=e0346541b357f; ucn=unzbyun; isg=BMDAv0GajuqmIHFPKI0UIAnBkU5S4aVsF_omcDpRnFtutWDf4ll0o5blyR11BVzr',
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

//file_put_contents('1.xt', $result);

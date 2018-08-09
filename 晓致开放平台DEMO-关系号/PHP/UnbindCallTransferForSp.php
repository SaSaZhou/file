<!DOCTYPE html>
<html>
<body>
<?php
	//C.保密号模式接口 2. 关系虚号解绑接口 [http post] AXB模式解绑操作
	$url="http://sandbox.teleii.com/unbindCallTransferForSp.do";
	$spId="商户Id"; //teleii平台分配的商户id
	$spKey="商户key"; //teleii平台分配的商户key
	$timestamp=time()."000"; //毫秒级的时间戳
	$seqId=$timestamp;
	$fm="180****7074";//主叫号码
	$tm="134****7537";//被叫主码
	$vm="131****2289"; //虚拟号码

	//Md5(key+id+timestamp+fm+tm+vm) 生成签名
	$sign_source=$spKey.$spId.$timestamp.$fm.$tm.$vm;
	$sign=md5($sign_source);

	//拼接HTTP请求参数
	$curlparams="id=".$spId."&timestamp=".$timestamp."&vm=".$vm."&fm=".$fm."&tm=".$tm."&sign=".$sign;

	//打印HTTP请求参数
	echo "<br/>url:".$url;
	echo "<br />".$sign_source;
	echo "<br/>sign:".$sign;
	echo "<br/>".$curlparams."<br/>";

	//发起HTTP请求
	$result=postUrlForCalling($url, $curlparams);
	echo "result:".$result;//打印HTTP请求响应结果

	function postUrlForCalling($url, $reqParams){
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_HEADER,0);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$reqParams);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
?>
</body>
</html>
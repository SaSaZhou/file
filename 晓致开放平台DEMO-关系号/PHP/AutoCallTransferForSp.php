<!DOCTYPE html>
<html>
<body>
<?php
	//C.保密号模式接口 1. 关系虚号呼转接口_AxB模式绑定
	$url="http://sandbox.teleii.com/autoCallTransferForSp.do";
	$spId="商户Id"; //teleii平台分配的商户id
	$spKey="商户key"; //teleii平台分配的商户key
	$timestamp=time()."000"; //毫秒级的时间戳
	$seqId=$timestamp;
	$fm="180****7075"; //主叫号码
	$tm="1345****7537"; //被叫号码
	$virtualMobile=""; //虚拟号码.创建新关系时，虚拟号码为空,系统自行分配虚拟号码。
	$bindTime=10;//关系绑定10分钟

	//Md5(key+id+seqId+timestamp+fm+tm)； 生成签名
	$sign_source=$spKey.$spId.$seqId.$timestamp.$fm.$tm;
	$sign=md5($sign_source);

	//拼接HTTP请求参数
	$curlparams="id=".$spId."&timestamp=".$timestamp."&seqId=".$seqId."&fm=".$fm."&tm=".$tm."&bindTime=".$bindTime."&virtualMobile=".$virtualMobile."&sign=".$sign;

	//打印HTTP的参数
	echo "<br />".$sign_source;
	echo "<br/>sign:".$sign;
	echo "<br/>".$curlparams."<br/>";

	//发起HTTP请求
	$result=postUrlForCalling($url, $curlparams);
	echo "result:".$result; //打印HTTP请求结果

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
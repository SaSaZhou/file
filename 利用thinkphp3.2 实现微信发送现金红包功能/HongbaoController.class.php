<?php
namespace Home\Controller;
use Think\Controller;
use Com\redPack\CommonUtil;
use Com\redPack\MD5SignUtil;
use Com\redPack\WxHongBaoHelper;
use Com\redPack\SDKRuntimeException;

class HongbaoController extends Controller {
	private $app_id = 'wx85dk8bcd908983f5'; //微信企业应用的AppID   
	private $app_mchid = '1231793890'; //商户号
	private $api_key = 'fedf9789fas9d8fas9fd87as98dfas1q'; //商户支付密钥Key
	

	
	// 微信发送红包
	public function index(){
		//测试的OpenID
		$re_openid = "oy3OI0ht0xasd9TlhkSn9PND7zI";   
		//红包金额单位是分所以得乘以100
		$price = 1 * 100;
		
		//组装数据
		$wxHongBaoHelper = new WxHongBaoHelper ();
		$wxHongBaoHelper->setParameter ( "nonce_str", $this->great_rand () ); //随机字符串，丌长于 32 位
		$wxHongBaoHelper->setParameter ( "mch_billno", $this->app_mchid . date ( 'YmdHis' ) . rand ( 1000, 9999 ) ); //订单号
		$wxHongBaoHelper->setParameter ( "mch_id", $this->app_mchid ); //商户号
		$wxHongBaoHelper->setParameter ( "wxappid", $this->app_id);
		$wxHongBaoHelper->setParameter ( "nick_name", '红包' ); //提供方名称
		$wxHongBaoHelper->setParameter ( "send_name", '红包发送' ); //红包发送者名称
		$wxHongBaoHelper->setParameter ( "re_openid", $re_openid ); //相对于医脉互通的openid
		$wxHongBaoHelper->setParameter ( "total_amount", $price ); //付款金额，单位分
		$wxHongBaoHelper->setParameter ( "min_value", 100 ); //最小红包金额，单位分
		$wxHongBaoHelper->setParameter ( "max_value", 20000); //最大红包金额，单位分
		$wxHongBaoHelper->setParameter ( "total_num", 1 ); //红包収放总人数
		$wxHongBaoHelper->setParameter ( "wishing", '恭喜发财' ); //红包祝福诧
		$wxHongBaoHelper->setParameter ( "client_ip", '128.52.64.79' ); //调用接口的机器 Ip 地址
		$wxHongBaoHelper->setParameter ( "act_name", '红包活动' ); //活劢名称
		$wxHongBaoHelper->setParameter ( "remark", '快来抢！' ); //备注信息

		//生成xml并且生成签名
		$postXml = $wxHongBaoHelper->create_hongbao_xml ( $this->api_key );
		//dump ( $postXml);die();
		//提交请求
		$url = 'https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack';
		$responseXml = $wxHongBaoHelper->curl_post_ssl ($url, $postXml);
		
		$responseObj = simplexml_load_string ( $responseXml, 'SimpleXMLElement', LIBXML_NOCDATA );
		//转换成数组
		$responseArr = ( array ) $responseObj;
		
		$return_code = $responseArr ['return_code'];
		$result_code = $responseArr ['result_code'];
		
		//判断是否红包是否发送成功
		if ($return_code == "SUCCESS" && $result_code == "SUCCESS") {
			echo "发送成功";
			//dump ( $responseArr );
		} else {
			echo "发送失败";
			//dump ( $responseArr );
		}
	
	}
	//获取随机数
	public function great_rand(){
		$str = '1234567890abcdefghijklmnopqrstuvwxyz';
		for($i = 0; $i < 30; $i ++) {
			$j = rand ( 0, 35 );
			$t1 .= $str [$j];
		}
		return $t1;
	}
}
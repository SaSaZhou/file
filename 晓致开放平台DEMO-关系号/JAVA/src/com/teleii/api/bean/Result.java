package com.teleii.api.bean;

public class Result {
	public final static int RESULT_SUCCESS = 0;//成功
	public final static int RESULT_UNKNOWN_ERROR = -1;//未知错误
	public final static int RESULT_SERVICE_STOP = -2;//服务暂停
	public final static int RESULT_PARAM_ERROR = -3;//无效参数
	public final static int RESULT_PARAM_LOST = -4;//缺失参数
	public final static int RESULT_UNAUTHORIZE_IP = -5;//未授权的IP地址
	public final static int RESULT_UNAUTHORIZE_ID = -6;//未授权的Id帐号
	public final static int RESULT_ID_ERROR = -7;//Id无效
	public final static int RESULT_ID_STATUS_ERROR = -8;//Id帐号状态异常，联系管理员
	public final static int RESULT_SIGN_ERROR = -9;//签名错误
	/** result=-10,  concurrent并发请求超过限制的范围 */
	public final static int RESULT_CONCURRENT_OVERLOAD = -10;//concurrent并发请求超过限制的范围
	public final static int RESULT_UNAUTHORIZE_MOBILE = -11;//未授权的虚拟号码
	public final static int RESULT_TIMESTEMP_ERROR = -12;//时间戳格式错误
	public final static int RESULT_TIMESTEMP_OVERDUE = -13;//overdue时间戳过期错误（冗余的时间范围前后12小时）
	public final static int RESULT_BINDMOBILE_ERROR = -14;//绑定号码错误
	public final static int RESULT_BINDMOBILE_ISVM = -15;//绑定的号码是虚拟号码
	public final static int RESULT_BINDTIME_ERROR = -16;//绑定时间错误
	public final static int RESULT_FM_ISVM = -17;//来源号码是虚拟号码
	public final static int RESULT_TM_ISVM = -18;//被叫号码是虚拟号码
	public final static int RESULT_SMS_NO_MONEY = -19;//短信没有余额
	public final static int RESULT_CALL_NO_MONEY = -20;//语音没有余额
	public final static int RESULT_BINDMOBILE_UNBIND = -21;//语音没有余额
	public final static int RESULT_NO_VM=-22;//无法获取虚拟号码
	
	public final static int RESULT_FIXTIME_GT_BINDTIME_ERROR=-23;//绑定的号码流程中fixtime大于了bindtime
	public final static int RESULT_NO_FM_VM_TM=-24;//不存在的绑定关系，或绑定关系已经过期
	
	public final static int RESULT_NO_PERMISSION=-25;//操作未授权
	public final static int RESULT_EXIST_BIND=-26;//存在绑定关系，无法重复操作，解绑后可操作
	public final static int RESULT_BLOCK_NUMBER=-27;//黑名单号码，禁止操作
	/** result=-40 非该商户测试白名号码  */
	public final static int RESULT_NOT_IN_WHITE=-40;
	/** result=-41 该商户没有测试虚拟号码  */
	public final static int RESULT_NEVER_TEST_VM=-41;
	/** result=-42 该分机号不属于该商户  */
	public final static int RESULT_EXT_NO_BELONG_SP=-42;
	
	public final static int RESULT_SERVICE_ERROR = -99;//服务异常
	
	private int result;
	private String error;
	private String virtualMobile;
	private String value;
	
	public Result(){
	}
	public Result(int result,String error){
		this.result = result;
		this.error = error;
	}
	public Result(int result,String error,String virtualMobile){
		this.result = result;
		this.error = error;
		this.virtualMobile = virtualMobile;
	}
	public Result(int result,String error,String virtualMobile,String value){
		this.result = result;
		this.error = error;
		this.virtualMobile = virtualMobile;
		this.value = value;
	}
	
	public String getValue() {
		return value;
	}
	public void setValue(String value) {
		this.value = value;
	}
	public int getResult() {
		return result;
	}
	public void setResult(int result) {
		this.result = result;
	}
	public String getError() {
		return error;
	}
	public void setError(String error) {
		this.error = error;
	}
	public String getVirtualMobile() {
		return virtualMobile;
	}
	public void setVirtualMobile(String virtualMobile) {
		this.virtualMobile = virtualMobile;
	}
	@Override
	public String toString() {
		return "Result [result=" + result + ", error=" + error
				+ ", virtualMobile=" + virtualMobile + ", value=" + value + "]";
	}
}

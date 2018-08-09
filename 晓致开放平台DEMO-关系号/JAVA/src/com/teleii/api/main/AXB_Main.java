package com.teleii.api.main;

import com.teleii.api.bean.Result;
import com.teleii.api.helper.ApiTransferHelper;

/**
 * 功能：关系号[AXB]服务
 * */
public class AXB_Main {
	/** 沙箱测试地址,  正式应用请修改为正式地址进行调用 */
	private static final  String apiUrl="http://sandbox.teleii.com/"; 
	private static final String appId = "appId";  //请从paas平台获取, 测试环境下请使用测试配置中的接入参数
	private static final String appKey = "appKey"; //请从paas平台获取, 测试环境下请使用测试配置中的接入参数
	
	public static void main(String[] args) {
		autoCallTransferForSp();
	}

	/**
	 * 功能：虚拟号码关系绑定操作
	 * */
	public static void autoCallTransferForSp(){
		ApiTransferHelper api = new ApiTransferHelper(apiUrl, appId, appKey);
		String timestamp = System.currentTimeMillis()+"";
		String seqId = timestamp; //接入商平台生成的标识，保证一段时间内不重复，用于异步消息通知时的对应关系
		String fm = "180****7071";
		String tm = "180****7072";
		 Integer bindTime = 60; //
		 String beLong = null;
		 String virtualMobile = null; //测试时，虚拟号为空，由系统自动分配
		 Integer scene = 0;
		Result result = api.autoCallTransferForSp(seqId, timestamp, fm, tm, bindTime, beLong, virtualMobile, scene);
		System.out.println("虚拟号码关系绑定结果："+ result.toString());
	}
	
	/**
	 * 功能：虚拟号码关系解绑操作
	 * */
	public static void unbindCallTransferForSp(){
		ApiTransferHelper api = new ApiTransferHelper(apiUrl, appId, appKey);
		String timestamp = System.currentTimeMillis() + "";
		String fm = "180****7071";
		String tm = "180****7072";
		String vm = "189****9780";
		Result result = api.unbindCallTransferForSp(timestamp, fm, tm, vm);
		System.out.println("虚拟号码关系解绑结果："+ result.toString());
	}
	
	/**
	 * 功能：虚拟号码关系批量绑定操作
	 * */
	public static void autoMultiCallTransferForSp(){
		ApiTransferHelper api = new ApiTransferHelper(apiUrl, appId, appKey);
		String timestamp = System.currentTimeMillis()+"";
		String seqId = timestamp; //接入商平台生成的标识，保证一段时间内不重复，用于异步消息通知时的对应关系
		String fm = "180****7071";
		String tms = "180****7072,180****7073,180****7074";
		 Integer bindTime = 60; //
		 String beLong = null;
		 Integer scene = 0;
		Result result = api.autoMultiCallTransferForSp(seqId, timestamp, fm, tms, bindTime, beLong, scene);
		System.out.println("虚拟号码关系批量绑定结果："+ result.toString());
	}
}

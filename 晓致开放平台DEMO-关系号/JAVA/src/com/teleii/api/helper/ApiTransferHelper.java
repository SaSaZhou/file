package com.teleii.api.helper;

import com.teleii.api.bean.CallTransferResult;
import com.teleii.api.bean.GroupResult;
import com.teleii.api.bean.Result;
import com.teleii.api.util.GsonUtil;
import com.teleii.api.util.HttpUtil;
import com.teleii.api.util.MD5Util;

public class ApiTransferHelper {
	private String apiUrl="http://sandbox.teleii.com/";
	private String appId;
	private String appKey;
	
	public ApiTransferHelper(){}
	
	public ApiTransferHelper(String appId, String appKey){
		this.appId = appId;
		this.appKey = appKey;
	}
	
	public ApiTransferHelper(String apiUrl, String appId, String appKey){
		this.apiUrl = apiUrl;
		this.appId = appId;
		this.appKey = appKey;
	}
	
	/**
	 * 功能：D5. 分机号组关系解绑接口
	 * */
	public GroupResult unbindIvrCallTransferForGroup(String fms, String vm, String exts, String groupId){
		String api_url = apiUrl + "unbindIvrCallTransferForGroup.do";
		String spKey = this.appKey;
		String spId = this.appId;
		long timestamp = System.currentTimeMillis();
		String md5_source =spKey+spId+timestamp+fms+vm+exts+groupId;
		String sign = MD5Util.MD5(md5_source);
		StringBuilder params = new StringBuilder();
		params.append("id=" + spId).append("&timestamp=" + timestamp).append("&fms="+fms).append("&virtualMobile="+vm)
		.append("&exts="+exts+"&groupId="+groupId).append("&sign="+sign);
		String result = HttpUtil.sendGet(api_url, params.toString());
		System.out.println("unbindIvr_result: "+ result);
		GroupResult groupResult = (GroupResult)GsonUtil.fromGson(result, GroupResult.class);
		return groupResult;
	}
	
	/**
	 * 功能：D4. 分机号组关系绑定接口
	 * */
	public GroupResult autoIvrCallTransferForGroup(String seqId, String fms, String groupId, Long bindTime, String beLong){
		String api_url = apiUrl + "autoIvrCallTransferForGroup.do";
		String spKey = this.appKey;
		String spId = this.appId;
		
		long timestamp = System.currentTimeMillis();
		String md5_source =spKey+spId+seqId+ timestamp+fms+ groupId;
		String sign = MD5Util.MD5(md5_source);
		StringBuilder params = new StringBuilder();
		params.append("id=" + spId).append("&seqId="+seqId).append("&timestamp=" + timestamp);
		if(beLong !=null && !"".equals(beLong)){
			params.append("&beLong="+beLong);
		}
		params.append("&fms="+fms).append("&groupId="+groupId);
		if(bindTime != null){
			params.append("&bindTime="+bindTime);
		}
		params.append("&sign="+sign);
		String result = HttpUtil.sendGet(api_url, params.toString());
		System.out.println("autoIvrCallTransferForGroup, params:  " + params + ", result: "+ result);
		return (GroupResult)GsonUtil.fromGson(result, GroupResult.class);
	}
	
	/**
	 * 功能：D1.商户号码组管理接口
	 * @param groupId 
	 * @param timestamp
	 * @param mobile 
	 * @ method 
	 * @return Result
	 * */
	public Result updateMobileGroup(String groupId, Long timestamp, String mobile, Integer method){
		String api_url = apiUrl + "updateMobileGroup.do";
		String spKey = this.appKey;
		String spId = this.appId;
		
		String md5_source =spKey+spId+timestamp+groupId+method;
		String sign = MD5Util.MD5(md5_source);
		StringBuilder params = new StringBuilder();
		params.append("id=" + spId).append("&timestamp=" + timestamp);
		params.append("&seqId="+groupId).append("&mobile="+mobile).append("&method="+method)
		.append("&sign="+sign);
		String result = HttpUtil.sendGet(api_url, params.toString());
		System.out.println("updateMobileGroup, params:  " + params + ", result:" + result);
		return (Result) GsonUtil.fromGson(result, Result.class);
	}

	/**
	 * 功能：商务分机绑定接口
	 * */
	public Result bindExtMobile(String bindMobile, String vm,  String ext, String seqId){
		String api_url = apiUrl+"bindExtMobile.do";
		String spKey = this.appKey;
		String spId = this.appId;
		
		long timestamp = System.currentTimeMillis();
		bindMobile=bindMobile==null ?"":bindMobile;
		vm = vm == null ?"":vm;
		ext = ext ==null?"":ext;
		String md5_source = spKey+spId+seqId+timestamp+bindMobile+vm+ext;
		String sign = MD5Util.MD5(md5_source);
		
		StringBuilder params = new StringBuilder();  
		params.append("id="+spId).append("&seqId="+ seqId).append("&timestamp="+timestamp)
		.append("&bindMobile="+bindMobile).append("&virtualMobile="+vm)
		.append("&ext="+ext);
		params.append("&sign="+sign);
		String result = HttpUtil.sendGet(api_url, params.toString());
		System.out.println("bindExtMobile, params:  "+ params +", result:"+result);
		return (Result) GsonUtil.fromGson(result, Result.class);
	}
	
	/**
	 * 功能：商务分机解绑接口
	 * */
	public Result unbindExtMobile(String bindMobile, String vm, String ext){
		String api_url = apiUrl +"unbindExtMobile.do";
		String spKey = this.appKey;
		String spId = this.appId;
		
		long timestamp = System.currentTimeMillis();
		bindMobile = bindMobile==null?"":bindMobile;
		ext = ext == null ?"":ext;
		String md5_source = spKey+spId+timestamp+ bindMobile+ vm+ext;
		String sign =  MD5Util.MD5(md5_source);
		StringBuilder params = new StringBuilder();
		params.append("id="+spId).append("&timestamp="+timestamp).append("&bindMobile="+bindMobile)
		.append("&virtualMobile="+vm).append("&ext="+ext).append("&sign="+sign);
		String result = HttpUtil.sendGet(api_url, params.toString());
		System.out.println("unbindExtMobile, params:  "+ params +", result:"+result);
		return (Result) GsonUtil.fromGson(result, Result.class);
	}
	
	/**
	 * 功能：AxB关系绑定[1. 关系虚号呼转接口]
	 * */
	public CallTransferResult autoCallTransferForSp(String seqId, String timestamp, String fm, String tm, Integer bindTime, String beLong, String virtualMobile, Integer scene){
		String api_url = apiUrl + "autoCallTransferForSp.do";
		String spKey = this.appKey;
		String spId = this.appId;
		String md5_source =spKey+spId+seqId+timestamp+fm+tm;
		String sign = MD5Util.MD5(md5_source);
		StringBuilder params = new StringBuilder();
		params.append("id=" + spId).append("&seqId="+seqId).append("&timestamp=" + timestamp).append("&fm="+fm).append("&tm="+tm);
		if(bindTime != null){
			params.append("&bindTime="+bindTime);
		}
		if(beLong != null && !"".equals(beLong)){
			params.append("&beLong="+beLong);
		}
		if(virtualMobile != null && !"".equals(virtualMobile)){
			params.append("&virtualMobile="+virtualMobile); //virtualMobile
		} //scene
		if(scene != null && !"".equals(scene)){
			params.append("&scene="+scene);
		}
		params.append("&sign="+sign);
		String result = HttpUtil.sendGet(api_url, params.toString());
		System.out.println("autoCallTransferForSp, params:  "+ params +", result:"+result);
		CallTransferResult ctResult = (CallTransferResult)GsonUtil.fromGson(result, CallTransferResult.class);
		return ctResult;
	}
	
	/**
	 * 功能：AxB关系解绑
	 * */
	public Result unbindCallTransferForSp(String timestamp, String fm, String tm, String vm){
		String api_url = apiUrl + "unbindCallTransferForSp.do";
		String spKey = this.appKey;
		String spId = this.appId;
		String md5_source = spKey+spId+timestamp+fm+tm+vm;
		String sign = MD5Util.MD5(md5_source);
		StringBuilder params = new StringBuilder();
		params.append("id="+spId).append("&timestamp="+timestamp).append("&fm="+fm).append("&tm="+tm).append("&vm="+vm).append("&sign="+sign);
		String result = HttpUtil.sendGet(api_url, params.toString());
		System.out.println("unbindCallTransferForSp, params: "+ params+", result: "+ result);
		return (Result)GsonUtil.fromGson(result, Result.class);
	}
	
	/**
	 * 功能：AxB批量关系绑定[3. 关系虚号呼转批量设置接口]
	 * */
	public CallTransferResult autoMultiCallTransferForSp(String seqId, String timestamp, String fm, String tms, Integer bindTime, String beLong, Integer scene){
		String api_url = apiUrl + "autoMultiCallTransferForSp.do";
		String spKey = this.appKey;
		String spId = this.appId;
		String md5_source =spKey+spId+seqId+timestamp+fm+tms;
		String sign = MD5Util.MD5(md5_source);
		StringBuilder params = new StringBuilder();
		params.append("id=" + spId).append("&seqId="+seqId).append("&timestamp=" + timestamp).append("&fm="+fm).append("&tms="+tms);
		if(bindTime != null){
			params.append("&bindTime="+bindTime);
		}
		if(beLong != null && !"".equals(beLong)){
			params.append("&beLong="+beLong);
		}
		if(scene != null && !"".equals(scene)){
			params.append("&scene="+scene);
		}
		params.append("&sign="+sign);
		String result = HttpUtil.sendGet(api_url, params.toString());
		System.out.println("autoMultiCallTransferForSp, params: "+ params+", result: "+ result);
		CallTransferResult ctResult = (CallTransferResult)GsonUtil.fromGson(result, CallTransferResult.class);
		return ctResult;
	}
}

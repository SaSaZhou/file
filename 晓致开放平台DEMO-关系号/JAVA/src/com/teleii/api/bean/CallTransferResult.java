package com.teleii.api.bean;

import java.util.List;

/**  
 * 
 * @author ben 
 * @version 1.0   
 * 文件名称：CallTransferResult.java  
 */
public class CallTransferResult extends Result{

	public CallTransferResult(int result, String error) {
		super(result, error);
	}
	
	private Long startTime;
	private Long endTime;
	private List<VmBindBean> list;
	
	public Long getStartTime() {
		return startTime;
	}
	public void setStartTime(Long startTime) {
		this.startTime = startTime;
	}
	public Long getEndTime() {
		return endTime;
	}
	public void setEndTime(Long endTime) {
		this.endTime = endTime;
	}
	public List<VmBindBean> getList() {
		return list;
	}
	public void setList(List<VmBindBean> list) {
		this.list = list;
	}
}

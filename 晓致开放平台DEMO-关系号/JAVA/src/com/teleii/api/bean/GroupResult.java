package com.teleii.api.bean;

import java.util.List;

public class GroupResult extends Result {
	public List<VmBindBean> list;
	public GroupResult(){}
	public GroupResult(int result, String error){
		super(result, error);
	}
}

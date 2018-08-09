package com.teleii.api.util;

import java.io.BufferedReader;
import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.URL;
import java.net.URLConnection;
import java.nio.charset.Charset;
import java.util.List;
import java.util.Map;
import java.util.Random;

import org.apache.http.Header;
import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpDelete;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.entity.mime.MultipartEntity;
import org.apache.http.entity.mime.content.FileBody;
import org.apache.http.entity.mime.content.StringBody;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicHeader;
import org.apache.http.util.EntityUtils;


public class HttpUtil {
    /**
     * 向指定URL发�?�GET方法的请�?
     * 
     * @param url
     *            发�?�请求的URL
     * @param param
     *            请求参数，请求参数应该是 name1=value1&name2=value2 的形式�??
     * @return URL �?代表远程资源的响应结�?
     */
    public static String sendGet(String url, String param) {
        String result = "";
        BufferedReader in = null;
        URLConnection connection=null;
        try {
            String urlNameString = url + "?" + param;
            //System.out.println("url="+urlNameString);
            URL realUrl = new URL(urlNameString);
            // 打开和URL之间的连�?
            connection = realUrl.openConnection();
            // 设置通用的请求属�?
            connection.setRequestProperty("Accept", "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8");
            connection.setRequestProperty("Connection", "keep-alive");
            
            // 建立实际的连�?
            connection.connect();
            // 获取�?有响应头字段
            Map<String, List<String>> map = connection.getHeaderFields();
            // 遍历�?有的响应头字�?
//            for (String key : map.keySet()) {
//            	System.out.println(key + "--->" + map.get(key));
//            }

            // 定义 BufferedReader输入流来读取URL的响�?
            String contentEncoding = ""; 
            if (connection.getHeaderField("Content-Encoding") != null) {
                contentEncoding = connection.getHeaderField("Content-Encoding"); 
            } else {
                in = new BufferedReader(new InputStreamReader(
                		connection.getInputStream(), "gb2312")); 
            } 
            
            String line="";
            while ((line = in.readLine()) != null) {
                result += line;
            }
        } catch (Exception e) {
            System.out.println("发�?�GET请求出现异常�?" + e);
            e.printStackTrace();
        }
        // 使用finally块来关闭输入�?
        finally {
            try {
                if (in != null) {
                    in.close();
                }
            } catch (Exception e2) {
                e2.printStackTrace();
            }
        }
        return result;
    }
    
    /**
     * 向指定URL发�?�POST方法的请�?
     * 
     * @param url
     *            发�?�请求的URL
     * @param param
     *            请求参数，请求参数应该是 name1=value1&name2=value2 的形式�??
     * @return URL �?代表远程资源的响应结�?
     */
    public static String sendPost(String urlStr, String param) {
        String result = "";
        OutputStreamWriter writer = null;
        try {
            // Send the request
            URL url = new URL(urlStr);
            URLConnection conn = url.openConnection();
            conn.setDoOutput(true);
            writer = new OutputStreamWriter(conn.getOutputStream());

            //write parameters
            writer.write(param);
            writer.flush();

            // Get the response
            BufferedReader reader = new BufferedReader(new InputStreamReader(conn.getInputStream()));
            String line;
            while ((line = reader.readLine()) != null) {
            	result+=line;
            }
            writer.close();
            reader.close();
        } catch (Exception ex) {
            ex.printStackTrace();
        } finally{
        	if(writer!=null){
        		try {
					writer.close();
				} catch (IOException e) {
					e.printStackTrace();
				}
        	}
        }
        return result;
    }
    
    public static HttpResponse sendPost(String url,Map<String,String> headers,String body) throws ClientProtocolException, IOException{  
        DefaultHttpClient httpClient = new DefaultHttpClient();  
        HttpPost post = new HttpPost(url);  
        if (headers != null) {  
            post.setHeaders(assembHead(headers));  
        }  
        // 设置超时时间  
        httpClient.getParams().setIntParameter("http.socket.timeout", 30000);  
        StringEntity myEntity = new StringEntity(body, "UTF-8"); 
        post.setEntity(myEntity);
        return httpClient.execute(post);  
    }  
    
	public static String sendPost(String action,Map<String, String> generalParams, Map<String, String> fileParams)throws Exception {
		HttpClient httpclient = new DefaultHttpClient();
		HttpPost httppost = new HttpPost(action);
		MultipartEntity reqEntity = new MultipartEntity();
		// 绑定基本参数
		if (generalParams != null && generalParams.size() > 0) {
			for (Map.Entry<String, String> entry : generalParams.entrySet()) {
				reqEntity.addPart(entry.getKey(),new StringBody(entry.getValue(), Charset.forName("UTF-8")));
			}
		}
		// 绑定文件参数
		if (fileParams != null && fileParams.size() > 0) {
			for (Map.Entry<String, String> entry : fileParams.entrySet()) {
				File file = new File(entry.getValue());
				if (!file.exists() || file.isDirectory() || !file.canRead()) {
					return "本地文件不存在或不可�?";
				}
				reqEntity.addPart(entry.getKey(), new FileBody(file));
			}
		}
		httppost.setEntity(reqEntity);
		HttpResponse response = httpclient.execute(httppost);
		HttpEntity resEntity = response.getEntity();
		if (resEntity != null) {
			InputStream in = resEntity.getContent();
			return inputStream2String(in);
		}
		return null;
	}
	private static String inputStream2String(InputStream in) throws IOException {
		StringBuffer out = new StringBuffer();
		byte[] b = new byte[4096];
		for (int n; (n = in.read(b)) != -1;) {
			out.append(new String(b, 0, n));
		}
		return out.toString();
	}
    
    public static void main(String[] args) {
		try {
			String url = "http://localhost:8080/app/v4/closeFriendUpLoadIcon.do";
			String query = "name=xjk&&value=xjk&&destinationation=test&&nick=yjb";
			String result = sendPost(url, query);
			System.out.println("result:"+result);
			
		} catch (Exception e) {
			e.printStackTrace();
			System.out.println(e.getMessage());
		}
	
		
	}
	
	public static HttpResponse sendDelete(String url,Map<String,String> headers) throws ClientProtocolException, IOException{  
        DefaultHttpClient httpClient = new DefaultHttpClient();  
        HttpDelete delete=new HttpDelete(url);
        if (headers != null) {  
        	delete.setHeaders(assembHead(headers));  
        }  
        // 设置超时时间  
        httpClient.getParams().setIntParameter("http.socket.timeout", 30000);  
        return httpClient.execute(delete); 
    } 
	public static HttpEntity sendGet(String url,Map<String,String> headers) throws ClientProtocolException, IOException{  
        DefaultHttpClient httpClient = new DefaultHttpClient();  
        HttpGet get=new HttpGet(url);
        if (headers != null) {  
        	get.setHeaders(assembHead(headers));  
        }  
        // 设置超时时间  
        httpClient.getParams().setIntParameter("http.socket.timeout", 30000);  
        HttpResponse response = httpClient.execute(get);  
        System.out.println(response.getStatusLine().getStatusCode());
        HttpEntity entity = response.getEntity();  
        System.out.println(entity.getContent());
        System.out.println(entity.getContentType());
        System.out.println(EntityUtils.toString(entity));  
        //post.abort();  
        return entity;  
    } 
	
	public static Header[] assembHead(Map<String, String> headers){  
        Header[] allHeader = new BasicHeader[headers.size()];   
        int i = 0;  
        for(String str:headers.keySet()){  
            allHeader[i] = new BasicHeader(str,headers.get(str));  
            i++;  
        }  
        return allHeader;  
    } 
	
	
	private static Random randGen = null;
	private final static char[] numbersAndLetters = ("123456789ABCDEFGHJKLMNPQRSTUVWXYZ").toCharArray();
	private final static char[] numbers = ("0123456789").toCharArray();
	private static Object initLock = new Object();
	public static final String randomString(int length,boolean isNum) {
		if (length < 1) {
			return null;
		}
		if (randGen == null) {
			synchronized (initLock) {
				if (randGen == null) {
					randGen = new Random();
				}
			}
		}
		char[] randBuffer = new char[length];
		if(isNum)
			for (int i = 0; i < randBuffer.length; i++) 
				randBuffer[i] = numbers[randGen .nextInt(numbers.length)];
		else
			for (int i = 0; i < randBuffer.length; i++) 
				randBuffer[i] = numbersAndLetters[randGen .nextInt(numbersAndLetters.length)];
		return new String(randBuffer);
	}
	
	
}

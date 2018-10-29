<?php

// 创建连接
$conn = mysqli_connect('127.0.0.1', 'root', '', 'demo');
// 设置查询结果编码
$conn->set_charset('utf8'); 
// 检测连接
if (!$conn) {  
	die("连接失败: " . mysqli_connect_error());
}


/**
 * 每月统计 - 时间
 */
$weeks_titme = "";
// 查询数据
$table_titme = mysqli_query($conn, " SELECT FROM_UNIXTIME(posttime,'%Y/%m') as times FROM db_logging GROUP BY FROM_UNIXTIME(posttime,'%Y/%m')  ");
// 输出数据
while($row = $table_titme->fetch_array())
{
	$weeks_titme .=  "'" . $row['times'] . "',";
}
//var_dump($weeks_titme);


/**
 * 每月统计 - 数量
 */
$weeks_number = array();
// 查询数据
$table_number = mysqli_query($conn, " SELECT count(id) as number FROM db_logging GROUP BY FROM_UNIXTIME(posttime,'%Y/%m') ");
// 输出数据
while($row = $table_number->fetch_array())
{
	//$weeks_number .=   $row['number'] . ",";
	$weeks_number[] = $row['number'];
}
//var_dump($weeks_number);


// 输出 每月统计结果
$echo_weeks = array(
	'name'=>'用户登录',
	'data'=>$weeks_number,
);
//var_dump($echo_weeks);

// 关闭连接
mysqli_close($conn);

//echo json_encode($echo_weeks);//die;
?>

<!DOCTYPE html>
<html lang="en" class="app">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title> 折线图 </title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!--  折线图 -->  
        <script  type="text/javascript"src="jquery-1.8.2.min.js"></script>      
        <script type="text/javascript" src="highcharts.js"></script>
        <script type="text/javascript" src="exporting.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                    var options = {
                            chart: {
                                renderTo: 'chart_line', 	// 图表放置的容器，DIV
                                defaultSeriesType: 'line', 	// 图表类型line(折线图),
                                zoomType: 'x' 				// x轴方向可以缩放
                            },
                            credits: {
                                enabled: false 				// 右下角不显示LOGO
                            },
                            title: {
                                 text: '用户登录每月统计表' // 图表标题
                            }, 
                            subtitle: { 
                                text: '2017-2018年'  		// 副标题 
                            },
                            xAxis:{ // x轴
                                categories: [ <?php echo rtrim($weeks_titme, ","); ?> ] , // x轴标签名称
                                gridLineWidth: 1, 				// 设置网格宽度为1
                                lineWidth: 2, 					// 基线宽度
                                labels:{y:26} 					// x轴标签位置：距X轴下方26像素
                            },
                            yAxis:{ // y轴 
                                title: {text: '单位：次'}, 		// 标题 
                                lineWidth: 2 					// 基线宽度 
                            },
                            plotOptions:{ // 设置数据点 
                                line:{ 
                                    dataLabels:{ 
                                        enabled:true  			// 在数据点上显示对应的数据值 
                                    }, 
                                    enableMouseTracking: false 	// 取消鼠标滑向触发提示框 
                                } 
                            }, 
                            legend: { // 图例 
                                layout: 'vertical', 		// 图例显示的样式：水平（horizontal）/垂直（vertical） 
                                backgroundColor: '#ffc', 	// 图例背景色                 
                                align: 'left', 				// 图例水平对齐方式 
                                verticalAlign: 'top',  		// 图例垂直对齐方式 
                                x: 100,  					// 相对X位移 
                                y: 70,   					// 相对Y位移 
                                floating: true, 			// 设置可浮动 
                                shadow: true  				// 设置阴影 
                            }, 
                            exporting: { 
                                enabled: false 				// 设置导出按钮不可用 
                            }, 
                            series: []  // 数据列 
                    };
					
                    var items = <?php echo json_encode($echo_weeks); ?>;					
                    $.each(items, function(itemNo, item) {
                        var series = {
								data: []
                        };
                        series.name = items.name;
                        var dats = eval(items.data); 
                        for (var i = 0; i < dats.length; i++)
                        series.data.push(parseInt(dats[i]));
                        options.series.push(series);
                    });
                    
                    var chart = new Highcharts.Chart(options);
           });       
                   
        </script>
		<style>
			#chart_line{min-width: 350px;height: 650px;margin-bottom: 20px;font-size: 36px;}
		</style>
		
    </head>
    <body>
		
		<!-- 每月折线图 -->
		<div id="chart_line"></div>
        		
    </body>
</html>

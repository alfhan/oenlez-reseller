<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<?php
		$userLogin = $this->auth->userLogin();
	?>
    <title>T-Code :: <?php echo TITLE_APP;?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/themes/icon.css">
    <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/themes/demo.css">-->
    <link href="<?php echo base_url("images")."/". LOGO_APP;?>" rel="shortcut icon" type="image/ico" />
    <script type="text/javascript" src="<?php echo base_url();?>template/jquery-1.8.0.min.js"></script>
    <!--<script type="text/javascript" src="<?php echo base_url();?>template/jquery.number.min.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url();?>template/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/jquery.edatagrid.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/datagrid-groupview.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/themes/tcss.css">
	<?php $this->load->view('id.php');?>
	<script>
	$.fn.datebox.defaults.formatter = function(date){
		var y=date.getFullYear();
		var m=date.getMonth()+1;
		var d=date.getDate();
		return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
	}
	$.fn.datebox.defaults.parser = function(s){
		if (!s) return new Date();  
		var ss = s.split('-');  
		var y = parseInt(ss[0],10);  
		var m = parseInt(ss[1],10);  
		var d = parseInt(ss[2],10);  
		if (!isNaN(y) && !isNaN(m) && !isNaN(d)){  
			return new Date(y,m-1,d);  
		} else {  
			return new Date();  
		}
	}
	</script>
	<style>
		/* .layout-panel-west .panel-header, .layout-panel-west .panel-header .panel-title{
			background:#FDE9AC;
			border:none;
			border-right:1px solid #FBD560;
		} */
	</style>
</head>
<body class="easyui-layout">
    <div data-options="region:'north',border:true,split:true" style="height:70px;overflow:hidden;" class="top-atas">
		<img src="<?php echo base_url("images")."/". LOGO_APP;?>" width="70"/>
		<span 
			style="font-size:22px;font-family:Bookman Old Stlye;color:#6C530B;
			font-weight:bold;position:relative;bottom:24px;text-shadow:2px 1px 3px #FFFFFF;">
		<?php echo TITLE_APP;?>
		</span>
		<br />
		<span 
			style="font-size:12px;font-family:Bookman Old Stlye;color:#6C530B;margin-left:58px;
			font-weight:bold;position:relative;bottom:24px;text-shadow:2px 1px 3px #FFFFFF;">
		
		</span>
    </div>
	<div data-options="region:'south',split:false" style="height:25px;background:#eeefff" id="south">
		<center style="top:5px;position:relative;">Copyright &copy; 2014 <a href="http://www.alfhan.com">Developer Web Application</a></center>
	</div>
    <div id="west" region="west" title="<?php echo $userLogin['nama'];?>" split="true" border="true" style="width:225px;background:#eeefff">
    <ul id="left-menu" class="easyui-tree" style="background:#fffeee"
	data-options="animate:true, onClick:t_menu_click, onBeforeCollapse:beforeMenuCollapse, onBeforeExpand:beforeMenuExpand">
        <?php
            $par = $this->auth->parent_menu();
            $ch = $this->auth->child_menu();
            foreach($par as $r){
                echo "<li data-options=\"state:'open',attributes:'parent',iconCls:'$r[ICON]'\">";
                    echo " <span>&nbsp;<b>$r[NAMA]</b></span>";
                    $this->auth->list_menu($ch,$r['ID'],$r['LEVEL']);
                echo "</li>";
            }
            echo "<li data-options=\"iconCls:'icon-no',attributes:'logout'\"> Logout</i>";
        ?>
    </ul>
    </div>
    <div data-options="region:'center'" border="true">
		<?php if(isset($content)) echo $content;?>
    </div>  
    <script>
		var leftMenu = $('ul#left-menu');
		var t_menu_click = function(node){
			var aMenu = node.text;
			var aUrl = node.attributes;

			if(node.state != 'closed' && aUrl == 'logout'){
				location='<?php echo base_url('home/logout');?>';
			}else if(node.state != 'closed' && aUrl != 'parent'){
				window.open("<?php echo base_url();?>"+aUrl,"_self");
			} else {
				if(node.state == 'closed') {
					leftMenu.tree('expand', node.target);
				} else {
					leftMenu.tree('collapse', node.target);
				}
			}
		};
		var beforeMenuCollapse = function(node) {
                leftMenu.tree('select', node.target);
            };
        
        var beforeMenuExpand = function(node) {
                leftMenu.tree('select', node.target);
            };
    </script>
</body>
</html>

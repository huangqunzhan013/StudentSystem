<?php
	define("ROOT",str_replace('\\','/',dirname(__FILE__)));
	//__FILE__是PHP中的预定义常量，表示当前文件所在路径。str_replce函数把
	// "\"换成"/"目的是为了兼容在linux操作系统下的目录
	require_once(ROOT.'/libs/Smarty.class.php');//加载Smarty类库文件
	$smarty = new Smarty();//实例化一个Smarty对象
	$smarty->setTemplateDir(ROOT.'/templates');//定义模板文件存储位置
	$smarty->setCompileDir(ROOT.'/templates_c');//定义编译文件存储位置
	$smarty->right_delimiter='}>';//定义定界符
	$smarty->left_delimiter='<{';
	
?>

<?php
	define("ROOT",str_replace('\\','/',dirname(__FILE__)));
	//__FILE__��PHP�е�Ԥ���峣������ʾ��ǰ�ļ�����·����str_replce������
	// "\"����"/"Ŀ����Ϊ�˼�����linux����ϵͳ�µ�Ŀ¼
	require_once(ROOT.'/libs/Smarty.class.php');//����Smarty����ļ�
	$smarty = new Smarty();//ʵ����һ��Smarty����
	$smarty->setTemplateDir(ROOT.'/templates');//����ģ���ļ��洢λ��
	$smarty->setCompileDir(ROOT.'/templates_c');//��������ļ��洢λ��
	$smarty->right_delimiter='}>';//���嶨���
	$smarty->left_delimiter='<{';
	
?>

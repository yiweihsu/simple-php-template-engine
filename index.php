<?php

$rules =  array(
	'/{\/(foreach)}/i' => '<?php } ?>',
	'/{foreach\s+from=(\S+)\s+item=(\S+)}/is' => '<?php if(is_array($1)) foreach($1 as $$2) { ?>',
	'/{\s*(\S+)\s*}/is' =>  '<?php echo $1;?>',
);

//-- 解析模板 start
$html = file_get_contents('template.tmpl');

echo $html;

$html = preg_replace(array_keys($rules), $rules, $html);

//-- 缓存解析后的模板
file_put_contents('tpl_cache.php', $html);

//-- 要注入模板的变量
$data = ['names'=>['李白', '花木兰']];

//-- 注入变量
extract($data);

//-- 引入解析的模板
include 'tpl_cache.php';

?>
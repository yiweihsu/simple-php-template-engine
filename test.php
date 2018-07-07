<?php

$rules = array(
	"{{Name}}" => "<?php echo '<strong>' . \$name . '</strong>' ?>",
	"{{#each Stuff}}" => "
	<?php
		if(is_array(\$stuff)) { 
			echo '<br>';
			foreach(\$stuff as \$key => \$value) { 
				echo \$key . ' are ' . \$value . '<br>';
			}
		}
	?>
	",
	"{{Thing}} are" => "",
	"{{Desc}}" => "",
	"{{/each}}" => ""
);

//-- 解析模板 start
$html = file_get_contents('template.tmpl');
$html = str_replace(array_keys($rules), $rules, $html);

//-- 缓存解析后的模板
file_put_contents('tpl_cache.php', $html);

// data
$name  = "Yi-Wei";
$stuff = array(
	"roses" => "red",
  "violets" => "blue",
  "you" => "able to solve this",
	"we" => "interested in you"
);

//-- 引入解析的模板
include 'tpl_cache.php';

?>
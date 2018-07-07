<?php

class Template {
	public $name;
	public $stuff;

	public function __construct($name, $stuff) {
		$this->name = $name;
		$this->stuff = $stuff;
	}

	public function render($template) {

		//-- translate the template to php syntax
		$rules = array(
			"{{Name}}" => "<?php echo '<strong>' . \$this->name . '</strong>' ?>",
			"{{#each Stuff}}" => "
			<?php
				if(is_array(\$this->stuff)) { 
					echo '<br>';
					foreach(\$this->stuff as \$this->key => \$this->value) { 
						echo \$this->key . ' are ' . \$this->value . '<br>';
					}
				}
			?>
			",
			"{{Thing}} are" => "",
			"{{Desc}}" => "",
			"{{/each}}" => ""
		);

		//-- read the template and handle it
		$html = file_get_contents($template);
		$html = str_replace(array_keys($rules), $rules, $html);

		//-- cache the generated template
		file_put_contents('tpl_cache.php', $html);

		//-- render the template
		include 'tpl_cache.php';
	}
}

?>
<?php

// data config
$name  = "Yi-Wei";
$stuff = array(
	"roses" => "red",
  "violets" => "blue",
  "you" => "able to solve this",
	"we" => "interested in you"
);

include 'Template.php';

$template = new Template($name, $stuff);

$template->render('template/template.tmpl');

?>
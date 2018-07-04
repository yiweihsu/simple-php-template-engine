<?php

include 'Template.php';

$template = new Template;

$template->assign('username', 'Yiwei');

$template->render('template.tmpl');

?>
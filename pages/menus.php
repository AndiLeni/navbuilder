<?php

$id = rex_request('id', 'int');
$func = rex_request('func', 'string');

$nav = rex_post('config', [
	['name', 'string'],
	['structure', 'string'],
]);

if ($func === "save") {

	$sql = rex_sql::factory();
	$sql->setTable(rex::getTable("navbuilder_navigation"));

	if ($id > 0) {
		$sql->setWhere('id="' . $id . '"');
		$sql->setValue('name', $nav['name']);
		$sql->setValue('structure', $nav['structure']);
		$sql->update();
		echo rex_view::success('Navigation "' . $nav['name'] . '" wurde aktualisiert');
	} else {
		$sql->setValue('name', $nav['name']);
		$sql->setValue('structure', $nav['structure']);
		$sql->insert();
		$id = (int)$sql->getLastId();
		echo rex_view::success('Navigation "' . $nav['name'] . '" wurde angelegt');
	}
}

if ($func === "delete") {

	$sql = rex_sql::factory();
	$sql->setTable(rex::getTable("navbuilder_navigation"));
	$sql->setWhere('id="' . $id . '"');
	$sql->delete();

	echo rex_view::success('Navigation "' . $nav['name'] . '" wurde gelöscht');
}

if ($func == '' || $func == 'delete') {
	$list = rex_list::factory("SELECT `id`, `name` FROM `" . rex::getTablePrefix() . "navbuilder_navigation` ORDER BY `name` ASC");
	$list->addTableAttribute('class', 'table-striped');

	// icon column
	$thIcon = '<a href="' . $list->getUrl(['func' => 'add']) . '"><i class="rex-icon rex-icon-add-action"></i></a>';
	$tdIcon = '<i class="rex-icon fa-file-text-o"></i>';
	$list->addColumn($thIcon, $tdIcon, 0, ['<th class="rex-table-icon">###VALUE###</th>', '<td class="rex-table-icon">###VALUE###</td>']);
	$list->setColumnParams($thIcon, ['func' => 'edit', 'id' => '###id###']);

	$list->addColumn("REX-Var", "<code>REX_NAVBUILDER[name=###name###]</code>");
	$list->addColumn("PHP-Array", "<code>rex_navbuilder::getStructure(\"###name###\")</code>");

	$list->setColumnLabel('name', 'Name');
	$list->setColumnLabel('snippet', 'Snippet');

	$list->setColumnParams('name', ['id' => '###id###', 'func' => 'edit']);

	$list->removeColumn('id');

	$content = $list->get();

	$fragment = new rex_fragment();
	$fragment->setVar('content', $content, false);
	$content = $fragment->parse('core/page/section.php');

	echo $content;
} else if ($func == 'add' || $func == 'edit' || $func == 'save') {

	$widget = rex_var_link::getWidget('href', 'href', 1);

	$nav = rex_navbuilder_navigation::create();

	if ($id > 0) {
		$nav = rex_navbuilder_navigation::get($id);
	}

	$structure = $nav->hasValue('structure') ? $nav->structure : '{}';
	$name = $nav->hasValue('name') ? $nav->name : '';

	$content = new rex_fragment();
	$content->setVar("widget", $widget, false);
	$content->setVar("structure", $structure, false);
	$content->setVar("name", $name, false);
	$content->setVar("id", $id, false);
	$content = $content->parse('builder.php');

	$fragment = new rex_fragment();
	$fragment->setVar('class', 'edit');
	$fragment->setVar('title', 'Einstellungen');
	$fragment->setVar('body', $content, false);
	echo $fragment->parse('core/page/section.php');
}

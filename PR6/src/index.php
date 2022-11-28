<?php

require_once __DIR__ . '/vendor/autoload.php';

//генерация данных
$faker = Faker\Factory::create();

$arr = array();
for($i = 0; $i < 50; ++$i) {
	$arr[$i]['name'] = $faker->name();
    $arr[$i]['age'] = $faker->valid($validationAge)->randomNumber();
    $arr[$i]['country'] = $faker->country();
    $arr[$i]['experience'] = $faker->valid($validationExp)->randomNumber();
    $arr[$i]['color'] = $faker->colorName();
}

$validationAge = function($digit) {
	return $digit < 80 && $digit > 80;
};

$validationExp = function($digit) {
	return $digit < 11 && $digit > 0;
};

//print_r ($arr);

//создание графиков
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

$graph = new Graph\PieGraph(350, 250);
$graph->title->Set("A Simple Pie Plot");
$graph->SetBox(true);


<?php

require_once __DIR__ . '/vendor/autoload.php';
include __DIR__ . "/generateImage.php";

//генерация данных
$faker = Faker\Factory::create();

$arr = array();
for($i = 0; $i < 50; ++$i) {
	$arr[$i]['name'] = $faker->name();
    $arr[$i]['age'] = $faker->numberBetween(10, 80);
    $arr[$i]['country'] = $faker->country();
    $arr[$i]['experience'] = $faker->numberBetween(0, 10);
    $arr[$i]['color'] = $faker->colorName();
}

echo "Сгенерированные данные <br/>";
print_r ($arr);

echo "<br/> <a href='/index.html'>Посмотреть новые графики</a>";

//данные для графиков
$ageMax20 = 0;
$ageMax40 = 0;
$ageMax60 = 0;
$ageMax80 = 0;
for($i = 0; $i < 50; ++$i) {
    if ($arr[$i]['age'] < 20)
        $ageMax20++;
    if ($arr[$i]['age'] < 40 && $arr[$i]['age'] > 20)
        $ageMax40++;
    if ($arr[$i]['age'] < 60 && $arr[$i]['age'] > 40)
        $ageMax60++;
    if ($arr[$i]['age'] < 80 && $arr[$i]['age'] > 60)
        $ageMax80++;
}
//for($i = 0; $i < 50; ++$i) {
//    echo $arr[$i]['age'] . " ";
//}
$ages = array($ageMax20, $ageMax40, $ageMax60, $ageMax80);
$titles = array('Age less 20', 'Age less 40', 'Age less 60', 'Age less 80');

//создание графиков
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;
// Create the Pie Graph.
$graph1 = new Graph\PieGraph(400, 400);
$graph1->title->Set("Pie Graph");
$graph1->SetBox(true);
$p1 = new Plot\PiePlot($ages);
$p1->SetLegends($titles);
$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#1E90FF', '#2E8B57', '#ADFF2F', '#DC143C'));
$graph1->Add($p1);
$graph1->Stroke("1.png");

// Create Bar Graph
$graph2 = new Graph\Graph(450, 300);
$graph2->title->Set("Bar Graph");
$graph2->setScale ("textlin");
$graph2->SetBox(true);
$graph2->xaxis->title->Set("Age");
$graph2->xaxis->title->SetMargin(5);
$graph2->xaxis->SetTickLabels($titles);
$graph2->yaxis->title->Set("Count of people");
$p2 = new Plot\BarPlot($ages);
$p2->SetFillColor('blue');
$graph2->Add($p2);
$graph2->Stroke("2.png");

//Create Sipmle Graph
$graph3 = new Graph\Graph(450, 300);
$graph3->title->Set("Simple Graph");
$graph3->setScale ("textlin");
$graph3->SetBox(true);
$p3 = new Plot\LinePlot($ages);
$p3->SetLegend("Line(count of people)"); 
$graph3->Add($p3);
$graph3->Stroke("3.png");

//добавление водяного знака
addSign("1.png");
addSign("2.png");
addSign("3.png");


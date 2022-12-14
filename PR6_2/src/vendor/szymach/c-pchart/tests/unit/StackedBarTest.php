<?php

namespace Test\CpChart;

use Codeception\Test\Unit;
use CpChart\Data;
use CpChart\Image;
use Test\CpChart\UnitTester;

use const DIRECTION_VERTICAL;
use const DISPLAY_AUTO;
use const LEGEND_HORIZONTAL;
use const LEGEND_NOBORDER;
use const SCALE_MODE_ADDALL;

class StackedBarTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;

    public function testChartRender()
    {
        $data = new Data();
        $data->addPoints(
            [-7, -8, -15, -20, -18, -12, 8, -19, 9, 16, -20, 8, 10, -10, -14, -20, 8, -9, -19],
            'Probe 3'
        );
        $data->addPoints(
            [19, 0, -8, 8, -8, 12, -19, -10, 5, 12, -20, -8, 10, -11, -12, 8, -17, -14, 0],
            'Probe 4'
        );
        $data->setAxisName(0, 'Temperatures');
        $data->addPoints(
            [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22],
            'Time'
        );
        $data->setSerieDescription('Time', 'Hour of the day');
        $data->setAbscissa('Time');
        $data->setXAxisUnit('h');
        $image = new Image(700, 230, $data);
        $settings = [
            'R' => 170, 'G' => 183, 'B' => 87, 'Dash' => 1, 'DashR' => 190,
            'DashG' => 203, 'DashB' => 107
        ];
        $image->drawFilledRectangle(0, 0, 700, 230, $settings);
        $settings = [
            'StartR' => 219, 'StartG' => 231, 'StartB' => 139, 'EndR' => 1,
            'EndG' => 138, 'EndB' => 68, 'Alpha' => 50
        ];
        $image->drawGradientArea(0, 0, 700, 230, DIRECTION_VERTICAL, $settings);
        $image->setFontProperties(['FontName' => 'pf_arma_five.ttf', 'FontSize' => 6]);
        $image->setGraphArea(60, 30, 650, 190);
        $image->drawScale([
            'CycleBackground' => true,
            'DrawSubTicks' => true,
            'GridR' => 0,
            'GridG' => 0,
            'GridB' => 0,
            'GridAlpha' => 10,
            'Mode' => SCALE_MODE_ADDALL
        ]);
        $image->setShadow(true, ['X' => 1, 'Y' => 1, 'R' => 0, 'G' => 0, 'B' => 0, 'Alpha' => 10]);
        $image->setShadow(false);
        $image->drawThreshold(-40, ['WriteCaption' => true, 'R' => 0, 'G' => 0, 'B' => 0, 'Ticks' => 4]);
        $image->drawThreshold(28, ['WriteCaption' => true, 'R' => 0, 'G' => 0, 'B' => 0, 'Ticks' => 4]);
        $image->drawStackedBarChart([
            'Rounded' => true,
            'DisplayValues' => true,
            'DisplayColor' => DISPLAY_AUTO,
            'DisplaySize' => 6,
            'BorderR' => 255,
            'BorderG' => 255,
            'BorderB' => 255
        ]);
        $image->drawLegend(570, 212, ['Style' => LEGEND_NOBORDER, 'Mode' => LEGEND_HORIZONTAL]);

        $filename = $this->tester->getOutputPathForChart('drawStackedChart.png');
        $image->render($filename);
        $image->stroke();

        $this->tester->seeFileFound($filename);
    }
}

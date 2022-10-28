# Silverstripe Charts
Create chart.js charts with Silverstripe. Chart object can be rendered in the template.
Chart configuration and info: https://www.chartjs.org/

## Installation

Install with Composer:

```
composer require xddesigners/silverstripe-charts
```

## Usage

```php
// add includes
use XD\Charts\Charts\Chart;
use XD\Charts\Charts\DataSet;

// example of usage
$type='bar';

$chart = new Chart();
$config = $chart->getConfig();
$config->setType($type)
$config->setTitle('Your chart title');
$config->setSubtitle('Your chart subtitle');
$config->setLegendPosition('top');
$config->setLegendTitle('Legend title');
$config->setLegendLabelSize(15,15);
$config->setPadding(10);

// bar example options
if( $type=='bar' ) {
    $config->setOption('scales.x.stacked',true);
    $config->setOption('scales.y.stacked',true);
}

// line example options
if( $type=='line' ) {
    $config->setOption('scales.x.stacked',true);
    $config->setOption('scales.y.stacked',true);
}

// radar example options
if( $type=='radar' ) {
    $config->setOption('scales.r.angleLines.color','red');
    $config->setOption('scales.r.grid.color','blue');
    $config->setOption('scales.r.pointLabels.color','green');
    $config->setOption('scales.r.ticks.color','orange');
    $config->setOption('scales.r.min',0);
    $config->setOption('scales.r.max',100);
}

// pie example options
if( $type=='pie' ){
    $config->setOption('plugin.legend',false);
    $config->setOption('plugin.outlabels', [
            'text' => '%l %p',
            'color'=>'white',
            'stretch'=> 45,
            'font' => [
                'resizable' => 'true',
                'minSize' => 12,
                'maxSize' => 18
            ]
        ]
    );
}

// $config->setLegendDisplay(false);
$data = $config->getData();
$data->setLabels([
    'Eating',
    'Drinking',
    'Sleeping',
    'Designing',
    'Coding',
    'Cycling',
    'Running'
]);

$dataSet = new DataSet();
$dataSet->setLabel('Dataset 1');
$dataSet->setData([65, 59, 90, 81, 56, 55, 40]);
$dataSet->setBorderWidth(1);
$dataSet->setFill('origin');
$dataSet->setOption('pointStyle','square');
$dataSet->setOption('pointRadius','10');

// $dataSet->setBackgroundColor(['red','blue','orange','pink','green']);
$data->addDataSet($dataSet);

$dataSet = new DataSet();
$dataSet->setLabel('Dataset 2');
$dataSet->setFill(1);
$dataSet->setData([10, 50, 50, 50, 96, 50, 60]);
$dataSet->setBackgroundColor([
    'rgba(255, 205, 86, 0.7)',
    'rgba(75, 192, 192, 0.7)',
    'rgba(54, 162, 235, 0.7)',
    'rgba(153, 102, 255, 0.7)',
    'rgba(201, 203, 207, 0.7)',
    'rgba(255, 99, 132, 0.7)',
    'rgba(255, 159, 64, 0.7)',
]);
// $dataSet->setBorderColor(['red','rgba(255,0,0,0.8)','orange','pink','green', 'yellow', 'grey']);
// $dataSet->setBorderColor(['pink']);
// $dataSet->setBorderWidth(4);
$data->addDataSet($dataSet);
//
// getter and setters can be used like this as well
$dataSet = DataSet::create()
    ->setLabel('Label of dataset 3')
    ->setData([45, 39, 20, 31, 16, 55, 40])
    ->setFill(2);
// $dataSet->setBorderWidth(5);
// $dataSet->setBorderColor(['purple']);
// $dataSet->setBackgroundColor(['red','blue','orange','pink','green']);
$data->addDataSet($dataSet);

return $chart;



```


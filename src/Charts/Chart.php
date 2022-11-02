<?php

namespace XD\Charts\Charts;

use SilverStripe\View\Requirements;
use SilverStripe\View\ViewableData;

/**
 * Class Chart
 * @package XD\Charts\Charts
 */
class Chart extends ViewableData
{
    const TYPE_BAR = 'bar';
    const TYPE_PIE = 'pie';
    const TYPE_DOUGHNUT = 'doughnut';
    const TYPE_RADAR = 'radar';
    const TYPE_POLARAREA = 'polarArea';
    const TYPE_SCATTER = 'scatter';
    const TYPE_BUBBLE = 'bubble';

    protected $config;
    private static $chart_defaults = [];

    /**
     * Chart constructor.
     * @param null $type
     * @param null $data
     * @param null $options
     */
    public function __construct($type = null, $data = null, $options = null)
    {
        $this->config = new Config();
        if ($type) $this->config->setType($type);
        if ($data) $this->config->setData($data);
        if ($options) $this->config->setOptions($options);
    }

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * @param Config $config
     * @return Chart
     */
    public function setConfig(Config $config): Chart
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->config->setType($type);
    }

    /**
     * @param $type
     */
    public function getType()
    {
        return $this->config->getType();
    }

    /**
     * @param DataSet $dataSet
     */
    public function addDataSet(DataSet $dataSet)
    {
        $this->getConfig()->getData()->addDataSet($dataSet);
    }

    /**
     * @return string
     */
    public function getAttributes() // change to array with getter setter
    {
        $config = $this->config->toArray();
        return 'data-chart-config="' . htmlentities(json_encode($config)) . '"';
    }

    /**
     * @return \SilverStripe\ORM\FieldType\DBHTMLText
     */
    public function forTemplate()
    {
        $defaults = self::config()->get('chart_defaults');
        $script = '';
        foreach ($defaults as $key => $value) {
            $script .= $key . '=';
            $script .= is_string($value) ? "'$value';" : "$value;";
        }
        Requirements::customScript(
            <<<JS
            $script
            drawCharts();
JS
            ,
            'chart-defaults'
        );
        Requirements::javascript('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js');
        Requirements::javascript('https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0');
        Requirements::javascript('xddesigners/silverstripe-charts:js/chart.js');
        return $this->renderWith('XD\\Charts\\Charts\\Chart');
    }

}
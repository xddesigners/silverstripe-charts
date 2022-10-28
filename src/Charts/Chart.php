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
    private $config;

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
        Requirements::javascript('xddesigners/silverstripe-charts:js/chartjs/chart.js');
        Requirements::javascript('xddesigners/silverstripe-charts:js/chart.js');
        return $this->renderWith('XD\\Charts\\Charts\\Chart');
    }

}
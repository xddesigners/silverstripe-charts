<?php

namespace XD\Charts\Charts;

/**
 * Class Data
 * @package XD\Charts\Charts
 */
class Data
{
    protected $labels = [];
    protected $datasets = [];

    /**
     * @return array
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     * @return Data
     */
    public function setLabels(array $labels): Data
    {
        $this->labels = $labels;
        return $this;
    }

    /**
     * @return array
     */
    public function getDatasets(): array
    {
        return $this->datasets;
    }

    /**
     * @param array $datasets
     * @return Data
     */
    public function setDatasets(array $datasets): Data
    {
        $this->datasets = $datasets;
        return $this;
    }

    /**
     * @param DataSet $dataSet
     */
    public function addDataSet(DataSet $dataSet)
    {
        $this->datasets[] = $dataSet;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $datasets = [];
        if( !empty($this->datasets) ) {
            foreach ($this->datasets as $dataset) {
                $datasets[] = $dataset->toArray();
            }
        }

        return [
            'labels' => $this->labels,
            'datasets' => $datasets,
        ];
    }

}
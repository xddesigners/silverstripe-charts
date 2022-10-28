<?php

namespace XD\Charts\Charts;

/**
 * Class Config
 * @package XD\Charts\Charts
 */
class Config
{
    private $type;
    private $data;
    private $scales;
    private $options;

    /**
     * Config constructor.
     * @param Data|null $data
     * @param Options|null $options
     */
    public function __construct(Data $data = null, Options $options = null)
    {
        $this->data = $data ?? new Data();
        $this->options = $options ?? new Options();
    }

    /**
     * @return mixed
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Config
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData(): Data
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     * @return Config
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     * @return Config
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScales()
    {
        return $this->scales;
    }

    /**
     * @param mixed $scales
     * @return Config
     */
    public function setScales($scales)
    {
        $this->scales = $scales;
        return $this;
    }

    /**
     * @param $option
     * @param $value
     */
    public function setOption($option, $value)
    {
        $this->options->setOption($option, $value);
    }

    /**
     * @param $option
     */
    public function getOption($option)
    {
        $this->options->getOption($option);
    }

    /**
     * @param $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->options->setTitle($title);
        return $this;
    }


    /**
     * @param $subtitle
     * @return $this
     */
    public function setSubtitle($subtitle)
    {
        $this->options->setSubtitle($subtitle);
        return $this;
    }

    /**
     * @param $position
     * @return $this
     */
    public function setLegendPosition($position)
    {
        $this->options->setLegendPosition($position);
        return $this;
    }

    /**
     * @param $show
     * @return $this
     */
    public function setLegendDisplay($show)
    {
        $this->options->setLegendDisplay($show);
        return $this;
    }

    /**
     * @param $title
     * @return $this
     */
    public function setLegendTitle($title)
    {
        $this->options->setLegendTitle($title);
        return $this;
    }

    /**
     * @param $padding
     * @return $this
     */
    public function setPadding($padding)
    {
        $this->options->setPadding($padding);
        return $this;
    }

    /**
     * @param $width
     * @param $height
     * @return $this
     */
    public function setLegendLabelSize($width, $height)
    {
        $this->options->setLegendLabelSize($width, $height);
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $arr = [
            'type' => $this->getType(),
            'data' => $this->getData()->toArray(),
        ];
        $options = $this->getOptions()->toArray();
        if (!empty($options)) {
            $arr['options'] = $options;
        }
        return $arr;
    }

}
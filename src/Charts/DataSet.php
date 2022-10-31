<?php

namespace XD\Charts\Charts;

/**
 * Class DataSet
 * @package XD\Charts\Charts
 */
class DataSet
{
    private $label = null;
    private $data = [];
    private $options = [];

    /**
     * DataSet constructor.
     * @param null $label
     * @param Data|null $data
     */
    public function __construct($label = null, Data $data = null)
    {
        $this->label = $label;
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param array $label
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return Data|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): DataSet
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return array
     */
    public function getBackgroundColor()
    {
        return $this->getOption('backgroundColor');
    }

    /**
     * @param array $backgroundColor
     */
    public function setBackgroundColor($backgroundColor): DataSet
    {
        $this->setOption('backgroundColor', $backgroundColor);
        return $this;
    }

    /**
     * @return bool
     */
    public function getBorderColor()
    {
        return $this->getOption('borderColor');
    }

    /**
     * @param array $borderColor
     */
    public function setBorderColor($borderColor): DataSet
    {
        $this->setOption('borderColor', $borderColor);
        return $this;
    }

    /**
     * @return int
     */
    public function getBorderWidth(): int
    {
        return $this->getOption('borderWidth');
    }

    /**
     * @param int $borderWidth
     */
    public function setBorderWidth(int $borderWidth): DataSet
    {
        $this->setOption('borderWidth', $borderWidth);
        return $this;
    }

    /**
     * @return bool
     */
    public function getFill(): bool
    {
        return $this->getOption('fill');
    }


    /**
     * @param $pointStyle
     * @return $this
     */
    public function setPointStyle($pointStyle): DataSet
    {
        $this->setOption('pointStyle', $pointStyle);
        return $this;
    }

    /**
     * @return bool
     */
    public function getPointStyle()
    {
        return $this->getOption('pointStyle');
    }

    /**
     * @param bool $fill
     * @return DataSet
     */
    public function setFill(bool $fill): DataSet
    {
        $this->setOption('fill', $fill);
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return DataSet
     */
    public function setOptions(array $options): DataSet
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @param $option
     * @param $value
     * @return $this
     */
    public function setOption($option, $value)
    {
        $this->assignArrayByPath($this->options, $option, $value);
        return $this;
    }

    /**
     * @param $arr
     * @param $path
     * @param $value
     * @param string $separator
     */
    private function assignArrayByPath(&$arr, $path, $value, $separator = '.')
    {
        $keys = explode($separator, $path);
        foreach ($keys as $key) {
            $arr = &$arr[$key];
        }
        $arr = $value;
    }

    /**
     * @param $option
     * @return bool
     */
    public function getOption($option)
    {
        return !isset($this->options[$option]) ?? false;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $arr = [];
        $arr['label'] = $this->label;
        $arr['data'] = $this->data;
        // add custom options
        if (!empty($this->options)) {
            foreach ($this->options as $option => $value) {
                $arr[$option] = $value;
            }
        }
        return $arr;
    }

}

<?php

namespace XD\Charts\Charts;

/**
 * Class Options
 * @package XD\Charts\Charts
 */
class Options
{
    private $options = [
        'animation' => false,
        'maintainAspectRatio' => false,
        'layout' => [
            'padding' => 20
        ],
        'showDataLabels' => false
    ];

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return Options
     */
    public function setOptions(array $options): Options
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
     * @param $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->setOption('plugins.title', ['display' => true, 'text' => $title]);
        return $this;
    }

    /**
     * @param $size
     * @return $this
     */
    public function setTitleFontSize($size)
    {
        $this->setOption('plugins.title.font.size', $size);
        return $this;
    }

    /**
     * @param $size
     * @return $this
     */
    public function setTitleFontWeight($weight)
    {
        $this->setOption('plugins.title.font.weight', $weight);
        return $this;
    }

    /**
     * @param $padding
     * @return $this
     */
    public function setTitlePadding($padding)
    {
        $this->setOption('plugins.title.padding', $padding);
        return $this;
    }

    /**
     * @param $subtitle
     * @return $this
     */
    public function setSubtitle($subtitle)
    {
        $this->setOption('plugins.subtitle', ['display' => true, 'text' => $subtitle]);
        return $this;
    }

    /**
     * @param $weight
     * @return $this
     */
    public function setSubtitleFontWeight($weight)
    {
        $this->setOption('plugins.subtitle.font.weight', $weight);
        return $this;
    }

    /**
     * @param $size
     * @return $this
     */
    public function setSubtitleFontSize($size)
    {
        $this->setOption('plugins.subtitle.font.size', $size);
        return $this;
    }

    /**
     * @param $padding
     * @return $this
     */
    public function setSubtitlePadding($padding)
    {
        $this->setOption('plugins.subtitle.padding', $padding);
        return $this;
    }

    /**
     * @param $position
     * @return $this
     */
    public function setLegendPosition($position)
    {
        $this->setOption('plugins.legend.position', $position);
        return $this;
    }

    /**
     * @param $show
     * @return $this
     */
    public function setLegendDisplay($show)
    {
        $this->setOption('plugins.legend.display', $show);
        return $this;
    }

    /**
     * @param $title
     * @return $this
     */
    public function setLegendTitle($title)
    {
        $this->setOption('plugins.legend.title', ['display' => true, 'text' => $title]);
        return $this;
    }

    public function setLegendTitleAlign($align)
    {
        $this->setOption('plugins.legend.title.align', $align);
        return $this;
    }

    /**
     * @param $title
     * @return $this
     */
    public function setXScaleTitle($title)
    {
        $this->setOption('scales.x.title', ['display' => true, 'text' => $title]);
        return $this;
    }

    /**
     * @param $title
     * @return $this
     */
    public function setYScaleTitle($title)
    {
        $this->setOption('scales.y.title', ['display' => true, 'text' => $title]);
        return $this;
    }

    /**
     * @param $bool
     * @return $this
     */
    public function showDataLabels($bool)
    {
        $this->setOption('showDataLabels', $bool);
        return $this;
    }

    /**
     * @param $padding
     * @return $this
     */
    public function setPadding($padding)
    {
        $this->setOption('layout.padding', $padding);
        return $this;
    }

    /**
     * @param $width
     * @param $height
     * @return $this
     */
    public function setLegendLabelSize($width, $height)
    {
        $this->setOption('plugins.legend.labels', ['boxWidth' => $width, 'boxHeight' => $height]);
        return $this;
    }

    /**
     * @param $width
     * @param $height
     * @return $this
     */
    public function setLegendLabelFontSize($size)
    {
        $this->setOption('plugins.legend.labels.font.size', $size);
        return $this;
    }

    /**
     * @param $padding
     * @return $this
     */
    public function setLegendLabelPadding($padding)
    {
        $this->setOption('plugins.legend.labels.padding', $padding);
        return $this;
    }

    /**
     * @param $align
     * @return $this
     */
    public function setLegendAlign($align)
    {
        $this->setOption('plugins.legend.align', $align);
        return $this;
    }

    public function setUseHTMLLegend($bool = true, $containerID = 'legend-container')
    {
        $this->setOption('plugins.htmlLegend', [
            'containerID' => $containerID
        ]);
        $this->setOption('plugins.legend', [
            'display' => !$bool
        ]);
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $arr = [];
        if (!empty($this->options)) {
            foreach ($this->options as $key => $value) {
                $arr[$key] = $value;
            }
        }
        return $arr;
    }

}
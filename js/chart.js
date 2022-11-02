function drawCharts() {
    let elements = document.querySelectorAll("[data-chart-config]");
    elements.forEach((element) => {
        let config = JSON.parse(element.dataset.chartConfig);
        // Increase padding below legend
        config.plugins = [{
            beforeInit: function (chart) {
                let legendPosition = chart.config.options.plugins.legend.position;
                const originalFit = chart.legend.fit;
                chart.legend.fit = function fit() {
                    originalFit.bind(chart.legend)();
                    if (legendPosition === 'top') {
                        this.height += 10;
                    }
                }
            }
        }];
        // Enable datalabels plugin
        if (config.options.showDataLabels) {
            config.plugins.push(ChartDataLabels);
        }
        console.log('Creating chart with config:', config);
        const chart = new Chart(element, config);
    });
}
function drawCharts() {

    // Chart.defaults.font.size = 12;
    // Chart.defaults.font.family = 'futura';

    let elements = document.querySelectorAll("[data-chart-config]");
    elements.forEach((element) => {
        let config = JSON.parse(element.dataset.chartConfig);
        console.log('Creating chart with config:', config);
        const chart = new Chart(element, config);
    });
}
drawCharts();
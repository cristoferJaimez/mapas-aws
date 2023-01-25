function char_(params) {
    const canvas_ = document.getElementById('myChartForm');
    const ctx_ = canvas_.getContext('2d');

    var title = "empety";
    var labels_valor = [];
    var data_valor = [];

    const labels_ = [
        `${labels_valor}`
    ];

    const data_ = {
        labels: labels_,
        datasets: [{
            label: `${title}`,
            data: [data_valor],
            fill: false,
            Color: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };


    var myChart = new Chart(ctx_, {
        type: 'line',
        data: data_,
        options: {
            scales: {
                y: {
                    stacked: true
                }
            }
        }
    });

}

export { char_ }

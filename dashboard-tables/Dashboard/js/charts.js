var chart = document.getElementById('circleChart');

  new Chart(chart, {
    type: 'doughnut',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'April', 'May', 'July'],
      datasets: [{
        label: 'الحجوزات',
        data: [6,9,42,12,8],
        backgroundColor: [
            '#e6dd3b',
            '#3085c3',
            '#c63d2f',
            '#29bb89'
        ],
        borderColor: [
            '#e6dd3b',
            '#3085c3',
            '#c63d2f',
            '#29bb89'
        ],
        borderWidth: 1
      }]
    },
    options: {
     responsive: true
}
});

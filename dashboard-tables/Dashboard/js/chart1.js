var chart = document.getElementById('lineChart');

  new Chart(chart, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'April', 'May', 'July', 'August', 'September', 'November'],
      datasets: [{
        label: 'اجمالي الربح $',
        data: [2050,1900,2100,1800,2000,2500,2450,2300,2900],
        backgroundColor: [
            '#e9b824'
        ],
        borderColor: [
            ' #ee9322'
        ],
        borderWidth: 1
      }]
    },
    options: {
     responsive: true
    }
  });


//   _______________________________________________
// var btn = document.getElementById("h_scrollBTN");
// window.onscroll =function(){
//     if(scrollY >= 10)
//     {
//         h_scrollBTN.style.display = "block";
//     }else {
//         h_scrollBTN.style.display = "none";   
//     }
// }

// h_scrollBTN.onclick = function(){
//     scroll({
//         left: 0,
//         top:0,
//         behavior:"smooth"
//     })
// }

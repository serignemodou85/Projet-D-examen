/*------------------------------------------------------------------
    File Name: custom.js
    Template Name: Pluto - Responsive HTML5 Template
    Created By: html.design
    Envato Profile: https://themeforest.net/user/htmldotdesign
    Website: https://html.design
    Version: 1.0
-------------------------------------------------------------------*/

"use strict";

$(document).ready(function () {
  // Sidebar toggle
  $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
  });

  // Initialize calendar if element exists
  if ($.fn.calendar) {
    $('#example14').calendar({ inline: true });
    $('#example15').calendar();
  }

  // Initialize tooltip
  $('[data-toggle="tooltip"]').tooltip();
});

/*--------------------------------------
    Scrollbar
--------------------------------------*/
if (typeof PerfectScrollbar !== 'undefined') {
  const sidebarElement = document.getElementById('sidebar');
  if (sidebarElement) {
    new PerfectScrollbar('#sidebar');
  }
}

/*--------------------------------------
    Chart.js
--------------------------------------*/
if (typeof Chart !== 'undefined') {
  const charts = [
    { id: "line_chart", type: "line" },
    { id: "bar_chart", type: "bar" },
    { id: "radar_chart", type: "radar" },
    { id: "pie_chart", type: "pie" },
    { id: "area_chart", type: "area" },
    { id: "donut_chart", type: "donut" },
  ];

  charts.forEach(chart => {
    const chartElement = document.getElementById(chart.id);
    if (chartElement) {
      new Chart(chartElement.getContext("2d"), getChartJs(chart.type));
    }
  });
}

function getChartJs(type) {
  const datasets = {
    line: {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [
        {
          label: "Dataset 1",
          data: [68, 55, 75, 86, 47, 52, 36],
          borderColor: 'rgba(33, 150, 243, 1)',
          backgroundColor: 'rgba(33, 150, 243, 0.2)',
        },
        {
          label: "Dataset 2",
          data: [28, 48, 40, 19, 86, 27, 90],
          borderColor: 'rgba(30, 208, 133, 1)',
          backgroundColor: 'rgba(30, 208, 133, 0.2)',
        }
      ]
    },
    bar: {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [
        {
          label: "Dataset 1",
          data: [65, 59, 80, 81, 56, 55, 40],
          backgroundColor: 'rgba(33, 150, 243, 1)',
        },
        {
          label: "Dataset 2",
          data: [28, 48, 40, 19, 86, 27, 90],
          backgroundColor: 'rgba(30, 208, 133, 1)',
        }
      ]
    },
    pie: {
      datasets: [
        {
          data: [80, 50, 30, 35, 45],
          backgroundColor: [
            "rgba(33, 150, 243, 1)",
            "rgba(30, 208, 133, 1)",
            "rgba(233, 30, 99, 1)",
            "rgba(103, 58, 183, 1)",
            "rgba(33, 65, 98, 1)"
          ]
        }
      ],
      labels: ["Blue", "Green", "Pink", "Purple", "Default"]
    }
  };

  const options = {
    responsive: true,
    legend: { display: true },
  };

  return { type, data: datasets[type], options };
}

/*--------------------------------------
    Google Maps
--------------------------------------*/
function initMap() {
  const mapElement = document.getElementById('map');
  if (!mapElement) return;

  const map = new google.maps.Map(mapElement, {
    zoom: 12,
    center: { lat: 40.645037, lng: -73.880224 },
    styles: [
      { elementType: 'geometry', stylers: [{ color: '#fefefe' }] },
      { elementType: 'labels.icon', stylers: [{ visibility: 'off' }] },
      { elementType: 'labels.text.fill', stylers: [{ color: '#616161' }] },
      { elementType: 'labels.text.stroke', stylers: [{ color: '#f5f5f5' }] },
      { featureType: 'water', elementType: 'geometry', stylers: [{ color: '#c8d7d4' }] },
      { featureType: 'water', elementType: 'labels.text.fill', stylers: [{ color: '#b1a481' }] },
    ]
  });

  const markerIcon = 'images/layout_img/map_icon.png';
  new google.maps.Marker({
    position: { lat: 40.645037, lng: -73.880224 },
    map,
    icon: markerIcon
  });
}

// Load Google Maps script dynamically if needed
if (typeof google === 'undefined') {
  const script = document.createElement('script');
  script.src = `https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap`;
  script.async = true;
  script.defer = true;
  document.head.appendChild(script);
}

/**
 * Torbara Waxom Template for Joomla, exclusively on Envato Market: http://themeforest.net/user/torbara?ref=torbara
 * @encoding     UTF-8
 * @version      1.0
 * @copyright    Copyright (C) 2015 Torbara (http://torbara.com). All rights reserved.
 * @license      GNU General Public License version 2 or later, see http://www.gnu.org/licenses/gpl-2.0.html
 * @author       Vadim Kozhukhov (support@torbara.com)
 */
jQuery(function($) {

    var config = $('html').data('config') || {};

    // Social buttons
    $('article[data-permalink]').socialButtons(config);
    jQuery('.uk-navbar-toggle.desk-view').click(function(){
        jQuery(this).toggleClass('active');
    });
    
    jQuery('.presentation-wrap .info .play').on('click', function(ev) {
    jQuery(this).parent().parent().fadeOut();   
    jQuery("#video")[0].src += "&autoplay=1";
    ev.preventDefault();
    jQuery(".video-wrap").fadeIn(); 
  });
  
  
  jQuery('.item .count').counterUp({
    delay: 10, // the delay time in ms
    time: 1500 // the speed time in ms
  });
  
  jQuery('.filter-button-group button').click(function(){
     jQuery(this).toggleClass('active').siblings().removeClass('active'); 
  });
  
  
  
//  FIRST Pie CHART
  
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
    var randomColorFactor = function() {
        return Math.round(Math.random() * 255);
    };
    var randomColor = function(opacity) {
        return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
    };

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),

                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",

                ],
            }, {
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),

                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",

                ],
            }, {
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),

                ],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",

                ],
            }],
            labels: [
                "Red",
                "Green",
                "Yellow",

            ]
        },
        options: {
            responsive: true
        }
    };


    $('#randomizeData').click(function() {
        $.each(config.data.datasets, function(i, piece) {
            $.each(piece.data, function(j, value) {
                config.data.datasets[i].data[j] = randomScalingFactor();
                //config.data.datasets.backgroundColor[i] = 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
            });
        });
        window.myPie.update();
    });

    $('#addDataset').click(function() {
        var newDataset = {
            backgroundColor: [randomColor(0.7), randomColor(0.7), randomColor(0.7), randomColor(0.7), randomColor(0.7)],
            data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
        };

        config.data.datasets.push(newDataset);
        window.myPie.update();
    });

    $('#removeDataset').click(function() {
        config.data.datasets.splice(0, 1);
        window.myPie.update();
    });
    //  FIRST Pie CHART END
    
    //  Second Pie CHART
     
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
    var randomColorFactor = function() {
        return Math.round(Math.random() * 255);
    };
    var randomColor = function(opacity) {
        return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
    };

    var config2 = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [

                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
                backgroundColor: [

                    "#FDB45C",
                    "#949FB1",
                    "#4D5360",
                ],
                label: 'Dataset 1'
            }, {
                hidden: true,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
                backgroundColor: [

                    "#FDB45C",
                    "#949FB1",
                    "#4D5360",
                ],
                label: 'Dataset 2'
            }, {
                data: [

                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
                backgroundColor: [

                    "#FDB45C",
                    "#949FB1",
                    "#4D5360",
                ],
                label: 'Dataset 3'
            }],
            labels: [

                "Yellow",
                "Grey",
                "Dark Grey"
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: false,
                text: 'Doughnut Chart'
            }
        }
    };
    
    $('#randomizeData').click(function() {
        $.each(config2.data.datasets, function(i, dataset) {
            dataset.data = dataset.data.map(function() {
                return randomScalingFactor();
            });

            dataset.backgroundColor = dataset.backgroundColor.map(function() {
                return randomColor(0.7);
            });
        });

        window.myDoughnut.update();
    });

    $('#addDataset1').click(function() {
        var newDataset = {
            backgroundColor: [],
            data: [],
            label: 'New dataset ' + config2.data.datasets.length,
        };

        for (var index = 0; index < config2.data.labels.length; ++index) {
            newDataset.data.push(randomScalingFactor());
            newDataset.backgroundColor.push(randomColor(0.7));
        }

        config2.data.datasets.push(newDataset);
        window.myDoughnut.update();
    });

    $('#removeDataset1').click(function() {
        config2.data.datasets.splice(0, 1);
        window.myDoughnut.update();
    });





    
    //  Second Pie CHART END
    
    
    
    
    //  Third Pie CHART  

    var config3 = {
        data: {
            datasets: [{
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
                backgroundColor: [
                    "#F7464A",
                    "#949FB1",
                    "#4D5360",
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                "Red",
                "Grey",
                "Dark Grey"
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: false,
                text: 'Chart.js Polar Area Chart'
            },
            scale: {
              ticks: {
                beginAtZero: true
              },
              reverse: false
            },
            animateRotate:false
        }
    };
    

    $('#addData2').click(function() {
        if (config3.data.datasets.length > 0) {   

            $.each(config3.data.datasets, function(i, dataset) {
                dataset.backgroundColor.push(randomColor());
                dataset.data.push(randomScalingFactor());
            });
     
            window.myPolarArea.update();
        }
    });

    $('#removeData2').click(function() {
        config3.data.labels.pop(); // remove the label first

        $.each(config3.data.datasets, function(i, dataset) {
            dataset.backgroundColor.pop();
            dataset.data.pop();
        });

        window.myPolarArea.update();
    });
    
    
    $('#randomizeData').click(function() {
        $.each(config3.data.datasets, function(i, piece) {
            $.each(piece.data, function(j, value) {
                config3.data.datasets[i].data[j] = randomScalingFactor();
                config3.data.datasets[i].backgroundColor[j] = randomColor();
            });
        });
        window.myPolarArea.update();
    });


    //  Third Pie CHART END
    
    
    //  First Bar CHART
    
    var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        var randomScalingFactor = function() {
            return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
        };
        var randomColorFactor = function() {
            return Math.round(Math.random() * 255);
        };
        var randomColor = function() {
            return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
        };

        var barChartData1 = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: 'Dataset 1',
                backgroundColor: "rgba(220,220,220,0.5)",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
            }, {
                hidden: true,
                label: 'Dataset 2',
                backgroundColor: "rgba(151,187,205,0.5)",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
            }, {
                label: 'Dataset 3',
                backgroundColor: "rgba(151,187,205,0.5)",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
            }]

        };

    
    //  First Bar CHART
    
    
    //  Second Bar CHART
        var randomScalingFactor = function() {
            return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
        };
        var randomColorFactor = function() {
            return Math.round(Math.random() * 255);
        };

        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                type: 'bar',
                label: 'Dataset 1',
                backgroundColor: "rgba(151,187,205,0.5)",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                borderColor: 'white',
                borderWidth: 2
            }, {
                type: 'line',
                label: 'Dataset 2',
                backgroundColor: "rgba(151,187,205,0.5)",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                borderColor: 'white',
                borderWidth: 2
            }, {
                type: 'bar',
                label: 'Dataset 3',
                backgroundColor: "rgba(220,220,220,0.5)",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
            }, ]

        };
    //  Second Bar CHART END   
    
    

        
        
        
        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Combo Bar Line Chart'
                    }
                }
            });
            
            var ctx1 = document.getElementById("chart-area").getContext("2d");
            window.myPie = new Chart(ctx1, config);
            
            var ctx2 = document.getElementById("chart-area1").getContext("2d");
            window.myDoughnut = new Chart(ctx2, config2);
            
            var ctx3 = document.getElementById("chart-area2");
            window.myPolarArea = Chart.PolarArea(ctx3, config3);
            
            var ctx4 = document.getElementById("canvas1").getContext("2d");
            window.myBar = new Chart(ctx4, {
                type: 'bar',
                data: barChartData1,
                options: {
                    // Elements options apply to all of the options unless overridden in a dataset
                    // In this case, we are setting the border of each bar to be 2px wide and green
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: 'rgb(77, 93, 86)',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Bar Chart'
                    }
                }
            });
        };

          

   
});
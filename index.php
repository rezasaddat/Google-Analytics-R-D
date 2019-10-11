<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-signin-client_id" content="client_id">
    <title>Dashboard</title>
    <!-- ui kit -->
    <link rel="stylesheet" href="css/uikit.css">
    <!-- material design -->
    <link rel="stylesheet" href="css/materialdesignicons.min.css">
    <!-- highchart -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="css/datatables.css"/>
    <!-- Datetime picker -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- highchart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- moment -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <!-- <script src="https://apis.google.com/js/platform.js" async defer></script> -->
    <!-- datetime picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="js/main.js"></script>
    <!-- ui kit -->
    <script src="js/uikit.js"></script>
    <!-- uikit icon -->
    <script src="js/uikit-icons.js"></script>
    <!-- jquery session -->
    <script src="js/jquerysession.js"></script>
    <!-- datatables -->
    <script type="text/javascript" src="js/datatables.js"></script>
    <!-- jtag ga -->
    <script>
        (function(w,d,s,g,js,fs){
        g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
        js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
        js.src='https://apis.google.com/js/platform.js';
        fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
        }(window,document,'script'));
    </script>
    <!-- Include the ActiveUsers component script. -->
    <script src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/active-users.js"></script>

</head>
<body>
    <!-- layout menu -->
    <?php include_once('template/menu.php')?>
    <!-- layout head -->
    <?php include_once('template/head.php')?>
    <!-- layout main -->
    <div class="uk-padding"
        style="position: relative;
                min-height: calc(100vh - 65px);
                border-left: 265px solid transparent;
                padding-bottom: 70px !important;"> 

        <div class="uk-background-default" uk-sticky="offset: 65; bottom: #top">
            <div class="uk-inline">
                <h3 class="uk-margin-remove-top">
                    <a href="#" class="uk-text-danger">
                    <span class="mdi mdi-arrow-left mdi-24px uk-margin-small-right"></span>
                        Dummy Dashboard
                    </a>
                    <span class="uk-text-meta">/ Dashboard</span>
                </h3>
            </div>
            <div class="toolbar uk-align-right uk-margin-remove">
                <div class="uk-button-group">
                    <div class="uk-width-medium">
                        <input class="uk-input uk-form-small uk-text-center" type="datetimepicker" value="" id="daterange">
                    </div>
                    <div id="active-users" class="uk-text-small uk-text-primary uk-text-middle uk-input uk-form-small uk-width-small"></div>
                </div>
            </div>
        </div>

        <div class="uk-width-expand@s uk-margin uk-animation-slide-bottom-medium">
            <ul uk-tab>
                <li class="uk-active"><a href="#" class="uk-text-small">Visitor</a></li>
                <li><a href="#" class="uk-text-small">Product Afinity</a></li>
                <!-- <li><a href="#" class="uk-text-small">Pendapatan</a></li> -->
            </ul>

            <ul class="uk-switcher">
                <li>
                    <div class="uk-width-expand@m">
                        <div class="uk-card uk-card-default uk-card-body uk-animation-slide-right-medium">
                            <div id="chartVisitor" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="uk-width-expand@m">
                        <div class="uk-card uk-card-default uk-card-body uk-animation-slide-right-medium">
                            <table id="productAfinity" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </li>
                
                <li>
                    <div class="uk-width-expand@m">
                        <div class="uk-card uk-card-default uk-card-body uk-animation-slide-right-medium">
                            <div id="container" style="min-width: 400px; min-height: 400px; margin: 0 auto"></div>
                            <script>
                                // Data retrieved from http://vikjavev.no/ver/index.php?spenn=2d&sluttid=16.06.2015.

                                Highcharts.chart('container', {
                                    chart: {
                                        type: 'spline',
                                        scrollablePlotArea: {
                                            minWidth: 600,
                                            scrollPositionX: 1
                                        }
                                    },
                                    title: {
                                        text: 'Wind speed during two days',
                                        align: 'left'
                                    },
                                    subtitle: {
                                        text: '13th & 14th of February, 2018 at two locations in Vik i Sogn, Norway',
                                        align: 'left'
                                    },
                                    xAxis: {
                                        type: 'datetime',
                                        labels: {
                                            overflow: 'justify'
                                        }
                                    },
                                    yAxis: {
                                        title: {
                                            text: 'Wind speed (m/s)'
                                        },
                                        minorGridLineWidth: 0,
                                        gridLineWidth: 0,
                                        alternateGridColor: null,
                                        plotBands: [{ // Light air
                                            from: 0.3,
                                            to: 1.5,
                                            color: 'rgba(68, 170, 213, 0.1)',
                                            label: {
                                                text: 'Light air',
                                                style: {
                                                    color: '#606060'
                                                }
                                            }
                                        }, { // Light breeze
                                            from: 1.5,
                                            to: 3.3,
                                            color: 'rgba(0, 0, 0, 0)',
                                            label: {
                                                text: 'Light breeze',
                                                style: {
                                                    color: '#606060'
                                                }
                                            }
                                        }, { // Gentle breeze
                                            from: 3.3,
                                            to: 5.5,
                                            color: 'rgba(68, 170, 213, 0.1)',
                                            label: {
                                                text: 'Gentle breeze',
                                                style: {
                                                    color: '#606060'
                                                }
                                            }
                                        }, { // Moderate breeze
                                            from: 5.5,
                                            to: 8,
                                            color: 'rgba(0, 0, 0, 0)',
                                            label: {
                                                text: 'Moderate breeze',
                                                style: {
                                                    color: '#606060'
                                                }
                                            }
                                        }, { // Fresh breeze
                                            from: 8,
                                            to: 11,
                                            color: 'rgba(68, 170, 213, 0.1)',
                                            label: {
                                                text: 'Fresh breeze',
                                                style: {
                                                    color: '#606060'
                                                }
                                            }
                                        }, { // Strong breeze
                                            from: 11,
                                            to: 14,
                                            color: 'rgba(0, 0, 0, 0)',
                                            label: {
                                                text: 'Strong breeze',
                                                style: {
                                                    color: '#606060'
                                                }
                                            }
                                        }, { // High wind
                                            from: 14,
                                            to: 15,
                                            color: 'rgba(68, 170, 213, 0.1)',
                                            label: {
                                                text: 'High wind',
                                                style: {
                                                    color: '#606060'
                                                }
                                            }
                                        }]
                                    },
                                    tooltip: {
                                        valueSuffix: ' m/s'
                                    },
                                    plotOptions: {
                                        spline: {
                                            lineWidth: 4,
                                            states: {
                                                hover: {
                                                    lineWidth: 5
                                                }
                                            },
                                            marker: {
                                                enabled: false
                                            },
                                            pointInterval: 3600000, // one hour
                                            pointStart: Date.UTC(2018, 1, 13, 0, 0, 0)
                                        }
                                    },
                                    series: [{
                                        name: 'Hestavollane',
                                        data: [
                                            3.7, 3.3, 3.9, 5.1, 3.5, 3.8, 4.0, 5.0, 6.1, 3.7, 3.3, 6.4,
                                            6.9, 6.0, 6.8, 4.4, 4.0, 3.8, 5.0, 4.9, 9.2, 9.6, 9.5, 6.3,
                                            9.5, 10.8, 14.0, 11.5, 10.0, 10.2, 10.3, 9.4, 8.9, 10.6, 10.5, 11.1,
                                            10.4, 10.7, 11.3, 10.2, 9.6, 10.2, 11.1, 10.8, 13.0, 12.5, 12.5, 11.3,
                                            10.1
                                        ]

                                    }, {
                                        name: 'Vik',
                                        data: [
                                            0.2, 0.1, 0.1, 0.1, 0.3, 0.2, 0.3, 0.1, 0.7, 0.3, 0.2, 0.2,
                                            0.3, 0.1, 0.3, 0.4, 0.3, 0.2, 0.3, 0.2, 0.4, 0.0, 0.9, 0.3,
                                            0.7, 1.1, 1.8, 1.2, 1.4, 1.2, 0.9, 0.8, 0.9, 0.2, 0.4, 1.2,
                                            0.3, 2.3, 1.0, 0.7, 1.0, 0.8, 2.0, 1.2, 1.4, 3.7, 2.1, 2.0,
                                            1.5
                                        ]
                                    }],
                                    navigation: {
                                        menuItemStyle: {
                                            fontSize: '10px'
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="uk-width-expand@m">
                        <div class="uk-card uk-card-default uk-card-body uk-animation-slide-right-medium">
                            <div id="container2" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                            <script>
                                // Highcharts.getJSON(
                                //     'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/usdeur.json',
                                //     function (data) {

                                        Highcharts.chart('container2', {
                                            chart: {
                                                zoomType: 'x'
                                            },
                                            title: {
                                                text: 'USD to EUR exchange rate over time'
                                            },
                                            subtitle: {
                                                text: document.ontouchstart === undefined ?
                                                    'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
                                            },
                                            xAxis: {
                                                type: 'datetime'
                                            },
                                            yAxis: {
                                                title: {
                                                    text: 'Exchange rate'
                                                }
                                            },
                                            legend: {
                                                enabled: false
                                            },
                                            plotOptions: {
                                                area: {
                                                    fillColor: {
                                                        linearGradient: {
                                                            x1: 0,
                                                            y1: 0,
                                                            x2: 0,
                                                            y2: 1
                                                        },
                                                        stops: [
                                                            [0, Highcharts.getOptions().colors[0]],
                                                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                                        ]
                                                    },
                                                    marker: {
                                                        radius: 2
                                                    },
                                                    lineWidth: 1,
                                                    states: {
                                                        hover: {
                                                            lineWidth: 1
                                                        }
                                                    },
                                                    threshold: null
                                                }
                                            },

                                            series: [{
                                                type: 'area',
                                                name: 'USD to EUR',
                                                data: [
                                            3.7, 3.3, 3.9, 5.1, 3.5, 3.8, 4.0, 5.0, 6.1, 3.7, 3.3, 6.4,
                                            6.9, 6.0, 6.8, 4.4, 4.0, 3.8, 5.0, 4.9, 9.2, 9.6, 9.5, 6.3,
                                            9.5, 10.8, 14.0, 11.5, 10.0, 10.2, 10.3, 9.4, 8.9, 10.6, 10.5, 11.1,
                                            10.4, 10.7, 11.3, 10.2, 9.6, 10.2, 11.1, 10.8, 13.0, 12.5, 12.5, 11.3,
                                            10.1
                                        ]
                                            }]
                                        });
                                //     }
                                // );
                            </script>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- section 2 chart -->
        <div class="uk-grid-small uk-child-width-1-2@s uk-flex-left uk-text-left uk-animation-slide-bottom-medium" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <div id="dummy-section-bottom" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
                    <script>
                        Highcharts.chart('dummy-section-bottom', {
                            chart: {
                                type: 'bar'
                            },
                            title: {
                                text: 'Historic World Population by Region'
                            },
                            subtitle: {
                                text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
                            },
                            xAxis: {
                                categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
                                title: {
                                    text: null
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Population (millions)',
                                    align: 'high'
                                },
                                labels: {
                                    overflow: 'justify'
                                }
                            },
                            tooltip: {
                                valueSuffix: ' millions'
                            },
                            plotOptions: {
                                bar: {
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'top',
                                x: -40,
                                y: 80,
                                floating: true,
                                borderWidth: 1,
                                backgroundColor:
                                    Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                                shadow: true
                            },
                            credits: {
                                enabled: false
                            },
                            series: [{
                                name: 'Year 1800',
                                data: [107, 31, 635, 203, 2]
                            }, {
                                name: 'Year 1900',
                                data: [133, 156, 947, 408, 6]
                            }, {
                                name: 'Year 2000',
                                data: [814, 841, 3714, 727, 31]
                            }, {
                                name: 'Year 2016',
                                data: [1216, 1001, 4436, 738, 40]
                            }]
                        });
                    </script>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <div id="dumm-bot-1" style="min-width: 400px; min-height: 400px; margin: 0 auto"></div>
                            <script>
                                // Data retrieved from http://vikjavev.no/ver/index.php?spenn=2d&sluttid=16.06.2015.

                                Highcharts.chart('dumm-bot-1', {
                                    chart: {
                                        type: 'spline',
                                        scrollablePlotArea: {
                                            minWidth: 200,
                                            scrollPositionX: 1
                                        }
                                    },
                                    title: {
                                        text: 'Wind speed during two days',
                                        align: 'left'
                                    },
                                    subtitle: {
                                        text: '13th & 14th of February, 2018 at two locations in Vik i Sogn, Norway',
                                        align: 'left'
                                    },
                                    xAxis: {
                                        type: 'datetime',
                                        labels: {
                                            overflow: 'justify'
                                        }
                                    },
                                    yAxis: {
                                        title: {
                                            text: 'Wind speed (m/s)'
                                        },
                                        minorGridLineWidth: 0,
                                        gridLineWidth: 0,
                                        alternateGridColor: null,
                                        plotBands: [{ // Light air
                                            from: 0.3,
                                            to: 1.5,
                                            color: 'rgba(68, 170, 213, 0.1)',
                                            label: {
                                                text: 'Light air',
                                                style: {
                                                    color: '#606060'
                                                }
                                            }
                                        }, { // Light breeze
                                            from: 1.5,
                                            to: 3.3,
                                            color: 'rgba(0, 0, 0, 0)',
                                            label: {
                                                text: 'Light breeze',
                                                style: {
                                                    color: '#606060'
                                                }
                                            }
                                        }, { // Gentle breeze
                                            from: 3.3,
                                            to: 5.5,
                                            color: 'rgba(68, 170, 213, 0.1)',
                                            label: {
                                                text: 'Gentle breeze',
                                                style: {
                                                    color: '#606060'
                                                }
                                            }
                                        }, { // Moderate breeze
                                            from: 5.5,
                                            to: 8,
                                            color: 'rgba(0, 0, 0, 0)',
                                            label: {
                                                text: 'Moderate breeze',
                                                style: {
                                                    color: '#606060'
                                                }
                                            }
                                        }, { // Fresh breeze
                                            from: 8,
                                            to: 11,
                                            color: 'rgba(68, 170, 213, 0.1)',
                                            label: {
                                                text: 'Fresh breeze',
                                                style: {
                                                    color: '#606060'
                                                }
                                            }
                                        }, { // Strong breeze
                                            from: 11,
                                            to: 14,
                                            color: 'rgba(0, 0, 0, 0)',
                                            label: {
                                                text: 'Strong breeze',
                                                style: {
                                                    color: '#606060'
                                                }
                                            }
                                        }, { // High wind
                                            from: 14,
                                            to: 15,
                                            color: 'rgba(68, 170, 213, 0.1)',
                                            label: {
                                                text: 'High wind',
                                                style: {
                                                    color: '#606060'
                                                }
                                            }
                                        }]
                                    },
                                    tooltip: {
                                        valueSuffix: ' m/s'
                                    },
                                    plotOptions: {
                                        spline: {
                                            lineWidth: 4,
                                            states: {
                                                hover: {
                                                    lineWidth: 5
                                                }
                                            },
                                            marker: {
                                                enabled: false
                                            },
                                            pointInterval: 3600000, // one hour
                                            pointStart: Date.UTC(2018, 1, 13, 0, 0, 0)
                                        }
                                    },
                                    series: [{
                                        name: 'Hestavollane',
                                        data: [
                                            3.7, 3.3, 3.9, 5.1, 3.5, 3.8, 4.0, 5.0, 6.1, 3.7, 3.3, 6.4,
                                            6.9, 6.0, 6.8, 4.4, 4.0, 3.8, 5.0, 4.9, 9.2, 9.6, 9.5, 6.3,
                                            9.5, 10.8, 14.0, 11.5, 10.0, 10.2, 10.3, 9.4, 8.9, 10.6, 10.5, 11.1,
                                            10.4, 10.7, 11.3, 10.2, 9.6, 10.2, 11.1, 10.8, 13.0, 12.5, 12.5, 11.3,
                                            10.1
                                        ]

                                    }, {
                                        name: 'Vik',
                                        data: [
                                            0.2, 0.1, 0.1, 0.1, 0.3, 0.2, 0.3, 0.1, 0.7, 0.3, 0.2, 0.2,
                                            0.3, 0.1, 0.3, 0.4, 0.3, 0.2, 0.3, 0.2, 0.4, 0.0, 0.9, 0.3,
                                            0.7, 1.1, 1.8, 1.2, 1.4, 1.2, 0.9, 0.8, 0.9, 0.2, 0.4, 1.2,
                                            0.3, 2.3, 1.0, 0.7, 1.0, 0.8, 2.0, 1.2, 1.4, 3.7, 2.1, 2.0,
                                            1.5
                                        ]
                                    }],
                                    navigation: {
                                        menuItemStyle: {
                                            fontSize: '10px'
                                        }
                                    }
                                });
                            </script>
                </div>
            </div>
        </div>
        <!-- section 3 chart -->
        <div class="uk-grid-small uk-child-width-1-2@s uk-flex-left uk-text-left uk-animation-slide-bottom-medium" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <div id="dumm-bot-3" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                    <script>
                        // Highcharts.getJSON(
                        //     'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/usdeur.json',
                        //     function (data) {

                                Highcharts.chart('dumm-bot-3', {
                                    chart: {
                                        zoomType: 'x'
                                    },
                                    title: {
                                        text: 'USD to EUR exchange rate over time'
                                    },
                                    subtitle: {
                                        text: document.ontouchstart === undefined ?
                                            'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
                                    },
                                    xAxis: {
                                        type: 'datetime'
                                    },
                                    yAxis: {
                                        title: {
                                            text: 'Exchange rate'
                                        }
                                    },
                                    legend: {
                                        enabled: false
                                    },
                                    plotOptions: {
                                        area: {
                                            fillColor: {
                                                linearGradient: {
                                                    x1: 0,
                                                    y1: 0,
                                                    x2: 0,
                                                    y2: 1
                                                },
                                                stops: [
                                                    [0, Highcharts.getOptions().colors[0]],
                                                    [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                                ]
                                            },
                                            marker: {
                                                radius: 2
                                            },
                                            lineWidth: 1,
                                            states: {
                                                hover: {
                                                    lineWidth: 1
                                                }
                                            },
                                            threshold: null
                                        }
                                    },

                                    series: [{
                                        type: 'area',
                                        name: 'USD to EUR',
                                        data: [
                                    3.7, 3.3, 3.9, 5.1, 3.5, 3.8, 4.0, 5.0, 6.1, 3.7, 3.3, 6.4,
                                    6.9, 6.0, 6.8, 4.4, 4.0, 3.8, 5.0, 4.9, 9.2, 9.6, 9.5, 6.3,
                                    9.5, 10.8, 14.0, 11.5, 10.0, 10.2, 10.3, 9.4, 8.9, 10.6, 10.5, 11.1,
                                    10.4, 10.7, 11.3, 10.2, 9.6, 10.2, 11.1, 10.8, 13.0, 12.5, 12.5, 11.3,
                                    10.1
                                ]
                                    }]
                                });
                        //     }
                        // );
                    </script>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <div id="dumm-bot-2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    <script>
                        Highcharts.chart('dumm-bot-2', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Monthly Average Rainfall'
                            },
                            subtitle: {
                                text: 'Source: WorldClimate.com'
                            },
                            xAxis: {
                                categories: [
                                    'Jan',
                                    'Feb',
                                    'Mar',
                                    'Apr',
                                    'May',
                                    'Jun',
                                    'Jul',
                                    'Aug',
                                    'Sep',
                                    'Oct',
                                    'Nov',
                                    'Dec'
                                ],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Rainfall (mm)'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Tokyo',
                                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

                            }, {
                                name: 'New York',
                                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

                            }, {
                                name: 'London',
                                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

                            }, {
                                name: 'Berlin',
                                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

                            }]
                        });
                    </script>
                </div>
            </div>
        </div>
        <!-- section 4 chart -->
        
    </div>
    <!-- layout footer -->
    <?php include_once('template/footer.php')?>
</body>
</html>

<script>
    let idToken = $.session.get('idToken');
    let accessToken = $.session.get('accessToken');
    var date = moment();

    var dateRangeStart = null;
    var dateRangeEnd = null;

    var startOfMonth = moment().startOf('month').format('YYYY-MM-DD');
    var endOfMonth   = moment().endOf('month').format('YYYY-MM-DD');

    var startOfMonth_compered = moment().startOf('month').subtract(1, 'month').format('YYYY-MM-DD');
    var endOfMonth_compered = moment().endOf('month').subtract(1, 'month').format('YYYY-MM-DD');

    var monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
    // ga analytics authtetication
    gapi.analytics.ready(function() {
        // auth analytics
        gapi.analytics.auth.authorize(
            {
                container: 'auth-ga',
                clientid: 'client_id'
            }
        );
        // auth success action
        gapi.analytics.auth.on('success', function(data)
            {
                var access_token = data['access_token'];
                var id_token = data['id_token'];
                $.session.set('accessToken', access_token);
                $.session.set('idToken', id_token);
                // console.log(data);
                if (idToken == null) {
                    window.location.reload();
                }
                
            }
        );
        // realtime actives user(visitor)
        var activeUsers = new gapi.analytics.ext.ActiveUsers({
            container: 'active-users',
            pollingInterval: 5,
            ids: 'VIEW_ID',
        }).execute();
    });
    // checking auth token session
    $(function(){
        $.ajax({
            url : 'https://oauth2.googleapis.com/tokeninfo?id_token='+idToken,
            contentType: "application/json; charset=utf-8", // this
            dataType: "json", // and this
            success: function(response){
                if (response != null) {
                    // console.log(response);
                    $('#auth-ga').attr('style', 'display:none');
                }else{
                    $('#auth-ga').attr('style', 'display:block');
                }
                
                repPengguna();
                repPendapatan();
                repKuantitasPengiriman();
                repProductPurchase();
                repProductSKU();
                lastTouchVisitor();
                productAfinity();
                
            },
            error: function(xhr){
                if (xhr.responseJSON.error == 'invalid_token' || xhr.responseJSON.status === 400) {
                    $('#auth-ga').attr('style', 'display:block');
                    $.session.clear();
                }
            },
        });

        $("body").on("click", ".applyBtn", function(){
            var daterange = $("#daterange").val();
            var splitDate = daterange.split(" - ");

            dateRangeStart = splitDate[0];
            dateRangeEnd = splitDate[1];
            
            $('#chartVisitor').replaceWith('<div id="chartVisitor" style="min-width: 400px; height: 400px; margin: 0 auto"></div>');
            $('#productAfinity_wrapper').replaceWith(`<table id="productAfinity" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                            </table>`);
            lastTouchVisitor();
            productAfinity();
        });
    });

    function convertCurrency(amount) {
        var numberFormat = new Intl.NumberFormat('en-US',
        {
            style: 'currency',
            currency: 'USD',
            minimumFractionDigits: 0
        });

        return numberFormat.format(amount);
        
    }
    function repPengguna() {
        $.ajax({
            url : `https://www.googleapis.com/analytics/v3/data/ga?ids=VIEW_ID&start-date=${startOfMonth}&end-date=${endOfMonth}&metrics=ga:users&dimensions=ga:date&access_token=${accessToken}`,
            contentType: "application/json; charset=utf-8", // this
            dataType: "json", // and this
            success: function(response){
                let datePengguna = [];
                let valuePengguna = [];

                response.rows.forEach(row => {
                    datePengguna.push(moment(row[0], 'YYYYMMDD').format('ddd, D/MM/YYYY'));
                    valuePengguna.push(row[1]);
                });

                console.log('pengguna', response);
                
            },
            error: function(xhr){
            },
        });
    }
    function repPendapatan() {
        $.ajax({
            url : `https://www.googleapis.com/analytics/v3/data/ga?ids=VIEW_ID&start-date=${startOfMonth}&end-date=${endOfMonth}&metrics=ga:transactionRevenue&dimensions=ga:date&access_token=${accessToken}`,
            contentType: "application/json; charset=utf-8", // this
            dataType: "json", // and this
            success: function(response){

                console.log('pendapatan', response);
            },
            error: function(xhr){
            },
        });
    }
    function repKuantitasPengiriman() {
        $.ajax({
            url : `https://www.googleapis.com/analytics/v3/data/ga?ids=VIEW_ID&start-date=${startOfMonth}&end-date=${endOfMonth}&metrics=ga:itemQuantity&dimensions=ga:city&access_token=${accessToken}`,
            contentType: "application/json; charset=utf-8", // this
            dataType: "json", // and this
            success: function(response){

                console.log('kuantitasPengiriman', response);
                
            },
            error: function(xhr){
            },
        });
    }
    function repProductPurchase() {
        $.ajax({
            url : `https://www.googleapis.com/analytics/v3/data/ga?ids=VIEW_ID&start-date=${startOfMonth}&end-date=${endOfMonth}&metrics=ga:productAddsToCart&dimensions=ga:productName,ga:yearMonth&sort=ga:yearMonth&access_token=${accessToken}`,
            contentType: "application/json; charset=utf-8", // this
            dataType: "json", // and this
            success: function(response){

                console.log('ProductPurchase', response);
                
            },
            error: function(xhr){
            },
        });
    }
    function repProductSKU() {
        $.ajax({
            url : `https://www.googleapis.com/analytics/v3/data/ga?ids=VIEW_ID&start-date=${startOfMonth}&end-date=${endOfMonth}&metrics=ga:productAddsToCart&dimensions=ga:productSku,ga:productName&sort=ga:productName&access_token=${accessToken}`,
            contentType: "application/json; charset=utf-8", // this
            dataType: "json", // and this
            success: function(response){

                console.log('ProductSKU', response);
                
            },
            error: function(xhr){
            },
        });
    }
    function lastTouchVisitor() {
        let numOfVisitor =[];
        let textVisitor =[];
        
        $.ajax({
            url : `https://www.googleapis.com/analytics/v3/data/ga?ids=VIEW_ID&start-date=${(dateRangeStart!=null)?dateRangeStart:startOfMonth}&end-date=${(dateRangeEnd!=null)?dateRangeEnd:endOfMonth}&metrics=ga:users&dimensions=ga:country,ga:city,ga:date&sort=ga:date&max-results=10000&access_token=${accessToken}`,
            contentType: "application/json; charset=utf-8", // this
            dataType: "json", // and this
            success: function(response){
                response.rows.forEach(visitor => {
                    numOfVisitor.push(parseInt(visitor[3]));
                    temp = `${visitor[0]}, ${visitor[1]}, ${moment(`${visitor[2]}`, 'YYYYMMDD').format('ddd, D/MM/YYYY')}`;
                    textVisitor.push(temp);
                });
                // highchart
                Highcharts.chart('chartVisitor',{
                    chart: {
                        zoomType: 'x'
                    },
                    title: {
                        text : 'Last touch visitor'
                    },
                    subtitle: {
                        text : document.ontouchstart == undefined ? 'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
                    },
                    xAxis : {
                        visible : false,
                        title : {
                            text : 'Country / City'
                        },
                        categories : textVisitor
                    },
                    yAxis : {
                        title: { 
                            text: 'Number Of Visitor'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        area: {
                            fillColor: {
                                linearGradient: {
                                    x1: 0,
                                    y1: 0,
                                    x2: 0,
                                    y2: 1
                                },
                                stops: [
                                    [0, '#f0134d'],
                                    [1, Highcharts.Color('#f0134d').setOpacity(0).get('rgba')]
                                ]
                            },
                            marker: {
                                radius: 2
                            },
                            lineWidth: 0,
                            states: {
                                hover: {
                                    lineWidth: 1
                                }
                            },
                            threshold: null
                        }
                    },
                    series: [{
                        type: 'area',
                        name: 'Visitor',
                        data: numOfVisitor
                    }]
                });
            },
            error: function(xhr){
            },
        });
    }
    function productAfinity() {
        $.ajax({
            url : `https://www.googleapis.com/analytics/v3/data/ga?ids=VIEW_ID&start-date=${(dateRangeStart!=null)?dateRangeStart:startOfMonth}&end-date=${(dateRangeEnd!=null)?dateRangeEnd:endOfMonth}&metrics=ga:productDetailViews&dimensions=ga:productName&sort=-ga:productDetailViews&max-results=5&access_token=${accessToken}`,
            contentType: "application/json; charset=utf-8", // this
            dataType: "json", // and this
            success: function(response){

                console.log('productAfinity', response);
                $(document).ready(function() {
                    $('#productAfinity').DataTable( {
                        "data": response.rows
                    } );
                });
            },
            error: function(xhr){
            },
        });
    }
</script>
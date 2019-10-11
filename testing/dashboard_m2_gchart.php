<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-signin-client_id" content="client_id">
    <title>Dashboard</title>

    <link rel="stylesheet" type="text/css" href="css/uikit.css">
    <script>
    (function(w,d,s,g,js,fs){
    g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
    js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
    js.src='https://apis.google.com/js/platform.js';
    fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
    }(window,document,'script'));
    </script>
</head>
<body>
    <!-- container body -->
    <div class="uk-container"> 
        <!-- grid dasar HEADER-->
        <?php include_once('header.php')?>

        <!-- BODY -->
        <div id="view-selector-container" style="display:none"></div>
        <div id="view-name"></div>
        <div id="active-users-container"></div>
        <div id="date-range-selector-1-container"></div>

        <div class="uk-grid-small uk-child-width-1-2@s uk-flex-center uk-text-center" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <p class="icon-flex uk-margin-remove-bottom uk-text-small">
                        <span class="mdi mdi-dump-truck mdi-24px uk-text-warning uk-margin-small-right uk-text-small"></span><span>Pendapatan</span>
                    </p>
                    <div class="uk-flex-middle uk-flex-center">
                        <div id="chartPendapatan"></div>
                    </div>
                </div>
            </div>

            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <p class="icon-flex uk-margin-remove-bottom uk-text-small">
                        <span class="mdi mdi-dump-truck mdi-24px uk-text-warning uk-margin-small-right uk-text-small"></span><span>Pengiriman</span>
                    </p>
                    <div class="uk-flex-middle uk-flex-center">
                        <div id="chartPengiriman"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Include the ViewSelector2 component script. -->
<script src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/view-selector2.js"></script>

<!-- Include the DateRangeSelector component script. -->
<script src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/date-range-selector.js"></script>

<!-- Include the ActiveUsers component script. -->
<script src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/active-users.js"></script>

<!-- Include the CSS that styles the charts. -->
<link rel="stylesheet" href="https://ga-dev-tools.appspot.com/public/css/chartjs-visualizations.css">

<!-- <script src="js/jquerysession.js"></script> -->
<script src="js/uikit.js"></script>
<script src="js/uikit-icons.js"></script>

<script>
    gapi.analytics.ready(function() {
        // authorization
            gapi.analytics.auth.authorize({
                container: 'embed-api-auth-container',
                clientid: 'client_id'
            });

            gapi.analytics.auth.on('success', function(data) {
                // console.log(data);
            });

        // active users -------
            var activeUsers = new gapi.analytics.ext.ActiveUsers({
                container: 'active-users-container',
                pollingInterval: 5
            });
            activeUsers.once('success', function() {
                var element = this.container.firstChild;
                var timeout;
            
                this.on('change', function(data) {
                var element = this.container.firstChild;
                var animationClass = data.delta > 0 ? 'is-increasing' : 'is-decreasing';
                element.className += (' ' + animationClass);
                
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                    element.className =
                        element.className.replace(/ is-(increasing|decreasing)/g, '');
                }, 3000);
                });
            }); 

        // initiate
        var dateRange = {
            'start-date': '30daysAgo',
            'end-date': 'yesterday'
        };

        var viewSelector = new gapi.analytics.ext.ViewSelector2({
            container: 'view-selector-container',
        }).execute();

        var dateRangeSelector = new gapi.analytics.ext.DateRangeSelector({
            container: 'date-range-selector-1-container'
        }).set(dateRange).execute();

        // pendapatan GA
        var configPendapatan = {
            query: {
                metrics: 'ga:itemRevenue',
                dimensions: 'ga:date'
            },
            chart: {
                type: 'LINE',
                options: {
                    width: '100%'
                }
            }
        };

        var chartPendapatan = new gapi.analytics.googleCharts.DataChart(configPendapatan)
        .set({query: dateRange})
        .set({chart: {container: 'chartPendapatan'}});

        // Pengiriman GA
        var configPengiriman = {
            query: {
                metrics: 'ga:itemQuantity',
                dimensions: 'ga:city'
            },
            chart: {
                type: 'LINE',
                options: {
                    width: '100%'
                }
            }
        };

        var chartPengiriman = new gapi.analytics.googleCharts.DataChart(configPengiriman)
        .set({query: dateRange})
        .set({chart: {container: 'chartPengiriman'}});


        // Selector view
        viewSelector.on('viewChange', function(data) {
            activeUsers.set(data).execute();
            chartPendapatan.set({query: {ids: data.ids}}).execute();
            chartPengiriman.set({query: {ids: data.ids}}).execute();

            var title = document.getElementById('view-name');
            title.textContent = data.property.name + ' (' + data.view.name + ')';
        });
        // date range selector
        dateRangeSelector.on('change', function(data) {
            chartPendapatan.set({query: data}).execute();
            chartPengiriman.set({query: data}).execute();
            // Update the "to" dates text.
            var datefield = document.getElementById('to-dates');
            datefield.textContent = data['start-date'] + '&mdash;' + data['end-date'];
        });
    });
</script>
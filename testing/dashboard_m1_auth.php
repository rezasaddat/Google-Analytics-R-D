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

        <div class="uk-grid-small uk-child-width-1-2@s uk-flex-center uk-text-center" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <p class="icon-flex uk-margin-remove-bottom uk-text-small">
                        <span class="mdi mdi-dump-truck mdi-24px uk-text-warning uk-margin-small-right uk-text-small"></span><span>Pendapatan</span>
                    </p>
                    <div class="uk-flex-middle uk-flex-center">
                        <canvas id="chart1" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-secondary uk-card-body">Item 2</div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">Item 3</div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">Item 4</div>
            </div>
            <div>
                <div class="uk-card uk-card-primary uk-card-body">Item 5</div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">Item 6</div>
            </div>
        </div>

    </div>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

<!-- Include the ViewSelector2 component script. -->
<script src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/view-selector2.js"></script>

<!-- Include the DateRangeSelector component script. -->
<script src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/date-range-selector.js"></script>

<!-- Include the ActiveUsers component script. -->
<script src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/active-users.js"></script>

<!-- Include the CSS that styles the charts. -->
<!-- <link rel="stylesheet" href="https://ga-dev-tools.appspot.com/public/css/chartjs-visualizations.css"> -->

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

        // initialize view selector
            var viewSelector = new gapi.analytics.ext.ViewSelector2({
                container: 'view-selector-container',
            }).execute();

        viewSelector.on('viewChange', function(data) {
            // console.log(data);
            var title = document.getElementById('view-name');
            title.textContent = data.property.name + ' (' + data.view.name + ')';
        
            // Start tracking active users for this view.
            activeUsers.set(data).execute();
            renderWeekOverWeekChart(data.ids);
        });

        function renderWeekOverWeekChart(ids) {

            // Adjust `now` to experiment with different days, for testing only...
            var now = moment(); // .subtract(3, 'day');
            // let start = moment(now).subtract(1, 'day').day(0).subtract(2, 'month').format('YYYY-MM-DD');
            // let end = moment(now).subtract(1, 'day').day(0).subtract(1, 'month').format('YYYY-MM-DD');
            // console.log(start+' / '+end);

            var thisWeek = query({
                'ids': ids,
                'dimensions': 'ga:date,ga:nthDay',
                'metrics': 'ga:itemRevenue',
                'start-date': moment(now).subtract(1, 'day').day(0).subtract(1, 'month').format('YYYY-MM-DD'),
                'end-date': moment(now).format('YYYY-MM-DD')
            });

            var lastWeek = query({
                'ids': ids,
                'dimensions': 'ga:date,ga:nthDay',
                'metrics': 'ga:itemRevenue',
                'start-date': moment(now).subtract(1, 'day').day(0).subtract(2, 'month').format('YYYY-MM-DD'),
                'end-date': moment(now).subtract(1, 'day').day(0).subtract(1, 'month').format('YYYY-MM-DD')
            });

            Promise.all([thisWeek, lastWeek]).then(function(results) {

                console.log(results);

                var data1 = results[0].rows.map(function(row) { return +row[2]; });
                var data2 = results[1].rows.map(function(row) { return +row[2]; });
                var labels1 = results[0].rows.map(function(row) { return +row[0]; });
                var labels2 = results[1].rows.map(function(row) { return +row[0]; });
                
                labels1 = labels1.map(function(label) {
                    return moment(label, 'YYYYMMDD').format('ddd, D/MM/YYYY');
                });

                labels2 = labels2.map(function(label) {
                    return moment(label, 'YYYYMMDD').format('ddd, D/MM/YYYY');
                });

                var ctx = document.getElementById('chart1');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels1,
                        datasets: [{
                            label: '-',
                            data: data2,
                            backgroundColor: '#ff494d',
                            borderColor: '#ff494d',
                            fill: false,
                            borderWidth: 1
                        }, {
                            label: '/',
                            data: data1,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            fill: false,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive : true,
                        // tooltips: {
                        //     mode: 'index',
                        //     intersect: true,
                        // },
                        // hover : {
                        //     mode : 'nearest',
                        //     intersect: true,
                        // },
                        scales: {
                            xAxes: [{
                                display : false,
                            }],
                            yAxes: [{
                                display: true,
                            }]
                        }
                    }
                });
            });
        }


        // converter
        /**
           * Extend the Embed APIs `gapi.analytics.report.Data` component to
           * return a promise the is fulfilled with the value returned by the API.
           * @param {Object} params The request parameters.
           * @return {Promise} A promise.
           */
          function query(params) {
            return new Promise(function(resolve, reject) {
              var data = new gapi.analytics.report.Data({query: params});
              data.once('success', function(response) { resolve(response); })
                  .once('error', function(response) { reject(response); })
                  .execute();
            });
          }
        
        
          /**
           * Create a new canvas inside the specified element. Set it to be the width
           * and height of its container.
           * @param {string} id The id attribute of the element to host the canvas.
           * @return {RenderingContext} The 2D canvas context.
           */
          function makeCanvas(id) {
            var container = document.getElementById(id);
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
        
            container.innerHTML = '';
            canvas.width = container.offsetWidth;
            canvas.height = container.offsetHeight;
            container.appendChild(canvas);
        
            return ctx;
          }
        
        
          /**
           * Create a visual legend inside the specified element based off of a
           * Chart.js dataset.
           * @param {string} id The id attribute of the element to host the legend.
           * @param {Array.<Object>} items A list of labels and colors for the legend.
           */
          function generateLegend(id, items) {
            var legend = document.getElementById(id);
            legend.innerHTML = items.map(function(item) {
              var color = item.color || item.fillColor;
              var label = item.label;
              return '<li><i style="background:' + color + '"></i>' +
                  escapeHtml(label) + '</li>';
            }).join('');
          }
        
        
          // Set some global Chart.js defaults.
          Chart.defaults.global.animationSteps = 60;
          Chart.defaults.global.animationEasing = 'easeInOutQuart';
          Chart.defaults.global.responsive = true;
          Chart.defaults.global.maintainAspectRatio = false;
        
        
          /**
           * Escapes a potentially unsafe HTML string.
           * @param {string} str An string that may contain HTML entities.
           * @return {string} The HTML-escaped string.
           */
          function escapeHtml(str) {
            var div = document.createElement('div');
            div.appendChild(document.createTextNode(str));
            return div.innerHTML;
          }
    });
</script>
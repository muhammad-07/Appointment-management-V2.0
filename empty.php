<?php define('PATH',''); require_once('template/header.php'); ?>
</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            
	<?php require_once('template/sideNav.php'); ?>	
	<?php require_once('template/menu.php'); ?>	
            

            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <!--<div class="page-title">
                        <div class="title_left">
                            <h3>User Profile</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="clearfix"></div>-->

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Register Application <small>(DEMO MODE)</small></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
									
				    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php require_once('template/footer.php'); ?>	
<?php require_once('template/js.php'); ?>	
    <script>
        $(function () {
            $('.chart').easyPieChart({
                easing: 'easeOutElastic',
                delay: 3000,
                barColor: '#26B99A',
                trackColor: '#fff',
                scaleColor: false,
                lineWidth: 20,
                trackWidth: 16,
                lineCap: 'butt',
                onStep: function (from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
            var chart = window.chart = $('.chart').data('easyPieChart');
            $('.js_update').on('click', function () {
                chart.update(Math.random() * 200 - 100);
            });
        });
    
      var sharePiePolorDoughnutData = [
            {
                value: 125,
                color: "rgba(38, 185, 154, 0.7)",
                highlight: "rgba(38, 185, 154, 0.7)",
                label: ""
        },
            {
                value: 25,
                color: "rgba(38, 185, 154, 0.01)",
                highlight: "rgba(38, 185, 154, 0.01)",
                label: ""
        }
    ];
    $(document).ready(function () {
            window.myDoughnut = new Chart(document.getElementById("canvas_doughnut").getContext("2d")).Doughnut(sharePiePolorDoughnutData, {
                responsive: true,
                scaleShowLabels: false,
                segmentStrokeWidth: 2,
                tooltipFillColor: "rgba(51, 51, 51, 0.55)"
            });
        });
   </script>
</body>

</html>
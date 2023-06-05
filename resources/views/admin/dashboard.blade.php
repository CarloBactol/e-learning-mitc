@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <!--Div that will hold the pie chart-->
            <div id="chart_div"></div>

        </div>
        <div class="col-md-6">
            <div id="calendar"></div>

        </div>
    </div>


</div>
@endsection
@section('script')
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Load the Visualization API and the corechart package.
       google.charts.load('current', {'packages':['corechart']});

       // Set a callback to run when the Google Visualization API is loaded.
       google.charts.setOnLoadCallback(drawChart);

       // Callback that creates and populates a data table,
       // instantiates the pie chart, passes in the data and
       // draws it.
       function drawChart() {

         // Create the data table.
         var data = new google.visualization.DataTable();
         data.addColumn('string', 'Topping');
         data.addColumn('number', 'Slices');
         data.addRows([
           ['Teacher', {{ $teacher }}],
           ['Student', {{ $student }}],
           ['Category', {{ $category }}],
           ['Question', {{ $question }}],
           ['Option', {{ $option }}]
         ]);

         // Set chart options
         var options = {'title':'Chart Breakdown',
                        'width':400,
                        'height':300};

         // Instantiate and draw our chart, passing in some options.
         var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
         chart.draw(data, options);
       }
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>


@endsection
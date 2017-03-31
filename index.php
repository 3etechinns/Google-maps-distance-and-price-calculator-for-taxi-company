<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDMXK4ypiNmIWaEuNrKILFcTY3Wjvh973Y"></script>
    </head>
    <body>
        <div class="col-sm-12 wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
            <form id="calculate" role="form" class="form" data-toggle="validator" novalidate="true">
                <div class="form-group">
                    <label class="col-sm-4 control-label">From</label>
                    <div class="col-sm-8">
                        <input required id="departure_address" type="text" name="departure_address" class="form-control" placeholder="Enter a location" autocomplete="off">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">To</label>
                    <div class="col-sm-8">
                        <input required id="arrival_address" type="text" name="arrival_address" class="form-control" placeholder="Enter a location" autocomplete="off">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">    
                    <label class="col-sm-4 control-label">By car or by minibus?</label>    
                    <div class="col-sm-8">        
                        <input required class="vehicleType" checked type="radio" name="vehicleType" value="car"> <i class="fa fa-car"></i> (max. 4 person)<br>        
                        <input required class="vehicleType" type="radio" name="vehicleType" value="minibus"> <i class="fa fa-bus"></i> (max. 8 person)<br>        
                        <div class="help-block with-errors"></div>    
                    </div>  
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button style="width: 100%; pointer-events: all; cursor: pointer;" type="submit" class="btn btn-default btn-info">Calculate!</button>
                    </div>
                </div>
            </form>
        </div>  <div class="clearfix"></div> 	
        <div class="col-sm-12">	  
            <div id="countrysideCalculatorResponse1" class="hidden"></div>	  
            <div id="countrysideCalculatorResponse2" class="hidden"></div>	  	  
            <div id="countrysideCalculatorResponse3" class="hidden"></div>	  	  
            <div id="countrysideCalculatorResponse4" class="hidden"></div>	  	  
            <div id="countrysideCalculatorResponse5" class="hidden"></div>	  	
        </div>  

        <script type="text/javascript">
            //google autocomplate for two input
            function initialize() {
                var input1 = document.getElementById('departure_address');
                var autocomplete = new google.maps.places.Autocomplete(input1);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
            function initialize2() {
                var input2 = document.getElementById('arrival_address');
                var autocomplete = new google.maps.places.Autocomplete(input2);
            }
            google.maps.event.addDomListener(window, 'load', initialize2);
        </script>

        <script type="text/javascript" src="static/js/form-validator.min.js"></script>
        <script type="text/javascript" src="calculator-script.js"></script>
    </body>
</html>
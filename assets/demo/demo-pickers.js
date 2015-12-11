$(document).ready(function() {
		// Date Range Picker
    
    
    var siteURL = $('#siteURL').text();
        
       window.oTable = $('#example').DataTable({
            "pageLength": 50
        });
    
        triageTable();
        
        function triageTable(){
            $('#daterangepicker2').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                'Last 7 Days': [moment().subtract('days', 6), moment()],
                'Last 30 Days': [moment().subtract('days', 29), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            opens: 'left',
            startDate: moment(),
            endDate: moment()
            },
            function(start, end) {

                $(document).skylo('show',function(){
                    $(document).skylo('set',50);
                });

                $('#daterangepicker2 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

                    $.ajax({
                        url : siteURL+"api/getTickets/"+start.format('YYYY-MM-DD')+"/"+end.format('YYYY-MM-DD'),
                        dataType: 'json',
                        async: false,
                        success: function(s){

                            oTable.clear().rows.add(s).draw();


                        }
                    });

                    $(document).skylo('show',function(){
                        $(document).skylo('end');
                    });
                });
        }
    
        window.techTable = $('#techs').DataTable({
             "order": [[ 1, "desc" ]],
             "paging":   false,
        "info":     false,
        "filter": false
        });
    
        $('#techPicker').daterangepicker({
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
			'Last 7 Days': [moment().subtract('days', 6), moment()],
			'Last 30 Days': [moment().subtract('days', 29), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
		},
		opens: 'left',
		startDate: moment(),
		endDate: moment()
		},
		function(start, end) {
            
            $(document).skylo('show',function(){
                $(document).skylo('set',50);
            });
            
			$('#techPicker span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                
                var urld = siteURL+"api/getTechStats/"+start.format('YYYY-MM-DD')+"/"+end.format('YYYY-MM-DD');
                
                $.ajax({
                    url : siteURL+"api/getTechStats/"+start.format('YYYY-MM-DD')+"/"+end.format('YYYY-MM-DD'),
                    dataType: 'json',
                    success: function(s){
                        
                        techTable.clear().rows.add(s).draw();
                        
                       
                    }
                });
            
                $(document).skylo('show',function(){
                    $(document).skylo('end');
                });
            
            });
    
    
        var trainingTable = $('#training').DataTable();
    
        $('#trainingPicker').daterangepicker({
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
			'Last 7 Days': [moment().subtract('days', 6), moment()],
			'Last 30 Days': [moment().subtract('days', 29), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
		},
		opens: 'left',
		startDate: moment(),
		endDate: moment()
		},
		function(start, end) {
            
            
            
            $(document).skylo('show',function(){
                $(document).skylo('set',50);
            });
            
			$('#trainingPicker span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                
                            
                $.ajax({
                    url : siteURL+"api/getTrainings/"+start.format('YYYY-MM-DD')+"/"+end.format('YYYY-MM-DD'),
                    dataType: 'json',
                    success: function(s){
                        trainingTable.clear().rows.add(s).draw();
                        
                       
                    }
                });
            
                $(document).skylo('show',function(){
                    $(document).skylo('end');
                });
            
            });
    
        $('#forecastPicker').daterangepicker({
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
			'Last 7 Days': [moment().subtract('days', 6), moment()],
			'Last 30 Days': [moment().subtract('days', 29), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
		},
		opens: 'left',
		startDate: moment(),
		endDate: moment()
		},
		function(start, end) {
            
            $(document).skylo('show',function(){
                $(document).skylo('set',50);
            });
            
            $.ajax({
                
                url: siteURL+"triage/getForecast/"+start.format('YYYY-MM-DD')+"/"+end.format('YYYY-MM-DD'),
                dataType: "json",
                success: function(s){
                    
                    var barChartData = {
                    labels : ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                    datasets : [
                        {
                            fillColor : "rgba(0, 203, 240, 0.5)",
                            strokeColor : "rgb(58, 146, 193)",
                            data : [s.Monday, s.Tuesday,s.Wednesday,s.Thursday,s.Friday,s.Saturday,s.Sunday]
                        }
                    ]

                }

                var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
                    
                }
                
                
            });

            $(document).skylo('show',function(){
                $(document).skylo('end');
            });
            
            });
    
    //Eternicode Datepicker
		$("#datepicker").datepicker({todayHighlight: true});
		$('#datepicker-pastdisabled').datepicker({
			todayHighlight: true,
	    	startDate: "-3d",
	    	endDate: "+3d"
		});
        
         
});

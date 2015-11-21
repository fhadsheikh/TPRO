$(document).ready(function(){

	//Bootstrap Switch
	$('input.bootstrap-switch').bootstrapSwitch();
    
    openTable = $('#openTable').DataTable({
        "paging":   false
    });
    
    $.ajax({
        url: "http://clockwork-fhad:8081/TPRO/triage/getOpen",
        dataType: 'json',
        success: function(s){
            
            openTable.clear().rows.add(s).draw();
            
        }
    });
    

    
    
    });
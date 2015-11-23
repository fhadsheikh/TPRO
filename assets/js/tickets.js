$(document).ready(function(){
    
    firstload();
    
    function firstload(){
        
        var ticketTable = $('#tickets').DataTable({
        "paging": false,
        "order": [[ 0, "desc" ]]
        });
        

    
    $.ajax({
        url: "http://clockwork-fhad:8081/TPRO/tickets/getThreeResponses",
        dataType: 'json',
        success: function(s){
            
            $(document).skylo('show',function(){
                    $(document).skylo('set',50);
            });
            
            ticketTable.clear().rows.add(s).draw();
            
            $(document).skylo('show',function(){
                $(document).skylo('end');
            });
        }
    });
        
    }
    
    
   $('[data-toggle="tooltip"]').tooltip()
    
    $('#summernote').summernote({
        height: 200,
        airMode: true,
          airPopover: [
            ['font' , ['bold']],
            ['insert', ['link', 'picture']]
//        toolbar: [
//            ['font' , ['bold']],
//            ['insert', ['link', 'picture']]
        ]
    });
    
    
    $('#pendingTask').hide();
    
    $('#createTask').click(function(){
        $('#pendingTask').slideToggle();
    });
    
    $('#allTickets').click(function(){
        
        $.ajax({
            url: "http://clockwork-fhad:8081/TPRO/tickets/getAllTickets",
            dataType: 'json',
            success: function(s){
                
                $(document).skylo('show',function(){
                        $(document).skylo('set',50);
                });
                
                ticketTable.clear().rows.add(s).draw();
                
                $('#allTicketsBadge').text(s.length);
                
                $(document).skylo('show',function(){
                    $(document).skylo('end');
                });
            }
        });
        
    });
    
    $('#bugfix').click(function(){
        
        $.ajax({
            url: "http://clockwork-fhad:8081/TPRO/tickets/getCategory/3",
            dataType: 'json',
            success: function(s){
                
                $(document).skylo('show',function(){
                        $(document).skylo('set',50);
                });
                
                ticketTable.clear().rows.add(s).draw();
                
                $('#bugFixBadge').text(s.length);
                
                $(document).skylo('show',function(){
                    $(document).skylo('end');
                });
            }
        });
        
    });
    
    $('#inquiry').click(function(){
        
        $.ajax({
            url: "http://clockwork-fhad:8081/TPRO/tickets/getCategory/14",
            dataType: 'json',
            success: function(s){
                
                $(document).skylo('show',function(){
                        $(document).skylo('set',50);
                });
                
                ticketTable.clear().rows.add(s).draw();
                
                $('#inquiryBadge').text(s.length);
                
                $(document).skylo('show',function(){
                    $(document).skylo('end');
                });
            }
            
        });
        
    });
    
    
    $('#replyButton').click(function(){
        
        var techsOnly = $('#techsOnlySwitch').bootstrapSwitch('state');
        
        if(techsOnly == true){
            var ticketID = $('#ticketID').text();

            var body = $('#summernote').code()
                .replace("<span style=\"font-weight: bold;\">", "[b]")
                .replace("</span>", "[/b]")
                .replace("<br>", "/n")
                .replace("<a href=\"", "[url=")
                .replace("<a target=\"_blank\" href=\"", "[url=")
                .replace("\">", "]")
                .replace("</a>", "[/url]")
                .replace("<img src=\"", "[img]")
                .replace("\" alt=\"\">")
            
            console.log(body);


            var data = {ticketID: ticketID,
                        body: body,
                       };

            $.ajax({
                type: "POST",
                url: "http://clockwork-fhad:8081/TPRO/tickets/reply",
                data: data,
                success: function(s){
                    $('#ticketID').text('Sent');
                },
                dataType: "JSON"
            });

            $('#summernote').destroy();
            $('#replyButton').text('Sent');
        }
    });
    
    $('#hideBox').hide();
    
    $('#currentlyOpen').click(function(){
        $('#hideBox').slideToggle("slow");
    });
    
    
    
    $('#hideBox').hide();
    
    $('#currentlyOpen').click(function(){
        $('#hideBox').slideToggle("slow");
    });
    
    $('#ticketAlert').hide();
    
    var channel = pusher.subscribe('TPROAPP');
    channel.bind('newTicket', function(data) {
        
        PNotify.desktop.permission(); (new PNotify({
						title: 'New ticket ' + data.ticketID,
						text: data.body,
                        hide: false,
						desktop: {
							desktop: true
						},
						styling: 'fontawesome'
					})).get().click(function(e){
						if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *').is(e.target))
							return;
					});
     });
    
    var channel = pusher.subscribe('TPROAPP');
    channel.bind('newComment', function(data){
        
        
        
        
        PNotify.desktop.permission(); (new PNotify({
						title: data.Name,
						text: data.body,
						desktop: {
							desktop: true
						},
						styling: 'fontawesome'
					})).get().click(function(e){
						if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *').is(e.target))
							return;
					});
        
    });
    
    $('#clientResponses').click(function(){
        $('#table').html(" <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-fixed-header m0' id='reports_threeResponses'> <thead> <tr> <th>ID</th> <th width='20%'>Subject</th> <th>Tech</th> <th>Priority</th> <th>Submitted By</th> <th>Client Responses</th> <th>Status</th> <th>Lifespan</th> </tr> </thead><tfoot> <tr> <th>ID</th> <th>Subject</th> <th>Tech</th> <th>Priority</th> <th>Submitted By</th> <th>Client Responses</th> <th>Status</th> <th>Lifespan</th> </tr> </tfoot> </table>");
        
        var threeResponses = $('#reports_threeResponses').DataTable({
            "paging": false,
            "order": [[0, "desc"]]
        });
        
        $.ajax({
            url: "http://clockwork-fhad:8081/TPRO/reports/getThreeResponses",
            dataType: 'json',
            success: function(s){

                $(document).skylo('show',function(){
                        $(document).skylo('set',50);
                });

                threeResponses.clear().rows.add(s).draw();
                console.log(s);

                $(document).skylo('show',function(){
                    $(document).skylo('end');
                });
            }
    });
       
    });
    
    $.ajax({
            url: "http://clockwork-fhad:8081/TPRO/user/getnotifications/9",
            dataType: 'json',
            success: function(s){
                console.log('started');
                
                for (var key in s){
                    
                    $("<li class=''><a href='#' class='notification-info'><div class='notification-icon'><img width='40' src='"+s[key].Gravatar+"'></div><div class='notification-content'><strong>"+s[key].Name+"</strong><br>"+s[key].Message+"</div><div class='notification-time'>2m</div></a></li>").prependTo('#notificationsBox');
                    console.log(s[key].Body)
                }
                                
                
            }
            
        });
    
    
    
});


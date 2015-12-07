$(document).ready(function(){
    
    
    var userID = $('#userID').text();
    var siteURL = $('#siteURL').text();
    
    firstload();
    
    function firstload(){
        var ticketTable = $('#tickets').DataTable({
        "paging": false,
        "order": [[ 0, "desc" ]]
        });
    }
    
    //Bootstrap Switch
	$('input.bootstrap-switch').bootstrapSwitch();
    console.log('test');
    
    if($('#openTable').length){
        console.log('getOpen');
        openTable = $('#openTable').DataTable({
            "paging":   false
        });

        $.ajax({
            url: siteURL+"/triage/getOpen",
            dataType: 'json',
            async: false,
            success: function(s){

                openTable.clear().rows.add(s).draw();

            }
        });
        
    };
    
    $('.modal').on('shown.bs.modal', function() {
      $(this).find('[autofocus]').focus();
    });
    
    Mousetrap.bind('*', function() { 
        $('#ticketSearch').modal('toggle'); 
    });
    
    $("input[data-numbers='true']").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
    
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
            url: siteURL+"/tickets/getAllTickets",
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
            url: siteURL+"/tickets/getCategory/3",
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
            url: siteURL+"/tickets/getCategory/14",
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
            


            var data = {ticketID: ticketID,
                        body: body,
                       };

            $.ajax({
                type: "POST",
                url: siteURL+"/tickets/reply",
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
    
    $('#commentDetails').hide();
    
    
    
    
    $('#hideBox').hide();
    
    $('#currentlyOpen').click(function(){
        $('#hideBox').slideToggle("slow");
    });
    
    $('#ticketAlert').hide();
    
    var channel = pusher.subscribe('ticketMonitor');
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
    
    var channel = pusher.subscribe('ticketMonitor');
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
    
    $.ajax({
            url: siteURL+"/user/getnotifications/"+userID,
            dataType: 'json',
            async: false,
            success: function(s){
                
                for (var key in s){
                    
                    $("<li class=''><a href='"+siteURL+"tickets/ticket/"+s[key].IssueID+"' class='notification-info'><div class='notification-icon'><img width='40' src='"+s[key].Gravatar+"'></div><div class='notification-content'><strong>"+s[key].Name+"</strong><br>"+s[key].Message+"</div><div class='notification-time'>2m</div></a></li>").prependTo('#notificationsBox');
                    }
                                
                $('#notificationsBadge').text(s.length);
            }
            
        });
    
        $(".commentDate").each(function(e,s){
            var commentDate =$(this).text();
            var newDate = moment(commentDate, 'h:mm A - MMM DD, YYYY').fromNow();

            $(this).text(newDate);
        });
    
        $('.testcase').on('click',function(evt){
              var id = this.id;
            
                console.log(siteURL+"qa/getCase/"+id)
              
                $.ajax({
                    url: siteURL+"qa/getCase/"+id,
                    dataType: 'json',
                    async: false,
                    success: function(s){
                        
                        $(document).skylo('show',function(){
                            $(document).skylo('set',50);
                        });
                        
                        $('#title').text(s.name);
                        
                        $(document).skylo('show',function(){
                            $(document).skylo('end');
                        });
                    }
                });
            })
        
            $('#untested').click(function(){
                $('.untested').each(function(){
                    $(this).toggle();
                });
            });
    
            $('#fail').click(function(){
                $('.fail').each(function(){
                    $(this).toggle();
                });
            });
    
    $(".js-example-basic-multiple").select2({
        placeholder: "Filter cases"
    });
    
    $.ajax({
                    url: siteURL+"qa/getCase/1",
                    dataType: 'json',
                    async: false,
                    success: function(s){
                        
                        $(document).skylo('show',function(){
                            $(document).skylo('set',50);
                        });
                        
                        $('#title').text(s.name);
                        
                        $(document).skylo('show',function(){
                            $(document).skylo('end');
                        });
                    }
                });
    
    $('.js-example-basic-multiple').change(function(){
        
        
        
        var theID = $('.js-example-basic-multiple').select2().val();
        console.log(theID);
        
        
        
        
        if(theID == null){
        $('.test').show();
        }else{
            $('.test').hide();
            var arrayLength = theID.length;
            for (var i = 0; i < arrayLength; i++) {
                $('.'+theID[i]).show();
            }
        }
        
        
    });
    
//        var commentDate = $("#commentDate").text();
//        var newDate = moment(commentDate, 'h:mm A - MMM DD, YYYY').fromNow();
//        
//        console.log(newDate);
   
    
});


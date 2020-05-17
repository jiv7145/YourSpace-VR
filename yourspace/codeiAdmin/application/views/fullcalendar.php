<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                defaultView: 'agendaWeek',
                minTime: "09:00:00",
                maxTime: "21:00:00",
				snapDuration:"01:00" ,
               eventOverlap:false,
               selectOverlap:false,
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: null,
                },
                events: "<?php echo base_url(); ?>fullcalendar/load",
                selectable: true,
                selectHelper: true,
                businessHours: {
                    dow: [1, 2, 3, 4, 5],
                    start: '9:00',
                    end: '21:00',
                },
                selectConstraint: "businessHours",
                // select: function(start, end, allDay) {
                //     var title = prompt("Enter Event Title");
                //     if (title && start.isAfter(moment())) {
                //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                //         var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                  
                //         $.ajax({
                //             url: "<?php echo base_url(); ?>fullcalendar/insert",
                //             type: "POST",
                //             data: {
                //                 title: title,
                //                 start: start,
                //                 end: end,
                //             },
                //             success: function() {
                //                 calendar.fullCalendar('refetchEvents');
                //                 alert("Added Successfully");
                //             }
                //         })
                //     } else {
                //         alert("Please check our business hours\n" + "9:00am-9:00pm(Mon-Fri)")
                //     }
                // },
                editable: false

                // eventResize: function(event) {
                //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

                //     var title = event.title;

                //     var id = event.id;

                    // $.ajax({
                    //     url: "<?php echo base_url(); ?>fullcalendar/update",
                    //     type: "POST",
                    //     data: {
                    //         title: title,
                    //         start: start,
                    //         end: end,
                    //         id: id
                    //     },
                    //     success: function() {
                    //         calendar.fullCalendar('refetchEvents');
                    //         alert("Event Update");
                    //     }
                    // })
                // },
                // eventDrop: function(event) {
                //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                //     //alert(start);
                //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                //     //alert(end);
                //     var title = event.title;
                //     var id = event.id;
                //     $.ajax({
                //         url: "<?php echo base_url(); ?>fullcalendar/update",
                //         type: "POST",
                //         data: {
                //             title: title,
                //             start: start,
                //             end: end,
                //             id: id
                //         },
                //         success: function() {
                //             calendar.fullCalendar('refetchEvents');
                //             alert("Event Updated");
                //         }
                //     })
                // },
                // eventClick: function(event) {
                //     if (confirm("Are you sure you want to remove it?")) {
                //         var id = event.id;
                //         $.ajax({
                //             url: "<?php echo base_url(); ?>fullcalendar/delete",
                //             type: "POST",
                //             data: {
                //                 id: id
                //             },
                //             success: function() {
                //                 calendar.fullCalendar('refetchEvents');
                //                 alert('Event Removed');
                //             }
                //         })
                //     }
                // }
            });
        });
    </script>
</head>

<body>
    <br />
  
    <div class="container">
        <div id="calendar"></div>
    </div>
</body>

</html>
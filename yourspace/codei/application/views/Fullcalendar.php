<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css?after">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script>
        function Hide(HideID) {
            HideID.style.display = "none";
        }
        $(document).ready(function() {
            $first = "<?php echo implode($_SESSION['first_user']); ?>";
                        console.log($first);

            var calendar = $('#calendar').fullCalendar({
                defaultView: 'agendaWeek',
                minTime: "09:00:00",
                maxTime: "21:00:00",
                snapDuration: "01:00",
                eventOverlap: false,
                selectOverlap: false,
                editable: true,
                allDaySlot: false,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: null,
                },
                eventSources: [{
                    url: "<?php echo base_url(); ?>fullcalendar/load"

                }, {
                    url: "<?php echo base_url(); ?>fullcalendar/loadBooked",
                    color: "lightgrey",
                    editable: false
                }],
                contentHeight:"auto",
                selectable: true,
                selectHelper: true,
                businessHours: {
                    dow: [1, 2, 3, 4, 5],
                    start: '9:00',
                    end: '21:00',
                },
                selectConstraint: "businessHours",
                select: function(start, end, allDay) {

                    if (start.isAfter(moment())) {

                        $(".date").val(moment(start).format('Y-MM-DD'));
                        $(".start").val(moment(start).format('HH:mm:ss'));
                        $(".end").val(moment(end).format('HH:mm:ss'));
                        if ($first == 1) {
                            $(".col-md-6").show();
                         

                        }else{

                            $(".col-md-7").show();
                            
                        }

                       
                        // $("#bookingDate").html("Date: "+ moment(start).format('Y-MM-DD') + "<br>" + "Time: " +moment(start).format('HH:mm:ss') + "-" + moment(end).format('HH:mm:ss')+"<br><br><br");
                        window.scrollTo(0, 0);
                        $(".btnSubmit").click(function() {


                            title = "<?php echo implode($_SESSION['username']); ?>";
                            var s = moment(start).format('Y-MM-DD HH:mm:ss');
                            var e = moment(end).format('Y-MM-DD HH:mm:ss');

                            $.ajax({
                                url: "<?php echo base_url(); ?>fullcalendar/insert",
                                type: "POST",
                                data: {
                                    title: title,
                                    start: s,
                                    end: e,
                                },
                                success: function() {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("You have successfully booked an appointment with YourSpace.\r\nAn email will be sent to you confirming the appointment, please check your junk mail folder if you did not get one.");
                                    window.location.href = "../payment/pay.php";
                                }
                            })

                        });
                    } else {
                        alert("Please Check Our Business Hours M-F 9AM- 9PM");
                    }
                },
                editable: false,

                eventResize: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

                    var title = event.title;

                    var id = event.id;

                    $.ajax({
                        url: "<?php echo base_url(); ?>fullcalendar/update",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id
                        },
                        success: function() {
                            calendar.fullCalendar('refetchEvents');

                        }
                    })
                },
                eventDrop: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    //alert(start);
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    //alert(end);
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "<?php echo base_url(); ?>fullcalendar/update",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id
                        },
                        success: function() {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated");
                        }
                    })
                },
                eventClick: function(event) {
                    if (event.source.url == "<?php echo base_url(); ?>fullcalendar/loadBooked") {

                    } else {

                        if (confirm("Are you sure you want to remove it?")) {
                            var id = event.id;
                            $.ajax({
                                url: "<?php echo base_url(); ?>fullcalendar/delete",
                                type: "POST",
                                data: {
                                    id: id
                                },
                                success: function() {
                                    calendar.fullCalendar('refetchEvents');
                                    alert('Event Removed');
                                }
                            })
                        }
                    }
                }
            });
        });
    </script>
</head>

<body>
    <br />
    <div class="container">
        <div id="header">
            <a href="../public/php/home.php">
                <h2 id="logo"> YourSpace </h2>
            </a>
            <div class="topnav">

                <a href="#">About</a>
                <a href="#">Contact</a>
                <a href="#">Pricing</a>
                <a href="../public/php/download.php">Download</a>
                <a href="#">Booking</a>
            </div>
        </div>
    </div>

    <div class="login-box">

        <div id="Bar1" style="display:none" class="col-md-6 login" style="margin:auto">

            <h3 class="subHeading"> Would you like to book an appointment ? <a style="position:absolute; right:0; color:black;" href="#" onclick="Hide(Bar1);">X</a></h3>
                <form action="../public/php/surveyProcessor.php" method="post">
                    <div class="form-group">
                        <label> Date <span class="required"> *</span></label>
                        <input id="date" type="date" name="date" class="form-control date" required>
                    </div>

                    <div class="form-group">
                        <label> Start Time <span class="required"> *</span></label>
                        <input  id="start" type="time" name="start" class="form-control start" required>
                    </div>
                    <div class="form-group">
                        <label> End Time <span class="required"> *</span></label>
                        <input  id="end" type="time" name="end" class="form-control end" required>
                    </div>
                    <button style="width:100%" type="submit" class="btn btn-primary btnSubmit" > PROCEED TO CHECKOUT</button>
                </form>
        </div>


        <div id="Bar2" style="display:none" class="col-md-7 login" style="margin:auto">

            <h3 class="subHeading"> Please complete the form below<a style="position:absolute; right:0; color:black;" href="#" onclick="Hide(Bar2);">X</a></h3>
            <form action="../public/php/surveyProcessor.php" method="post">

                <div class="form-group">
                    <label> Date <span class="required"> *</span></label>
                    <input  id="date" type="date" name="date" class="form-control date" required>
                </div>

                <div class="form-group">
                    <label> Start Time <span class="required"> *</span></label>
                    <input  id="start" type="time" name="start" class="form-control start" required>
                </div>
                <div class="form-group">
                    <label> End Time <span class="required"> *</span></label>
                    <input  id="end" type="time" name="end" class="form-control end" required>
                </div>
                <div class="form-group">
                    <label> Age<span class="required"> *</span></label>
                    <select name="age" class=form-control required>
            <?php
                
                    ?>
                        <option value ="Under 18" >Under 18</option>
                        <option value ="18-25" >18-25</option>
                        <option value ="26-64" >26-64</option>
                        <option value ="65+" >65+</option>
                        
                        <!-- <option value="<?php echo $i;?>"><?php echo $i;?></option> -->
                    <?php
               

            ?>
            </select>
                </div>

                <div class="form-group">
                    <label> Gender</label>
                    <input type="text" name="gender" class="form-control">
                </div>

                <div class="form-group">
                    <label> Relationship Status</label>
                    <input type="text" name="relationship_status" class="form-control">
                </div>

                <div class="form-group">
                    <label> Sexual Orientation</label>
                    <input type="text" name="sexual_orientation" class="form-control">
                </div>

                <div class="form-group">
                    <label> Primary Language</label>
                    <input type="text" name="language" class="form-control">
                </div>
                <div class="form-group">
                    <label> Employment Situation</label>
                    <input type="text" name="employment_situation" class="form-control">
                </div>
                <div class="form-group">
                    <label> Did anyone refer you? </label>
                    <input type="text" name="reference" class="form-control">
                </div>
                <div class="form-group">
                    <label> Your counselling experience</label>
                    <input type="text" name="counselling_exp" class="form-control">
                </div>
                <div class="form-group">
                    <label> Your counselling goal<span class="required"> *</span></label>
                    <input type="text" name="goal" class="form-control" required>
                </div>
                <button style="width:100%" type="submit" class="btn btn-primary btnSubmit" > SUBMIT FORM </button> <br><br>

            </form>


        </div>
    </div>
    <div class="container">
        <div id="calendar"></div>
        <br>
        <br>
    </div>

</body>

</html>
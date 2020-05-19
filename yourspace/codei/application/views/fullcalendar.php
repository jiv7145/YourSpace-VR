<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css?after">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script>
        function Hide(HideID) {
            HideID.style.display = "none";
        }
        $(document).ready(function() {

            var calendar = $('#calendar').fullCalendar({
                defaultView: 'agendaWeek',
                minTime: "09:00:00",
                maxTime: "21:00:00",
                snapDuration: "01:00",
                eventOverlap: false,
                selectOverlap: false,
                editable: false,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: null,
                },
                eventSources: [
      {
        url: "<?php echo base_url(); ?>fullcalendar/load"
       
      },{
        url: "<?php echo base_url(); ?>fullcalendar/loadBooked",
        color: "grey",
        editable: false
      }
    ],
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
                        if(localStorage.getItem("first")!=1){
                        $("#clientaddmodal").modal('show');}
                        else{

                        $("#secondaddmodal").modal('show');}
                        $("#date").val(moment(start).format('Y-MM-DD'));
                        $("#start").val(moment(start).format('HH:mm:ss'));
                        $("#end").val(moment(end).format('HH:mm:ss'));

                        // $("#bookingDate").html("Date: "+ moment(start).format('Y-MM-DD') + "<br>" + "Time: " +moment(start).format('HH:mm:ss') + "-" + moment(end).format('HH:mm:ss')+"<br><br><br");
                        window.scrollTo(0, 0);
                        $("#btnSubmit").click(function() {

                        
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
                                    localStorage.setItem('first', 1);

                                 window.location.reload(true);
                                   alert("You have successfully booked an appointment with YourSpace. An email will be sent to you confirming the appointment, please check your junk mail folder");
                                }
                            })

                        });
                    } else {
                        alert("Please Check Our Business Hours M-F 9AM- 9PM");
                    }
                },
                editable: true,

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
                            alert("Event Update");
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
            });
        });
    </script>
</head>

<body>
    <br />
    <div class="container">
        <div id="header">
            <a href="home.php">
                <h2 id="logo"> YourSpace </h2>
            </a>
            <div class="topnav">

                <a href="#">About</a>
                <a href="#">Contact</a>
                <a href="#">Pricing</a>
                <a href="download.php">Download</a>
            </div>
        </div>
    </div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="clientaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please complete the form below</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="../public/php/surveyProcessor.php" method="post">

<div class="form-group">
    <label> Date <span class="required"> *</span></label>
    <input id="date" type="date" name="date" class="form-control" required>
</div>

<div class="form-group">
    <label> Start Time <span class="required"> *</span></label>
    <input id="start" type="time" name="start" class="form-control" required>
</div>
<div class="form-group">
    <label> End Time <span class="required"> *</span></label>
    <input id="end" type="time" name="end" class="form-control" required>
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
    <input type="text" name="employment_situation" class="form-control" >
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

</form>
      </div>
      <div class="modal-footer">
<button style="width:100%" type="submit" class="btn btn-primary" id="btnSubmit"> SUBMIT FORM </button> <br><br>
     
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="secondaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 
      <div class="modal-footer">
<button style="width:100%" type="submit" class="btn btn-primary" id="btnSubmit"> PROCEED to CHECKOUT </button> <br><br>
     
      </div>
    </div>
  </div>
</div>
<div class="popContainer">
<div class="jumbotron">
<div class="card">
<div class="container">
        <div id="calendar"></div>
    </div>
</div>

</div>
</div>


   
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>z
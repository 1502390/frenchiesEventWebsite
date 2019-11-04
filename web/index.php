<?php
	include 'db.php';
	include 'utils.php';

	init_session();

	$db = db_connect();
	if (!$db)
	{
		error_message("ERROR: Could not connect to database: " . mysqli_connect_error());
		exit();
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <!-- Title for the page -->
  <title>RGU Events</title>
  <meta http-equiv="content-type"
  content="text/html;charset=utf-8" />

  <!-- Added relavant links to the fonts etc -->
  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/RGU.css">
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/clear-sans" type="text/css"/>

  <!-- Link to JQUERY on google api list -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Link to scripts js file -->
  <script src="js/script.js"></script>
  <!-- <script type="text/javascript" src="***"></script> -->

</head>

<!-- Open Body -->
<body>
  <div id="top"><!-- TOP BAR -->
    <!-- Image and Login for top bar  -->
    <img class="headerImage" style="vertical-align:middle; float:left;" src="img/RGU_SMALL.png" alt="RGU Logo" />
    <span class="loginLink">&#x26BF; Login</span>&nbsp;
  </div><!-- End of TOP BAR -->
  <div class="main" id="main">

    <br />
    <div class="header">
      <h1>Events</h1> <!-- Event Header -->
    </div>
    <body>
        <div id="header">
			<div class="bg-help">
				<div class="inBox">
					<h1 id="logo"><a href='https://code.daypilot.org/17910/html5-event-calendar-open-source'>HTML5/JavaScript Event Calendar</a></h1>
					<p id="claim"><a href="https://javascript.daypilot.org/">DayPilot for JavaScript</a> - AJAX Calendar/Scheduling Widgets for JavaScript/HTML5/jQuery</p>
					<hr class="hidden" />
				</div>
			</div>
        </div>
        <div class="shadow"></div>
        <div class="hideSkipLink">
        </div>
        <div class="main">

            <div style="float:left; width: 160px;">
                <div id="nav"></div>
            </div>
            <div style="margin-left: 160px;">

                <div class="space">
                    Theme: <select id="theme">
                        <option value="calendar_default">Default</option>
                        <option value="calendar_white">White</option>
                        <option value="calendar_g">Google-Like</option>
                        <option value="calendar_green">Green</option>
                        <option value="calendar_traditional">Traditional</option>
                        <option value="calendar_transparent">Transparent</option>
                    </select>
                </div>

                <div id="dp"></div>
            </div>

            <script type="text/javascript">

                var nav = new DayPilot.Navigator("nav");
                nav.showMonths = 3;
                nav.skipMonths = 3;
                nav.selectMode = "week";
                nav.onTimeRangeSelected = function(args) {
                    dp.startDate = args.day;
                    dp.update();
                    loadEvents();
                };
                nav.init();

                var dp = new DayPilot.Calendar("dp");
                dp.viewType = "Week";

                dp.eventDeleteHandling = "Update";

                dp.onEventDeleted = function(args) {
                    $.post("backend_delete.php",
                        {
                            id: args.e.id()
                        },
                        function() {
                            console.log("Deleted.");
                        });
                };

                dp.onEventMoved = function(args) {
                    $.post("backend_move.php",
                            {
                                id: args.e.id(),
                                newStart: args.newStart.toString(),
                                newEnd: args.newEnd.toString()
                            },
                            function() {
                                console.log("Moved.");
                            });
                };

                dp.onEventResized = function(args) {
                    $.post("backend_resize.php",
                            {
                                id: args.e.id(),
                                newStart: args.newStart.toString(),
                                newEnd: args.newEnd.toString()
                            },
                            function() {
                                console.log("Resized.");
                            });
                };

                // event creating
                dp.onTimeRangeSelected = function(args) {
                    var name = prompt("New event name:", "Event");
                    dp.clearSelection();
                    if (!name) return;
                    var e = new DayPilot.Event({
                        start: args.start,
                        end: args.end,
                        id: DayPilot.guid(),
                        resource: args.resource,
                        text: name
                    });
                    dp.events.add(e);

                    $.post("backend_create.php",
                            {
                                start: args.start.toString(),
                                end: args.end.toString(),
                                name: name
                            },
                            function() {
                                console.log("Created.");
                            });

                };

                dp.onEventClick = function(args) {
                    alert("clicked: " + args.e.id());
                };

                dp.init();

                loadEvents();

                function loadEvents() {
                    dp.events.load("backend_events.php");
                }

            </script>

            <script type="text/javascript">
            $(document).ready(function() {
                $("#theme").change(function(e) {
                    dp.theme = this.value;
                    dp.update();
                });
            });
            </script>

        </div>
        <div class="clear">
        </div>

</body>

    <!-- Start Flex container  -->
    <div class="flex-container">
      <!-- First container Item -->
        <figure class="flex-item">
          <p><img class=scaled src="img/event.jpg" alt="Event"> <!-- image to show (harcoded for now will change) -->
            <figcaption>EVENT NAME</figcaption> <!--Caption for event -->
        </figure>
        <figure class="flex-item">
          <p><img class=scaled src="img/event.jpg" alt="Event">
            <figcaption>EVENT NAME</figcaption>
        </figure>
        <figure class="flex-item">
          <p><img class=scaled src="img/event.jpg" alt="Event">
            <figcaption>EVENT NAME</figcaption>
        </figure>
        <figure class="flex-item addEvent" onclick="addEvent()">
          <p><img class=scaled src="img/plus.png" alt="Add Event">
        </figure>
    </div>


      </div><!-- main -->

      <!-- Hidden login form -->
      <div class="login" id="win_top"></div>
      <!-- --- -->
      <br />
      <!-- Hidden "popup" element -->
      <div class="input_popup hidden"></div>
      <!-- --- -->
      <footer>
        Copyright &copy;2019 The Robert Gordon University.<br />
      </footer>
    </body>
    </html>

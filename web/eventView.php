<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Manager</title>
    <link rel="stylesheet" type="text/css" href="style/header.css">
    <link rel="stylesheet" type="text/css" href="style/eventView.css">
  </head>
  <body id="body">
    <?php
      include 'header.php';
    ?>
    <?php
      session_start();
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      ?>
      <style type="text/css">
         .center-buttons {
           visibility:visible;
         }
      </style>

    <?php  }else{ ?>

      <style type="text/css">
         .center-buttons {
           /* visibility:hidden; */ /* Only uncomment when log in system is setup */
         }
      </style>
    <?php
      }
    ?>
  <script>
  function editFunction() {
    document.getElementById("description").contentEditable = true;
    document.getElementById("staff").contentEditable = true;
    document.getElementById("eventName").contentEditable = true;


  }
  function staffPageChange(id){
    //var staffList = document.getElementById("staff");
    // for (i=0; i < staffList.length; i++){
    //   if(id == )
    // }
    //
    var linkC = id;
    linkC.addEventListener('click', function() {
      document.location.href = 'staffView.php?' + linkC.innerText ;
    });
  }
  </script>


  <div id = "eventImage">
   <!-- <img src="img/event.jpg" alt="Event Image" > -->
  </div>

    <div class="text">
      <h1>Event Viewer</h1>
    </div>

    <div class = "infoContainerName">
      <h2 class="name"> Name </h2>
      <h2 id= "eventName"> This is where the AJAX will display the name of the Event </h2>
    </div>

    <div class="bigContainer">

      <div class = "infoContainerStaff">
        <h2 class="name"> Event Staff </h2>
        <ul id = "staff" style = "list-style-type:none;">
          <li> <a id="staff1" href="javascript:void();" onclick="staffPageChange(this)" > John Doe </a> </li>
          <li> <a id="staff2" href="javascript:void();" onclick="staffPageChange(this)" > Jane Doe </a> </li>
          <li> <a id="staff3" href="javascript:void();" onclick="staffPageChange(this)" > John Doe </a> </li>
          <li> <a id="staff4" href="javascript:void();" onclick="staffPageChange(this)" > James Doe </a> </li>
        </ul>
      </div>

    <div class = "infoContainerDescription">
      <h2 class="name"> Description </h2>
      <h2 id = "description"> This is where the AJAX will display the description of the Event This is where the AJAX will display the description of the Event This is where the AJAX will display the description of the Event This is where the AJAX will display the description of the Event This is where the AJAX will display the description of the Event This is where the AJAX will display the description of the Event This is where the AJAX will display the description of the Event</h2>
    </div>


  </div>

    <div class="center-buttons">
      <a style="text-decoration:none" href="#">
        <button class="button" onclick="editFunction()">
          <span class="button-text underline-left">Edit Event</span>
        </button>
      </a>
    </div>

  </body>
  </html>

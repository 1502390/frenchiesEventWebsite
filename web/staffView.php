<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Manager</title>
    <link rel="stylesheet" type="text/css" href="style/header.css">
    <link rel="stylesheet" type="text/css" href="style/staffView.css">
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
    document.getElementById("availability").contentEditable = true;
    document.getElementById("age").contentEditable = true;
    document.getElementById("staffName").contentEditable = true;
    document.getElementById("tasks").contentEditable = true;
    document.getElementById("skills").contentEditable = true;
    document.getElementById("previousEvents").contentEditable = true;

  }

  </script>

    <div class="text">
      <h1>Staff Viewer</h1>
    </div>

    <div class = "superContainer">
      <div id = "eventImage">
       <!-- <img src="img/event.jpg" alt="Event Image" > -->
      </div>
      <div class="bigContainer">
        <div class = "infoContainer">
          <h2 class="name"> Name </h2>
          <h2 id = "staffName"></h2>
        </div>
        <div class = "infoContainer">
          <h2 class="name"> Age </h2>
          <h2 id = "age"> 24 </h2>
        </div>
        <div class = "infoContainerAvailability">
          <h2 class="name"> Availability </h2>
          <h2 id = "availability"> Available </h2>
        </div>
      </div>
    </div>

    <div class="bigContainerLists">

      <div class = "infoContainerTask">
        <h2 class="name"> Tasks </h2>
        <ul id = "tasks" style = "list-style-type:none;">
          <li> <h2> Task 1 </h2> </li>
          <li> <h2> Task 2 </h2> </li>
          <li> <h2> Task 3 </h2> </li>
          <li> <h2> Task 4 </h2> </li>
        </ul>
      </div>

    <div class = "infoContainerTask">
      <h2 class="name"> Skills </h2>
      <ul id = "skills" style = "list-style-type:none;">
        <li> <h2> Manager </h2> </li>
        <li> <h2> Cooking </h2> </li>
        <li> <h2> Organizing </h2> </li>
        <li> <h2> Decorator </h2> </li>
      </ul>
    </div>

    <div class = "infoContainerTask">
      <h2 class="name"> Previous Events </h2>
      <ul id = "previousEvents" style = "list-style-type:none;">
        <li> <h2> Fresher's Fayre </h2> </li>
        <li> <h2> X </h2> </li>
        <li> <h2> X </h2> </li>
        <li> <h2> X </h2> </li>
      </ul>
    </div>

  </div>

    <div class="center-buttons">
      <a style="text-decoration:none" href="javascript:void();">
        <button class="button" onclick="editFunction()">
          <span class="button-text underline-left">Edit Staff</span>
        </button>
      </a>
    </div>

    <script type="text/javascript" src="scripts/header.js"></script>
    <script>
      var staff = location.search.substring(1);
      document.getElementById("staffName").innerText = decodeURI(staff);
    </script>
  </body>
  </html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Event Manager</title>
    <link rel="stylesheet" type="text/css" href="style/header.css">
    <link rel="stylesheet" type="text/css" href="style/createEventView.css">
  </head>
  <body>
      <?php
        include 'header.php';
      ?><br><br><br><br>

    <div class="container">

      <h1>Create an event</h1>

      <form name="createEvent" action="create.php" onsubmit="return validateForm()" method="POST">

        <div class="inputDiv">
          Name of the event: <input type="text" name="name" id="name" class="input">
        </div>
        <div class="inputDiv">
          Description: <input type="text" name="description" id="description" class="input">
        </div>
        <div class="inputDiv">
          Date: <input type="date" name="date" id="date" class="input">
        </div>
        <div class="inputDiv">
          Location: <input type="text" name="location" id="location" class="input">
        </div>
        <input type="submit" value="Create">
      </form>

    </div>

    <script>
      function validateForm() {
        if($('#name').val().length <= 0) {
          $('#name').attr("required", "true")
          return false
        } else if($('#description').val().length <= 0) {
          $('#description').attr("required", "true")
          return false
        } else if($('#date').val().length <= 0) {
          $('#date').attr("required", "true")
          return false
        } else if($('#location').val().length <= 0) {
          $('#location').attr("required", "true")
          return false
        } 
        return true
      }
    </script>
  </body>
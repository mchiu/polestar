<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" />
    <title></title>
<script
              src="https://code.jquery.com/jquery-3.6.0.js"
              integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
              crossorigin="anonymous"></script>
</head>

<body>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').dataTable( {
        "pageLength": 25,
        "order": [[5, "asc" ]]
    });
});

</script>

    <table class="table table-striped table-bordered" id="example" border="1" cellpadding="2" cellspacing="0" >
      <thead>
        <tr>
          <th>dealerCode</th>
          <th>pno34</th>
          <th>pno34_dealerCode</th>
          <th>EarliestDelivery</th>
          <th>TotalPrice</th>
          <th>Color</th>
          <th>Upholstery</th>
          <th>Rims</th>
          <th>Model</th>
          <th>Engine</th>
          <th>modelYear</th>
          <th>Performance</th>
          <th>Pilot</th>
          <th>Plus</th>
          <th>end</th>
        </tr>
      </thead>
      <tbody>

<?php echo file_get_contents("http://overlunch.com/pole/csv/data.html"); ?>
    </tbody>
    </table>
  </body>

</html>


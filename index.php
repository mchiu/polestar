<?php if (isset($_GET['market'])) {
          if (($_GET['market'] == 'ca') && ($_SERVER['HTTP_USER_AGENT'] == 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36')) {
              http_response_code(400);
              exit;
          }
      }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="description" content="An inventory tracker for pre-configured Polestar 2 cars">
  <meta name="keywords" content="Polestar, Polestar 2, pre-configured">

  <title>Polestar 2 Pre-configured Inventory Tracker</title>

  <link rel="shortcut icon" href="assets/images/favicon.ico">
  <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
  <link rel="mask-icon" href="assets/images/safari-pinned-tab.svg" color="#000000">
  <link rel="icon" type="image/png" sizes="228x228" href="assets/images/coast-228x228.png">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/images/mstile-144x144.png">
  <meta name="msapplication-config" content="assets/images/browserconfig.xml">
  <link rel="yandex-tableau-widget" href="assets/images/yandex-browser-manifest.json">

<script
              src="https://code.jquery.com/jquery-3.6.0.js"
              integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
              crossorigin="anonymous"></script>
    <style>
      td, .smaller { font-size: .7em };
    </style>
    <link rel="stylesheet"  href="assets/css/application.css" type="text/css" media="all">

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-L4ZW9CP97S"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-L4ZW9CP97S');
</script>
</head>

<body>
    <h1><b>Unofficial</b> Polestar Inventory Checker</h1>

    <div class="notices">
      <p>For research purposes only. Check the <a href="https://polestar.com" class="">Polestar website</a> for official data.</p>
      <p>Data is updated automatically throughout the day.</p>
    </div>

    <div class="country-selector">
      <h2>
        Selected Country
        <a href="/" <?php if($_SERVER['QUERY_STRING'] == "") echo 'class="active"'; ?>>🇺🇸</a>
        <a href="/?market=au" <?php if($_SERVER['QUERY_STRING'] == "market=au") echo 'class="active"'; ?>>🇦🇺</a>
        <a href="/?market=ca" <?php if($_SERVER['QUERY_STRING'] == "market=ca") echo 'class="active"'; ?>>🇨🇦</a>
      </h2>
    </div>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet"  href="assets/css/application.css" type="text/css" media="all">

<script>
$(document).ready(function() {
    $('#example').dataTable( {
      "pageLength": 20,
      "paging": true,
      "stateSave": true,
      "columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 2 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 8 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 14 ],
                "visible": false,
                "searchable": false
            }
        
        ],
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select multiple="multiple"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var vals = $('option:selected', this).map(function (index, element) {
                        	return $.fn.dataTable.util.escapeRegex($(element).val());
                        }).toArray().join('|');
 
                        column
                            .search( vals.length > 0 ? '^('+vals+')$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>

<div class="inventory-table-layout">
  <div class="inventory-table-container">
    <table id="example" class="inventory-table">
      <thead>
        <tr>
          <th>Dealer</th>
          <th>pno34</th>
          <th>pno34_dealerCode</th>
          <th>Earliest Date</th>
          <th>Price</th>
          <th>Color</th>
          <th>Upholstery</th>
          <th>Rims</th>
          <th>Model</th>
          <th>Engine</th>
          <th>modelYear</th>
          <th>Perform</th>
          <th>Pilot</th>
          <th>Plus</th>
          <th>end</th>
        </tr>
      </thead>
      <tbody>

<?php 
    if (isset($_GET['market']) && (in_array($_GET['market'], array('au', 'ca'))))
        echo file_get_contents("http://overlunch.com/pole/csv/" . $_GET['market'] . "_data.html");
    else
        echo file_get_contents("http://overlunch.com/pole/csv/data.html");
?>
     </tbody>
<tfoot>
<tr>
          <th>Dealer</th>
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
</tfoot>
  </table>
</div>

    <div class="smaller">Each filter now allows multiple selections. Command + click to select additional options.</div>
    <div class="smaller">Comments and questions may be sent to polestarfund@gmail.com</div>
</div>
</body>
</html>

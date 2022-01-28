<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" />
    <title>Polestar Fun Tracker</title>
<script
              src="https://code.jquery.com/jquery-3.6.0.js"
              integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
              crossorigin="anonymous"></script>
    <style>
      td { font-size: .7em };
      #research { font-size: 1em; color: red; }
      .smaller { font-size: .6em; }
    </style>

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
    <div id="research">** For research purposes only. Check the <a href="https://polestar.com">Polestar website</a> for official data. **</div>
    <span class="smaller">Filters are saved, but it's a little buggy ... To reset a filter to all values, choose a value, and then choose the blank value ...</span>
  

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

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
                "targets": [ 10 ],
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
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
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

    <table id="example" class="display" style="width:100%">
      <thead>
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
      </thead>
      <tbody>

<?php echo file_get_contents("http://overlunch.com/pole/csv/data.html"); ?>
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
  </body>

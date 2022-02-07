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
      td, .smaller { font-size: .7em };
      #research { font-size: 1em; color: red; }
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

    <div style="color: red">** For research purposes only. Check the <a href="https://polestar.com">Polestar website</a> for official data. **</div>
    <div style="color: red">** Update 2022-01-31 Official Polestar website changed their code to add pagination. Work around applied ... **</div>
    <div class="smaller">Each filter now allows multiple selections. Command + click to select additional options.</div>
    <div class="smaller">Comments and questions may be sent to polestarfund@gmail.com</div>
  

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

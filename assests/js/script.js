//custom Js
$(document).ready(function(){
//alert("Hello! I am an alert box!");
//console.log('Hi');
var editor;
var cust = $('#user').text();
  //$("#new_data").DataTable();
  $.fn.dataTable.ext.search.push(
  function (settings, data, dataIndex) {
      var min = $('#min').datepicker("getDate");
      var max = $('#max').datepicker("getDate");
      var d = data[1].split("/");
      var startDate = new Date(d[2]+ "/" +  d[1] +"/" + d[0]);
      if (min == null && max == null) { return true; }
      else if (min == null && startDate <= max) { return true;}
      else if(max == null && startDate >= min) {return true;}
      else if (startDate <= max && startDate >= min) { return true; }
      return false;
  }
  );

    $("#min").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true, dateFormat:"dd/mm/yy" });
    $("#max").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true, dateFormat:"dd/mm/yy" });

var table =  $('#new_data').DataTable( {

  dom: 'lBfrtip',
   // select: true,
   buttons: [
       {
           extend: 'excelHtml5',
           title: cust + ' Utilization report',
           // customize: function( xlsx ) {
           //     var sheet = xlsx.xl.worksheets['sheet1.xml'];
           //     $('row:first c', sheet).attr( 's', '42' );
           //     $('row c[r*="2"]', sheet).attr( 's', '21' );
           // }
       },
       {
           extend: 'pdfHtml5',
           title: 'Data export'
       },
   ],
   "columnDefs": [ {
       "searchable": false,
       "orderable": false,
       "targets": 0
   } ],
   "order": [[ 1, 'asc' ]],
  // "searching": false,
    // "paging": true,
    // "info": false,
    // "lengthChange":false
    "oLanguage": { "sSearch": "" },
    "Processing": true,
    "ServerSide": true,
    "ajax" : {
    "url" : "get_data",
    "type" : "POST",
    "dataSrc": "data_table",
    // "dataType": "json",
    // "cache": false,
    // "contentType": "application/json; charset=utf-8"
    },
    "aoColumns": [
        { "data": "r_no" },
        { "data": "date" },
        { "data": "project_name" },
        { "data": "client_name" },
        { "data": "billing_status" },
        { "data": "service_line" },
        { "data": "time_taken" },
        { "data": "comments" }
    ],
    "columnDefs": [ {
            "render": function ( data, type, row ) {
                return '<a class="edit-btn" href="/admin/products/edit/'+data +'">Edit</a> <a class="delete-btn" data-id='+data+' href="/admin/products/delete/'+data +'">Delete</a>';
            },
        "targets": 8,
        } ]
});


table.on('order.dt search.dt', function () {
       table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
           cell.innerHTML = i+1;
           table.cell(cell).invalidate('dom');
       } );
   } ).draw();

$('#min, #max').change(function () {
    table.draw();
});


//$('input[type=search]').addClass('s_icon');

$('#new_data_filter label').addClass('s_icon');

$(".add-plus").click(function(){
    $(".addnew").show();
    $("body").css("overflow", "hidden");
});

$("#box").click(function(){
    $(".addnew").hide();
    $("body").css("overflow", "auto");
});

$("#add_new").submit(function(e){
  e.preventDefault();
	//var data=$("#add_new").serialize();
  // var date = $('#date').val();
  // var p_name = $('#p_name').val();
  // var client = $('#client').val();
  // var bill = $('#bill').val();
  // var time = $('#time').val();
  // var comment = $('#comment').val();

  $.ajax({
		type:"POST",
		url:"push_data",
    //dataType:'json',
    cache:false,
    //data:{dateof:date,project_name:p_name, client_name:client, billing_status:bill, time_taken:time, comments:comment},
    data: $("#add_new").serialize(),
    success:function(){
      alert('Data Inserted');
      table.ajax.reload();
      $('#add_new')[0].reset();
    },
    error: function(e) {
      console.table(e);
      alert('Try again');
    }
	});
});


$('.point').click(function() {
    $(".drop-down").toggle();
});

$( document ).on( 'click', function ( e ) {
    if ( $( e.target ).closest(".point").length === 0 ) {
        $(".drop-down").hide();
    }
});

$( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        $(".drop-down").hide();
    }
});



});

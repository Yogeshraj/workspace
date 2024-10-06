//custom Js
$(document).ready(function(){
"use strict";


    $('#admin_data thead tr').clone(true).appendTo( '#admin_data thead' );
    $('#admin_data thead tr:eq(0) th').each( function (i) {
//        var title = $(this).text();
//        $(this).html( '<input class="search_box" type="text" placeholder="Search '+title+'" />' );
		$(this).html( '<input class="search_box" type="text" placeholder="All" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( admin_table.column(i).search() !== this.value ) {
                admin_table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );





/*Date-wise filter*/

  $.fn.dataTable.ext.search.push(
  function (settings, data) {
      var min = $('#min').datepicker("getDate");
      var max = $('#max').datepicker("getDate");
      var d = data[2].split("/");
      var startDate = new Date(d[2]+ "/" +  d[1] +"/" + d[0]);
      if (min == null && max == null) { return true; }
      else if (min == null && startDate <= max) { return true;}
      else if(max == null && startDate >= min) {return true;}
      else if (startDate <= max && startDate >= min) { return true; }
      return false;
  }
  );

    $("#min").datepicker({ onSelect: function () { admin_table.draw(); }, changeMonth: true, changeYear: true, dateFormat:"dd/mm/yy" });
    $("#max").datepicker({ onSelect: function () { admin_table.draw(); }, changeMonth: true, changeYear: true, dateFormat:"dd/mm/yy" });

var cust = $('#user').text();

/*Table Data*/
	var admin_table = $('#admin_data').DataTable({
//		orderCellsTop: false,
//        fixedHeader: true,

  dom: 'lBfrtip',
//   select: true,
   buttons: [
       {
           extend: 'excelHtml5',
           title: cust + ' Utilization report',
			exportOptions: {
				columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
			}
           // customize: function( xlsx ) {
           //     var sheet = xlsx.xl.worksheets['sheet1.xml'];
           //     $('row:first c', sheet).attr( 's', '42' );
           //     $('row c[r*="2"]', sheet).attr( 's', '21' );
           // }
       },
	   ],
		ajax:{
			url:"admin/get_fulldata",
			type:"POST"
		},

    "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;

        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
                i.replace(/[:]/, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };

        // Total over all pages
        var total = api
            .column( 9 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        var pageTotal = api
            .column( 9, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 9 ).footer() ).html(
            ''+pageTotal +' <br> ('+ total +' hours)'
        );
    },
// 
//     {
//     data: 'footerCallback',
//     render: $.fn.dataTable.render.number( ',', '.', 2, '$' )
// }

	});






admin_table.on('order.dt search.dt', function () {
       admin_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
           cell.innerHTML = i+1;
           admin_table.cell(cell).invalidate('dom');
       } );
   } ).draw();

$('#min, #max').change(function () {
    admin_table.draw();
});

//$('#date').datepicker({});


$(".add-plus").click(function(){
	$('#add_new')[0].reset();
	$('#submit').val("Submit");
    $(".addnew").show();
    $("body").css("overflow", "hidden");
		$('#r_no').val('');
});

$("#box").click(function(){
    $(".addnew").hide();
    $("body").css("overflow", "auto");
});

/*Submit*/
$("#add_new").submit(function(e){
  e.preventDefault();
	var sub_val;
	sub_val= $('#submit').val();
  $.ajax({
	type:"POST",
	url:"admin/push_data",
	//dataType:'json',
	cache:false,
	data: $("#add_new").serialize(),
    success:function(data){
		alert('Data Inserted');
		console.log(data);
		admin_table.ajax.reload();
		$('#add_new')[0].reset();
    },
    error: function(e) {
		console.table(e);
		alert('Try again');
    }
	});

});
/*Submit Ends*/



/*Update*/
	$('#admin_data').on('click', '.update', function(){
		var r_no = $(this).attr("id");
//		var sub_val;

		$.ajax({
                url:"admin/fetch_single_user",
                method:"POST",
                data:{r_no:r_no},
                dataType:"json",
                success:function(data)
                {
					$(".addnew").show();
					$("body").css("overflow", "hidden");
					$('#a_user_name').val(data.a_user_name);
					$('#date').val(data.date);
					$('#project_name').val(data.project_name);
					$('#client_name').val(data.client_name);
					$('#job_type').val(data.job_type);
					$('#job_nature').val(data.job_nature);
					$('#billing_status').val(data.billing_status);
					$('#service_line').val(data.service_line);
					$('#time_taken').val(data.time_taken);
					$('#comments').val(data.comments);
					$('#r_no').val(r_no);
                },
           });
	});
/*Update*/
/*Delete*/
$('#admin_data').on('click', '.delete', function(){
var r_no = $(this).attr("id");
if(confirm('Are you sure delete this data?'))
 {
	$.ajax({
							url:"welcome/delete_single_record/" +r_no,
							method:"POST",
							dataType:"json",
							success:function()
							{
								alert ('Delted ' +  r_no + ' successfully');
								admin_table.ajax.reload();
							},
							error: function (jqXHR, textStatus, errorThrown){
								alert('Error deleting data');
							}

				 });
			 }
			 else {
			 	alert('error in deleting this record!');
			 }
});
/*Delete*/

});

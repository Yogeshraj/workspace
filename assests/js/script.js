//custom Js


$(window).bind("load", function() {
  // alert();
   $('#loader').fadeOut('slower');
});


$(document).ready(function(){
//alert("Hello! I am an alert box!");
//console.log('Hi');
//$("#section3").hide();


$(function() {
var date = new Date();
var currentMonth = date.getMonth();
var currentDate = date.getDate();
var currentYear = date.getFullYear();
//var currentTime = date.getTime();
$('#date').datepicker({
maxDate: new Date(currentYear, currentMonth, currentDate),dateFormat:"yy/mm/dd",
minDate: new Date(currentYear, currentMonth, (currentDate -1))
});
});



/*Base*/
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

/*Base*/

/**New concept*/


  $.fn.dataTable.ext.search.push(
  function (settings, data, dataIndex) {
      var min = $('#min_2').datepicker("getDate");
      var max = $('#max_2').datepicker("getDate");
      var d = data[1].split("/");
      var startDate = new Date(d[2]+ "/" +  d[1] +"/" + d[0]);
      if (min == null && max == null) { return true; }
      else if (min == null && startDate <= max) { return true;}
      else if(max == null && startDate >= min) {return true;}
      else if (startDate <= max && startDate >= min) { return true; }
      return false;
  }
  );

    $("#min_2").datepicker({ onSelect: function () { table_new.draw(); }, changeMonth: true, changeYear: true, dateFormat:"dd/mm/yy" });
    $("#max_2").datepicker({ onSelect: function () { table_new.draw(); }, changeMonth: true, changeYear: true, dateFormat:"dd/mm/yy" });


"use strict";
var table_new =  $('.data_new').DataTable( {
  dom: 'lBfrtip',
   buttons: [
       {
           extend: 'excelHtml5',
           title: cust + ' Utilization report',
//			exportOptions: {
//				columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
//			}
       }

   ],

    "oLanguage": { "sSearch": "" },
    "Processing": true,
    "ServerSide": true,
	 "order":[],
    "ajax" : {
    	"url" : "full_data",
		"type" : "POST"

	}



});

$('#drop').on('click', '#full_data', function(){
	if($(".change_btn").html() === 'View Monthly Data'){
		$("#section2").hide();
		$("#section3").show();
		$(".change_btn").html('View Today Data');

	}
	else{
		$("#section2").show();
		$("#section3").hide();
		$(".change_btn").html('View Monthly Data');
	}
});



/*dont touch here*/


var table =  $('#new_data').DataTable( {

  dom: 'lBfrtip',
//   select: true,
   buttons: [
       {
           extend: 'excelHtml5',
           title: cust + ' Utilization report',
			exportOptions: {
				columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
			}
           // customize: function( xlsx ) {
           //     var sheet = xlsx.xl.worksheets['sheet1.xml'];
           //     $('row:first c', sheet).attr( 's', '42' );
           //     $('row c[r*="2"]', sheet).attr( 's', '21' );
           // }
       },
       {
           extend: 'pdfHtml5',
           title: 'Data export'
       }

   ],
//   "columnDefs": [ {
//       "searchable": false,
//       "orderable": false,
//       "targets": 0
//   } ],
//   "order": [[ 1, 'asc' ]],
  // "searching": false,
    // "paging": true,
    // "info": false,
    // "lengthChange":false
	// "pageLength": 25,
    "oLanguage": { "sSearch": "" },
    "Processing": true,
    "ServerSide": true,
	 "order":[],
    "ajax" : {
    	"url" : "get_data",
		"type" : "POST",
//		"data":"data",
//    "dataSrc": "data_table",
//    	"dataType": "json",
//    	"cache": false,
//    	"contentType": "application/json; charset=utf-8",
//		    'success': function(data) {
////            var parsed_result = JSON.parse(data);  //parsing here
////            console.log(parsed_result); //return when data is parsed successfully
//				console.log(data[0].name);
//        }
    },
//	"aaData": "parsed_result",


//     "aoColumns": [
//         { "data": "r_no" },
//         { "data": "date" },
//         { "data": "project_name" },
//         { "data": "client_name" },
//         { "data": "billing_status" },
//         { "data": "service_line" },
//         { "data": "time_taken" },
//         { "data": "comments" },
//		 { "data": "comments" }
//     ],




//    "columnDefs":[
////		{
////       "searchable": false,
////       "orderable": false,
////       "targets": 0
////   },
//         {
//              "targets":[0,1,2,3,4,5,6,7],
//              "orderable":false,
//         }
//    ],


    // "aoColumns": [
    //     { "data": "r_no" },
    //     { "data": "date" },
    //     { "data": "project_name" },
    //     { "data": "client_name" },
    //     { "data": "billing_status" },
    //     { "data": "service_line" },
    //     { "data": "time_taken" },
    //     { "data": "comments" },
    //     { "data": "r_no", "render": function ( data, type, row ) {
    //                 return '<a class="table-edit" href="edit/'+data+'" data-id="' + row[0] + '">EDIT</a>';
    //             }, "targets": 8 }
    // ],
    // "columnDefs": [ {

// return '<a class="table-edit" href="edit/'+data+'" data-id="' + row[0] + '">EDIT</a>';

    //         "render": function ( data, type, row ) {
    //             // return '<a class="edit-btn" href="/admin/products/edit/'+data +'">Edit</a> <a class="delete-btn" data-id='+data+' href="/admin/products/delete/'+data +'">Delete</a>';
    //             return '<a class="edit-btn">Edit</a> <a class="delete-btn">Delete</a>';
    //         },
    //     "targets": 8,
    //     } ]
});



/*new concept*/

table_new.on('order.dt search.dt', function () {
       table_new.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
           cell.innerHTML = i+1;
           table_new.cell(cell).invalidate('dom');
       } );
   } ).draw();

$('#min_2, #max_2').change(function () {
    table_new.draw();
});


/*new concept*/




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
	$('#add_new')[0].reset();
	$('#submit').val("Submit");
    $(".addnew").show();
    $("body").css("overflow", "hidden");
		$('#r_no').val('');

//    var timestamp = $('#timestamp').text();
//   alert(timestamp);
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
  //  var tstamp = $('#tstamp').val();
	// alert(tstamp);
//	exit();
//	throw new Error("Something went badly wrong!");
  // var comment = $('#comment').val();
	var sub_val;
	sub_val= $('#submit').val();
//	alert(sub_val);

/*Check*/
//var date = new Date();
//var currentDate = date.getDate();
//	var date_val;
//	date_val= $('#date').val();
//	alert(date_val);
//
//	    if(date_val == (currentDate -1)) {
//			alert('sucess');
//    } else {
//		alert('fail');
//    }


/*check*/


  $.ajax({
		type:"POST",
		url:"push_data",
    //dataType:'json',
    cache:false,
    //data:{dateof:date,project_name:p_name, client_name:client, billing_status:bill, time_taken:time, comments:comment},
    data: $("#add_new").serialize(),
    success:function(data){
//		$(window).trigger('load');
      alert('Data Inserted');
			console.log(data);
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

// $( document ).ajaxComplete(function() {
// window.onload = function() {
	$('#new_data').on('click', '.update', function(){
	// $('.update').click(function(){
		var r_no = $(this).attr("id");
		var sub_val;
//		alert(r_no);

		$.ajax({
                url:"fetch_single_user",
                method:"POST",
                data:{r_no:r_no},
                dataType:"json",
                success:function(data)
                {
					 $(".addnew").show();
					 $("body").css("overflow", "hidden");
                     $('#date').val(data.date);
                     $('#project_name').val(data.project_name);
					$('#client_name').val(data.client_name);
					$('#billing_status').val(data.billing_status);
					$('#service_line').val(data.service_line);
					$('#time_taken').val(data.time_taken);
					$('#comments').val(data.comments);

//					$('.modal-title').text("Edit User");
//
					$('#r_no').val(r_no);

//					$('#submit').val("Edit");
//                    sub_val= $('#submit').val();
//					alert(sub_val);
                },

           });

	});





// });

/*Delete*/
$('#new_data').on('click', '.delete', function(){
var r_no = $(this).attr("id");
if(confirm('Are you sure delete this data?'))
 {
	$.ajax({
							url:"delete_single_record/" +r_no,
							method:"POST",
							dataType:"json",
							success:function()
							{
								alert ('Delted ' +  r_no + ' successfully');
								table.ajax.reload();
							},
							error: function (jqXHR, textStatus, errorThrown){
								alert('Error deleting data');
							}

				 });
			 }
			 else {
			 	alert('error in deleting this record!')
			 }
});
/*Delete*/

/*error*/
var particles = {
     "particles": {
       "number": {
         "value": 160,
         "density": {
           "enable": true,
           "value_area": 800
         }
       },
       "color": {
         "value": "#ffffff"
       },
       "shape": {
         "type": "circle",
         "stroke": {
           "width": 0,
           "color": "#000000"
         },
         "polygon": {
           "nb_sides": 5
         },
         "image": {
           "src": "img/github.svg",
           "width": 100,
           "height": 100
         }
       },
       "opacity": {
         "value": 1,
         "random": true,
         "anim": {
           "enable": true,
           "speed": 1,
           "opacity_min": 0,
           "sync": false
         }
       },
       "size": {
         "value": 3,
         "random": true,
         "anim": {
           "enable": false,
           "speed": 4,
           "size_min": 0.3,
           "sync": false
         }
       },
       "line_linked": {
         "enable": false,
         "distance": 150,
         "color": "#ffffff",
         "opacity": 0.4,
         "width": 1
       },
       "move": {
         "enable": true,
         "speed": 0.17,
         "direction": "none",
         "random": true,
         "straight": false,
         "out_mode": "out",
         "bounce": false,
         "attract": {
           "enable": false,
           "rotateX": 600,
           "rotateY": 600
         }
       }
     },
     "interactivity": {
       "detect_on": "canvas",
       "events": {
         "onhover": {
           "enable": false,
           "mode": "bubble"
         },
         "onclick": {
           "enable": false,
           "mode": "repulse"
         },
         "resize": false
       },
       "modes": {
         "grab": {
           "distance": 400,
           "line_linked": {
             "opacity": 1
           }
         },
         "bubble": {
           "distance": 250,
           "size": 0,
           "duration": 2,
           "opacity": 0,
           "speed": 3
         },
         "repulse": {
           "distance": 400,
           "duration": 0.4
         },
         "push": {
           "particles_nb": 4
         },
         "remove": {
           "particles_nb": 2
         }
       }
     },
     "retina_detect": true
  };
  particlesJS('particles-js', particles, function() {
    console.log('callback - particles.js config loaded');
  });
/*error*/


});





$(document).ready(function() {
    setInterval(timestamp, 1000);
	setInterval(timestamp_est, 1000);
});

function timestamp() {
    $.ajax({
        url: 'timestamp',
        method:"POST",
        success: function(data) {
            $('#timestamp').html(data);
			$('#tstamp').val(data);
        },
    });
}

function timestamp_est() {
    $.ajax({
        url: 'timestamp_est',
        method:"POST",
        success: function(data) {
            $('#timestamp_est').html(data);
//			$('#tstamp').val(data);
        },
    });
}




// $(window).load(function() {
//     $("#loader").css("display","none");
// });




$(document).ready(function() {
/*change pwd*/
  // $('#pwd_submit').click(function(event){
$('.change_pwd').on('click', '#pwd_submit', function(event){
      pwd_data1 = $('.pwd').val();
      pwd_data2 = $('.pwd_new').val();
      pwd_data3 = $('.re_pwd_new').val();
      var len1 = pwd_data1.length;
      var len2 = pwd_data2.length;
      var len3 = pwd_data3.length;
      if(len1 < 1 || len2 < 1 || len3 < 1) {
          alert("Password cannot be blank");
          // Prevent form submission
          event.preventDefault();
      }
      else if($('.pwd_new').val() != $('.re_pwd_new').val()) {
          alert("Password and Confirm Password don't match");
          // Prevent form submission
          event.preventDefault();
      }
      else {
        var u_id = $('.u_id').val();
        var dataString = $(".change_pwd").serialize();
        $.ajax({
							url:"change_pwd/",
							method:"POST",
							dataType:"json",
              data: dataString,
							success:function()
							{
								alert ('Password changed successfully!');
								// table.ajax.reload();
							},
							// error: function (jqXHR, textStatus, errorThrown){
							// 	alert('Error in changing password!');
							// }
				 });
          return false;
       }
     });
/*change pwd*/
});

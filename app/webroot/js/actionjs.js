$(document).ready(function(){
    $(function() {
        $( "#datepicker" ).datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
    
    $( "#LeaveRequestStartDate" ).datepicker({
        onSelect: function(ev){
            getEndDate();
        },
         
        dateFormat: 'yy-mm-dd'
    });
    
    
    $('#LeaveRequestLeaveDays').keyup(function(){
        
            getEndDate();
        
    });
    
    $('body').on('change', '#LeaveRequestLeaveTypeId', function(){
        $('#LeaveRequestStartDate').val('');
        $('#LeaveRequestDaysType').attr('checked', false);
        $('#LeaveRequestEndDate').val('');
        $('#LeaveRequestLeaveDays').val(1);
        $('#LeaveRequestRelievers').val('');
        $('#LeaveRequestEmployeeComment').val('');
    });
    
    $('body').on('focusout', '#LeaveRequestStartDate', function(){
        getEndDate();
    });
    //function to get end date
    function getEndDate(){
        var leave_type_id = $('#LeaveRequestLeaveTypeId').val();
        var sd = $('#LeaveRequestStartDate').val();
        var days = $('#LeaveRequestLeaveDays').val();
        if(leave_type_id !== '' && sd !== '' && days !== '' && days.length <=2 ){
            $('#LeaveRequestEndDate').val('Retrieving end date...');
            $('#LeaveRequestEndDate').css({"background-color": "yellow", "font-style": "italic", "border-color": "#3c763d"});
            //do an ajax call for the enddates or number of days
            $.ajax({
            type: 'post',
            url: "/erp/leaverequests/getenddate",
            data: {'leave_type_id':leave_type_id, 'startdate':sd, 'leave_days':days},
            dataType: 'json',
            success: function(data, textStatus, jqXHR)
            {
              if(data['success'] == 1)
              {
                //alert(data['enddate']);
                if(data['leave_type'] == 1){
                 $('#LeaveRequestEndDate').val(data['enddate']);
                } 
                if(data['leave_type'] == 2){
                 $('#LeaveRequestEndDate').val(data['enddate']);
                } 
                if(data['leave_type'] == 3){
                 $('#LeaveRequestEndDate').val(data['enddate']);
                } 
                if(data['leave_type'] == 4){
                 $('#LeaveRequestEndDate').val(data['enddate']);
                 $('#LeaveRequestLeaveDays').val(data['leave_days']);
                }
                if(data['leave_type'] == 5){
                 $('#LeaveRequestEndDate').val(data['enddate']);
                 $('#LeaveRequestLeaveDays').val(data['leave_days']);
                }
              }
              else
              {
                //disable button 
                alert('Something went wrong!');
              }
            },
            error: function()
            {
              //disable button
              alert('An internal error occured!');
            } 

        });//end of ajax
            
        } else {
            $('#LeaveRequestEndDate').val('');
            $('#LeaveRequestEndDate').css({"background-color":'', "font-style":'', "border-color":''});
        }
    }

    $('#LeavePlanTable').on('click', '#action li', function(e){
        e.preventDefault();
        var id = $(this).children('a').attr('id');
        var act = $(this).children('a').attr('class');
        var href = $(this).children('a').attr('href');
        //alert(href);
        if(act==='delete'){
            deleteRecord( href, id, 'tr'+id );
        }
        if(act==='book'){
            bookRecord( href, id, 'tr'+id );
        }
    });
    
    $('#LeaveRequestRelievers').tokenInput("reliever", {
                searchDelay: 1000,
                minChars: 2,
                tokenLimit: 3,
                //theme: "facebook",
                preventDuplicates: true
    });
    
    $('body').on('click', '#LeaveRequestSave', function(){
        var leave_type = $('#LeaveRequestLeaveTypeId').val();
        var startdate = $('#LeaveRequestStartDate').val();
        var enddate = $('#LeaveRequestEndDate').val();
        var leave_days = $('#LeaveRequestLeaveDays').val();
        var relievers = $('#LeaveRequestRelievers').val();
        if( leave_type > 0 && startdate !== '' && enddate !== '' && leave_days !== '' && relievers !== '' )
        {
            ajax_save('LeaveRequestPlanForm', 'LeavePlanTable');
        }
        else
        {
            alert('Please fill the form');
        }
    });
    
    $('#LeaveRequestPlanForm').bind('blur', function(){
        var leave_type = $('#LeaveRequestLeaveTypeId').val();
        var startdate = $('#LeaveRequestStartDate').val();
        var enddate = $('#LeaveRequestEndDate').val();
        var leave_days = $('#LeaveRequestLeaveDays').val();
        var relievers = $('#LeaveRequestRelievers').val();
        if( leave_type > 0 && startdate !== '' && enddate !== '' && leave_days !== '' && relievers !== '' ){
            $('#LeaveRequestSave').removeAttr('disabled');
        } else {
            $('#LeaveRequestSave').attr('disabled', true);
        }
    });
    
  function deleteRecord(url, id, rowId)
  {
    if(confirm('Are you sure you want to delete this record?'))
    {
      var jqxhr = $.post( url, function(data) {
        if(data['success']===1){
            $("#"+rowId).hide();
            alert(data['alert']);
        //alert(url+' '+id+' '+rowId);
        } else {
            alert(data['alert']);
        }
      },"json")
        .fail(function() {
          alert( "There was an internal error." );
        });
      //});
    }
  }
  function bookRecord(url, id, rowId)
  {
    if(confirm('Are you sure you want to delete this record?'))
    {
      var jqxhr = $.post( url, function(data) {
        if(data['success']===1){
            $("#"+rowId).hide();
           alert(data['alert']);
        } else {
            alert(data['alert']);
        }
      },"json")
        .fail(function() {
          alert( "There was an internal error." );
        });
      //});
    }
  }
//save and update table in one
function ajax_save(form_id, table_id){

      $.ajax({
        type: 'post',
        url: $("#"+form_id).attr('action'),
        data: $('#'+form_id).serialize(),
        dataType: 'json',
        success: function(data, textStatus, jqXHR)
        {
          if(data['success'] === 1)
          {
            if(table_id===''){
            } else {
              var rowCount = $('#'+table_id+' tr').length;
              var row = '<tr id="tr'+data['leave_id']+'"><th>'+rowCount+'</th><td>'+data['startdate']+'</td>'
                        + '<td>'+data['enddate']+'</td>'
                        + '<td>'+data['leave_type']+'</td>'
                        + '<td align="center">'+data['leave_days']+'</td>'
                        + '<td>'
                           +'<ul class="nav nav-pills navbar-right">'
                                +'<li role="presentation" class="dropdown">'
                                  +'<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-label="Actions for item '+data['leave_id']+'">'
                                   +' <span class="glyphicon glyphicon-option-vertical"></span>'
                                  +'</a>'
                                  +'<ul class="dropdown-menu" role="menu" id="action">'
                                   +'<li><li>' 
                                   +'<a href="/erp/leaverequests/book/'+data['leave_id']+'" class="book" id="'+data['leave_id']+'">Book</a></li>'
                                                +'</li></li>'
                                   +'<li class="divider"></li>'
                                   +'<li>'
                                    +'<a href="/erp/leaverequests/delete/'+data['leave_id']+'" class="delete" id="'+data['leave_id']+'">Delete</a></li>'
                                      +'</li>'
                                  +'</ul>';
                                +'</li>'

                              +'</ul>'
                        +'</td></tr>';
              //$('#'+table_id+' > tbody:last').append(row);
              $('#'+table_id+' tr:last').after(row);
              alert(data['alert']);
            }
            $('#'+form_id).trigger('reset');
          }
          else
          {
            alert('Failed to save!');
          }
        },
        error: function()
        {
          alert('An internal error occured!');
        } 
    
    });//end of ajax
}//end of function
//next and previous
var month = [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];
$('#next').click(function(){
    var m = $('#month').val();
    var y = $('#year').val();
    m++;
    if(m==13){
        m = 1;
        y++;
    }
    $('#month').val(m);
    $('#year').val(y);
    $('.lead').html('<b>'+month[m-1]+'</b> '+y);
    var jqxhr = $.post( "/erp/leaverequests/calendar/"+y+'-'+m+'-1', function(data) {
        if(data['success']===1){
            $(".calendar_view").html(data["html"]);
        } else {
            $(".calendar_view").html("Oops! Something went wrong!");
        }
      },"json")
        .fail(function() {
          $(".calendar_view").html( "There was an internal error." );
      });
});
$('#previous').click(function(){
    var m = $('#month').val();
    var y = $('#year').val();
    m--;
    if(m==0){
        m = 12;
        y--;
    }
    $('#month').val(m);
    $('#year').val(y);
    $('.lead').html('<b>'+month[m-1]+'</b> '+y);
    var jqxhr = $.post( "/erp/leaverequests/calendar/"+y+'-'+m+'-1', function(data) {
        if(data['success']===1){
            $(".calendar_view").html(data["html"]);
        } else {
            $(".calendar_view").html("Oops! Something went wrong!");
        }
      },"json")
        .fail(function() {
          $(".calendar_view").html( "There was an internal error." );
      });
});

});
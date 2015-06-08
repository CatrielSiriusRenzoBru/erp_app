<div class="container">
    <div class="col-lg-12">
        <input id="month" value="<?php echo date('n');?>" type="hidden" />
        <input id="year" value="<?php echo date('Y');?>" type="hidden" />
      <h2 class="form-signin-heading">Team Calendar</h2>
      <nav>
        <ul class="pager">
            <li class="previous"><a href="#" id="previous"><span aria-hidden="true">&larr;</span> Previous Month</a></li>
          <li><span class="lead"><?php echo '<b>'.date('F').'</b> '. date('Y'); ?></span></li>
          <li class="next"><a href="#" id="next">Next Month <span aria-hidden="true">&rarr;</span></a></li>
        </ul>
      </nav>
      <div class="calendar_view">
<?php
//data from SQL query
//echo '<pre>';
//print_r($leaves); exit;
$date = date('Y-m-').'01'; //current month the user has selected
$month_id = date('d', strtotime($date));
$totalDays = date('t', strtotime($date));

$mainBody = ''; //init the main body of the calendar
$counter = 0; //use this to make the header blocks generate only once  
foreach($leaves as $r){ //loop once throuth the SQL query
    $year = date('Y', strtotime($date));    //init year for calendar
    $month = date('m', strtotime($date));   //init month for calendar
    $day = date('d', strtotime($date));     //init day for calendar
    //create table headers
    $mainBody .= '<tr><th>'.$r['Employee']['firstname'].' '.$r['Employee']['othernames'].' '.$r['Employee']['lastname'].'</th>'; //print the name of employee on the current leave you are working on
    if($counter === 0){                         //print blank starting cell for 
        $dAlpha = '<th></th>';                  //M T W T F S S block
        $dNum = '<th></th>';                    // 1 2 3 4 5 6 ... 28 or 30 or 31 etc block
    }
    for($i=1; $i<=$totalDays; $i++){            //use only one for block for getting MTWTFSS block, 1234... and calendar body block
        if($counter === 0){                     //check if this is the first time and print headers once
            $nextDay = date('D', mktime(0, 0, 0, $month, $day, $year));
            $css = ( in_array( $nextDay, ['Sat', 'Sun'] ) ) ? ' style="color:grey;background-color:#ddd" ' : '';
            $dAlpha .= '<th '.$css.'>'.  substr($nextDay, 0, 2).'</th>';
            $dNum .= '<th '.$css.'>'.$i.'</th>';
            
        }                                       //end of printing header once
        //do main body below
        $css2 = ' style="background-color:#3b7dba"'; //cumtom css this shouldn't be here better declared in CSS file and class called here
        $nextDate = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year)); //generate each day, this is a php thing you need to find Ruby equivalent Make Time/ Make Date
        if( $nextDate >= $r['LeaveRequest']['start_date'] and $nextDate <= $r['LeaveRequest']['end_date'] ){ //main logic for printing is day is booked no need for all the plenty if blocks in the previous solution
            $mainBody .= '<th '.$css2.'>&nbsp;</th>';                        //print the booked day
        } else {
            $mainBody .= '<th>&nbsp;</th>';                                  //print blank if day is free
        }
        $day++;                                                              //increament day for next day date generation
    }
    $mainBody .= '<tr>';
    $counter++;                                                             //increase counter to prevent duplicating headers
}
$html = '<table class="table table-bordered" style="font-size:10px;"><tr>'.$dAlpha.'</tr><tr>'.$dNum.'</tr>'.$mainBody.'</table>'; //put everything together
echo $html;
?>
      </div>
      
      
      
    </div>
    </div>
<?php
include_once 'classes/db1.php';
require_once 'utils/header.php';
require_once 'utils/styles.php';

$usn = mysqli_real_escape_string($conn, $_POST['usn']);

$sql = "SELECT p.name, e.time, e.date, e.location, ev.event_title
 FROM events ev ,registered r ,participent p ,event_info e
 WHERE e.event_id = r.event_id and r.usn = p.usn and p.usn = '$usn' and ev.event_id = e.event_id";




$result = mysqli_query($conn, $sql);
?> 

<div class = "content">
            <div class = "container">
            <h1> Registered Events</h1>
             <?php
if (mysqli_num_rows($result) > 0) {
?> 
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            
                            <th>Event_name</th>             
                            <th>student_name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>location </th>
                          
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {

                            echo '<tr>';
                            echo '<td>'.$row['event_title'] . '</td>';                    
                            echo '<td>'.$row['name'] . '</td>';
                            echo '<td>'.$row['date'].'</td>';
                            echo '<td>'.$row['time'].'</td>';
                            echo '<td>'.$row['location'].'</td>';
                         
                            echo '</tr>';  

                            $i++;
                        }
                      
                        ?>
                    </tbody>
                </table>
                    <?php }
                    else{
                    echo 'Not Yet Registered any events';
                    
                    }?>
                
               
            </div>
        </div>
        <?php require 'utils/footer.php'; ?>
        <?php
    
        
<?php
if(!isset($_COOKIE['username']))
{
	header('Location: login.php');
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Organizer</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/grid.css">
        <link rel="stylesheet" href="css/style.css">   
        <script src="script.js"></script>
    </head>
    <body>
      <div class="row">           
            <div id="calendar"  class="offset-1 col-7 col-sm-9">
                <div class="header">
                <?php echo(date("F")); ?>
                </div>
                <div>
                    <?php
$currDate = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));

$dt = date_parse("2016-04-12 10:00:00.5");

//var_dump($dt);



switch(date("l")) {
        case 'Monday' : $weekDay = 1;
        case 'Tuesday' : $weekDay = 2;
        case 'Wednesday' : $weekDay = 3;
        case 'Thursday' : $weekDay = 4;
        case 'Friday' : $weekDay = 5;
        case 'Saturday' : $weekDay = 6;
        case 'Sunday' : $weekDay = 7;
}
        
        //var_dump($weekDay);
$monthDay = 1 - (5 - 1);

for ($i = 0; $i < 6; $i++) {
    echo('<div class="row week">');
    for ($j = 0; $j < 7; $j++) {
        
        echo('<section ');
        
        if ($monthDay < 1) {
            echo('class="empty day col-1">');
        } else if($monthDay <= 30) {
           echo('class="day col-1" id="' . $monthDay . '">');          
        } else {
            echo('class="empty day col-1">');
        }            
                 
        echo('</section>');
        $monthDay++;
    }
    echo('</div>');
}

                    ?>
                </div>
            </div>            
       </div>
    </body>
</html>
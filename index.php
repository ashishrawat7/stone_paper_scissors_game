<?php
//**************Ashish Kumar Rawat******
//**************ashish895352@gmail.com 7706064518

$score = array();               //*****declaring the $score array to store the score of 50 iteration****

for($j=0; $j<4; $j++){          //*****initilization of score to 0 in start********
    for($k=0; $k<4; $k++){      //*****initilization of score to 0 in start********
        $score[$j][$k] = 0;     //*****initilization of score to 0 in start********
    }
}

$players = array('1' => '','2' => '', '3' => '','4' => '');
for($i=0; $i<50; $i++){         //*****iteration loop for 50 times*****************
    echo "<h3>Round ".($i+1)." (iteration ".($i+1).")<br></h3>";    //round heading

    $players[0][0] = input();   //*****randon assigning random input (input is custom function)********
    $players[0][1] = input();   //*****randon assigning random input***************
    $players[0][2] = input();   //*****randon assigning random input***************
    $players[0][3] = input();   //*****randon assigning random input***************

    input_table($players[0][0], $players[0][1], $players[0][2], $players[0][3]);    //print the random input of players
    
    for($j=0; $j<4; $j++){      //*****loop process the score of single iteration**
        for($k=0; $k<4; $k++){
            if($j == $k){
                $score[$j][$k] = "-";   //****if same player
            }else if($players[0][$j] == $players[0][$k]){
                $score[$j][$k] = $score[$j][$k] + 0;    //if both player have same input
            }
            else if( ($players[0][$j] == "Paper") && ($players[0][$k] == "Rock")){  
                $score[$j][$k] = $score[$j][$k] + 1;    //if player have Paper oppnant have Rock
            }
            else if( ($players[0][$j] == "Paper") && ($players[0][$k] == "Scissor")){
                $score[$j][$k] = $score[$j][$k] + 0;    //if player have Paper and oppnant have Scissor
            }
            else if( ($players[0][$j] == "Rock") && ($players[0][$k] == "Paper")){
                $score[$j][$k] = $score[$j][$k] + 0;    //if player have Rock and opponant have Paper
            }
            else if( ($players[0][$j] == "Rock") && ($players[0][$k] == "Scissor")){
                $score[$j][$k] = $score[$j][$k] + 1;    //if player have Rock abd opponant have Scissor
            }
            else if( ($players[0][$j] == "Scissor") && ($players[0][$k] == "Rock")){
                $score[$j][$k] = $score[$j][$k] + 0;    //if player have Scissor and opponant have Rock
            }
            else if( ($players[0][$j] == "Scissor") && ($players[0][$k] == "Paper")){
                $score[$j][$k] = $score[$j][$k] + 1;    //if player have Scissor abd opponant have Paper
            }
        }
    }
    output_table($score);   //*****pass the score array variable for print in table format
}

function output_table($score){
    echo "
    <table border='1px solid black' cellspacing=0 cellpadding=5px>
        <tr><td width='70px'>Total</td>
        <td width='70px'></td>
        <td width='70px' colspan='4';>Against</td>
    </tr>

    <tr>
        <td width='70px'></td><td width='70px'></td><td width='100'>Player 1</td> <td width='100'>Player 2</td> <td width='100'>Player 3</td> <td width='100'>Player 4</td> 
    </tr>
    ";
    foreach ($score as $key => $value) {    //*****iterate the score variable to print
        $player_wins_td = "";
        if($key == 0) {$player_wins_td = "<td rowspan=4>Player Wins</td>";} // it condtion will get true for first iteration only
        echo "
            <tr>".$player_wins_td."<td>Player ".($key+1)."</td><td>".$value[0]."</td> <td>".$value[1]."</td> <td>".$value[2]."</td> <td>".$value[3]."</td>
            </tr>
        ";
    }
    echo "</table><br/><br/><br/>";
}


function input_table($player_1, $player_2, $player_3, $player_4){   //******print the output in table format
    echo "
    <table border='1px solid black' cellspacing=0 cellpadding=5px>
        <tr>
            <td width='100'>Player 1</td> <td width='100'>Player 2</td> <td width='100'>Player 3</td> <td width='100'>Player 4</td>
        </tr>
        <tr>
            <td>".$player_1."</td> <td>".$player_2."</td> <td>".$player_3."</td> <td>".$player_4."</td>
        </tr>
    </table>
    <br/><br/></br>
    ";
}

function input(){                   //******This cusome fuction will generate the random input and 
    $random = mt_rand(1, 3);        //******map with corresponding name, 
    if($random == "1"){             //******like 1 = Paper
        return "Paper";             //******2 = Rock
    }else if($random == "2"){       //******3 = Scissor
        return "Rock";
    }else{
        return "Scissor";
    }
}
?>
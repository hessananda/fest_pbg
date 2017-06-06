<?php

function getday($tgl,$sep)
    {
        $sepparator = $sep; //separator. contoh: '-', '/'
        $parts = explode($sepparator, $tgl);
        $d = date("l", mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]));
 
        if ($d=='Monday'){
            return 'Senin';
        }elseif($d=='Tuesday'){
            return 'Selasa';
        }elseif($d=='Wednesday'){
            return 'Rabu';
        }elseif($d=='Thursday'){
            return 'Kamis';
        }elseif($d=='Friday'){
            return 'Jumat';
        }elseif($d=='Saturday'){
            return 'Sabtu';
        }elseif($d=='Sunday'){
            return 'Minggu';
        }else{
            return 'ERROR!';
        }
    }

    ?>
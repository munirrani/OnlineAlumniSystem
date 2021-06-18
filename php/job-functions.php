<?php
function Get($index, $defaultValue) {
    return isset($_GET[$index]) ? $_GET[$index] : $defaultValue;
}

function filterJob(){
    $query="SELECT * FROM job WHERE";
    if(isset($_GET["ser"])){
        $query .= " JOB_TITLE LIKE '%".$_GET["ser"]."%' AND";
    }
    if(isset($_GET["loc"])){
        $query .= " CMP_STATE LIKE '%".$_GET["loc"]."%' AND";
    }
    if(isset($_GET["ms"])){
        $query .= " JOB_SALARY_MIN >= ".$_GET["ms"]."    ";
    }
    if(isset($_GET["ft"]) || isset($_GET["pt"]) || isset($_GET["ct"]) || isset($_GET["in"])){
        $query .= " AND JOB_TYPE IN ('".Get('ft',"")."','".Get('pt',"")."','".Get('ct',"")."','".Get('in',"")."')    ";
    }
    if(isset($_GET["sort"])){
        if($_GET["sort"]=="Date"){
            $query .= " ORDER BY EDIT_DATE DESC    ";
        }
        else{
            $query .= " ORDER BY JOB_TITLE ASC    ";
        }
    }
    $query = substr_replace($query, "", -4);
    $query .=" LIMIT 20";

    return strval("$query");
}

function bookStatus($check_id){
    include("php/db_connect.php");
    $alumni_id = $_SESSION["userid"];
    $result = mysqli_query($conn, "SELECT * FROM bookmark WHERE ALUMNI_ID = $alumni_id AND JOB_ID = $check_id");
    if (mysqli_num_rows($result) == 0) {
        return False;
    } 
    else{
        return True;
    }
}

function timeAgo($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
  
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
  
    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
  
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
  }
?>
<?php
include_once("php/db_connect.php");
?>
<?php
//input search only
//input location only
//input salary only
//input job type only

//input search & location
//input search & salary
//input search & job type
//input location & salary
//input location & job type
//input salary & job type

//input search & location & salary
//input search & location & job type
//input search & salary & job type
//input location & salary & job type

//input search & location & salary & job type

if(isset($_POST['searchBtn'])) {
    $searchtxt = mysqli_real_escape_string($conn, $_POST['searchInput']);
    echo $searchtxt;
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    setcookie("searchtext", $searchtxt, time() + (86400 * 30), "/"); 
    setcookie("location", $location, time() + (86400 * 30), "/"); 
}
else if(isset($_POST['applyJobType'])) {
    $jobType = $_POST['jobType'];
}
else if(isset($_POST['applySalary'])) {
    $salary = mysqli_real_escape_string($conn, $_POST['minSalary']);
    setcookie("salary", $salary, time() + (86400 * 30), "/"); 
}
else if(isset($_POST['sortByDate'])) {
    $sortDate = mysqli_real_escape_string($conn, $_POST['date']);
    setcookie("sortDate", $sortDate, time() + (86400 * 30), "/"); 
}
else if(isset($_POST['sortByAlph'])) {
    $sortAlph=0;
    $sortAlph = mysqli_real_escape_string($conn, $_POST['alph']);
    setcookie("sortAlph", $sortAlp, time() + (86400 * 30), "/"); 
}
/*
while($res3 = mysqli_fetch_array($opt1)){
    $job_title = $res3['JOB_TITLE'];
    echo $job_title."<br>";
}
*/

echo filterJob();

function filterJob(){
    $query="SELECT * FROM job WHERE";
    if(isset($_COOKIE["searchtext"])){
        $query .= " JOB_TITLE LIKE '%$searchtxt%' AND";
    }
    if(isset($_COOKIE["location"])){
        $query .= " CMP_STATE LIKE '%$location%' AND";
    }
    if(isset($_COOKIE["salary"])){
        $query .= " JOB_SALARY_MIN >= '$salary' AND";
    }
    if(isset($_COOKIE["jobType"])){
        $query .= " JOB_TYPE IN (";
        foreach($jobType as $x){
            if(end($jobType)){
                $query .= "'$x'";
            }
            else{
                $query .= "'$x',";
            }
        }
        $query .= ") AND";
    }
    if(isset($_COOKIE["sortDate"])){
        $query .= " ORDER BY POST_DATE DESC AND";
    }
    if(isset($_COOKIE["sortAlph"])){
        $query .= " ORDER BY JOB_TITLE AND";
    }
    substr_replace($query, "", -3);

    return $query;
}
?>
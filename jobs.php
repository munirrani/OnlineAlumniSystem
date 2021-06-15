<?php
include_once("php/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/job.css">
    <title>Jobs | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
    <?php include_once("php/heading.php");
    $alumni_id = $_SESSION["userid"];

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
                $query .= " ORDER BY EDIT_DATE ASC    ";
            }
            else{
                $query .= " ORDER BY JOB_TITLE ASC    ";
            }
        }
        $query = substr_replace($query, "", -4);
    
        return strval("$query");
    }
    ?>
        <div id="jobs-header">
            <div class="container">
                <div class="container">
                    <h1 id="job-heading">JOBS OPPORTUNITY</h1>
                    <p id="job-caption">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                </div>
                <form method="GET" action="jobs.php" autocomplete="off">
                    <div class="search-container">
                        <div class="search-loc mar-5 autocomplete">
                            <input name="loc" type="text" id="myInput" class="form-control" placeholder="Location, State" value="<?php echo Get("loc", "")?>">
                        </div>
                        <div class="search-job mar-5">
                            <input name="ser" type="text" class="form-control" placeholder="Search Job" value="<?php echo Get("ser", "")?>">';
                        
                        </div>
                        <div class="mar-5">
                            <button class="input-group-text" id="basic-addon2-btn" type="submit"><img id="search-img" src="img/search-icon.png"></button>
                        </div>
                    </div>
                    <div class="container">
                    <div class="btn-group mar-5">
                            <button class="btn-secondary btn-sm dropdown-toggle" id="sortDropBtn" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?php 
                                if(isset($_GET["ms"])){
                                    echo "RM ".$_GET["ms"];
                                }
                                else{
                                    echo "Salary";
                                }?>
                            </button>
                            <ul class="dropdown-menu" style="text-align: center;">
                                <div class="slidecontainer">
                                    <label>Minimum Monthly Salary</label>
                                    <p id="MYR">RM <span id="demo"></span></p>
                                    <input name="ms" type="range" min="200" max="20000" value="<?php echo Get("ms", "200")?>" step="100" class="slider" id="myRange">
                                </div>
                                <hr>
                                <div>
                                    <button id="cancelBtn">Cancel</button>
                                    <button name="applySalary" id="applyBtn" type="submit">Apply</button>
                                </div>
                            </ul>
                        </div>
                        <div class="btn-group mar-5">
                            <button class="btn-secondary btn-sm dropdown-toggle" id="sortDropBtn" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Job Type
                            </button>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input name="ft" class="form-check-input" type="checkbox" value="full-time" id="flexCheckDefault" <?php if(isset($_GET["ft"])){echo "checked";}?>>
                                        <label class="form-check-label mx-2 mt-2" for="flexCheckDefault">
                                            Full-time
                                        </label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input name="pt" class="form-check-input" type="checkbox" value="Part-time" id="flexCheckDefault" <?php if(isset($_GET["pt"])){echo "checked";}?>> 
                                        <label class="form-check-label mx-2 mt-2" for="flexCheckDefault">
                                            Part-time
                                        </label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input  name="ct" class="form-check-input" type="checkbox" value="Contract" id="flexCheckDefault" <?php if(isset($_GET["ct"])){echo "checked";}?>> 
                                        <label class="form-check-label mx-2 mt-2" for="flexCheckDefault">
                                            Contract
                                        </label>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="form-check">
                                        <input name="in" class="form-check-input" type="checkbox" value="Internship" id="flexCheckDefault" <?php if(isset($_GET["in"])){echo "checked";}?>> 
                                        <label class="form-check-label mx-2 mt-2" for="flexCheckDefault">
                                            Internship
                                        </label>
                                    </div>
                                </li>
                                <hr>
                                <div>
                                    <button id="cancelBtn">Cancel</button>
                                    <button id="applyBtn" type="submit">Apply</button>
                                </div>
                            </ul>
                        </div>
                        <div class="btn-group mar-5">
                            <div class="mt-2">
                                <p id="sortby"> | &nbsp; Sort By: </p>
                            </div>
                            <div class="btn-group mar-5">
                                <button class="btn-secondary btn-sm dropdown-toggle" id="sortDropBtn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo Get("sort", "Date")?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <button class="dropdown-item" name="sort" value="Date" type="submit">Date</button>
                                    <button class="dropdown-item" name="sort" value="Alphabetically" type="submit">Alphabetically</button>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group mar-5">
                            <div class="btn-group mar-5">
                                <button onclick = "location.href = 'jobs.php';" class="btn btn-secondary btn-sm dropdown-toggle" id="sortDropBtn" type="button" data-bs-toggle="dropdown" aria-expanded="false">Reset filter</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <main>
            <div class="container" style="margin-top: 20px">
                <div id="job-main" class="main-body">
                    <div>
                        <div class="row" id="jobDiv">
                        <?php
                        $result2 = mysqli_query($conn, filterJob());
                        while($res2 = mysqli_fetch_array($result2)){
                            $job_id = $res2['JOB_ID'];
                            $job_title = $res2['JOB_TITLE'];
                            $cmp_logo = $res2['CMP_LOGO'];
                            $cmp_name = $res2['CMP_NAME'];
                            $job_salary_min = $res2['JOB_SALARY_MIN'];
                            $cmp_city = $res2['CMP_CITY'];
                            $cmp_state = $res2['CMP_STATE'];
                            
                            echo '
                            <div class="col-md-6">
                            <div class="row">
                                <h6 id="job-posted">
                                    <img src="img/time.png" width="15px"
                                    style="float: left; margin-right: 5px;" >
                                    Posted 5 days ago
                                </h6>
                            </div>
                            <div class="job-box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md">
                                            <img src="img/'.$cmp_logo.'" class="job-image">
                                            <h6 id="job-name">
                                                '.$job_title.'
                                            </h6>
                                            <h6 id="job-company">
                                                '.$cmp_name.'
                                            </h6>
                                        </div>
                                        <div class="col-md-auto p-0" style="margin: 0px 10px 20px 10px;">
                                            <a href="jobs-details.php?job_id='.$job_id.'"><button type="button" id="viewbutton" class="btn">View</button></a>
                                            <button type="button" id="job-bmark" class="btn" onclick="addBookmark('.$job_id.')"><img id="search-img" src="img/bookmark-icon.png"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4 offset-md-2">
                                            <img src="img/RM.png" width="20px"
                                                style="float: left; margin: 5px 20px 20px 0px;">
                                            <h6 id="job-company">
                                                RM '.$job_salary_min.'
                                            </h6>
                                            <h6 id="job-company">
                                                Monthly salary
                                            </h6>
                                        </div>
                                        <div class="col-md-5">
                                            <img src="img/location.png" width="20px"
                                                style="float: left; margin: 5px 20px 20px 0px;">
                                            <h6 id="job-company">
                                                '.$cmp_city.', '.$cmp_state.'
                                            </h6>
                                            <h6 id="job-company">
                                                Location
                                            </h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>';
                        }
                        ?>
                        </div>
                    </div>
                    <div class="modal fade bd-example-modal-sm" id="dialogModal" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body" style="text-align: center;">
                                    Bookmark added!
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-3">
                        <div class="row justify-content-md-center mx-auto btn-group">
                            <a href="#" class="col page-nav page-nav-text">Previous</a>
                            <a href="#" class="col page-nav page-nav-text">1</a>
                            <a href="#" class="col page-nav page-nav-text">2</a>
                            <a href="#" class="col page-nav page-nav-text">3</a>
                            <a href="#" class="col page-nav page-nav-text">4</a>
                            <a href="#" class="col page-nav page-nav-text">5</a>
                            <a href="#" class="col page-nav page-nav-text">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include_once("php/footer.php")?>
    </div>

    <?php include_once("php/scripts.php")?>
    <script src="assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>

    <script>
        //Add Bookmark to DB
        function addBookmark(job_id) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.open("GET", "job-book-db.php?job_id="+job_id, true);
            xhttp.send();
        }
        // Salary Slider
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value; // Display the default slider value

        // Update the current slider value (each time you drag the slider handle)
        slider.oninput = function () {
            output.innerHTML = this.value;
        }
    </script>
    <script type="text/javascript" src="js/searchLocation.js"></script>
</body>
</html>
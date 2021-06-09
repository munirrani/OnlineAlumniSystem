<?php
include_once("php/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
    <title>Jobs | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
    <?php include_once("php/heading.php");?>
        <div id="jobs-header">
            <div class="container">
                <div class="container">
                    <h1 id="job-heading">JOBS OPPORTUNITY</h1>
                    <p id="job-caption">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                </div>
                <div class="search-container">
                    <div class="search-loc mar-5">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Location</option>
                            <option value="1">Johor</option>
                            <option value="2">Kedah</option>
                            <option value="3">Kelantan</option>
                            <option value="4">Kuala Lumpur</option>
                            <option value="5">Labuan</option>
                            <option value="6">Melaka</option>
                            <option value="7">Negeri Sembilan</option>
                            <option value="8">Pahang</option>
                            <option value="9">Penang</option>
                            <option value="10">Perak</option>
                            <option value="11">Perlis</option>
                            <option value="12">Putrajaya</option>
                            <option value="13">Selangor</option>
                            <option value="14">Sabah</option>
                            <option value="15">Sarawak</option>
                            <option value="16">Terengganu</option>
                          </select>
                    </div>
                    <div class="search-job mar-5">
                        <input type="text" class="form-control" placeholder="Search Job">
                    </div>
                    <div class="mar-5">
                        <a href="jobs.html"><button class="input-group-text" id="basic-addon2-btn"><img id="search-img"
                                src="img/search-icon.png"></button></a>
                    </div>
                </div>
                <div class="container">
                    <div class="btn-group mar-5">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" id="sortDropBtn" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Salary
                        </button>
                        <ul class="dropdown-menu" style="text-align: center;">
                            <div class="slidecontainer">
                                <label>Minimum Monthly Salary</label>
                                <p id="MYR">RM <span id="demo"></span></p>
                                <input type="range" min="200" max="20000" value="200" step="100" class="slider" id="myRange">
                            </div>
                            <hr>
                            <div>
                                <button id="cancelBtn">Cancel</button>
                                <button id="applyBtn">Apply</button>
                            </div>
                        </ul>
                    </div>
                    <div class="btn-group mar-5">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" id="sortDropBtn" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Job Type
                        </button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Full-time
                                    </label>
                                </div>
                            </li>
                            <li class="dropdown-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Part-time
                                    </label>
                                </div>
                            </li>
                            <li class="dropdown-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Contract
                                    </label>
                                </div>
                            </li>
                            <li class="dropdown-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Internship
                                    </label>
                                </div>
                            </li>
                            <hr>
                            <div>
                                <button id="cancelBtn">Cancel</button>
                                <button id="applyBtn">Apply</button>
                            </div>
                        </ul>
                    </div>
                    
                    <div class="btn-group mar-5">
                        <p id="sortby"> | &nbsp; Sort By: </p>
                    </div>
                    <div class="btn-group mar-5">
                        <select id="sortSelected">
                            <option class="sort-content" value="1">Date</option>
                            <option class="sort-content" value="2">Relevance</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <main>
            <div class="container" style="margin-top: 20px">
                <div id="job-main" class="main-body">
                    <div>
                        <div class="row">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM posttest");
                        while($res = mysqli_fetch_array($result)){
                            $test_id = $res['TEST_ID'];
                            $job_id = $res['JOB_ID'];
                            $edit_date = $res['EDIT_DATE'];

                            $result2 = mysqli_query($conn, "SELECT * FROM job WHERE JOB_ID = $job_id");
                            while($res2 = mysqli_fetch_array($result2)){
                                $job_title = $res2['JOB_TITLE'];
                                $job_salary_type = $res2['JOB_SALARY_TYPE'];
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
                                                <a href="jobs-details.php?job_id='.$job_id.'"><button type="button" id="viewbutton"
                                                        class="btn">View</button></a>
                                                <button type="button" id="job-bmark" class="btn bmark-hide-logged" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm"><img id="search-img"
                                                        src="img/bookmark-icon.png"></button>
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
                                                    '.$job_salary_type.' salary
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

    <<?php include_once("php/scripts.php")?>
    <script src="assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script>
        // Salary Slider
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value; // Display the default slider value

        // Update the current slider value (each time you drag the slider handle)
        slider.oninput = function () {
            output.innerHTML = this.value;
        }
        
        
    </script>
    
</body>
</html>
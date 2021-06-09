<?php
include_once("php/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>
    <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
    <title>FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/heading.php");
        
        $job_id = 15;
        $result = mysqli_query($conn, "SELECT * FROM job WHERE JOB_ID = $job_id");

        while($res = mysqli_fetch_array($result)){
            $job_title = $res['JOB_TITLE'];
            $job_desc = $res['JOB_DESCRIPTION'];
            $job_type = $res['JOB_TYPE'];
            $job_qual = $res['JOB_QUALIFICATION'];
            $job_salary_type = $res['JOB_SALARY_TYPE'];
            $job_salary_min = $res['JOB_SALARY_MIN'];
            $job_salary_max = $res['JOB_SALARY_MAX'];
            $job_dateline = $res['JOB_DATELINE'];
            $job_link = $res['JOB_LINK'];
            $cmp_name = $res['CMP_NAME'];
            $cmp_about = $res['CMP_ABOUT'];
            $cmp_logo = $res['CMP_LOGO'];
            $cmp_address = $res['CMP_ADDRESS'];
            $cmp_postal = $res['CMP_POSTAL'];
            $cmp_city = $res['CMP_CITY'];
            $cmp_state = $res['CMP_STATE'];
            $cmp_country = $res['CMP_COUNTRY'];
            $cmp_size_min = $res['CMP_SIZE_MIN'];
            $cmp_size_max = $res['CMP_SIZE_MAX'];
            $cmp_email = $res['CMP_EMAIL'];
            $cmp_website = $res['CMP_WEBSITE'];
        }
        mysqli_close($conn);
        ?>

        <main>
            <div class="container mt-3">
                <div class="main-body">
                    <div class="row gutters=sm">
                        <div class="col-md-3">
                            <div class="shadow-lg" id="details-left-col-body">
                                <div class="d-flex flex-column align-items-center text-center"
                                    id="details-left-col-img">
                                    <img src="img/<?php echo $cmp_logo?>" id="details-image">
                                    <br>
                                    <h5 class="det-strong"><?php echo $cmp_name?></h5>
                                </div>
                                <hr>
                                <div class="pd-20">
                                    <div>
                                        <div class="no-text-wrap">
                                            <h6 class="det-strong"><?php echo $cmp_city.", ".$cmp_state?></h6>
                                            <p id="details-small"><?php echo $cmp_address.", ".$cmp_postal.", ".$cmp_state.", ".$cmp_country?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="no-text-wrap">
                                            <h6 class="det-strong"><?php echo $cmp_size_min.' - '.$cmp_size_max?></h6>
                                            <p id="details-small">Employee</p>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="img/email.png" id="details-left-col-icons">
                                        <div class="no-text-wrap">
                                            <h6 class="det-strong">Email</h6>
                                            <a href="mailto:swift@gmail.com" id="details-link">
                                                <p id="details-small"><?php echo $cmp_email?></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="img/website.png" id="details-left-col-icons">
                                        <div class="no-text-wrap">
                                            <h6 class="det-strong">Website</h6>
                                            <a href="https://www.swift.com/" id="details-link">
                                                <p id="details-small"><?php echo $cmp_website?></p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="pd-20">
                                    <h6>About Company</h6>
                                    <p id="details-small"><?php echo $cmp_about?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        /*
                        $result2 = mysqli_query($conn, "SELECT * FROM posttest WHERE JOB_ID = $job_id");

                        while($res = mysqli_fetch_array($result)){
                            $post_date = $res['POST_DATE'];
                            $edit_date = $res['EDIT_DATE'];
                        }
                        mysqli_close($conn);*/
                        ?>
                        <div class="col-md-9">
                            <div id="details-right-col-body" class="card mb-3">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-9">
                                            <h1><?php echo $job_title?></h1>
                                            <h6 id="details-small">Posted by Admin on 11 Jan 2021</h6>
                                            <h6 id="details-small">Recently edited on 20 Jan 2021</h6>
                                        </div>
                                        <div class="col-md-3">
                                            <?php
                                            if (empty($job_link)){
                                                echo '<a href='.$cmp_website.' <button type="button" id="viewbutton"
                                                    class="btn">Apply</button></a>';
                                            }
                                            else{
                                                echo '<a href='.$job_link.' <button type="button" id="viewbutton"
                                                    class="btn">Apply</button></a>';  
                                            }
                                            ?>
                                            <button type="button" id="job-bmark" class="btn bmark-hide-logged"><img
                                                    id="search-img" src="img/bookmark-icon.png"></button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pl-5 py-3">
                                            <img src="img/RM.png" id="details-right-col-icon">
                                            <div class="no-text-wrap">
                                                <h6 class="det-strong"><?php echo "RM".$job_salary_min." - RM".$job_salary_max?></h6>
                                                <h6 id="details-small">Monthly salary</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-5 py-3">
                                            <img src="img/job.png" id="details-right-col-icon">
                                            <h6 class="det-strong"><?php echo $job_type?></h6>
                                            <h6 id="details-small">Job type</h6>
                                        </div>
                                        <div class="col-md-4 pl-5 py-3">
                                            <img src="img/dateline.png" id="details-right-col-icon">
                                            <div>
                                                <h6 class="det-strong"><?php echo $job_dateline?></h6>
                                                <h6 id="details-small">Application dateline</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <h5>Job Description</h5>
                                        <p><?php echo $job_desc?></p>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <h5>Qualifications</h5>
                                        <dl>
                                            <dt>Professional skills & competencies</dt>
                                            <dd>
                                                <ul>
                                                    <li>Autonomous, driven, with strong ability to quickly adapt and
                                                        respond to change.</li>
                                                    <li>Customer oriented and quality mindset - we continually strive to
                                                        deliver true customer value.</li>
                                                    <li>Open-minded, solutions oriented, and a true team player -
                                                        gaining energy through collaboration with others.</li>
                                                    <li>Fluent in English (spoken and written).</li>
                                                </ul>
                                            </dd>
                                            <dt>Technical skills & knowledge</dt>
                                            <dd>
                                                <ul>
                                                    <li>Experienced full-stack / backend engineer.</li>
                                                    <li>Expertise with Java 8 Programming language and frameworks (e.g.
                                                        Spring, JEE).</li>
                                                    <li>Experience in HTML, CSS, and JavaScript</li>
                                                    <li>Experience in Datastore including data modelling.</li>
                                                    <li>Good command of Linux operating system.</li>
                                                    <li>Familiar with collaboration tools for source code management
                                                        (ie: Git, Bitbucket) and backlog management (ie:Jira,
                                                        Confluence)</li>
                                                    <li>Knowledge of ElasticSearch is a plus.</li>
                                                    <li>Knowledge of continuous delivery process and technologies (e.g.
                                                        Docker, Jenkins, Ansible) is a plus.</li>
                                                </ul>
                                                About the role
Software Engineer Senior Manager

The Software Engineering team delivers next-generation software application enhancements and new products for a changing world. Working at the cutting edge, we design and develop software for platforms, peripherals, applications and diagnostics — all with the most advanced technologies, tools, software engineering methodologies and the collaboration of internal and external partners.

Join us as a Software Engineer Senior Manager on our Engineering Development team in Malaysia to do the best work of your career and make a profound social impact.
What you’ll achieve
As a Senior Software Engineering Manager, you will direct the activities of a software development function for software application enhancements and new products. You will work with internal and external partners on the analysis, design, programming, debugging and modification of computer programs. You will:

Participate in long-range planning and development of operational goals and engineering specifications
Contribute to the modification, development and implementation of company practices and policies that affect subordinate employees
Create schedules and work plans and be accountable for managing a budget
Provide innovative solutions to complex problems and communicate progress toward project/program goals
Liaise with senior management to report on project and program milestones and to present project needs
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include_once("php/footer.php")?>  
    </div>

    <?php include_once("php/scripts.php")?>
</body>
</html>
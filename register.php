<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php") ?>
    <?PHP

    if (isset($_SESSION["userid"])) {
        header("location: index.php");
    }

    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <title>Register | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/heading.php") ?>

        <main>

            <div class="register">
                <div class="row shadow-lg">
                    <div class="col-sm-4 left-col d-flex reg-pic">

                        <img class="" src="img/registeralumnisvg-02.svg" alt="">

                    </div>
                    <div class="col-sm-8 right-col">
                        <div class="container form-reg-container">
                            <div class="row top-reg-text">
                                <h1 class="form-reg-heading">REGISTER</h1>
                                <p class="h5 mb-2">Register your Alumni Account</p>
                                <hr>
                            </div>
                            <div class="row top-reg-text">
                                <p class="h6">Request your registration to be apart of the Faculty Alumni.<br>
                                    Open to all <span style="color: #8f0b89; font-weight: 800;">Faculty of
                                        Computer Science and
                                        Information Technology Alumni</span>.</p>
                            </div>
                            <div class="row mt-3">

                                <form action="request.php" method="POST" onsubmit="return regCheck();">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label class="form-label" for="firstname">First Name</label>
                                            <input class="form-control" id="firstname" type="text" name="firstname" placeholder="" required>
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-label" for="lastname">Last Name</label>
                                            <input class="form-control" type="text" id="lastname" name="lastname" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm">
                                            <label class="form-label" for="age">Age</label>
                                            <div class="input-group">
                                                <input id="age" type="number" name="age" class="form-control" placeholder="" required min="16" max="100">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-label" for="gender">Gender</label>
                                            <div class="input-group">
                                                <select class="form-control" name="gender" id="gender" required>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm">
                                            <label class="form-label" for="enrolYear">Enrol-Year</label>
                                            <div class="input-group">
                                                <input id="enrolYear" class="form-control form-select datepickeryear" placeholder="" name="enrolYear" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-label" for="gradYear">Grad-Year</label>
                                            <div class="input-group">
                                                <input id="gradYear" class="form-control form-select datepickeryear" placeholder="" required name="gradYear" onselect='checkGradYear()'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm">
                                            <label class="form-label" for="username">Username</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input id="username" type="text" name="username" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-label" for="email">Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                                <input id="email" type="email" name="email" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                <input id="password" type="password" name="password" class="form-control" placeholder="" onkeyup='checkpw()' required />
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-label" for="confirmpw">Confirm Password</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                <input id="confirmpw" name="confirmpw" type="password" class="form-control" placeholder="" onkeyup='checkpw()' required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm">
                                            <label class="form-label" for="currentPos">Current Position</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                                <input id="currentPos" type="text" name="currentPos" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-label" for="level">Level</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa fa-level-up"></i></span>
                                                <select class="form-control" id="level" name="level" required>
                                                    <option value="Foundation">Foundation</option>
                                                    <option value="Degree">Degree</option>
                                                    <option value="Master">Master</option>
                                                    <option value="PhD">PHD</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-label" for="department">Department</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                                <select class="form-control" name="department" id="department" required>
                                                    <option value="Software Engineering">Software Engineering</option>
                                                    <option value="Artificial Intelligence">Artificial Intelligence</option>
                                                    <option value="Information System">Information System</option>
                                                    <option value="Multimedia">Multimedia</option>
                                                    <option value="Computer System & Network">Computer SyStem and Network</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm">
                                            <label class="form-label" for="address">Address</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                <input id="address" type="text" name="address" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm">
                                            <label class="form-label" for="postcode">Postcode</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                                <input id="postcode" type="number" name="postcode" class="form-control" placeholder="" min="1" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-label" for="phonenum">Phone Number</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                <input id="phonenum" type="tel" name="phonenum" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm">
                                            <label class="form-label" for="country">Country</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                                <select class="form-control" name="country" id="country" required>
                                                    <option value="Afganistan">Afghanistan</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bonaire">Bonaire</option>
                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter
                                                    </option>
                                                    <option value="Brunei">Brunei</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Canary Islands">Canary Islands</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic
                                                    </option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Channel Islands">Channel Islands</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Christmas Island">Christmas Island</option>
                                                    <option value="Cocos Island">Cocos Island</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Curaco">Curacao</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="East Timor">East Timor</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="French Guiana">French Guiana</option>
                                                    <option value="French Polynesia">French Polynesia</option>
                                                    <option value="French Southern Ter">French Southern Ter</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Great Britain">Great Britain</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Hawaii">Hawaii</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="India">India</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Isle of Man">Isle of Man</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Korea North">Korea North</option>
                                                    <option value="Korea Sout">Korea South</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Laos">Laos</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libya">Libya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macau">Macau</option>
                                                    <option value="Macedonia">Macedonia</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option selected value="Malaysia">Malaysia</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Midway Islands">Midway Islands</option>
                                                    <option value="Moldova">Moldova</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Nambia">Nambia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                    <option value="Nevis">Nevis</option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau Island">Palau Island</option>
                                                    <option value="Palestine">Palestine</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Phillipines">Philippines</option>
                                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Republic of Montenegro">Republic of Montenegro
                                                    </option>
                                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russia">Russia</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                    <option value="St Eustatius">St Eustatius</option>
                                                    <option value="St Helena">St Helena</option>
                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                    <option value="St Lucia">St Lucia</option>
                                                    <option value="St Maarten">St Maarten</option>
                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines
                                                    </option>
                                                    <option value="Saipan">Saipan</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="Samoa American">Samoa American</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Slovakia">Slovakia</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syria">Syria</option>
                                                    <option value="Tahiti">Tahiti</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania">Tanzania</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                                    <option value="United States of America">United States of America
                                                    </option>
                                                    <option value="Uraguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Vatican City State">Vatican City State</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Vietnam">Vietnam</option>
                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                    <option value="Wake Island">Wake Island</option>
                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zaire">Zaire</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-label" for="city">City</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                                <input id="city" type="text" name="city" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-label" for="state">State</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-sign"></i></span>
                                                <input id="state" type="text" name="state" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    



                                    <p class="h4" id="error-text-reg"></p>
                                    <div class="row form-reg-check">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" required>
                                            <label class="form-check-label" for="defaultCheck2">
                                                I agree by all the <a href="#">Terms & Conditions</a> and <a href="#">Policy</a>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row form-reg-submit mt-2">
                                        <button class="submitreg" type="submit">Create Account</button>
                                        <p>Already have an account? <a href="login.php">Log in</a></p>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </main>

        <div class="modal fade" id="login-modal-warning" tabindex="-1" aria-labelledby="warning" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="text-align: center;">
                        <h5 class="modal-title">Warning!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center" style="font-weight: 800;">
                        <?php
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p>Fill in all fields!</p>";
                        } else if ($_GET["error"] == "invalidusername") {
                            echo "<p>Choose a proper username!</p>";
                        } else if ($_GET["error"] == "invalidemail") {
                            echo "<p>Choose a proper email!</p>";
                        } else if ($_GET["error"] == "passwordsdontmatch") {
                            echo "<p>Password doesn't match with confirm password!</p>";
                        } else if ($_GET["error"] == "stmtfailed") {
                            echo "<p>Something went wrong, try again!</p>";
                        } else if ($_GET["error"] == "usernametaken") {
                            echo "<p>Username or Email is already taken!</p>";
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="login-warning-modal-button" class="btn" data-bs-dismiss="modal">Okay</button>
                        <!-- <button type="button" class="btn btn-primary btn-danger">Okay</button> -->
                    </div>
                </div>
            </div>
        </div>


        <?php include_once("php/footer.php") ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/register.js"></script>
    <script type="text/javascript">
        $(".datepickeryear").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true,
        });
    </script>
    <?php
    if (isset($_GET["error"])) {
        echo "<script type='text/javascript'>
          $(document).ready(function(){
          $('#login-modal-warning').modal('show');
          });
          </script>";
    }
    ?>

</body>

</html>


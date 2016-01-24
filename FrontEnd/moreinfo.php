<?php include_once("navbar.php") ?>

<!DOCTYPE html>
<html>
<head>
</head>

<body class="blue-grey darken-4">
<div class="container">
    <div class="row animated fadeInUp">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card white darken-1">
                <div class="card-content">
                    <span class="card-title black-text">Tell us a little more about yourself!</span>

                    <form class="col-md-12" id="register-form" action="scripts/processmoreinfo.php"
                          enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="input-field col-md-6">
                                <input id="phone" type="text" class="validate text-black" name="phone">
                                <label for="phone">Phone number</label>
                            </div>
                            <div class="input-field col-md-6">
                                <input id="skills" type="text" class="validate text-black" name="skills">
                                <label for="skills">Your skills (separate with commas): </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col-md-12">
                                <input id="location" type="text" class="validate text-black" name="location">
                                <label for="location">Where do you live?</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col-md-12">
                                <input id="linkedin" type="text" class="validate text-black" name="linkedin">
                                <label for="linkedin">What's your linkedin url?</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col-md-12">
                                <input id="portfolio" type="text" class="validate text-black" name="portfolio">
                                <label for="portfolio">Link to your portfolio:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col-md-12">
                                <input id="resume" type="text" class="validate text-black" name="resume">
                                <label for="resume">Link to your resume:</label>
                            </div>
                        </div>




                </div>
                <div class="card-action text-right">
                    <button type="submit" name="submit" class="btn btn-success waves-effect waves-light" href="profile.php">Submit</button>
                </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
</body>
</html>
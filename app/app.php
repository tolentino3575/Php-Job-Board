<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/jobs.php";

    $app = new Silex\Application();
    $app['debug']=true;

    $app->get("/", function() {
        return "<!DOCTYPE html>
        <html>
            <head>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' crossorigin='anonymous'>
                <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js' integrity='sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS' crossorigin='anonymous'></script>
                <title>Job Board</title>
            </head>
            <body>
                <div class='container'>
                    <h1>Job Board!</h1>
                    <form action='/jobs_output'>
                        <div class='form-group'>
                            <label for='title'>Job Title</label>
                            <input id='title' name='title' type='text' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label for='desc'>Job Description</label>
                            <input id='desc' name='desc' type='text' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label for='title'>Contact Info</label>
                            <input id='contact' name='contact' type='text' class='form-control'>
                        </div>
                    <button type='submit' class='btn btn-danger'>CLICK</button>
                    </form>
                </div>
            </body>
        </html>
        ";
    });




    $app->get('/jobs_output', function() {
        $title = $_GET['title'];
        $description = $_GET['desc'];
        $contact = $_GET['contact'];

        $new_job = new Jobs();

        $jobs = array($new_job);
        $output = "";
        if (!empty($jobs)){
                $output = $output . "
                $title
                $description
                $contact
                ";
            }

        return $output;
        var_dump($jobs);
    });
        return $app;

?>

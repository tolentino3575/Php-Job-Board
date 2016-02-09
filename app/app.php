<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/jobs.php";
    require_once __DIR__."/../src/contacts.php";

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
                            <label for='title'>Name</label>
                            <input id='name' name='name' type='text' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label for='title'>Email</label>
                            <input id='email' name='email' type='text' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label for='title'>Phone</label>
                            <input id='phone' name='phone' type='text' class='form-control'>
                        </div>
                    <button type='submit' class='btn btn-danger'>CLICK</button>
                    </form>
                </div>
            </body>
        </html>
        ";
    });




    $app->get('/jobs_output', function() {


        // $contacts= array($new_form);
        // foreach ($contacts as $contact) {
        //     $new_name = $contact->getName();
        //     $new_email = $contact->getEmail();
        //     $new_phone = $contact->getPhone();
        // }
        $new_contact_person = new Contact($_GET['name'], $_GET['email'], $_GET['phone']);
        $new_job = new Job($_GET['title'], $_GET['desc'], $new_contact_person);
        $contactArr = $new_job->getContact();
        // $new_name = $contactArr->getName();
        // $new_email = $contactArr->getEmail();
        // $new_phone = $contactArr->getPhone();

        $jobs = array($new_job);
        $output = "";
        if (!empty($jobs)){
            foreach ($jobs as $job) {

                $output = $output .
                "<head>" . "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' crossorigin='anonymous'>" . "</head>" . "<body>" . "<div class='container'>" .
                "<h1>" . "Job board" . "</h1>" .
                "<ul>" .
                "<li>" . $job->getTitle() . "</li>" .
                "<li>" . $job->getDescription() . "</li>" .
                "<li>" . $contactArr->getName() . "</li>" .
                "<li>" . $contactArr->getEmail() . "</li>" .
                "<li>" . $contactArr->getPhone() . "</li>" .
                "</ul>" . "</div>" . "</body>"
                ;
            }
                return $output;
        }


    });
        return $app;


?>

<?php

    $error = "";

    if ($_POST) {

        if (!$_POST["email"]) {

            $error .= "An email address is required.<br>";
            $email = "";


        } else {
            
            $email = $_POST["email"];
            
            if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {

                $error .= "The email address is invalid.<br>";
                
            }
            
        }

        if (!$_POST["subject"]) {

            $error .= "A subject is required.<br>";
            $subject = "";

        } else {
            
            $subject = $_POST["subject"];
            
        }

        if (!$_POST["message"]) {

            $error .= "A message is required.<br>";
            $message = "";

        } else {
            
            $message = $_POST["message"];
            
        }


        if ($error != "") {

            $error = "<div class='alert alert-danger' role='alert'>" . $error . "</div>";
            

        } else {


            $mailTo = "angusdmacrae@gmail.com";
            $headers = "From: ".$email;

            if (mail($mailTo, $subject, $message, $headers)) {

                $error = "<div class='alert alert-success' role='alert'>Message sent successfully!</div>";
                $email = "";
                $subject = "";
                $message = "";                

            } else {

                $error = "<div class='alert alert-danger' role='alert'>Message did not send - a problem occurred.</div>";

            }

        }

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h2>Get in touch!</h2>
        <?php echo $error ?>
        
        <form method="post">
            <div class="form-group">
                <label for="emailInput">Email address</label>
                <input type="email" class="form-control" name="email" id="emailInput" aria-describedby="emailHelp" value="<?php echo $email; ?>">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="subjectInput">Subject</label>
                <input type="text" class="form-control" name="subject" id="subjectInput" value="<?php echo $subject; ?>">
            </div>
            <div class="form-group">
                <label for="msgInput">Message</label>
                <textarea class="form-control" name="message" id="msgInput"><?php echo $message; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>

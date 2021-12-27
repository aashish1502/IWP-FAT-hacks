<?php
    //Message vars
    $msg='';
    $msgClass='';
    //Check for Submit
    if(filter_has_var(INPUT_POST,'submit')){
        // Get form data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message =  htmlspecialchars($_POST['message']);

        // Check reqd. fields
        if (!empty($email) && !empty($name) && !empty($message)) {
            # passed
            //Check email
            if (filter_var($email,FILTER_VALIDATE_EMAIL)===false) {
                $msg = 'Please fill valid email';
                $msgClass = 'alert-danger';
            }else{
                ini_set('SMTP','localhost');
                ini_set('smtp_port',25);
                $toEmail = 'XYZ@gmail.com';
                $subject = 'Feedback Form from'.$name;
                $body = '<h2>Feedback form</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Message</h4><p>'.$message.'</p>';

                //Email Headers
                $headers = "MIME-Version 1.0"."\r\n";
                $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";

                //Additional Headers
                $headers .= "From: " .$name."<".$email.">"."\r\n";
                mail($toEmail, $subject, $body, $headers);
                if (mail($toEmail, $subject, $body, $headers)) {
                    # code...
                    $msg = 'Your feedback was sent';
                    $msgClass = 'alert-success';
                }
                else {
                    # code...
                    $msg = 'We couldn\'t sent your feedback';
                    $msgClass = 'alert-danger';
                }
            }
        } else {
            # failed
            $msg = 'Please fill in all fields';
            $msgClass = 'alert-danger';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>
        <link rel="stylesheet" href="./bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Contact Page</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <?php if($msg != ''): ?>
                <div class="alert <?php echo $msgClass; ?>">
                    <?php echo $msg;?>
                </div>
            <?php endif; ?>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <div class="form-group">
                    <label for="name" class="form-label mt-4">Name</label>
                    <input type="text" class="form-control" id="name" name='name' placeholder="Enter name" value="<?php echo isset($_POST['name'])?$name:'';?>">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label mt-4">Email address</label>
                    <input type="email" class="form-control" id="email" name='email' placeholder="Enter email" value="<?php echo isset($_POST['email'])?$email:'';?>">
                </div>
                <div class="form-group">
                    <label for="message" class="form-label mt-4">Comments</label>
                    <textarea class="form-control" id="message" name='message' rows="3"><?php echo isset($_POST['message'])?$message:'';?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </body>
</html>
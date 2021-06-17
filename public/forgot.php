<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once __DIR__ . '/lib/lib-plugins.php'; ?> 
</head>
<body>
    <section id="wrapper" class="new-login-register">
        <div class="lg-info-panel">
            <div class="inner-panel"></div>
        </div>
        <div class="new-login-box">
            <div class="white-box">
                <form class="form-horizontal new-lg-form" id="loginform" action="forgot" method="post">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" required="" placeholder="Email" name="email-reset" required="" />
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="reset">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

<?php
    if (isset($_POST['reset'])) {
        include "phpmailer/classes/class.phpmailer.php";
        //define(LIB_DIR, './lib/');
        //require_once(LIB_DIR . 'config.php');
		
		require_once(__DIR__.'/lib/config.php');
        
        $email_reset = $_POST['email-reset'];
        $sql = "SELECT * FROM user WHERE us_email='$email_reset'";
        $query = $conn->query($sql);
        $data = $query->fetch(PDO::FETCH_OBJ);
        $check = $query->rowCount();
        if ($check >= 1) 
        {
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->SMTPSecure = "ssl";
            $mail->Host = "smtp.gmail.com"; //hostname masing-masing provider email
            $mail->SMTPDebug = 0;
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = "admin@bambini.sch.id"; //user email
            $mail->Password = "adminbambin1."; //password email
            $mail->SetFrom("admin@bambini.sch.id","Admin"); //set email pengirim
            $mail->Subject = "Reset Password"; //subyek email
            $mail->AddAddress($data->us_email, $data->us_username); //tujuan email
            $mail->MsgHTML("
            <p>
                Dear ".$data->us_email.",
                <br><br>
                Recently a request was submitted to reset your password.<br> 
                If you did not request this, please ignore this email.<br>
                To reset your password, please click the url below: <br>
                http://bambini.sch.id/webadmin/reset/".$data->us_password."
                <br><br>
                Thankyou
            </p>
            ");
                
    		//send the message, check for errors
    		if ($mail->Send()) {
    		    echo "<script type='text/javascript'>alert('Email successfully sent')</script>";
    		} else {
    		    echo "<script type='text/javascript'>alert('Email failed to send!')</script>";
    		}
    			
        }
        else{
            echo "<script type='text/javascript'>alert('Sorry, email that you entered is not registered.')</script>";
        }
    }
?>

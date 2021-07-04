<?php
    
    if(isset($_POST['g-recaptcha-response'])) {

        //recaptha back-end validation
        $secretkey = "<SECRET KEY>"; // ******** enter your secret key
        $token = $_POST['g-recaptcha-response'];
        
        $ip = $_SERVER["REMOTE_ADDR"];
  
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secretkey."&response=".$token."&remoteip=".$ip;
  
        $request = file_get_contents($url);
  
        $response = json_decode($request);
  
        if($response->success) {
            echo "reCAPTCHA success";
        } else {
            echo "reCAPTCHA unsuccess";
        }

    }

?>

<html>
  <head>
    <title>reCAPTCHA V2 demo</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <form action="?" method="POST">
      <div class="g-recaptcha" data-theme="dark" data-sitekey="<SITE KEY>"></div> <!-- ******** enter your site key -->
      <br/>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>
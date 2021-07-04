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
    <title>reCAPTCHA V3 demo</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
  </head>
  <body>
    <form action="?" method="POST" id="demo-form">
      <br/>
      <button class="g-recaptcha" 
        data-sitekey="<SITE KEY>" 
        data-callback='onSubmit' 
        data-action='submit'>Submit</button> <!-- ******** enter your site key -->
    </form>

    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>

  </body>
</html>
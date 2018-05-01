<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <?php 
            date_default_timezone_set('Asia/Kolkata');
            if( isset($data->test_start) ){
               $dbTdateTime = date('Y-m-d H:i:s',strtotime($data->test_start));

            }else{
                $dbTdateTime =date('Y-m-d H:i:s', time());
            }
            
            echo $dbTdateTime;
            
         ?>
            <script>
            var dbdate = "<?php echo $dbTdateTime; ?>";
            // Set the date we're counting down to
            var countDownDate = new Date(dbdate).getTime();
            // Update the count down every 1 second
            var x = setInterval(function() {
            // Get todays date and time
            var now = new Date().getTime();
            // Find the distance between now an the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = hours + ": "
            + minutes + ": " + seconds;
            // If the count down is finished, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "YOUR TEST TIME IS EXPIRED! " + hours + ": "
            + minutes + ": " + seconds;
            }
            }, 1000);
            </script>
    </head> 
    <body>
        <div class="container" style="background-color: aquamarine; width: 80%;padding: 10%; height: 100%">
            <h3 centerd>Hello Candidate,</h3>
            <div class="container" style="">
            <h2 id="demo" style="color:red;font;"></h2>
                <ul class="list-group">
                    <li class="list-group-item">
                       
                        <span style="color:red;"><b>Login API </b></span><br><br>
                        <p>
                            <span style="color:red">Method: </span> POST, <br>
                            <span style="color:red">Url: </span> http://reactjstest.sumhr.com/api/login, <br>
                            <span style="color:red">Header: </span> <br>
                            Content-Type: application/json <br>
                            Authorization: "Bearer {your token}" <br>
                            <span style="color:red">Body: </span> <br>
                            email: test@test.com <br>
                            password: **** <br>
                            <span style="color:red">Response: </span> <br>
                            {
                                "status": "success",
                                "message": "",
                                "data": {
                                    "token":"access_token"
                                }
                            }

                        </p>
                    </li>
                    <li class="list-group-item">
                        <span style="color:red;"><b>Test Data API </b></span><br><br>
                        <p>
                            <span style="color:red">Method: </span> GET, <br>
                            <span style="color:red">Url: </span> http://reactjstest.sumhr.com/api/testdata, <br>
                            <span style="color:red">Header: </span> <br>
                            Content-Type: application/json <br>
                            Authorization: "Bearer {access_token}" <br>
                            <span style="color:red">Body: </span> <br>
                            <span style="color:red">Response: </span> <br>
                            "status": "success",
                            "data": [
                                {
                                    "id": 1,
                                    "name": "saurabh",
                                    "mobile": "9856565656",
                                    "address": "pune"
                                }
                            }

                        </p>
                    </li>
                    <li class="list-group-item">
                        <span style="color:red;"><b>Test Description API </b></span><br><br>
                        <p>
                            <span style="color:red">Method: </span> GET, <br>
                            <span style="color:red">Url: </span> http://reactjstest.sumhr.com/api/testdatadescription/{!!$data->id!!}, <br>
                            <span style="color:red">Header: </span> <br>
                            Content-Type: application/json <br>
                            Authorization: "Bearer {access_token}" <br>
                            <span style="color:red">Body: </span> <br>
                            <span style="color:red">Response: </span> <br>
                            {
                                "status": "success",
                                "data": [
                                    {
                                        "id": 1,
                                        "description": "Hi i am saurabh, i am from pune"
                                    }
                                ]
                            }
                        </p>
                    </li>
                    
                </ul>
            </div>
        </div>
    </body>
</html>

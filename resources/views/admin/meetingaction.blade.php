<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.adminheader')
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../meetingassets/css/bootstrap.min.css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="css/index.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="../meetingassets/css/style.css" />
</head>
<body style="padding-top: 3.5rem;">
    <style>
        .header_section {
            position: fixed;
            top: -28px;
            width: 100%;
            z-index: 1000;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
        }
        .jumbotron {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem;
        }
        .new-meeting {
            background-color: #6c757d; /* Grey color */
        }
        .signin-image {
    max-width: 68%; /* Set maximum width to 50% of its container */
    height: auto; /* Maintain aspect ratio */
    margin: 80px auto; /* Center horizontally with top/bottom margin */
    display: block; /* Ensures that margin auto works for centering */
}
    </style>
    <main>
        <div class="jumbotron h-100">
            <div class="container w-50">
                <h1 style="font-size: 3rem;">Join meeting </h1>
                <ul class="display-center justify-content-start">
                    <li style="padding: 0;">
                        <button class="btn btn-lg text-light font-weight-bold display-center new-meeting"><span class="material-icons mr-2">video_call</span>New Meeting</button>
                    </li>
                    <li class="pl-3">
                        <button class="btn btn-lg btn-outline-secondary text-dark font-weight-bold display-center"><span class="material-icons mr-2">keyboard</span><input type="text" placeholder="Enter a code" style="border: none;" class="enter-code"></button>
                    </li>
                    <li class="text-dark font-weight-bold cursor-pointer pl-2 join-action">Join</li>
                </ul>
            </div>
            <div class="flex-container">
    <img src="../meetingassets/images/google-meet-people.jpg" alt="" class="signin-image">
</div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function(){
            $(document).on("click", ".join-action", function(){
                var join_value = $('.enter-code').val();
                var meetingUrl = window.location.origin + "/meetingindex?meetingID=" + join_value;
                window.location.replace(meetingUrl);
            });
            $(document).on("click", ".new-meeting", function(){
               var eight_d_value = Math.floor(Math.random()*100000000);
               var meetingUrl = window.location.origin+"/meetingindex?meetingID="+eight_d_value;
               window.location.replace(meetingUrl);
            });
        });
    </script>
</body>
</html>
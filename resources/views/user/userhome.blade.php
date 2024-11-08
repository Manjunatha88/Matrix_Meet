<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
       
    </x-slot>

    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <title>Our Services</title>
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Our <span>Services</span></h2>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-4" id="joinMeeting">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="" class="option1">Join Meeting</a>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="images/p1.jpeg" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>Join Meeting</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4" id="createMeeting">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="" class="option1">Create Meeting</a>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="images/p2.jpeg" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>Create Meeting</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4" id="scheduleMeeting">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="" class="option1">Schedule Meeting</a>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="images/p3.jpeg" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>Schedule Meeting</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4" id="assignMeeting">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="" class="option1">Assign Meeting</a>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="images/p4.jpeg" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>Assign Meeting</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4" id="recordMeeting">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="" class="option1">Record Meeting</a>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="images/p5.jpeg" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>Recording Meeting</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4" id="upcomingMeetings">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="" class="option1">Upcoming Meetings</a>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="images/p6.jpeg" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>Upcoming Meetings</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-box">
            <a href="">View All products</a>
        </div>
    </div>
    @include('home.footer')
</x-app-layout>

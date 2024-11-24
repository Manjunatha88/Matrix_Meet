<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 text-section">
                <div class="content">
                    <h1>Welcome to Matrix Meet</h1>
                    <h2>Connect and collaborate with ease.</h2>
                </div>
            </div>
            <div class="col-md-4 right-side">
                <div class="gallery-container" style="margin-top: 110px;">
                    <div class="gallery">
                        <div class="gallery-item">
                            <img src="images/d1.png" alt="Meeting Image 1">
                            <p class="caption">Meeting Image 1</p>
                        </div>
                        <div class="gallery-item">
                            <img src="images/d2.png" alt="Meeting Image 2">
                            <p class="caption">Meeting Image 2</p>
                        </div>
                        <div class="gallery-item">
                            <img src="images/d3.png" alt="Meeting Image 3">
                            <p class="caption">Meeting Image 3</p>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Section Below Gallery -->
                <section class="dashboard">
                    <h2>Dashboard Overview</h2>
                    <div class="button-container">
                        <!-- Top Buttons -->
                        <div class="button-row">
            <a href="http://127.0.0.1:3000/action.html" class="btn btn-secondary">Start Meeting</a>
            <a href="http://127.0.0.1:3000/action.html" class="btn btn-secondary">Join Meeting</a>
        </div>
        <!-- Bottom Buttons -->
        <div class="button-row">
            <a href="{{ url('viewfaculty') }}" class="btn btn-secondary">Add Faculty</a>
            <a href="{{ url('showfaculty') }}" class="btn btn-secondary">Faculty Details</a>
        </div>
                    </div>
                </section>

            </div>
        </div>

        <!-- Additional Info Section -->
        <section class="additional-info">
            <!-- Dashboard Section Below Gallery -->
<section class="dashboard">
    <h3>Dashboard</h3>
    <div class="statistics">
        <div class="stat">
            <a href="http://127.0.0.1:3000/action.html" class="button"><h4>Join Meetings</h4></a>
        </div>
        <div class="stat">
            <a href="#" class="button"><h4>Upcoming Meetings</h4></a>
        </div>
        <div class="stat">
            <a href="{{url('notification')}}" class="button"><h4>Messages</h4></a>
        </div>
        <div class="stat">
            <a href="#" class="button"><h4>Notification</h4></a>
        </div>
    </div>
</section>
<section class="additional-info">
    <div class="info-container">
        <div id="meeting-history" class="card">
            <h3>Meeting History</h3>
            <table id="history-table">
                <thead>
                    <tr>
                        <th>Meeting Date</th>
                        <th>Time</th>
                        <th>Participants</th>
                        <th>Meeting Title</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-06-05</td>
                        <td>10:00 AM</td>
                        <td>SIMATS, HINDUSTHAN</td>
                        <td>Project AICTE</td>
                    </tr>
                    <tr>
                        <td>2024-06-08</td>
                        <td>2:00 PM</td>
                        <td>SCON, SSE</td>
                        <td>Progress Update For Module</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="about-us" class="card">
            <h3>About Us</h3>
            <p>Welcome to Matrix Meet, the leading online meeting platform endorsed by educational institutions and government ministries. Our secure, user-friendly interface ensures seamless collaboration, enabling effortless communication and productivity for educators, administrators, and students worldwide.</p>
        </div>
    </div>
</section>
        </section>

    </div>

    <style>
        .dashboard {
    background-color: #f8f9fa; /* Light grey background */
    padding: 40px 20px; /* Padding around the section */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    text-align: center; /* Center align text */
    margin-top: 20px; /* Space above dashboard section */
}

.statistics {
    display: flex; /* Use flexbox for alignment */
    justify-content: space-around; /* Evenly distribute space between buttons */
    align-items: center; /* Center items vertically */
    margin-top: 20px; /* Space above statistics section */
}

.stat {
    flex: 1; /* Allow each stat to grow equally */
    margin: 0 10px; /* Space between each button */
}

.button {
    display: inline-block; /* Inline block for button styling */
    padding: 15px 30px; /* Padding for button size */
    font-size: 16px; /* Font size for button text */
    border-radius: 5px; /* Rounded corners for buttons */
    color: white; /* White text color */
    text-decoration: none; /* Remove underline from links */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transitions for hover effects */
}



.button h4 {
    margin: 0; /* Remove default margin from heading inside button */
}
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .container-fluid {
            height: auto; /* Allow height to adjust based on content */
        }

        .row {
            display: flex;
            height: 100vh; /* Full viewport height */
        }

        .text-section {
    background: url('images/m1-bg.png') no-repeat center center;
    background-size: cover;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 20px;
    border-radius: 20px; /* Rounded edges */
    overflow: hidden; /* Clipping overflow */
}

        .content {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }

        .right-side {
            display: flex;
            flex-direction: column; /* Stack items vertically */
            align-items: flex-start; /* Align items to start */
            padding-left: 20px; /* Space from left */
        }

        .gallery-container {
            width: 300px; /* Fixed width for gallery */
            border-radius: 15px; /* Rounded corners for the gallery container */
            overflow: hidden; /* Hides overflow */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Shadow for depth effect */
            margin-left: 30px;
        }

        .gallery {
            display: flex; /* Flex display for gallery items */
            transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .gallery-item {
            position: relative; /* Positioning for captions */
            min-width: 300px; /* Minimum width for items */
        }

        .gallery img {
            width: 100%; /* Responsive image width */
            height: auto; /* Maintain aspect ratio */
            border-radius: 15px; /* Rounded corners for images */
        }

        .caption {
    position: absolute; /* Absolute positioning for captions */
    bottom: 0; /* Positioning at the bottom of the image */
    left: 50%; /* Center horizontally */
    transform: translateX(-50%); /* Adjust to center */
    width: calc(100% - 30px); /* Full width minus padding */
    background: rgba(0, 0, 0, 0.6); /* Semi-transparent background */
    color: white; /* White text color */
    padding: 10px; /* Padding around caption */
    border-radius: 10px; /* Rounded corners for caption background */
    text-align: center; /* Center align text */
}

        .dashboard {
            background-color: #f8f9fa; /* Light grey background */
            padding: 40px 20px; /* Padding around the section */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            text-align: center; /* Center align text */
            margin-top: 20px; /* Space above dashboard section */
        }

        .button-container {
           display: flex;
           flex-direction: column; 
           align-items: center; 
           gap: 20px; 
           margin-top: 20px; 
       }

       .button-row {
           display: flex;
           justify-content: center;
           gap: 20px;
       }

       .btn {
           padding: 10px 0; 
           font-size: 16px; 
           border-radius: 5px; 
           cursor: pointer; 
           transition: background-color 0.3s ease; 
           width: 150px;
       }

       .btn-primary {
          background-color: #007bff; 
          color: white; 
      }

      .btn-secondary {
          background-color: #6c757d; 
          color: white; 
      }

      

      .btn:hover {
          opacity: 0.9; 
      }

       .additional-info {
           padding-top: 40px; 
       }

       .additional-info h2 {
           text-align: center; 
       }

       .additional-info ul {
          list-style-type: none;
          padding-left: 0;
          text-align:center;
      }
    </style>

    <script>
    const gallery = document.querySelector('.gallery');
    let scrollAmount = 0;
    const scrollStep = 300;

    function scrollGallery() {
       if (scrollAmount < gallery.scrollWidth - gallery.clientWidth) {
           scrollAmount += scrollStep;
       } else {
           scrollAmount = 0;
       }
       gallery.style.transform = `translateX(-${scrollAmount}px)`;
    }

    setInterval(scrollGallery, 2500);
    </script>

</body>
</html>
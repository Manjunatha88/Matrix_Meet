<div class="container-fluid">
        <div class="row">
            <div class="col-md-8 text-section">
                <div class="content">
                    <h1>Welcome to Matrix Meet</h1>
                    <h2>Connect to institutes - Ministry panel</h2>
                </div>
            </div>
<div class="main-content">
<title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="dashboard" class="card">
        <h3>Dashboard</h3>
        <div class="statistics">
            <div class="stat">
                <a href="{{url('meetinghistory')}}" class="button"><h4>Today Meetings</h4></a>
            </div>
            <div class="stat">
                <a href="{{url('meetinghistory')}}" class="button"><h4>Upcoming Meetings</h4></a>
            </div>
            <div class="stat">
                <a href="{{url('notification')}}" class="button"><h4>Messages</h4></a>
                
            </div>
        </div>
    </div>


        <!-- <div id="message" class="card">
        <h3>Send Message</h3>
        Table to show institution details with selection option and message input
        <table class="data-table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>Institution ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Contact Person</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="selectInstitution"></td>
                    <td>101</td>
                    <td>Institution A</td>
                    <td>New York</td>
                    <td>John Doe</td>
                    <td><textarea class="messageInput"></textarea></td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="selectInstitution"></td>
                    <td>102</td>
                    <td>Institution B</td>
                    <td>Los Angeles</td>
                    <td>Jane Smith</td>
                    <td><textarea class="messageInput"></textarea></td>
                </tr>
            </tbody>
        </table> -->

        <!-- Button to send messages via notification -->
        <!-- <button id="sendNotificationBtn" class="btn btn-primary">Send Message</button>
    </div>
    <div id="inbox" class="card">
        <h3>Inbox</h3> -->

        <!-- Message content -->
        <!-- <div class="message">
            <p>You have a new message regarding meeting recordings.</p>
             -->
            <!-- Button container to align buttons at the end -->
            <!-- <div class="button-container">
                <button class="btn btn-success">Accept</button>
                <button class="btn btn-danger">Decline</button>
            </div>
        </div> -->
        <!-- More messages as needed
    </div>
    </div> -->



    <div id="meetings" class="card">
        <h3>Meeting Services</h3>
        <style>
            .layout_padding {
    padding: 1px;
}
        </style>
       <section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
      </div>
      <div class="row">
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <a href="http://127.0.0.1:3000/action.html" style="text-decoration: none; color: black">
                  <div class="img-box">
                     <img src="images/p1.jpeg" alt="">
                  </div>
                  <div class="detail-box">
                     <h5>
                        Join Meeting
                     </h5>
                  </div>
               </a>
            </div>
         </div>
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <a href="http://127.0.0.1:3000/action.html" style="text-decoration: none; color: black !important;">
                  <div class="img-box">
                     <img src="images/p2.jpeg" alt="">
                  </div>
                  <div class="detail-box">
                     <h5>
                        Create Meeting
                     </h5>
                  </div>
               </a>
            </div>
         </div>
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <a href="{{url('viewschedule')}}" style="text-decoration: none; color: black !important;1">
                  <div class="img-box">
                     <img src="images/p3.jpeg" alt="">
                  </div>
                  <div class="detail-box">
                     <h5>
                        Schedule Meeting
                     </h5>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- 
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
            Dynamic content will be inserted here
        </tbody>
    </table> -->
    </div>
    <div id="about-us" class="card">
        <h3>About Us</h3>
        <p>Welcome to Matrix Meet, the leading online meeting platform endorsed by educational institutions and government ministries. Our secure, user-friendly interface ensures seamless collaboration, enabling effortless communication and productivity for educators, administrators, and students worldwide.</p>
    </div>
</div>


<style>
.container-fluid {
    height: 100vh;
    padding: 0;
    margin: 0;
}

.row {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
}

.text-section {
    background: url('images/m1-bg.png') no-repeat center center;
    background-size: cover;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 258px;
    margin-top: 28px;
    height: 80%;
    width: 80%;
    text-align: center;
    padding: 20px;
    border-radius: 20px; /* Adjust this value as needed */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: adds a subtle shadow */
}

.content {
    background: rgba(0, 0, 0, 0.5);
    padding: 20px;
    border-radius: 10px; /* Keeps the inner content rounded */
}


         h3 {
        margin-top: 0;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .data-table th, .data-table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .data-table th {
        background-color: #f4f4f4;
        color: #333;
        text-align: left;
    }

    .data-table tbody tr:nth-child(odd) {
        background-color: #fff9db;
    }

    .data-table tbody tr:nth-child(even) {
        background-color: #f4f4f4;
    }

    .data-table tbody tr:hover {
        background-color: #ffeb99;
    }

    .btn {
        padding: 10px 15px;
        margin: 5px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .message {
        background-color: #f8f9fa;
        padding: 10px;
        border-radius: 5px;
        margin-top: 10px;
    }

    .button-container {
        display: flex;
        justify-content: flex-end;
        margin-top: 10px;
    }
    .main-content {
    margin-left: 250px;
    padding: 20px;
    padding-top: 35px;
    width: calc(100% - 250px);
    transition: margin-left 0.5s ease-in-out, width 0.5s ease-in-out;
}

h3 {
    margin-top: 0;
}

.statistics {
    display: flex;
    justify-content: space-between;
}

.stat {
    flex: 1;
    text-align: center;
    padding: 10px;
    margin: 5px;
}

.button {
    text-decoration: none;
}

.button h4 {
    color: #000;
    padding: 10px;
    border-radius: 4px;
    display: inline-block;
    margin: 0;
}

</style>

<script>
    document.getElementById('selectAll').addEventListener('click', function(event) {
        const checkboxes = document.querySelectorAll('.selectInstitution');
        checkboxes.forEach(checkbox => checkbox.checked = event.target.checked);
    });

    document.getElementById('sendNotificationBtn').addEventListener('click', function() {
        const selectedInstitutions = [];
        document.querySelectorAll('.selectInstitution:checked').forEach(checkbox => {
            const row = checkbox.closest('tr');
            const institutionId = row.cells[1].textContent;
            selectedInstitutions.push(institutionId);
        });
        if (selectedInstitutions.length > 0) {
            alert('Notification sent to institutions: ' + selectedInstitutions.join(', '));
            // Add functionality to send notification to selected institutions
        } else {
            alert('Please select at least one institution.');
        }
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#schedule-meeting-form').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Create FormData object from the form
            let formData = new FormData(this);

            $.ajax({
                url: '{{ url('addmeeting') }}', // The URL to send the request to
                method: 'POST', // HTTP method
                data: formData, // The data to send
                contentType: false, // Prevent jQuery from overriding content type
                processData: false, // Prevent jQuery from processing data
                success: function(response) {
                    // Handle success response
                    $('#message').text('Meeting scheduled successfully!')
                                 .css({'color': 'green', 'display': 'block', 'background-color': '#d4edda', 'border': '1px solid #c3e6cb'});
                    $('#schedule-meeting-form')[0].reset(); // Clear input fields
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    $('#message').text('Failed to schedule meeting.')
                                 .css({'color': 'red', 'display': 'block', 'background-color': '#f8d7da', 'border': '1px solid #f5c6cb'});
                }
            });
        });
    });
</script>
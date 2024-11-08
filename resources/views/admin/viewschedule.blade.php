<!DOCTYPE html>
@include('admin.adminheader')

<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<!-- font awesome style -->
<link href="css/font-awesome.min.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="css/index.css" rel="stylesheet" />
<!-- responsive style -->
<link href="css/responsive.css" rel="stylesheet" />
<!-- for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@include('admin.css')
@include('admin.sidebar')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Meeting</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .mt-5 {
            margin-left: 282px;
            margin-top: 9rem !important;
        }
        .header_section {
            position: fixed;
            top: -68px;
            width: 100%;
            z-index: 1000;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            display: block;
            width: 72%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        body {
            background-color: #f8f9fa;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .fas.fa-calendar-alt {
            margin-right: 5px; /* Add some space between the icon and the text */
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div id="message" style="display:none;" class="alert alert-success"></div>
        <h2>Schedule a Meeting</h2>
        <!-- Updated form action here -->
        <form method="post" id="schedule-meeting-form" action="{{ url('schedulemeeting') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="meeting_title">Meeting Title</label>
                <input type="text" class="form-control" id="meeting_title" name="meeting_title" placeholder="Enter meeting title" required>
            </div>

            <div class="form-group mb-3">
                <label for="meeting_date">Meeting Date</label>
                <input type="date" class="form-control" id="meeting_date" name="meeting_date" required>
            </div>

            <div class="form-group mb-3">
                <label for="meeting_time">Meeting Time</label>
                <input type="time" class="form-control" id="meeting_time" name="meeting_time" required>
            </div>

            <div class="form-group mb-3">
                <label for="meeting_id">Meeting ID</label>
                <input type="text" class="form-control" id="meeting_id" name="meeting_id" placeholder="Enter meeting id" required>
            </div>

            <div class="form-group mb-3">
                <label for="institutions">Institutions</label>
                <select class="form-control" id="institutions" name="institutions" required>
                    <option value="">Select Institution</option>
                    @foreach($institute as $inst)
                        <option value="{{ $inst->institude_name }}">{{ $inst->institude_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="additional_notes">Additional Notes</label>
                <textarea class="form-control" id="additional_notes" name="additional_notes" rows="3" placeholder="Enter any additional notes"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-calendar-alt"></i> Schedule Meeting
            </button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    $('#schedule-meeting-form').on('submit', function(event) {
        event.preventDefault();

        let formdata = new FormData(this);

        $.ajax({
            url: '{{ url('schedulemeeting') }}', // Ensure this matches your route
            method: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#message').text('Meeting scheduled successfully').show();
                $('#schedule-meeting-form')[0].reset();
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = Object.values(errors).flat().join(', ');
                    $('#message').text(errorMessage).css('color', 'red').show();
                } else {
                    $('#message').text('Failed to schedule meeting').css('color', 'red').show();
                }
            }
        });
    });
    </script>
</body>
</html>
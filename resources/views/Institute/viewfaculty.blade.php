@include('Institute.instituteheader')

<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<!-- font awesome style -->
<link href="css/font-awesome.min.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="css/index.css" rel="stylesheet" />
<!-- responsive style -->
<link href="css/responsive.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@include('Institute.css')

<style>
    body {
        background-color: #f8f9fa;
    }
    .mt-5 {
        margin-left: 282px;
        margin-top: 9rem !important;
    }
    .form-control {
        width: 72%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

/* Form styling */
form {
    background-color: #fff;
    padding: 2rem;
    margin-left: 48px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    width: 100%;
}

h2 {
    text-align: center;
    margin-left: 168px;
    margin-bottom: -3rem;
}

.form-group,
.mb-3 {
    margin-bottom: 1.5rem;
}

.form-group label,
.mb-3 label {
    font-weight: bold;
}

.form-control {
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    width: 100%;
    padding: 0.75rem;
    font-size: 1.25rem;
    border-radius: 0.25rem;
}

#message {
    margin-bottom: 1.5rem;
    padding: 1rem;
    border-radius: 0.25rem;
}

.row {
    display: flex;
    flex-wrap: wrap;
}

.col-md-6 {
    flex: 0 0 50%;
    max-width: 50%;
    padding: 0 0.75rem;
}

@media (max-width: 768px) {
    .col-md-6 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}

</style>

<body>
    <div class="container mt-5">
        <div id="message" style="display:none;" class="alert alert-success"></div>
        <h2>Faculty Form</h2>
        <form method="post" id="facultyform" action="{{url('addfaculty')}}">
            @csrf
            <div class="form-group mb-3">
                <label for="college_code">College Code</label>
                <input type="text" class="form-control" id="college_code" name="college_code" placeholder="Enter college code" required>
            </div>
            <div class="form-group mb-3">
                <label for="college_name">College Name</label>
                <input type="text" class="form-control" id="college_name" name="college_name" placeholder="Enter college name" required>
            </div>
            <div class="mb-3">
                <label for="faculty_code" class="form-label">Faculty Bio Id</label>
                <input type="text" class="form-control" id="faculty_bioid" name="faculty_bioid" placeholder="Enter faculty bioid" required>
            </div>
            <div class="mb-3">
                <label for="faculty_name" class="form-label">Faculty Name</label>
                <input type="text" class="form-control" id="faculty_name" name="faculty_name" placeholder="Enter faculty name" required>
            </div>
            <div class="mb-3">
                <label for="faculty_email" class="form-label">Faculty Email</label>
                <input type="email" class="form-control" id="faculty_email" name="faculty_email" placeholder="Enter faculty email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Faculty Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
            </div>
            <div class="mb-3">
                <label for="faculty_phone" class="form-label">Faculty Phone Number</label>
                <input type="phone" class="form-control" id="faculty_phone" name="faculty_phone" placeholder="Faculty phone" required>
            </div>
            <div class="mb-3">
                <label for="usertype" class="form-label">User Type</label>
                <input type="text" class="form-control" id="usertype" name="usertype" placeholder="Enter user type" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#facultyform').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                // AJAX Request:
                let formdata = new FormData(this);

                $.ajax({
                    url: '{{ url('addfaculty') }}',
                    method: 'POST',
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#message').text('Faculty added successfully')
                                     .css({'color': 'green', 'display': 'inline-flex', 'background-color': '#d4edda', 'border': '1px solid #c3e6cb'}); // Show the success message
                        $('#facultyform')[0].reset(); // Clear input fields
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error); // Log error for debugging
                        $('#message').text('Failed to add faculty')
                                     .css({'color': 'red', 'display': 'inline-flex', 'background-color': '#f8d7da', 'border': '1px solid #f5c6cb'}); // Show the error message
                    }
                });
            });
        });
    </script>
</body>
</html>

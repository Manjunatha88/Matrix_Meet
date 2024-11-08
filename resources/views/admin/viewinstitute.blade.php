@include('admin.adminheader')

<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<!-- font awesome style -->
<link href="css/font-awesome.min.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="css/index.css" rel="stylesheet" />
<!-- responsive style -->
<link href="css/responsive.css" rel="stylesheet" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@include('admin.css')

<style>
    .mt-5 {
        margin-left: 282px;
        margin-top: 9rem !important;
    }

    /* Form styling */
form {
    background-color: #fff;
    padding: 2rem;
    border-radius: 10px;
    margin-top:-88px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    width: 100%;
}

h2 {
    text-align: center;
    margin-bottom: 1.5rem;
    margin-left:108px;
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
    display: block;
    width: 100%;
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
    <div class="menu-toggle" onclick="toggleMenu()">☰ Menu</div>
    @include('admin.sidebar')

    <div class="container mt-5">
        <div id="message" style="display:none;" class="alert alert-success"></div>
        <h2>Institute Form</h2>
        <form method="post" id="instituteform" action="{{url('addinstitute')}}">
            @csrf
            <div class="mb-3">
                <label for="institute_code" class="form-label">Institute Code</label>
                <input type="text" class="form-control" id="institute_code" name="institute_code" placeholder="Enter institute code" required>
            </div>

            <div class="mb-3">
                <label for="institude_name" class="form-label">Institute Name</label>
                <input type="text" class="form-control" id="institude_name" name="institude_name" placeholder="Enter institute name" required>
            </div>

            <div class="mb-3">
                <label for="institude_email" class="form-label">Institute Email</label>
                <input type="email" class="form-control" id="institude_email" name="institude_email" placeholder="Enter institute email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Institute Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
            </div>

            <div class="mb-3">
                <label for="usertype" class="form-label">User Type</label>
                <input type="text" class="form-control" id="usertype" name="usertype" placeholder="Enter user type" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>


   <script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#instituteform').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            let formdata = new FormData(this);

            $.ajax({
                url: '{{ url('addinstitute') }}',
                method: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log('Success:', response); // Log success response for debugging
                    $('#message').text('Institute added successfully')
                                 .css({'color': 'green', 'display': 'block', 'background-color': '#d4edda', 'border': '1px solid #c3e6cb'}); // Show the success message
                    $('#instituteform')[0].reset(); // Clear input fields
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error); // Log error for debugging
                    console.error('XHR:', xhr.responseText); // Log XHR response for debugging
                    $('#message').text('Failed to add institute')
                                 .css({'color': 'red', 'display': 'block', 'background-color': '#f8d7da', 'border': '1px solid #f5c6cb'}); // Show the error message
                }
            });
        });
    });

    function toggleMenu() {
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');
        if (sidebar.style.width === '250px') {
            sidebar.style.width = '0';
            mainContent.style.marginLeft = '0';
            mainContent.style.width = '100%';
        } else {
            sidebar.style.width = '250px';
            mainContent.style.marginLeft = '250px';
            mainContent.style.width = 'calc(100% - 250px)';
        }
    }
</script>

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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Bootstrap CSS (optional) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@include('admin.css')
<style>
.header_section {
    padding: 4px 0;
}


</style>
<body>
    <div class="menu-toggle" onclick="toggleMenu()">☰ Menu</div>
    <div class="d-flex w-100">
   @include('admin.sidebar')

   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Notification</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
    <div class="container mt-5">
        <div id="message" style="display:none;" class="alert alert-success"></div>
        <h2>Add a Notification</h2>
        
        <!-- Form to send a new message -->
        <form method="post" id="messageForm" action="{{ url('sendMessage') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="message_title" class="form-label">Notification Title</label>
                <input type="text" class="form-control" id="message_title" name="message_title" placeholder="Enter message title" required>
            </div>

            <div class="form-group mb-3">
                <label for="message_body" class="form-label">Notification Body</label>
                <textarea class="form-control" id="message_body" name="message_body" placeholder="Enter message body" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- JavaScript Inclusions -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

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


        
    $('#messageForm').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // AJAX Request to add a new message
        let formData = new FormData(this);

        $.ajax({
            url: '{{ url('addMessage') }}', // Ensure this matches your route URL
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $('#message').text(response.message)
                                 .css({'color': 'green', 'display': 'block', 'background-color': '#d4edda', 'border': '1px solid #c3e6cb'});
                    $('#messageForm')[0].reset(); // Clear input fields
                } else {
                    $('#message').text('Failed to send notification')
                                 .css({'color': 'red', 'display': 'block', 'background-color': '#f8d7da', 'border': '1px solid #f5c6cb'});
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                $('#message').text('Failed to send message')
                             .css({'color': 'red', 'display': 'block', 'background-color': '#f8d7da', 'border': '1px solid #f5c6cb'});
            }
        });
    });


    </script>
</body>
</html>

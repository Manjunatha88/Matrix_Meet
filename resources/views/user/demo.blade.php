@include('admin.adminheader')

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
@include('admin.css')

<style>
    .mt-5{
  margin-left: 282px;
  margin-top: 9rem !important;

}
    </style>
<body>
    <div class="menu-toggle" onclick="toggleMenu()">☰ Menu</div>
   @include('admin.sidebar')
   
<div>
   <div class="container mt-5">
    <div id="message" style="display:none;" class="alert alert-success"></div>
      <h2>Responsive Input Form</h2>
      <form method="post" action="{{url('addinstitute')}}" id="instituteform">
        <div class="mb-3">
          <label for="name" class="form-label"> Institute Name</label>
          <input type="text" class="form-control" id="name"  name="name"placeholder="Enter your institutename" require>
        </div>
       
        <div class="mb-3">
          <label for="email" class="form-label">Institute Email </label>
          <input type="email"  id="email" name="email" placeholder="email" require>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Institute Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" require>
        </div>
        <div class="mb-3">
          <label  class="form-label">User</label>
          <input type="text" class="form-control" id="usertype" name="usertype" placeholder="usertype" require>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
 
</div>
  

<script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#instituteform').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                // AJAX Request:
                let formdata = new FormData($('#instituteform')[0]);

                $.ajax({
                    url: '{{ url('addinstitute') }}',
                    method: 'POST',
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log('Success:', response); // Log success response for debugging
                        $('#message').text('Institute successfully')
                                     .css({'color': 'green', 'display': 'block', 'background-color': '#d4edda', 'border': '1px solid #c3e6cb'}); // Show the success message
                        $('#instituteform')[0].reset(); // Clear input field
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error); // Log error for debugging
                      
                    }
                });
            });
        });
  </script>


</body>
</html>


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
</script>


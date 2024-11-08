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
<div class="right-table">
   <div class="table-responsive">
   <table id="institute-table" class="table table-striped">
        <thead>
            <tr>
                <th>Institute Code</th>
                <th>Institute Name</th>
                <th>Institute Email</th>
                <th>Institute Password</th>
               
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="institute-table-body">
            <!-- Data will be populated here via AJAX -->
        </tbody>
    </table>
</div>
</div>
</div>
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

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Your custom script -->
    <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            } 
        });

        // Fetch and display the institutes
        $.ajax({
            type: "GET",
            url: "/showinstitute", // this is the url we have given
            dataType: "json",
            success: function(response) {
                console.log("AJAX response:", response);
                var tableBody = $('#institute-table-body');
                tableBody.empty();
                if (response.institute && response.institute.length) {
                    response.institute.forEach(function(institute) {
                        if (institute.usertype === 'institute'){
                        var data = `<tr id="institute-${institute.id}">
                            <td>${institute.institute_code}</td>
                            <td>${institute.institude_name}</td>
                            <td>${institute.institude_email}</td>
                            <td>${institute.password}</td>
                            <td>
                                <a class="btn btn-danger delete-btn" data-id="${institute.id}">Delete</a>
                            </td>
                        </tr>`;
                        tableBody.append(data);
                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Ajax error:", xhr.responseText);
            }
        });

        // Delete institute
        $(document).on('click', '.delete-btn', function() {
            var instituteId = $(this).data('id');
            if (confirm('Are you sure you want to delete this institute?')) {
                $.ajax({
                    type: "DELETE",
                    url: "/deleteinstitute/" + instituteId, // URL for deleting the institute
                    success: function(response) {
                        if (response.success) {
                            $('#institute-' + instituteId).remove();
                            alert('Institute deleted successfully.');
                        } else {
                            alert('Failed to delete institute.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Ajax error:", xhr.responseText);
                        alert('Failed to delete institute.');
                    }
                });
            }
        });
    });
</script>

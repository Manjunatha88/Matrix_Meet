@include('Institute.instituteheader')

<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<!-- font awesome style -->
<link href="css/font-awesome.min.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="css/index.css" rel="stylesheet" />
<!-- responsive style -->
<link href="css/responsive.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Bootstrap CSS (optional) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@include('Institute.css')
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Faculty Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .table-responsive {
            margin-top: 2rem;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        /* Container styling */
/* Table styling */
.table-responsive {
    margin-top: -5rem;
    margin-left: -188px;
    background-color: #fff;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.table {
    margin: 0 auto;
    width: 100%;
    max-width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border-radius: 10px;
    overflow: hidden;
}

.table th,
.table td {
    vertical-align: middle;
    text-align: center;
    padding: 1rem;
    border-bottom: 1px solid #dee2e6;
}

.table th {
    background-color: #253439d2;
    color: #fff;
    font-weight: bold;
}

.table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table tr:hover {
    background-color: #d1ecf1;
}

.table td {
    background-color: #fff;
}

.btn {
    border-radius: 5px;
    padding: 0.5rem 1rem;
    transition: background-color 0.3s ease;
}

.btn-danger {
    background-color: #dc3545;
    color: #fff;
}

.btn-danger:hover {
    background-color: #c82333;
    color: #fff;
}


    </style>
</head>
<body>

<div class="container mt-5">
    <div class="right-table">
        <div class="table-responsive p-0">
            <table id="faculty-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>College Name</th>
                        <th>College Code</th>
                        <th>Faculty Name</th>
                        <th>Faculty Bio id</th>
                        <th>Faculty Email</th>
                        <th>Faculty Phone</th>
                        <th>User Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="faculty-table-body">
                    <!-- Data will be populated here via AJAX -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            } 
        });

        // Fetch and display the faculty
        $.ajax({
            type: "GET",
            url: "/showfaculty", // URL for fetching the faculty details
            dataType: "json",
            success: function(response) {
                console.log("AJAX response:", response);
                var tableBody = $('#faculty-table-body');
                tableBody.empty();
                if (response.faculty && response.faculty.length) {
                    response.faculty.forEach(function(faculty) {
                        if (faculty.usertype === 'faculty'){
                            var data = `<tr id="faculty-${faculty.id}">
                                <td>${faculty.college_name}</td>
                                <td>${faculty.college_code}</td>
                                <td>${faculty.faculty_name}</td>
                                <td>${faculty.faculty_bioid}</td>
                                <td>${faculty.faculty_email}</td>
                                <td>${faculty.faculty_phone}</td>
                                <td>${faculty.usertype}</td>
                                <td>
                                    <a class="btn btn-danger delete-btn" data-id="${faculty.id}">Delete</a>
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

        // Delete faculty
        $(document).on('click', '.delete-btn', function() {
            var facultyId = $(this).data('id');
            if (confirm('Are you sure you want to delete this faculty?')) {
                $.ajax({
                    type: "DELETE",
                    url: "/deletefaculty/" + facultyId, // URL for deleting the faculty
                    success: function(response) {
                        if (response.success === 200) {
                            $('#faculty-' + facultyId).remove();
                            alert('Faculty deleted successfully.');
                        } else {
                            alert('Failed to delete faculty.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Ajax error:", xhr.responseText);
                        alert('Failed to delete faculty.');
                    }
                });
            }   
        });
    });
</script>

</body>
</html>

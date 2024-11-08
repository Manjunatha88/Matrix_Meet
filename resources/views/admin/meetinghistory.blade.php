@include('admin.adminheader')

<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<!-- Font Awesome style -->
<link href="css/font-awesome.min.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="css/index.css" rel="stylesheet" />
<!-- Responsive style -->
<link href="css/responsive.css" rel="stylesheet" />
<!-- For icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                            <th>Meeting Title</th>
                            <th>Meeting Date</th>
                            <th>Meeting Time</th>
                            <th>Meeting ID</th>
                            <th>Institution</th>
                            <th>Additional Notes</th>
                        </tr>
                    </thead>
                    <tbody id="institute-table-body">
                        <!-- Data will be populated here via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } 
            });

            // Fetch and display the institutes
            $.ajax({
                type: "GET",
                url: "/meetinghistory", // URL for fetching meeting history
                dataType: "json",
                success: function(response) {
                    console.log("AJAX response:", response);
                    var tableBody = $('#institute-table-body');
                    tableBody.empty();
                    if (response.schedule && response.schedule.length) {
                        response.schedule.forEach(function(schedule) {
                            // Assuming 'institutions' is part of the schedule object
                            var data = `<tr id="institute-${schedule.id}">
                                <td>${schedule.meeting_title}</td>
                                <td>${schedule.meeting_date}</td>
                                <td>${schedule.meeting_time}</td>
                                <td>${schedule.meeting_id}</td>
                                <td>${schedule.institutions}</td>
                                <td>${schedule.additional_notes}</td>
                            </tr>`;
                            tableBody.append(data);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Ajax error:", xhr.responseText);
                }
            });
        });
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
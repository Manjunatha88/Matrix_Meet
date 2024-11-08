<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.adminheader')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Messages from Minister</title>

    <!-- CSS Links -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .header_section {
            position: fixed;
            top: -40px;
            width: 100%;
            z-index: 1000;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>

    <!-- JavaScript Inclusions -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Notifications</h2>

        <!-- Table to display notifications -->
        <table id="notificationTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- Dynamic content will be inserted here -->
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            // Fetch notifications when the page loads
            fetchNotifications();
        });

        function fetchNotifications() {
            $.ajax({
                url: '{{ url('notification') }}', // Ensure this URL is correct
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response); // Log the response for debugging
                    if (response.notification && response.notification.length > 0) {
                        response.notification.forEach(notification => {
                            addRowToTable(notification);
                        });
                    } else {
                        alert('No notifications found');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('Failed to load notifications: ' + xhr.responseText);
                }
            });
        }

        function addRowToTable(notification) {
            const title = notification.message_title || 'No Title';
            const body = notification.message_body || 'No Body';
            const date = notification.created_at ? new Date(notification.created_at).toLocaleString() : 'No Date';

            const row = `<tr>
                            <td>${title}</td>
                            <td>${body}</td>
                            <td>${date}</td>
                         </tr>`;
            $('#tableBody').append(row);
        }
    </script>
</body>
</html>
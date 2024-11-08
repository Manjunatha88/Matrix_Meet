<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Notifications</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @include('admin.css')
</head>
<body>
    @include('admin.adminheader')
    <div class="menu-toggle" onclick="toggleMenu()">☰ Menu</div>
    @include('admin.sidebar')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Notifications</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @include('admin.css')
</head>
<body>
    @include('admin.adminheader')
    <div class="menu-toggle" onclick="toggleMenu()">☰ Menu</div>
    @include('admin.sidebar')

    <div class="container mt-5">
        <div id="message" style="display:none;" class="alert alert-success"></div>
        <h2>View Messages</h2>
        
        <!-- Table to display messages -->
        <div class="mt-5">
            <h3>Existing Messages</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="messageTable">
                    <!-- Existing messages will be dynamically inserted here -->
                </tbody>
            </table>
        </div>
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
        
        $(function() {
            // Load existing messages on page load
            loadMessages();

            // Function to load existing messages
            function loadMessages() {
                $.ajax({
                    url: '{{ url('getMessages') }}',
                    method: 'GET',
                    success: function(response) {
                        let messages = response.messages;
                        let messageTable = $('#messageTable');
                        messageTable.empty();

                        messages.forEach(message => {
                            let row = `
                                <tr>
                                    <td>${message.id}</td>
                                    <td>${message.title}</td>
                                    <td>${message.body}</td>
                                    <td>
                                        <button class="btn btn-warning btn-edit" data-id="${message.id}">Edit</button>
                                        <button class="btn btn-danger btn-delete" data-id="${message.id}">Delete</button>
                                    </td>
                                </tr>
                            `;
                            messageTable.append(row);
                        });

                        // Bind edit and delete button events
                        $('.btn-edit').on('click', function() {
                            let id = $(this).data('id');
                            editMessage(id);
                        });

                        $('.btn-delete').on('click', function() {
                            let id = $(this).data('id');
                            deleteMessage(id);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            // Function to edit a message
            function editMessage(id) {
                // Fetch message data and populate the form for editing
                $.ajax({
                    url: `{{ url('getMessage') }}/${id}`,
                    method: 'GET',
                    success: function(response) {
                        let message = response.message;
                        $('#message_title').val(message.title);
                        $('#message_body').val(message.body);
                        $('#messageForm').attr('action', `{{ url('updateMessage') }}/${id}`);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            // Function to delete a message
            function deleteMessage(id) {
                if (confirm('Are you sure you want to delete this message?')) {
                    $.ajax({
                        url: `{{ url('deleteMessage') }}/${id}`,
                        method: 'DELETE',
                        success: function(response) {
                            $('#message').text('Message deleted successfully')
                                         .css({'color': 'green', 'display': 'block', 'background-color': '#d4edda', 'border': '1px solid #c3e6cb'});
                            loadMessages(); // Reload messages
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            $('#message').text('Failed to delete message')
                                         .css({'color': 'red', 'display': 'block', 'background-color': '#f8d7da', 'border': '1px solid #f5c6cb'});
                        }
                    });
                }
            }
        });
    </script>
</body>
</html>

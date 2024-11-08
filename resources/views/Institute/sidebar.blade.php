<div class="sidebar">
        <h2>Institute</h2>
        <ul>
            <li><a href="#dashboard">Dashboard</a></li>
            <ul>
                <li><a href="#meeting">Meeting</a></li>
                <li><a href="#Notification">Noftication</a></li>
                <li><a href="#inbox">Inbox</a></li>
                <li><a href="{{url('viewfaculty')}}">Add Faculty</a></li>
                <li><a href="{{url('showfaculty')}}">Faculty Details</a></li>
                <li><a href="#about-us">About US</a></li>
                <!-- <li><a href="#agents">completed meeting informations</a></li> -->
            </ul>
        </ul>
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
</script>
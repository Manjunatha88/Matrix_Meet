<div class="sidebar">
    <h2>Minister</h2>
    <ul>
        <li><a href="#dashboard"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="{{url('viewMessage')}}"><i class="fas fa-bell"></i> Notifications </a></li>
        <!-- <li><a href="#inbox"><i class="fas fa-inbox"></i> Inbox</a></li> -->
        <li><a href="{{url('viewinstitute')}}"><i class="fas fa-plus-circle"></i> Add Institute</a></li>
        <li><a href="{{url('showinstitute')}}"><i class="fas fa-info-circle"></i> Institute Details</a></li>
        <li><a href="{{url('meetingaction')}}"><i class="fas fa-video"></i> Meetings</a></li>
        <li><a href="{{url('viewschedule')}}"><i class="fas fa-calendar-alt"></i> Schedule Meeting</a></li> 
        <li><a href="{{url('meetinghistory')}}"><i class="fas fa-history"></i> Meeting History</a></li>
        <li><a href="#about-us"><i class="fas fa-users"></i> About Us</a></li>
    </ul>
</div>

<style>
  .sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    margin: 10px 0;
}

.sidebar ul li a {
    text-decoration: none;
    color: black;
    display: flex;
    align-items: center;
}

.sidebar ul li a i {
    margin-right: 10px;
}

</style>


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
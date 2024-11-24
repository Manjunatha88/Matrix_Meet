<div class="sidebar">
    <h2>Minister</h2>
    <ul style="list-style-type: none; padding: 0; margin: 0;">
    <li style="margin: 10px 0;">
        <a href="{{url('home')}}" style="text-decoration: none; display: flex; align-items: center;">
            <i class="fas fa-home" style="margin-right: 8px;"></i> Dashboard
        </a>
    </li>
    <li style="margin: 10px 0;">
        <a href="{{url('viewMessage')}}" style="text-decoration: none; display: flex; align-items: center;">
            <i class="fas fa-bell" style="margin-right: 8px;"></i> Notifications
        </a>
    </li>
    <li style="margin: 10px 0;">
        <a href="{{url('viewinstitute')}}" style="text-decoration: none; display: flex; align-items: center;">
            <i class="fas fa-plus-circle" style="margin-right: 8px;"></i> Add Institute
        </a>
    </li>
    <li style="margin: 10px 0;">
        <a href="{{url('showinstitute')}}" style="text-decoration: none; display: flex; align-items: center;">
            <i class="fas fa-info-circle" style="margin-right: 8px;"></i> Institute Details
        </a>
    </li>
    <li style="margin: 10px 0;">
        <a href="http://127.0.0.1:3000/action.html" style="text-decoration: none; display: flex; align-items: center;" onclick="return redirectToMeeting(event);">
            <i class="fas fa-video" style="margin-right: 8px;"></i> Meetings
        </a>
    </li>
    <li style="margin: 10px 0;">
        <a href="{{url('viewschedule')}}" style="text-decoration: none; display: flex; align-items: center;">
            <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i> Schedule Meeting
        </a>
    </li>
    <li style="margin: 10px 0;">
        <a href="{{url('meetinghistory')}}" style="text-decoration: none; display: flex; align-items: center;">
            <i class="fas fa-history" style="margin-right: 8px;"></i> Meeting History
        </a>
    </li>
    <li style="margin: 10px 0;">
        <a href="#about-us" style="text-decoration: none; display: flex; align-items: center;">
            <i class="fas fa-users" style="margin-right: 8px;"></i> About Us
        </a>
    </li>
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
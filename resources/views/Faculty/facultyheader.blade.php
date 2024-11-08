<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" >
                <img width="250" src="images/logo.png" alt="#" />
            </a>
            <span class="app-name">
                <span class="matrix">Matrix</span> <span class="meet">Meet</span>
            </span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('meetingaction')}}">Join Meeting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" ">Upcoming Meeting</a>
                    </li>
                        <x-app-layout></x-app-layout>
                    </li>
                    <!-- Adding new buttons here -->
                   
                </ul>
            </div>
        </nav>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');

    function changeActiveLink() {
        let index = sections.length;

        while(--index && window.scrollY + 50 < sections[index].offsetTop) {}

        navLinks.forEach((link) => link.classList.remove('active'));
        navLinks[index].classList.add('active');
    }

    changeActiveLink();
    window.addEventListener('scroll', changeActiveLink);
});
</script>

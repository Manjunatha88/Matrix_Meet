<style>
   .header_section {
    position: fixed;
    top: -48px;
    width: 100%;
    z-index: 1000;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
   </style>

<header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" ><img width="250" src="images/logo.png" alt="#" /></a>
                  <span class="app-name"><span class="matrix">Matrix</span> <span class="meet">Meet</span></span>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <!-- <li class="nav-item active">
                           <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                        </li> -->
                       <!-- <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="about.html">About</a></li>
                              <li><a href="testimonial.html">Testimonial</a></li>
                           </ul>
                        </li> -->
                       
                     
                        <!-- <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                        </li> -->
                        <li class="nav-item">
                           <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                          <!--                        
                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form> -->
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
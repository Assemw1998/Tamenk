<style>

@media (max-width: 767px) {
  .logo-image {
    width: 30%;
  }
}

/* Styles for desktop devices (screen width 768px and above) */
@media (min-width: 768px) {
  .logo-image {
    width: 10%;
  }
}
.navbar-nav{
  margin-right: 0% !important;
}

.navbar-toggler{
  background-color: #ffffff;
  border-color: black;
 }

.navbar-toggler .line{
  background-color: #fff;
}
</style>

<!-- Spinner Start -->
<div
id="spinner"
class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
>
<div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->



<!-- Navbar Start -->
<nav
class="navbar navbar-expand-lg bg-dark  navbar-light sticky-top px-4 px-lg-5"style="height:100px"
>
<a href="" class="d-flex align-items-center logo-image">
  <img class="img-fluid" src="{{ asset("images/resource/logo/image.png") }} "/>
</a>  
<button
  type="button"
  class="navbar-toggler"
  data-bs-toggle="collapse"
  data-bs-target="#navbarCollapse"
>
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarCollapse">
  <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
    <a href="/" class="nav-item nav-link active">Home</a>
    <a href="about.html" class="nav-item nav-link">About Us</a>
    <a href="contact.html" class="nav-item nav-link">Contact Us</a>
    <div class="nav-item dropdown">
      <a
        href="#"
        class="nav-link dropdown-toggle"
        data-bs-toggle="dropdown"
        >language</a
      >
      <div class="dropdown-menu bg-light border-0 m-0">
        <a href="feature.html" class="dropdown-item">English</a>
        <a href="appointment.html" class="dropdown-item">Arabic</a>
      </div>
    </div>
  </div>
</div>
</nav>
<!-- Navbar End -->
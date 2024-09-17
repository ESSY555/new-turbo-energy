<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<head>ENTERPRISE SOFTWARE</head>
  <style>
    .sidebar {
      height: 100%;
      width: 145px;
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      background-color: #343a40; /* Sidebar background color */
      padding-top: 20px;
      padding: 10px;
      box-sizing: border-box;
    }
  
    .sidebar a {
      padding: 8px 15px;
      text-decoration: none;
      font-size: 18px;
      color: #818181; /* Sidebar text color */
      display: block;
      margin-right: 100px
    }
  
    .sidebar a:hover {
      color: #f8f9fa; /* Hover color */
    }
  
    .content {
      padding: 16px;
      box-sizing: border-box;
    }
  
    /* Style for the top navbar */
    .navbar {
      background-color: #343a40;
      position: fixed;
      z-index: 100;
    }
  
    .navbar-brand,
    .navbar-toggler {
      color: white;
    }
  
    .navbar-nav a {
      color: white;
    }
  
    .navbar-nav a:hover {
      color: #f8f9fa; /* Hover color */
    }
    .add-staff{
      font-size: 25px;
    }
  </style>
</head>
<body>

  <!-- Top Navbar -->
  <nav class="text-nowrap navbar w-100 navbar-expand-lg navbar-dark" style="position: fixed; top: -10px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-bell"></i> Notifications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-cog"></i> Settings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-search"></i> Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Cart</a>
        </li>
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link nav-link"><i class="fas fa-sign-out-alt"></i> Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="sidebar mt-5">
    <div class="pt-3">
      <div class="row">
        <a href="#" class="col-12 text-white py-3" onclick="toggleContent('dashboard')">
          <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
       <div class="col-12 text-white py-3">
    <div class="accordion-item accordion-flush" id="accordionFlushExample">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                <i class="fas fa-cogs">Admin Config</i>
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <!-- First Nested Accordion -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            STAFF
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#flush-collapseOne">
                        <div class="accordion-body">
                            <div class="add-staff">
                                <a class="text-light" href="{{ route('login') }}">Add Staff</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of First Nested Accordion -->

                <!-- Second Nested Accordion -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            View Staff
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#flush-collapseOne">
                        <div class="accordion-body">
                            <div class="view-staff">
                                View staff content here.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Second Nested Accordion -->
            </div>
        </div>
    </div>
</div>

        <a href="#" class="col-12 text-white py-3" onclick="toggleContent('profile')">
          <i class="fas fa-user"></i> Profile
        </a>
        <a href="#" class="col-12 text-white py-3" onclick="toggleContent('messages')">
          <i class="fas fa-envelope"></i> Messages
        </a>
        <a href="#" class="col-12 text-white py-3" onclick="toggleContent('settings')">
          <i class="fas fa-cog"></i> Settings
        </a>
        <a href="#" class="col-12 text-white py-3" onclick="toggleContent('help')">
          <i class="fas fa-question-circle"></i> Help
        </a>
        <a href="#" class="col-12 text-white py-3" onclick="toggleContent('about')">
          <i class="fas fa-info-circle"></i> About
        </a>
      </div>
    </div>
  </div>

  <div class="full-dashboard pt-5">
    <div id="dashboard-content" style="display: none;">
      @include('add-staff')
    </div>
    <div id="addstaff-content" style="display: none;">
      @include('add-staff')
    </div>
    <div id="profile-content" style="display: none;">
      <!-- Profile Content -->
      Profile Content
    </div>
    <div id="messages-content" style="display: none;">
      <!-- Messages Content -->
      Messages Content
    </div>
    <div id="settings-content" style="display: none;">
      <!-- Settings Content -->
      Settings Content
    </div>
    <div id="help-content" style="display: none;">
      <!-- Help Content -->
      Help Content
    </div>
    <div id="about-content" style="display: none;">
      <!-- About Content -->
      About Content
    </div>
  </div>

  <!-- Bootstrap JS and Font Awesome Icons (Make sure to include these in your project) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var accordions = document.querySelectorAll('.accordion-collapse');

        accordions.forEach(function (accordion) {
            accordion.addEventListener('show.bs.collapse', function () {
                var parent = accordion.parentElement;
                if (parent) {
                    parent.classList.add('active');
                }
            });

            accordion.addEventListener('hide.bs.collapse', function () {
                var parent = accordion.parentElement;
                if (parent) {
                    parent.classList.remove('active');
                }
            });
        });
    });
</script>

<script>
    function toggleContent(contentId) {
        // Hide all content sections
        document.querySelectorAll('[id$="-content"]').forEach(function(element) {
            element.style.display = 'none';
        });

        // Show the selected content section
        document.getElementById(contentId + '-content').style.display = 'block';
    }
</script>

</body>
</html>

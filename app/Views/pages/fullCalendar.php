
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

    <!-- FUllcalendar -->
    <link href='<?php echo base_url()?>/fullcalendar/lib/main.css' rel='stylesheet' />
    <script src='<?php echo base_url()?>/fullcalendar/lib/main.js'></script>
    <script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events:<?php echo $events?>,
      eventDisplay:'block',
      headerToolbar:{
      start:'title',
      center:'',
      end:'dayGridMonth,listWeek'
      },
      footerToolbar:{
        start:'',
        center:'today prev,next',
        end:''
      },
      handleWindowResize:true,
      stickyHeaderDates:false,
      allDaySlot: false,
      
      eventClick: function(info) {
        alert('Event: ' + info.event.title + '\n' +
        'Time: ' + info.event.start + ',' + info.event.end);
      }
    });
    calendar.render();
});
</script>
</head> 
<body>
    <?php $uri = service('uri'); ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="breadcrumb">
  <a class="navbar-brand" href="/k24/public/dashboard">K24</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php if (session()->get('isLoggedIn')): ?>
      <!-- Navbar has dashboard, profile & lg out if logged in-->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?> ">
          <a class="nav-link" href="<?php echo site_url('dashboard')?>">Dashboard</a>
        </li>
        <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active': null)?>" >
          <a class="nav-link" href="<?php echo site_url('pages/profile')?>">Profile</a>
        </li>
      </ul>  
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('pages/logout')?>">Log out</a>
        </li> 
      </ul>
    <?php else: ?>
      <!-- Navbar has sign up or log in if not logged in-->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active': null) ?>" >
          <a class="nav-link" href="<?php echo site_url('pages')?>">Login</a>
        </li>
        <li class="nav-item <?= ($uri->getSegment(1) == 'signup' ? 'active': null) ?>" >
          <a class="nav-link" href="<?php echo site_url('pages/signup')?>">Sign up</a>
        </li>
      </ul>  
    <?php endif;?>
  </div>
  </div> 
  </nav>
    <nav class="nav" aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent">
      <li class="breadcrumb-item text-dark"><a href="<?php echo base_url()?>" class="text-dark">Home</a></li>
      <li class="breadcrumb-item active" class="text-dark" > Calendar </li>
    </ol>
    </nav>


  <div class='container ml-1'>
    <h2>My Schedule</h2>
    <hr>
  <div id="calendar"></div>
  </div>

 

      
</body>
</html>
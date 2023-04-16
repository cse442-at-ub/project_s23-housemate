<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>HouseMate</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">

    

    

<link href="bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">HouseMate</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Listings</a>
              <ul class="dropdown-menu">
                <?php 
                  echo '<li><a class="dropdown-item" href="masterHouseSelect.php?housingName=Villas On Rensch">Villas On Rensch</a></li>
                  <li><a class="dropdown-item" href="masterHouseSelect.php?housingName=Villas at Chestnut Ridge">Villas at Chestnut Ridge</a></li>
                  <li><a class="dropdown-item" href="masterHouseSelect.php?housingName=The Station">The Station</a></li>
                  <li><a class="dropdown-item" href="masterHouseSelect.php?housingName=Auden Buffalo">Auden Buffalo</a></li>
                  <li><a class="dropdown-item" href="masterHouseSelect.php?housingName=University Village at Sweethome">University Village at Sweethome</a></li>';
                ?>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Campus Location</a>
              <ul class="dropdown-menu">
                <div class="text-center">
                  <a href="NothCampusON.php">
                    <button type="button">On Campus</button>
                    </a>
                </div>
                <br>
                <div class="text-center">
                  <button type="button">Off Campus</button>
                </div>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>

    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1adtNpJEuFhDYveaEjqcMNU6XyF6rA2Q&ehbc=2E312F" width = "100%" height = "1000px" style = "border: 0;" allowfullscreen = "" loading = "lazy"></iframe>


  </main>


    <script src="bootstrap.bundle.min.js"></script>

      
  </body>
</html>

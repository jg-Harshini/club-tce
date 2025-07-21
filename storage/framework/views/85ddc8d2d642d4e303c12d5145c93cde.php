<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>College Committee Flowchart</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/treant-js/1.0/Treant.css" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      width: 100%;
      height: 100%;
      font-family: 'Segoe UI', sans-serif;
      overflow-x: hidden;
      background-color: #f8f9fa;
    }

    .navbar {
      width: 100%;
      background-color: white;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .navbar img {
      height: 60px;
    }

    .nav-links {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .nav-links a {
      text-decoration: none;
      font-weight: 600;
      display: flex;
      flex-direction: column;
      align-items: center;
      font-size: 14px;
    }

    .nav-links a:nth-child(1) i {
      stroke: #2A5D9F; /* Home - blue */
    }

    .nav-links a:nth-child(2) i {
      stroke: #000000; /* Committee - black */
    }

    .nav-links a:nth-child(3) i {
      stroke: #E63946; /* Clubs - red */
    }

    .nav-links a:nth-child(4) i {
      stroke: #E9C46A; /* Events - yellow */
    }

    .nav-links a:nth-child(5) i {
      stroke: #F4A261; /* Enroll - orange */
    }
        h2.heading {
      text-align: center;
      margin-top: 10px;
      font-size: 28px;
      font-weight: 700;
      color: #2A5D9F;
    }
    #chart {
      width: 100%;
      padding: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .Treant {
      width: 100%;
      overflow: hidden;
    }

    .node {
      padding: 14px 18px;
      border: 1px solid #ccc;
      background: white;
      color: black;
      border-radius: 4px;
      box-shadow: -4px -4px 0px 0px #3498db;
      font-weight: 600;
      min-width: 180px;
      text-align: center;
      font-size: 14px;
    }

    .node:hover {
      transform: scale(1.03);
      transition: transform 0.3s ease;
    }

    @media (max-width: 768px) {
      .node {
        min-width: 140px;
        font-size: 12px;
      }
    }
  </style>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@200;300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo e(asset('lib/animate/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
</head>
<body>

    <!-- Normal Header (static) -->
    <div style="
  width: 100%;
  background-color: white;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  /* NO position: fixed or sticky */
  height: max-content;
">
        <div class="container d-flex align-items-center justify-content-between py-3">

            <!-- Logo -->
            <a href="index.html" class="d-flex align-items-center text-decoration-none">
                <img src="<?php echo e(asset('img/logo.jpg')); ?>" alt="Logo" style="height: 60px;">
            </a>

            <!-- Navigation Links -->
            <div style="display: flex; gap: 40px;">
                <a href="<?php echo e(route('student.index')); ?>" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="home" style="stroke:#2A5D9F; width:36px; height:36px;"></i><br>Home
                </a>
               <a href="<?php echo e(route('student.commitee')); ?>" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="users" style="stroke:#W91G11; width:36px; height:36px;"></i><br>Commitee
                </a>
                <a href="<?php echo e(route('student.clubs.all')); ?>" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="users" style="stroke:#E76F51; width:36px; height:36px;"></i><br>Clubs
                </a>
                <a href="<?php echo e(route('student.events')); ?>" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="calendar" style="stroke:#E9C46A; width:36px; height:36px;"></i><br>Events
                </a>
                <a href="<?php echo e(route('student.enroll.form')); ?>" class="nav-item"
                    style="text-align: center; color: black; text-decoration: none; font-weight: 600;">
                    <i data-feather="edit-3" style="stroke:#F4A261; width:36px; height:36px;"></i><br>Enroll
                </a>
                

            </div>

        </div>
    </div>

<<<<<<< Updated upstream
    <!-- No extra padding needed because header is static -->

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
    feather.replace()
    </script>
    
<!-- ✅ Page Heading -->
<h2 class="heading">Organization Chart</h2>

  <!-- ✅ Flowchart -->
  <div id="chart"></div>

  <!-- ✅ Scripts -->
  <script src="https://unpkg.com/feather-icons"></script>
  <script>feather.replace()</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/treant-js/1.0/Treant.min.js"></script>

  <!-- ✅ Treant Data -->
  <script>
    const chart_config = {
      chart: {
        container: "#chart",
        rootOrientation: "NORTH",
        levelSeparation: 40,
        siblingSeparation: 220,
        subTeeSeparation: 160,
        connectors: {
          type: 'step',
          style: {
            "stroke": "#ccc",
            "arrow-end": "none"
          }
        },
        node: {
          HTMLclass: "node"
        }
      },
      nodeStructure: {
        text: { name: "Principal" },
        children: [
          {
            text: { name: "Dean" },
            children: [
              {
                text: { name: "College Level Coordinator" },
                children: [
                  {
                    text: { name: "Department Level Coordinator" },
                    children: [
                      {
                        text: { name: "Department Faculty Incharge" }
                      }
                    ]
                  }
                ]
              }
            ]
          },
          {
            text: { name: "HOD" }
          }
        ]
      }
    };

    new Treant(chart_config);
  </script>
=======
<!-- Footer -->
<footer>
<div class="container-fluid" style="background-color: #800000; color: white; padding: 40px 0;">
    <!-- First Row -->
    <div class="row g-4 px-5">
        <!-- Contact Info -->
        <div class="col-md-6 col-lg-6">
            <h4 style="color: #B34747; margin-bottom: 20px;">Contact Info</h4>
            <p><i class="fa fa-map-marker-alt me-2" style="color: #B34747;"></i>V3JJ+VJ3, Thiruparankundram, Tamil Nadu 625015</p>
            <p><i class="fas fa-envelope me-2" style="color: #B34747;"></i>www.tce.edu</p>
            <p><i class="fas fa-phone me-2" style="color: #B34747;"></i>+91 452 2482240</p>
        </div>

        <!-- Developed By -->
        <div class="col-md-6 col-lg-6">
            <h4 style="color: #B34747; margin-bottom: 20px;">Developed By</h4>
            <ul style="list-style: none; padding: 0;">
                <li>1. Aburvaa A S</li>
                <li>2. Harshini J G</li>
                <li>3. Kiruthika B</li>
                <li>4. Nikitha A S</li>
                <li>5. Varshini C</li>
            </ul>
        </div>
    </div>

    <!-- Second Row -->
    <div class="row px-5 mt-4">
        <div class="col-12">
            <h4 style="color: #B34747; margin-bottom: 20px;">Connect With Us</h4>
            <div>
                <a href="https://www.facebook.com/TheOfficialTCEPage" style="color: white; margin-right: 15px; font-size: 1.5rem;"><i class="fab fa-facebook-f"></i></a>
                <a href="https://x.com/tceofficialpage" style="color: white; margin-right: 15px; font-size: 1.5rem;"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/tce_madurai/" style="color: white; margin-right: 15px; font-size: 1.5rem;"><i class="fab fa-instagram"></i></a>
                <a href="https://x.com/tceofficialpage" style="color: white; font-size: 1.5rem;"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

    <hr style="border-color: #B34747; margin: 30px 5%;">
    <div class="text-center" style="color: white; font-size: 0.9rem;">
        &copy; 2025 TCE College. All Rights Reserved.
    </div>
</div>
</footer>

>>>>>>> Stashed changes

</body>
</html><?php /**PATH E:\club\kiruthi\admin\club-tce\resources\views/student/commitee.blade.php ENDPATH**/ ?>
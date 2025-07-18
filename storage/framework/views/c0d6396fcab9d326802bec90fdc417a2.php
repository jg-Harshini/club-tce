<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
  <div class="col-12">
    <h3 class="text-dark fw-bold mt-0">Club Enrollment Dashboard</h3>
    <p class="text-muted">Live overview of club enrollments by 1st year students</p>
  </div>
</div>

<!-- Summary Cards -->
<div class="row mb-4">
  <div class="col-lg-4 col-md-6">
    <div class="card shadow-sm text-dark" style="background-color: #ffe4ec;">
      <div class="card-body">
        <h5 class="card-title">Total Clubs</h5>
        <h2 class="fw-bold"><?php echo e($totalClubs); ?></h2>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="card shadow-sm text-dark" style="background-color: #fff2e6;">
      <div class="card-body">
        <h5 class="card-title">Total Club Applications</h5>
        <h2 class="fw-bold"><?php echo e($totalApplications); ?></h2>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-12">
    <div class="card shadow-sm text-dark" style="background-color: #d2f1f0;">
      <div class="card-body">
        <h5 class="card-title">Total Distinct Students</h5>
        <h2 class="fw-bold"><?php echo e($totalStudents); ?></h2>
      </div>
    </div>
  </div>
</div>

<!-- Charts Row -->
<div class="row mb-4">
  <div class="col-lg-6">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        <h6 class="fw-semibold mb-3"> Department-wise Distribution</h6>
        <canvas id="dept-chart" height="180"></canvas>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        <h6 class="fw-semibold mb-3"> Top 3 Popular Clubs</h6>
        <canvas id="popular-clubs-chart" height="180"></canvas>
      </div>
    </div>
  </div>
</div>
<!-- New Row for Active Clubs by Event Count -->
<!-- New Row for Active Clubs and Placeholder (for future chart) -->
<div class="row mb-4">
  <div class="col-lg-6">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        <h6 class="fw-semibold mb-3"> Most Active Clubs by Events Conducted</h6>
        <canvas id="active-club-events-chart" height="180"></canvas>
      </div>
    </div>
  </div>

  <!-- Placeholder for future chart -->
<!-- Placeholder for future chart -->
<div class="col-lg-6">
  <div class="card shadow-sm">
    <div class="card-body text-center">
      <h6 class="fw-semibold mb-3">Gender Distribution</h6>
      <div style="height: 320px; display: flex; align-items: center; justify-content: center;">
  <canvas id="gender-chart" width="250" height="250"></canvas>
</div>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const deptData = <?php echo json_encode($departmentDistribution, 15, 512) ?>;
    const clubData = <?php echo json_encode($popularClubs, 15, 512) ?>;
 const activeClubEvents = <?php echo json_encode($activeClubsByEvents, 15, 512) ?>;
  const genderData = <?php echo json_encode($genderDistribution, 15, 512) ?>;

    const deptCtx = document.getElementById("dept-chart");
    const clubCtx = document.getElementById("popular-clubs-chart");
 const activeClubCtx = document.getElementById("active-club-events-chart");
  const genderCtx = document.getElementById("gender-chart");

    if (deptCtx && deptData && Object.keys(deptData).length) {
      new Chart(deptCtx, {
        type: "bar",
        data: {
          labels: Object.keys(deptData),
          datasets: [{
            label: "Students",
            data: Object.values(deptData),
            backgroundColor: ['#f3e8ff', '#d2f1f0', '#ffe4ec', '#fff7d1', '#d7fcd4']
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: { display: false }
          }
        }
      });
    }

    if (clubCtx && clubData && Object.keys(clubData).length) {
      new Chart(clubCtx, {
        type: "bar",
        data: {
          labels: Object.keys(clubData),
          datasets: [{
            label: "Applications",
            data: Object.values(clubData),
            backgroundColor: ['#c4f0ff', '#fcdada', '#ffe4ec']
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: { display: false }
          }
        }
      });
    }
      if (activeClubCtx && activeClubEvents && Object.keys(activeClubEvents).length) {
    new Chart(activeClubCtx, {
      type: "bar",
      data: {
        labels: Object.keys(activeClubEvents),
        datasets: [{
          label: "Events Conducted",
          data: Object.values(activeClubEvents),
          backgroundColor: ['#f3e8ff', '#d2f1f0', '#ffe4ec', '#fff7d1', '#d7fcd4']
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            ticks: { precision: 0 }
          }
        },
        plugins: { legend: { display: false } }
      }
    });
  }

  if (genderCtx && genderData && Object.keys(genderData).length) {
    new Chart(genderCtx, {
      type: "pie",
      data: {
        labels: Object.keys(genderData),
        datasets: [{
          label: "Gender",
          data: Object.values(genderData),
          backgroundColor: ['#87CEFA','#FFB6C1','#D3D3D3']
        }]
      },
      options: {
        responsive: false,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    });
  }
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\HARSHINI\intern\clubstce\resources\views/dash.blade.php ENDPATH**/ ?>
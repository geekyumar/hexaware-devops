<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create Reports - Hexaware</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <!-- /.navbar -->

  @include('templates.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>Recruitment Dashboard</b></h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          
          <!-- /.card-header -->
            
          
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
            
                <style>
                    .metric-card {
                        display: flex; /* Use flexbox for layout */
                        flex-direction: column; /* Column layout for label and input */
                        justify-content: center; /* Center contents vertically */
                        align-items: center; /* Center contents horizontally */
                        text-align: center; /* Center align text */
                    }
            
                    .metric-card input {
                        font-family: Arial, sans-serif; /* Consistent font for content */
                        font-size: 1.5em; /* Font size for metrics */
                        color: #333; /* Content color */
                        font-weight: bold; /* Bold font for emphasis */
                        text-align: center; /* Center-align the input text */
                        border: none; /* Remove default border */
                        background: transparent; /* Transparent background */
                        max-width: 100%; /* Ensure input does not overflow */
                    }
            
                    .charts-container {
                        display: flex; /* Align charts in a row */
                        justify-content: space-between; /* Equal space between charts */
                        align-items: stretch; /* Stretch charts to the same height */
                        margin-top: 20px; /* Space from the application section */
                    }
            
                    .chart-container {
                        background-color: #f9f9f9; /* Light background color for visibility */
                        border: 1px solid #ddd; /* Light border around each chart */
                        border-radius: 5px; /* Rounded corners */
                        padding: 10px; /* Padding inside each chart */
                        flex: 1; /* Allow flexbox to grow equally */
                        height: 350px; /* Fixed height for larger boxes */
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
                        display: flex; /* Flexbox for content alignment */
                        flex-direction: column; /* Column layout for label and canvas */
                        align-items: center; /* Center alignment of content */
                        justify-content: center; /* Centering of content */
                    }
            
                    canvas {
                        width: 100% !important; /* Full width for canvas */
                        height: 70% !important; /* Fixed height for canvas */
                    }
            
                    .chart-label {
                        margin-bottom: 5px; /* Space between label and chart */
                        font-weight: bold; /* Bold label for emphasis */
                        text-align: center; /* Center align label */
                    }
                </style>
            </head>
            <body>
            <form action="{{ url('/recruitment') }}">
            <div class="container mt-4">
                <div class="row align-items-end">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="startDate">Start Date</label>
                            <input type="text" class="form-control" name="start_date" id="startDate" placeholder="Select start date" required>
                            <div class="invalid-feedback">
                                Please select a start date.
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="endDate">End Date</label>
                            <input type="text" class="form-control" name="end_date" id="endDate" placeholder="Select end date" required>
                            <div class="invalid-feedback">
                                Please select an end date.
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Refresh</button>
                    </div>
                </div>
            </div>
                </form>
            
            <!-- Include Flatpickr JS -->
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script>
                flatpickr("#startDate", {
                    dateFormat: "Y-m-d"
                });
                flatpickr("#endDate", {
                    dateFormat: "Y-m-d"
                });
            </script>
            
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card metric-card">
                            <div class="card-body">
                                <label for="totalApplications">Total Applications</label>
                                <input type="text" class="form-control" id="totalApplications" name="total_applications" value="@php echo count($applications) @endphp" readonly>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-3">
                        <div class="card metric-card">
                            <div class="card-body">
                                <label for="applicationsInProgress">Applications in Progress</label>
                                <input type="text" class="form-control" id="applicationsInProgress" name="applications_in_progress" value="{{ interviewInProgressCount() }}" readonly>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-3">
                        <div class="card metric-card">
                            <div class="card-body">
                                <label for="hiredCandidates">Hired Candidates</label>
                                <input type="text" class="form-control" id="hiredCandidates" name="hired_candidates" value="{{ interviewHiredCount() }}" readonly>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-3">
                        <div class="card metric-card">
                            <div class="card-body">
                                <label for="rejectedCandidates">Rejected Candidates</label>
                                <input type="text" class="form-control" id="rejectedCandidates" name="rejected_candidates" value="{{ interviewRejectedCount() }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- <h5 class="mt-4"><b>Charts Section</b></h5>
            
            <div class="charts-container">
                <div class="chart-container">
                    <h5 class="chart-label">Applications Over Time</h5>
                    <canvas id="applicationsOverTimeChart"></canvas>
                </div>
            
                <div class="chart-container">
                    <h5 class="chart-label">Applications by Source</h5>
                    <canvas id="applicationsBySourceChart"></canvas>
                </div>
            
                <div class="chart-container">
                    <h5 class="chart-label">Applications by Status</h5>
                    <canvas id="applicationsByStatusChart"></canvas>
                </div>
            </div> -->
            
            <div class="row mt-4">
                <div class="col-md-12">
                    <label>Applications Table</label>
                    <div class="card-body table-responsive p-0 pt-2">
                        <table class="table table-hover text-nowrap" style="border: none;">
                            <thead>
                                <tr>
                                    <th>Applicant Name</th>
                                    <th>Position</th>
                                    <th>Source</th>
                                    <th>Date Applied</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $a)
                                @php $j = getJobDetails($a->job_id) @endphp
                                <!-- Example Row 1 -->
                                <tr>
                                    <td>{{ $a->applicant_name }}</td>
                                    <td>{{ $j->job_title }}</td>
                                    <td>{{ $j->department }}</td>
                                    <td>{{ $a->created_at }}</td>
                                    <td>{{ $a->application_status }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('/recruitment/details/') }}/{{$a->id}}" class="btn btn-info btn-sm">View Details</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Include Chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Sample data for charts
                const applicationsOverTimeData = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                    datasets: [{
                        label: 'Applications',
                        data: [12, 19, 3, 5, 2, 3, 7, 10, 15],
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                };
            
                const applicationsBySourceData = {
                    labels: ['Job Portal', 'Referral', 'Social Media', 'Others'],
                    datasets: [{
                        label: 'Source Distribution',
                        data: [50, 30, 10, 10],
                        backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)', 'rgba(75, 192, 192, 0.6)'],
                    }]
                };
            
                const applicationsByStatusData = {
                    labels: ['Hired', 'Rejected', 'In Progress'],
                    datasets: [{
                        label: 'Application Status',
                        data: [30, 20, 50],
                        backgroundColor: ['rgba(75, 192, 192, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(255, 206, 86, 0.6)'],
                    }]
                };
            
                const applicationsOverTimeCtx = document.getElementById('applicationsOverTimeChart').getContext('2d');
                new Chart(applicationsOverTimeCtx, {
                    type: 'line',
                    data: applicationsOverTimeData,
                });
            
                const applicationsBySourceCtx = document.getElementById('applicationsBySourceChart').getContext('2d');
                new Chart(applicationsBySourceCtx, {
                    type: 'doughnut',
                    data: applicationsBySourceData,
                });
            
                const applicationsByStatusCtx = document.getElementById('applicationsByStatusChart').getContext('2d');
                new Chart(applicationsByStatusCtx, {
                    type: 'bar',
                    data: applicationsByStatusData,
                });
            </script>
            
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </body>
            
            

          
          

              
                <!--<!--<label>Position</label>
                  <select class="select2" data-placeholder="Select a Department" name="position" style="width: 100%;">
                    <option disabled selected>Select Position</option>
                    <option>HR</option>
                    <option>IT (Developer)</option>
                    <option>Marketing</option>
                    <option>Sales</option>
                    <option>Finance</option>
                    <option>Auditing</option>
                  </select>
                </div>
                 /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!--<div class="row">
              <div class="col-md-6">
              <div class="form-group">
                <div class="form-group">
                  <label>Source</label>
                  <select class="form-control select2" data-placeholder="Select an Employment Type" name="employment_type" style="width: 100%;">
                    <option selected disabled>Select Source</option>
                    <option>Job Board</option>
                    <option>Referral</option>
                  </select>
                </div>
            </div>
                <!-- /.form-group -->
                <!--<br>
                  <div class="form-group">
                    <label for="fieldsToInclude">Fields to Include</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="applicantName" name="fieldsToInclude[]" value="applicantName">
                        <label class="form-check-label" for="applicantName">
                            Applicant Name
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="dateApplied" name="fieldsToInclude[]" value="dateApplied">
                        <label class="form-check-label" for="dateApplied">
                            Date Applied
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="status" name="fieldsToInclude[]" value="status">
                        <label class="form-check-label" for="status">
                            Status
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="source" name="fieldsToInclude[]" value="source">
                        <label class="form-check-label" for="source">
                            Source
                        </label>
                    </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <!-- /.col -->
            </div>
            <br>
            <!--<div class="card-footer">
              <button type="submit" class="btn btn-primary">Generate Report</button>
            </div>
            <!-- /.row -->

            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../../plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script>
  // Get the date input field
  const dateInput = document.getElementById('application-deadline');

  // Create a function to format the date as YYYY-MM-DD
  function formatDate(date) {
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-indexed
    const day = String(date.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
  }

  // Calculate the future date (e.g., 30 days from today)
  const today = new Date();
  const futureDate = new Date();
  futureDate.setDate(today.getDate() + 30); // Add 30 days

  // Set the min attribute of the date input field
  dateInput.min = formatDate(futureDate);
</script>


<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
</body>
</html>-->

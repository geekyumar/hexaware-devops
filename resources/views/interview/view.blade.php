<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Report - Hexaware</title>

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
            <h1><b>Interview Details</b></h1>
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
        <form method="post" action="{{ url('/jobs/create') }}">
          
            <style>
                .section-box {
                    border: 1px solid #ddd;
                    padding: 15px;
                    margin-bottom: 20px;
                    border-radius: 5px;
                    transition: all 0.3s ease;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }
            
                .action-box {
                    border: 1px solid #ddd;
                    padding: 15px;
                    border-radius: 5px;
                    background-color: #f9f9f9; /* Light grey background */
                    margin-top: 20px; /* Spacing above the action box */
                    min-height: 187px;
                }
            
                h5 {
                    margin-bottom: 15px;
                    font-weight: bold;
                    background-color: #f0f0f0; /* Light grey box for section titles */
                    padding: 10px;
                    border-radius: 5px;
                }
            
                .btn-primary {
                    margin-right: 10px; /* Spacing between buttons */
                }
            </style>

            @php
            $applicant = getApplicantDetails($interview->applicant_id);
            $job = getJobDetails($interview->job_id);
            @endphp
              
              <div class="card-body">
                  <div class="row">
                      <!-- Left Column: Applicant Information and Job Information -->
                      <div class="col-md-6">
                          <!-- Applicant Information Section -->
                          <div class="section-box">
                              <h5>Applicant Information</h5>
                              <div class="form-group">
                                  <label>Name</label>
                                  <p>{{ $applicant->applicant_name }}</p>
                              </div>
                              <div class="form-group">
                                  <label>Email</label>
                                  <p>{{ $applicant->email }}</p>
                              </div>
                              <div class="form-group">
                                  <label>Phone</label>
                                  <p>{{ $applicant->phone }}</p>
                              </div>
                          </div>
              
                          <!-- Job Information Section -->
                          <div class="section-box">
                              <h5>Job Information</h5>
                              <div class="form-group">
                                  <label>Job Title</label>
                                  <p>{{ $job->job_title ?? 'N/A'}}</p>
                              </div>
                              <div class="form-group">
                                  <label>Department</label>
                                  <p>{{ $job->department ?? 'N/A'}}</p>
                              </div>
                              <div class="form-group">
                                  <label>Location</label>
                                  <p>{{ $job->job_location ?? 'N/A'}}</p>
                              </div>
                          </div>
                      </div>
                      <!-- /.col -->
              
                      <!-- Right Column: Interview Information and Actions -->
                      <div class="col-md-6">
                          <!-- Interview Information Section -->
                          <div class="section-box">
                              <h5>Interview Information</h5>
                              <div class="form-group">
                                  <label>Interview Date</label>
                                  <p>{{ $interview->interview_date }}</p>
                              </div>
                              <div class="form-group">
                                  <label>Interview Time</label>
                                  <p>{{ $interview->interview_time }}</p>
                              </div>
                              <div class="form-group">
                                  <label>Interview Mode</label>
                                  <p>{{ $interview->interview_mode }}</p>
                              </div>
                              <div class="form-group" id="interview-location">
                                  <label>Interview Location</label>
                                  <p>{{ $interview->interview_location }}</p>
                              </div>
                              <div class="form-group">
                                  <label>Interviewers</label>
                                  <p>{{ $interview->interviewers }}</p>
                              </div>
                          </div>
              
                          <!-- Interview Actions Section (no hover effect) -->
                          <!-- Interview Actions Section (no hover effect) -->
<div class="action-box">
    <h5>Interview Actions</h5>
    <a href="{{ url('/interview/reschedule') }}/{{ $interview->id }}" class="btn btn-primary">Reschedule Interview</a>
    <a href="{{ url('/interview/cancel') }}/{{ $interview->id }}" class="btn btn-primary">Cancel Interview</a>
</div>

                      </div>
                      <!-- /.col -->
                  </div>
                  <!-- /.row -->
              </div>
                 
            <!--<label class="pt-2">Reports Table</label>
            
            <div class="card-body table-responsive p-0 pt-2">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Job Title</th>
                      <th>Department</th>
                      <th>Date Created</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr><td>1</td>
                    <td>Umar</td>
                    <td>Developer</td>
                    <td>On review</td>
                    <td>Today</td>
                    <td>
                    <div class="btn-group">
                        <a href="http://localhost:8000/jobs/view" class="btn btn-info">View</a>
                    
                        <a href="http://localhost:8000/jobs/edit" class="btn btn-info">Move to Next Stage</a>

                        <a href="http://localhost:8000/jobs/delete" class="btn btn-info">Reject</a>
                        </div>
                    </td>
                    </tr></tbody>
                </table>
              </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <!-- /.col -->
           <!----> </div>
            <!--<br>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Edit Report</button>
              <button type="submit" class="btn btn-primary">Delete Report</button>
              <button type="submit" class="btn btn-primary">Export Report</button>
            </div>-->
            <!-- /.row -->

            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
</form>
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
</html>

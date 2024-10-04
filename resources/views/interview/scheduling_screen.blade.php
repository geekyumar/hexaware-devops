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
            <h1><b>Schedule New Interview</b></h1>
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
          <form method="post" action="{{ url('/interview/schedule') }}">
            @csrf
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="applicantName">Applicant Name</label>
                            <select class="form-control" id="applicantName" name="applicant_id" required>
                                <option value="" disabled selected>Select applicant</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select an applicant.
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jobTitle">Job Title</label>
                            <select class="form-control" id="jobTitle" name="job_id" required>
                                <option value="" disabled selected>Select job title</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a job title.
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="interviewDate">Interview Date</label>
                            <div class="input-group date" id="interviewDatePicker">
                                <input type="date" class="form-control" id="interviewDate" name="interview_date" placeholder="Select interview date" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Please select an interview date.
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="interviewTime">Interview Time</label>
                            <input type="time" class="form-control" id="interviewTime" name="interview_time" required>
                            <div class="invalid-feedback">
                                Please select an interview time.
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="interviewers">Interviewers</label>
                            <select class="form-control" id="interviewers" name="interviewers[]" multiple required>
                                <option value="" disabled>Select interviewers</option>
                                <option>Interviewer 1</option>
                                <option>Interviewer 2</option>
                                <option>Interviewer 3</option>
                                <option>Interviewer 4</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select at least one interviewer.
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="interviewMode">Interview Mode</label>
                            <select class="form-control" id="interviewMode" name="interview_mode" required onchange="toggleLocationField()">
                                <option value="" disabled selected>Select interview mode</option>
                                <option>In-Person</option>
                                <option>Video Call</option>
                                <option>Phone Call</option>
                                <option>Teams Call</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select an interview mode.
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-6" id="interviewLocationField" style="display: none;">
                        <div class="form-group">
                            <label for="interviewLocation">Interview Location</label>
                            <input type="text" class="form-control" id="interviewLocation" name="interview_location" placeholder="Enter interview location">
                            <div class="invalid-feedback">
                                Please enter an interview location.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Include Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <!-- Include Bootstrap Datepicker CSS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
            <!-- Include FontAwesome for Calendar Icon -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            
            <!-- Include jQuery -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <!-- Include Bootstrap JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
            <!-- Include Bootstrap Datepicker JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
            
            <script>
                $(document).ready(function(){
                    $('#interviewDatePicker').datepicker({
                        format: 'mm/dd/yyyy',
                        autoclose: true,
                        todayHighlight: true
                    });
                });
            
                function toggleLocationField() {
                    const mode = document.getElementById('interviewMode').value;
                    const locationField = document.getElementById('interviewLocationField');
                    if (mode === 'In-Person') {
                        locationField.style.display = 'block';
                    } else {
                        locationField.style.display = 'none';
                    }
                }
            </script>
            

          
              
          
              <!-- Schedule Interview Button -->
<div class="form-group">
    <div class="row mt-3">
        <div class="col-md-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-sm" id="scheduleInterviewButton">
                Schedule Interview
            </button>
        </div>
    </div>
</div>

                
              </div>
            </div>
          </form>
          
          

              
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

<script>

  $.ajax({
    url: '{{ url('/interview/applicantNameList') }}',
    type: 'POST',
    dataType: 'json',

    success: function(response) {
    // Loop through the applicant_id array
    response.applicant_id.forEach((id, index) => {
        // Get the corresponding applicant name using the same index
        const name = response.applicant_name[index];
        
        // Append a new option to the select element
        $('#applicantName').append(new Option(name, id));
    });
}, error: function(xhr, responseData){
      if(xhr.status == 500){
        console.log('error');
      }
    }
  })



  $('#applicantName').on('change', ()=>{
    applicant_id = $('#applicantName').val()
    $.ajax({
    url: '{{ url('/interview/jobsList') }}/' + applicant_id,
    type: 'POST',
    dataType: 'json',

    success: function(response) {
      response.job_id.forEach((id, index) => {
        // Get the corresponding applicant name using the same index
        const name = response.job_title[index];
        
        // Append a new option to the select element
        $('#jobTitle').append(new Option(name, id));
    });
}, error: function(xhr, responseData){
      if(xhr.status == 500){
        console.log('error');
      }
    }
  })
  })

 

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
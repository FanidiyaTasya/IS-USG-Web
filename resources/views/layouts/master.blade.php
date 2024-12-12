<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IS-USG Domba</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/seodashlogo.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @include('layouts.sidebar')

    <!--  Main wrapper -->
    <div class="body-wrapper">
        @include('layouts.navbar')

        <div class="container-fluid">
            @yield('content')
            @include('sweetalert::alert')
        </div>

    </div>
  </div>
  <script src="{{ asset('assets/js/datetime.js') }}"></script>
  <script src="{{ asset('assets/js/search.js') }}"></script>
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
      $(document).ready(function() {
          $('.js-example-basic-single').select2();
        });
    </script>
  <script>
    $(document).ready(function(){
        $("#ultrasound_image").change(function(event){
            var formData = new FormData($("#radiologyForm")[0]);

            $.ajax({
                url: '{{ url('/predict-usg') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    console.log('AJAX Success:', response);

                    if(response.result){
                        $("#predictionResult").val(response.result);
                        $("#predictionResultText").html("Prediction Result: " + response.result);
                    } else {
                        $("#predictionResult").val("Prediction failed.");
                    }
                },
                error: function(xhr, status, error){
                    console.error('AJAX Error:');
                    console.error('Status:', status);
                    console.error('Error:', error);
                    console.error('Response:', xhr.responseText);
                }
            });
        });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script>
    $(document).ready(function () {
        $('#vitalSignForm').on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);

            $.ajax({
                url: '/check-health',
                method: 'POST',
                data: JSON.stringify(Object.fromEntries(formData)),
                contentType: 'application/json',
                success: function (response) {
                    $('#statusCondition').val(response.prediction);
                    formData.set('status_condition', response.prediction);

                    $.ajax({
                        url: '/vital-sign',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (saveResponse) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: saveResponse.message,
                            }).then(() => {
                                window.location.href = '/vital-sign';
                            });
                        },
                        error: function (xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Data tidak dapat disimpan. Silakan cek input Anda.',
                            });
                        },
                    });
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Gagal mendapatkan prediksi.',
                    });
                },
            });
        });
    });
</script>
</body>
</html>
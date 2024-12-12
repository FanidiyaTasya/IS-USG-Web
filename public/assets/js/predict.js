// Fungsi untuk menangani prediksi USG
function handleUSGPredict() {
    $("#ultrasound_image").change(function(event) {
        const predictUrl = $(this).data('url'); // Ambil URL dari data-url
        var formData = new FormData($("#radiologyForm")[0]);

        // Tampilkan status awal
        $('#statusMessage').text("Memproses gambar...");

        // AJAX request
        $.ajax({
            url: predictUrl,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log('AJAX Success:', response);
                $('#statusMessage').text("Prediksi selesai.");

                if(response.result) {
                    $("#predictionResult").val(response.result);
                    $("#predictionResultText").html("Hasil: " + response.result);
                } else {
                    $("#predictionResult").val("Prediksi gagal.");
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                $('#statusMessage').text("Terjadi kesalahan, coba lagi.");
            }
        });
    });
}

// Fungsi untuk menangani prediksi kesehatan
function handleHealthPredict() {
    $("#health_data").change(function(event) {
        var formData = new FormData($("#healthForm")[0]);
        $('#healthStatusMessage').text("Memproses data kesehatan...");

        $.ajax({
            url: '{{ url('/predict-health') }}',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log('AJAX Success (Health):', response);
                $('#healthStatusMessage').text("Prediksi kesehatan selesai.");

                if (response.result) {
                    $("#healthPredictionResult").val(response.result);
                } else {
                    $("#healthPredictionResult").val("Prediksi kesehatan gagal.");
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error (Health):', error);
                $('#healthStatusMessage').text("Terjadi kesalahan, coba lagi.");
            }
        });
    });
}

// Panggil fungsi saat dokumen siap
$(document).ready(function() {
    handleUSGPredict();
    handleHealthPredict();
});

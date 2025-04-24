<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wilayah Indonesia</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: sans-serif;
            padding: 30px;
        }
        label {
            display: block;
            margin-top: 20px;
        }
        select {
            padding: 10px;
            width: 300px;
        }
    </style>
</head>
<body>

    <h1>Data Wilayah Indoneisa</h1>

    <label for="provinsi">Pilih Provinsi:</label>
    <select id="provinsi">
        <option value="">-- Pilih Provinsi --</option>
    </select>

    <label for="kabupaten">Pilih Kabupaten/Kota:</label>
    <select id="kabupaten">
        <option value="">-- Pilih Kabupaten/Kota --</option>
    </select>

    <script>
        $(document).ready(function () {
            // Load Provinsi
            $.get('/provinsi', function (data) {
                data.forEach(function (provinsi) {
                    $('#provinsi').append(
                        `<option value="${provinsi.id}">${provinsi.name}</option>`
                    );
                });
            });

            // Load Kabupaten saat Provinsi dipilih
            $('#provinsi').on('change', function () {
                const provId = $(this).val();
                $('#kabupaten').empty().append(`<option value="">-- Pilih Kabupaten/Kota --</option>`);
                if (provId) {
                    $.get(`/kabupaten/${provId}`, function (data) {
                        data.forEach(function (kab) {
                            $('#kabupaten').append(
                                `<option value="${kab.id}">${kab.name}</option>`
                            );
                        });
                    });
                }
            });

            let selectedProvinsi = '';
            let selectedKabupaten = '';

            $('#provinsi').on('change', function () {
                selectedProvinsi = $(this).val();
            });

            $('#kabupaten').on('change', function () {
                selectedKabupaten = $(this).val();
            });

            $('body').append('<button id="processButton" style="margin-top: 20px; padding: 10px;">Proses</button>');

            $('#processButton').on('click', function () {
                if (selectedProvinsi && selectedKabupaten) {
                    $.get(`/services/data/${selectedKabupaten}`, function (data) {
                        console.log('Data sesuai Kabupaten ID:', data);
                        // Display the data on the page
                        $('body').append(`<div><h2>Data Kabupaten</h2><pre>${JSON.stringify(data, null, 2)}</pre></div>`);
                    });
                } else {
                    alert('Silakan pilih Provinsi dan Kabupaten terlebih dahulu.');
                }
            });
    </script>

</body>
</html>

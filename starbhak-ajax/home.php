<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="tampilan.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <div class="card ca">
            <h1 align="center" class="mb-4 mt-2 a">PHP AJAX SMK TARUNA BHAKTI</h1>
            <h2 align="center" class="mb-4 mt-1 ">Autocomplete Dengan Gambar dan Ajax</h2>
        <div align="center">
            <input type="text" name="nama_siswa" id="nama_siswa" placeholder="Cari Nama Siswa ..." class="form-control">
        </div>
            <ul class="list-group" style="margin-top:21%;" id="resultlist"></ul>
        </div>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({cache: false});
        $('#nama_siswa').keyup(function() {
            $('#resultlist').html('');
            $('#state').val('');
            let nama_siswa = $('#nama_siswa').val();

            $.ajax({
                type: 'POST',
                url: "get_data.php",
                data: {nama_siswa:nama_siswa},
                success: function(data) {
                    $.each(JSON.parse(data), function(key, value) {
                        $('#resultlist').append(`
                        <li class="list-group-item link-class" >
                        <img src="avatar/`+value.avatar+`" height="40" width="40" class="img-thumbnail"/>
                        <span class="nama">`+value.nama_siswa+`</span>
                        <span class="text-muted" style="float: right;">`+value.alamat+`</span>
                        </li>`);
                    });
                }
            });
        });

        $('$resultlist').on('click', 'li', function() {
            let nama_siswa = $(this).children('.nama').text();

            $('#nama_siswa').val(nama_siswa);
            $("#resultlist").html('');
        });

    });
</script>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function wilayahTemplate(res) {
        return res.text;
    };

    $('#provinsi, #kabupaten, #kecamatan, #desa').select2({
        placeholder: 'Pilih ...',

    });

    $.ajax({
        url: '/list-provinsi'
    }).done(function(data) {
        var res = $.map(data, function(obj) {
            return {
                id: obj.id,
                text: obj.name
            };
        });
        $('#provinsi').select2({
            placeholder: "Pilih Provinsi",
            data: res,
            templateResult: wilayahTemplate

        });
    });

    $('#provinsi').on('change', function(e) {
        e.preventDefault();
        const provinsiId = $(this).val();
        const selectedProvinsiName = $(this).find("option:selected").text();
        console.log(selectedProvinsiName);

        $('#selectedProvinsiName').val(selectedProvinsiName);
        $('#kabupaten').val(null).trigger('change');
        $('#kabupaten').empty();

        if (provinsiId) {
            $.ajax({
                url: `/list-kabupaten/${provinsiId}`
            }).done(function(data) {
                var res = $.map(data, function(obj) {
                    return {
                        id: obj.id,
                        text: obj.name
                    };
                });
                $('#kabupaten').select2({
                    placeholder: "Pilih Kabupaten",
                    data: res,
                });
            });
        }
    });

    $('#kabupaten').on('change', function(e) {
        e.preventDefault();
        const kabupatenId = $(this).val();
        const selectedKabupatenName = $(this).find("option:selected").text();
        console.log(selectedKabupatenName);

        $('#selectedKabupatenName').val(selectedKabupatenName);
        $('#kecamatan').val(null).trigger('change');
        $('#kecamatan').empty();


        if (kabupatenId) {
            $.ajax({
                url: `/list-kecamatan/${kabupatenId}`
            }).done(function(data) {
                var res = $.map(data, function(obj) {
                    return {
                        id: obj.id,
                        text: obj.name,
                    };
                });
                $('#kecamatan').select2({
                    placeholder: "Pilih Kecamatan",
                    data: res,
                });
            });
        }
    });

    $('#kecamatan').on('change', function(e) {
        e.preventDefault();
        const kecamatanId = $(this).val();
        const selectedKecamatanName = $(this).find("option:selected").text();
        console.log(selectedKecamatanName);
        $('#selectedKecamatanName').val(selectedKecamatanName)
        $('#desa').val(null).trigger('change');
        $('#desa').empty();


        if (kecamatanId) {
            $.ajax({
                url: `/list-desa/${kecamatanId}`
            }).done(function(data) {
                var res = $.map(data, function(obj) {
                    return {
                        id: obj.id,
                        text: obj.name,
                    };
                });
                $('#desa').select2({
                    placeholder: "Pilih Desa",
                    data: res,
                });
            });
        }
    });

    $('#desa').on('change', function(e) {
        e.preventDefault();
        const selectedDesaName = $(this).find("option:selected").text();
        console.log('selectedDesaName', selectedDesaName);
        $("#selectedDesaName").val(selectedDesaName);
    });
</script>

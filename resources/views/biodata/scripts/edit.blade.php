<script>
    let biodata = @json($biodata);

    function wilayahTemplate(res) {
        return res.text;
    };

    $('#provinsi, #kabupaten, #kecamatan, #desa').select2({
        placeholder: 'Pilih Wilayah',
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
            allowClear: true,
            data: res,
            templateResult: wilayahTemplate
        });

    }).fail(function() {
        alert('Gagal memuat provinsi');
    });

    $('#provinsi').on('change', function(e) {
        const provinsiId = $(this).val();
        const selectedProvinsiName = $(this).find("option:selected").text();
        $('#selectedProvinsiName').val(selectedProvinsiName);

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
                res.push({id: null, text: "Pilih Kabupaten"});

                $('#kabupaten').select2({
                    placeholder: "Pilih Kabupaten",
                    data: res,
                    allowClear: true,
                }).val(null).trigger('change');
            }).fail(function() {
                alert('Gagal memuat kabupaten');
            });
        }
    });

    $('#kabupaten').on('change', function(e) {
        const kabupatenId = $(this).val();
        const selectedKabupatenName = $(this).find("option:selected").text();
        $('#selectedKabupatenName').val(selectedKabupatenName);

        $('#kecamatan').empty();
        $('#kecamatan').val(null).trigger('change');

        if (kabupatenId && kabupatenId != 0) {
            $.ajax({
                url: `/list-kecamatan/${kabupatenId}`
            }).done(function(data) {
                var res = $.map(data, function(obj) {
                    return {
                        id: obj.id,
                        text: obj.name,
                    };
                });
                res.push({id: null, text: "Pilih Kecamatan"});
                $('#kecamatan').select2({
                    placeholder: "Pilih Kecamatan",
                    data: res,
                    allowClear: true,
                }).val(null).trigger('change');

            }).fail(function() {
                alert('Gagal memuat kecamatan');
            });
        }
    });

    $('#kecamatan').on('change', function(e) {
        const kecamatanId = $(this).val();
        const selectedKecamatanName = $(this).find("option:selected").text();
        $('#selectedKecamatanName').val(selectedKecamatanName);

        $('#desa').empty();
        $('#desa').val(null).trigger('change');
        if (kecamatanId && kecamatanId != 0) {
            $.ajax({
                url: `/list-desa/${kecamatanId}`
            }).done(function(data) {
                var res = $.map(data, function(obj) {
                    return {
                        id: obj.id,
                        text: obj.name,
                    };
                });
                res.push({id: null, text: "Pilih Desa"});
                $('#desa').select2({
                    placeholder: "Pilih Desa",
                    data: res,
                    allowClear: true,
                }).val(null).trigger('change');

            }).fail(function() {
                alert('Gagal memuat desa');
            });
        }
    });

    $('#desa').on('change', function(e) {
        const selectedDesaName = $(this).find("option:selected").text();
        $("#selectedDesaName").val(selectedDesaName);
    });
</script>

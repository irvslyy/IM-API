
$(function () {
    var table = $('.closing-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "http://localhost/mentahan_efabs/closing/api",
            "type": "GET"
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'salescode', name: 'salescode'},
            {data: 'nama_ktp', name: 'nama_ktp'},
            {data: 'no_ktp', name: 'no_ktp'},
            {data: 'alamat', name: 'alamat'},
            {data: 'kota', name: 'kota'},
            {data: 'kel', name: 'kel'},
            {data: 'kec', name: 'kec'},
            {data: 'rt', name: 'rt'},
            {data: 'rw', name: 'rw'},
            {data: 'kode_pos', name: 'kode_pos'},
            {data: 'tanggal_lahir', name: 'tanggal_lahir'},
            {data: 'jenis_kelamin', name: 'jenis_kelamin'},
            {data: 'telp_rumah', name: 'telp_rumah'},
            {data: 'no_hp', name: 'no_hp'},
            {data: 'no_hp_2', name: 'no_hp_2'},
            {data: 'email', name: 'email'},
            {data: 'stts_rumah', name: 'stts_rumah'},
            {data: 'tipe_rumah', name: 'tipe_rumah'},
            {data: 'akses_lokasi', name: 'akses_lokasi'},
            {data: 'alamat_pemasangan', name: 'alamat_pemasangan'},
            {data: 'kota_pemasangan', name: 'kota_pemasangan'},
            {data: 'kec_pemasangan', name: 'kec_pemasangan'},
            {data: 'kel_pemasangan', name: 'kel_pemasangan'},
            {data: 'rt_pemasangan', name: 'rt_pemasangan'},
            {data: 'rw_pemasangan', name: 'rw_pemasangan'},
            {data: 'kodepos_pemasangan', name: 'kodepos_pemasangan'},
            {data: 'kategori_produk', name: 'kategori_produk'},
            {data: 'produk_nama', name: 'produk_nama'},
            {data: 'value_pack', name: 'value_pack'},
            {data: 'produk_market', name: 'produk_market'},
            {data: 'payment', name: 'payment'},
            {data: 'bonus', name: 'bonus'}, 
            {data: 'installasi_fee', name: 'installasi_fee'}, 
            {data: 'catatan', name: 'catatan'},
            {data: 'harga', name: 'harga'},
            {data: 'nomor_tlp', name: 'nomor_tlp'},
            {data: 'longitude', name: 'longitude'},
            {data: 'latitude', name: 'harga'},
            {data: 'foto_rumah', name: 'foto_rumah', "render": function (data, type, full, meta) {
                    return "<img src=\"http://localhost/mentahan_efabs/public/image/foto_rumah/" + data + "\" height=\"50\"/>";
                }
            },
            {data: 'foto_ktp', name: 'foto_ktp', "render": function (data, type, full, meta) {
                    return "<img src=\"http://localhost/mentahan_efabs/public/image/foto_ktp/" + data + "\" height=\"50\"/>";
                }
            },
            {data: 'foto_pelanggan', name: 'foto_pelanggan', "render": function (data, type, full, meta) {
                    return "<img src=\"http://localhost/mentahan_efabs/public/image/foto_pelanggan/" + data + "\" height=\"50\"/>";
                }
            },
            {data: 'foto_kwhmeter', name: 'foto_kwhmeter', "render": function (data, type, full, meta) {
                    return "<img src=\"http://localhost/mentahan_efabs/public/image/foto_kwhmeter/" + data + "\" height=\"50\"/>";
                }
            },
            {data: 'status_verifikasi', name: 'status_verifikasi'},
            
        ]
    });
});
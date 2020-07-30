
$(function () {
    var table = $('.data-table').DataTable({
        searchDelay: 700,
        processing: true,
        serverSide: true,
        ajax: "http://localhost/mentahan_efabs/users/api",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'salescode', name: 'salescode'},
            {data: 'nik', name: 'nik'},
            {data: 'username', name: 'username'},
            {data: 'email', name: 'email'},
            {data: 'name', name: 'name'},
            {data: 'pict_users', name: 'pict_users', "render": function (data, type, full, meta) {
                    return "<img src=\"http://localhost/mentahan_efabs/public/image/foto_user/" + data + "\" height=\"50\"/>";
                }
            },
            {data: 'status', name: 'status'},
            {data: 'phone_number', name: 'phone_number'},
            {data: 'location', name: 'location'},
            {data: 'role', name: 'role'},
            {data: 'lat', name: 'lat'},
            {data: 'lng', name: 'lng'},
            {data: 'token', name: 'token'},
            {data: 'pin', name: 'pin'},
        ]
    });
});
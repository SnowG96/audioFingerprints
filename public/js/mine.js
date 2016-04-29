var Id;
function getId(id) {
    Id = id;
}

function radioDelete() {
    $.ajax({
        method: "POST",
        url: "/radiostation/delete/" + Id,
        data: {},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            window.location.replace("/radiostation/show");
        },
        error: function (err) {
            console.info(err);
        }
    });
}
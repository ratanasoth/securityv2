$(document).ready(function () {
    $("#btnClose").click(function () {
        $("#data").html("");
        $("#search_name").val("");
        $("#myModal").modal('hide');
    });
    $("#btnSearch").click(function () {
        searchCompany($("#search_name").val());
    });
    $("#search_name").keyup(function (e) {
        if(e.keyCode==13)
        {
            searchCompany($("#search_name").val());
        }
    });
    // when user click select button
    $("#btnSelect").on('click', function () {
        var cid = $("#data tr[abc='yes']").attr("id");
        var cname = $("#data tr[abc='yes']").attr('name');
        $("#company_id").val(cid);
        $("#company_name").val(cname);
        $("#data").html("");
        $("#search_name").val("");
        $("#myModal").modal('hide');
    })
});

// search company or enterprise by its name
function searchCompany(name) {
    $.ajax({
        type: "GET",
        url: burl + "/company/find?q=" + name,
        success: function (data) {
            var tr="";
            for(var i=0; i<data.length; i++)
            {
                tr += "<tr id='" + data[i].id + "' name='" + data[i].name + "' onclick='makeSelect(this)' abc='no' class=''>";
                tr += "<td>" + data[i].id + "</td>";
                tr += "<td>" + data[i].code + "</td>";
                tr += "<td>" + data[i].name + "</td>";
                var t= data[i].type=='company'?'ក្រុមហ៊ុន':'សហគ្រាស';
                tr += "<td>" + t + "</td>";
                tr += "</tr>";
            }
            $("#data").html(tr);
        },

    });
}
// function to make row selected
function makeSelect(row) {
    var id=$(row).attr('id');
    $("#data tr").attr('abc', 'no');
    $(row).attr('abc', 'yes');
    $("#data tr").removeClass('selected');
    $(row).addClass('selected');
}
// function to preview image while selecting an image to upload
function loadFile(e){
    var output = document.getElementById('preview');
    output.width = 54;
    output.src = URL.createObjectURL(e.target.files[0]);
}
function conx() {
    $("#con").val("yes");
    frm.submit();
}
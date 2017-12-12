
$(document).ready(function () {
    getDistrict();
    // filter district on province change
    $("#province").change(function () {
        getDistrict();
    });
    $("#district").change(function () {
        getCommune();
    });
    $("#commune").change(function () {
        getVillage();
    })
});
function getProvince() {
    // get province
    $.ajax({
        type: "GET",
        url: burl + "/province/get",
        contentType: "application/json; charset=UTF-8",
        success: function (data) {
            var opts = "";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].name + "' id='" + data[i].id + "'>" + data[i].name + "</option>";
            }
            $("#province").html(opts);
            $("#province").val(cur_province);
            setTimeout(getDistrict, 200);

        }
    });
}
// function to get district
function getDistrict()
{
    // get district
    $.ajax({
        type: "GET",
        url: burl + "/company/getdistrict/" + $("#province :selected").attr('id'),
        contentType: "application/json; charset=UTF-8",
        success: function (data) {
            var opts = "";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].name + "' id='" + data[i].id + "'>" + data[i].name + "</option>";
            }
            $("#district").html(opts);
            $("#district").val(cur_district);
            setTimeout(getCommune, 200);

        }
    });
}
// function to get commune
function getCommune()
{
    $.ajax({
        type: "GET",
        url: burl + "/company/getcommune/" + $("#district :selected").attr("id"),
        success: function (data) {
            var opts = "";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].name + "' id='" + data[i].id + "'>" + data[i].name + "</option>";
            }
            $("#commune").html(opts);
            $("#commune").val(cur_commune)
            setTimeout(getVillage, 200);
        }
    });
}
// function to get village
function getVillage() {
    $.ajax({
        type: "GET",
        url: burl + "/company/getvillage/" + $("#commune :selected").attr("id"),
        success: function (data) {
            var opts = "";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].name + "'>" + data[i].name + "</option>";
            }
            $("#village").html(opts);
            $("#village").val(cur_village);
        }
    });
}
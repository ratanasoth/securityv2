
$(document).ready(function () {
    getDistrict2();
    // filter district on province change
    $("#current_province").change(function () {
        getDistrict2();
    });
    $("#current_district").change(function () {
        getCommune2();
    });
    $("#current_commune").change(function () {
        getVillage2();
    })
});
function getProvince2() {
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
            $("#current_province").html(opts);
            $("#current_province").val(province);
            setTimeout(getDistrict2, 200);

        }
    });
}
// function to get district
function getDistrict2()
{
    // get district
    $.ajax({
        type: "GET",
        url: burl + "/company/getdistrict/" + $("#current_province :selected").attr('id'),
        contentType: "application/json; charset=UTF-8",
        success: function (data) {
            var opts = "";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].name + "' id='" + data[i].id + "'>" + data[i].name + "</option>";
            }
            $("#current_district").html(opts);
            $("#current_district").val(district);
            setTimeout(getCommune2, 200);

        }
    });
}
// function to get commune
function getCommune2()
{
    $.ajax({
        type: "GET",
        url: burl + "/company/getcommune/" + $("#current_district :selected").attr("id"),
        success: function (data) {
            var opts = "";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].name + "' id='" + data[i].id + "'>" + data[i].name + "</option>";
            }
            $("#current_commune").html(opts);
            $("#current_commune").val(commune)
            setTimeout(getVillage2, 200);
        }
    });
}
// function to get village
function getVillage2() {
    $.ajax({
        type: "GET",
        url: burl + "/company/getvillage/" + $("#current_commune :selected").attr("id"),
        success: function (data) {
            var opts = "";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].name + "'>" + data[i].name + "</option>";
            }
            $("#current_village").html(opts);
            $("#current_village").val(village);
        }
    });
}
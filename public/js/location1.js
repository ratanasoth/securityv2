
$(document).ready(function () {
    getDistrict1();
    // filter district on province change
    $("#current_province").change(function () {
        getDistrict1();
    });
    $("#current_district").change(function () {
        getCommune1();
    });
    $("#current_commune").change(function () {
        getVillage1();
    })
});
// function to get district
function getDistrict1()
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
            setTimeout(getCommune1, 200);
        }
    });
}
// function to get commune
function getCommune1()
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
            setTimeout(getVillage1, 200);
        }
    });
}
// function to get village
function getVillage1() {
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
        }
    });
}
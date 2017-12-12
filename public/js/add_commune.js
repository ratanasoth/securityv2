/**
 * Created by Vongkol on 4/1/2017.
 */
$(document).ready(function () {
    getDistrict();
    // filter district on province change
    $("#province").change(function () {
      getDistrict();
    });
});
// function to get district
function getDistrict()
{
    // get district
    $.ajax({
        type: "GET",
        url: burl + "/company/getdistrict/" + $("#province").val(),
        success: function (data) {
            var opts = "";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].id + "'>" + data[i].name + "</option>";
            }
            $("#district").html(opts);
        }
    });
}
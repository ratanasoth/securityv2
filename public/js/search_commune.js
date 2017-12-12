/**
 * Created by Vongkol on 4/3/2017.
 */
$(function () {
    getDistrict();
});
// function to get district
function getDistrict()
{
    // get district
    $.ajax({
        type: "GET",
        url: burl + "/company/getdistrict/" + $("#province").val(),
        success: function (data) {
            var opts = "<option value='all'>មើលទាំងអស់</option>";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].id + "'>" + data[i].name + "</option>";
            }
            $("#district").html(opts);
            if(def_district_id!="")
                $("#district").val(def_district_id);
        }
    });
}
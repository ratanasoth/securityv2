var pob;
var pro;
var add;
var edu;
var oldTraining;
var oldCourse;
$(document).ready(function () {
    // hide save button
    $(".spouse-btn").hide();
    $(".father-btn").hide();
    $(".mother-btn").hide();

    if($("#ch3").val()==1)
    {
        $("#frm6").hide();
    }
    else{
        $("#frm6").show();
    }
    // disable photo button
    // add education training
    $("#btnAddTraining").click(function (event) {
        event.preventDefault();
        // create row
        var tr = "";
        tr += "<tr id='0'>";
        tr += "<td>" + "<input type='text' class='form-control'>" + "</td>";
        tr += "<td>" + "<input type='text' class='form-control'>" + "</td>";
        tr += "<td>" + "<input type='text' class='form-control'>" + "</td>";
        tr += "<td>" + "<input type='text' class='form-control' style='width: 90px;display:inline'>" + " <a href='#' class='btn btn-primary btn-flat' onclick='saveEdu(this, event)'>រក្សាទុក</a> <a href='#' class='btn btn-danger btn-flat' onclick='rm(this, event)'>បោះបង់</a>" + "</td>";
        tr += "</tr>";
        if($("#block1 tr:last-child").length>0)
        {
            $("#block1 tr:last-child").after(tr);
        }
        else{
            $("#block1").html($("#block1").html() + tr);
        }
    });
    // add training course
    $("#btnAddTraining1").click(function (event) {
        event.preventDefault();
        var tr = "";
        tr += "<tr id='0'>";
        tr += "<td>" + "<input type='text' class='form-control'>" + "</td>";
        tr += "<td>" + "<input type='text' class='form-control'>" + "</td>";
        tr += "<td>" + "<input type='text' class='form-control'>" + "</td>";
        tr += "<td>" + "<a href='#' class='btn btn-primary btn-flat' onclick='saveTraining(this, event)'>រក្សាទុក</a> <a href='#' class='btn btn-danger btn-flat' onclick='rm(this, event)'>បោះបង់</a>" + "</td>";
        if($("#training_block tr").length>0)
        {
            $("#training_block tr:last-child").after(tr);
        }
        else
        {
            $("#training_block").html($("#training_block").html() + tr);
        }
    });
    // add new language
    $("#btnAddLanguage").click(function (event) {
        event.preventDefault();
        var tr = "";
        tr += "<tr id='0'>";
        tr += "<td>" + "<input type='text' class='form-control'>" + "</td>";
        tr += "<td>" + "<a href='#' class='btn btn-primary btn-flat' onclick='saveLang(this, event)'>រក្សាទុក</a> <a href='#' class='btn btn-danger btn-flat' onclick='rm(this, event)'>បោះបង់</a>" + "</td>";
        tr +="<td></td><td></td>";
        tr += "</tr>";
        if($("#block2 tr:last-child").length>0)
        {
            $("#block2 tr:last-child").after(tr);
        }
        else{
            $("#block2").html($("#block2").html() + tr);
        }
    });
    // add new criminal
    $("#btnAddCriminal").click(function (event) {
        event.preventDefault();
        var tr = "";
        tr += "<tr id='0'>";
        tr += "<td>" + "<input type='text' class='form-control'>" + "</td>";
        tr += "<td>" + "<a href='#' class='btn btn-primary btn-flat' onclick='saveCriminal(this, event)'>រក្សាទុក</a> <a href='#' class='btn btn-danger btn-flat' onclick='rm(this, event)'>បោះបង់</a>" + "</td>";
        tr += "</tr>";
        if($("#block3 tr:last-child").length>0)
        {
            $("#block3 tr:last-child").after(tr);
        }
        else{
            $("#block3").html($("#block3").html() + tr);
        }
    });
    // add new experience
    $("#btnAddExp").click(function (event) {
        event.preventDefault();
        // create new row
        var tr ="";
        tr += "<tr id='0'>";
        tr += "<td>" + "<input type='text' class='form-control'>" + "</td>";
        tr += "<td>" + "<input type='text' class='form-control'>" + "</td>";
        tr += "<td>" + "<a href='#' class='btn btn-primary btn-flat' onclick='saveExp(this,event)'>រក្សាទុក</a> <a href='#' class='btn btn-danger btn-flat' onclick='rm(this,event)'>បោះបង់</a>" + "</td>";
        tr += "</tr>";
        if($("#block6 tr:last-child").length>0)
        {
            // append
            $("#block6 tr:last-child").after(tr);
        }
        else
        {
            $("#block6").html($("#block6").html()+tr);
        }
    });
    // edit based profile information
    $("#btnEdit1").click(function (event) {
        event.preventDefault();
        // disable button edit
        $("#btnEdit1").attr("disabled", "true");
        // enable all inputs for editting
        $("#profile1 input[type='text'], #profile1 select, #btnSelect1").removeAttr("disabled");
        // show button save
        $("#group1").removeClass("hide");
        pro = {
            code: $("#code").val(),
            khmer_name: $("#khmer_name").val(),
            english_name: $("#english_name").val(),
            gender: $("#gender").val(),
            dob: $("#dob").val(),
            phone1: $("#phone1").val(),
            phone2: $("#phone2").val(),
            company_id: $("#company_id").val(),
            company_name: $("#company_name").val()
        };

    });
    // edit pob
    $("#btnEdit2").click(function (event) {
        event.preventDefault();
        // disable edit button
        $("#btnEdit2").attr("disabled", "true");
        // enable all inputs for editing
        $("#profile2 input[type='text'], #profile2 select").removeAttr("disabled");
        // show button save
        $("#group2").removeClass("hide");
        pob = {
            home_no: $("#home").val(),
            street: $("#street").val(),
            krom: $("#krom").val(),
        };
    });
    // edit current address
    $("#btnEdit3").click(function (event) {
        event.preventDefault();
        $("#btnEdit3").attr("disabled", "true");
        $("#profile3 input[type='text'], #profile3 select").removeAttr("disabled");
        $("#group3").removeClass("hide");
        add = {
            home: $("#current_home").val(),
            street: $("#current_street").val(),
            krom: $("#current_group").val()
        };
    });
    // disable form when click cancel 1
    $("#btnCancel1").click(function () {

            $("#khmer_name").val(pro.khmer_name);
            $("#english_name").val(pro.english_name);
            $("#gender").val(pro.gender);
            $("#dob").val(pro.dob);
            $("#code").val(pro.code);
            $("#phone1").val(pro.phone1);
            $("#phone2").val(pro.phone2);
            $("#company_name").val(pro.company_name);
            $("#company_id").val(pro.company_id);
            // enable button edit back
            $("#btnEdit1").removeAttr("disabled");
            $("#group1").addClass('hide');
            $("#profile1 input[type='text'], #profile1 select, #btnSelect1").attr("disabled", "true");

    });
    // cancel address
    $("#btnCancel2").click(function () {
        $("#home").val(pob.home_no);
        $("#street").val(pob.street);
        $("#krom").val(pob.krom);
        getProvince();
        // enable button edit back
        $("#btnEdit2").removeAttr("disabled");
        $("#group2").addClass('hide');
        $("#profile2 input[type='text'], #profile2 select").attr("disabled", "true");
    });
    $("#btnCancel3").click(function () {
        $("#current_home").val(add.home);
        $("#current_group").val(add.krom);
        $("#current_street").val(add.street);
        getProvince2();
        $("#btnEdit3").removeAttr("disabled");
        $("#group3").addClass('hide');
        $("#profile3 input[type='text'], #profile3 select").attr("disabled", "true");
    });
    // btn cancel 5
    $("#btnCancel5").click(function () {
        $("#general_education").val(edu.name);
        $("#school_name").val(edu.school);
        $("#study_place").val(edu.place);
        $("#study_year").val(edu.year);
        $("#btnEditEducation").removeAttr("disabled");
        $("#group5").addClass('hide');
        $("#edu input").attr("disabled", "true");
    });
    // save profile btnSave1
    $("#btnSave1").click(function () {
        var emp = {
            code: $("#code").val(),
            khmer_name: $("#khmer_name").val(),
            english_name: $("#english_name").val(),
            gender: $("#gender").val(),
            dob: $("#dob").val(),
            phone1: $("#phone1").val(),
            phone2:$("#phone2").val(),
            company_id: $("#company_id").val(),
            company_name: $("#company_name").val(),
            employee_id: $("#employee_id").val(),
            agency: $("#agency").val()
        };
        $("#sms").html("កំពុងរក្សាទុក ...");
        // save
        $.ajax({
            type: "POST",
            url: burl +"/employee/saveprofile",
            data: emp,
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
            },
            success: function (sms) {
                $("#sms").html("");
                if(sms)
                {
                    // enable button edit back
                    $("#btnEdit1").removeAttr("disabled");
                    $("#group1").addClass('hide');
                    $("#profile1 input[type='text'], #profile1 select, #btnSelect1").attr("disabled", "true");
                }
            }
        });
    });

    // save pob
    $("#btnSave2").click(function () {
        var pob = {
            home: $("#home").val(),
            street: $("#street").val(),
            group: $("#group").val(),
            village: $("#village").val(),
            commune: $("#commune").val(),
            district: $("#district").val(),
            province: $("#province").val(),
            employee_id: $("#employee_id").val()
        };
        $("#sms1").html("កំពុងរក្សាទុក ...");
        // save
        $.ajax({
            type: "POST",
            url: burl +"/employee/savepob",
            data: pob,
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
            },
            success: function (sms) {
                $("#sms1").html("");
                if(sms)
                {
                    // enable button edit back
                    $("#btnEdit2").removeAttr("disabled");
                    $("#group2").addClass('hide');
                    $("#profile2 input[type='text'], #profile2 select").attr("disabled", "true");
                }
            }
        });
    });
    $("#btnSave3").click(function () {
        var address = {
            current_home: $("#current_home").val(),
            current_street: $("#current_street").val(),
            current_group: $("#current_group").val(),
            current_village: $("#current_village").val(),
            current_commune: $("#current_commune").val(),
            current_district: $("#current_district").val(),
            current_province: $("#current_province").val(),
            employee_id: $("#employee_id").val()
        };
        $.ajax({
            type: "POST",
            url: burl +"/employee/saveadd",
            data: address,
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
            },
            success: function (sms) {
                $("#sms2").html("");
                if(sms)
                {
                    // enable button edit back
                    $("#btnEdit3").removeAttr("disabled");
                    $("#group3").addClass('hide');
                    $("#profile3 input[type='text'], #profile3 select").attr("disabled", "true");
                }
            }
        });
    });
    // update edu
    $("#btnSave5").click(function () {
        var education = {
          education: $("#general_education").val(),
            school_name: $('#school_name').val(),
            study_place: $("#study_place").val(),
            study_year: $("#study_year").val(),
            employee_id: $("#employee_id").val()
        };
        $.ajax({
            type: "POST",
            url: burl +"/employee/updateedu",
            data: education,
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
            },
            success: function (sms) {
                $("#sms5").html("");
                if(sms)
                {
                    // enable button edit back
                    $("#btnEditEducation").removeAttr("disabled");
                    $("#group5").addClass('hide');
                    $("#edu input").attr("disabled", "true");
                }
            }
        });
    });
    // close button of search form
    $("#btnClose").click(function () {
        $("#data").html("");
        $("#search_name").val("");
        $("#myModal").modal('hide');
    });
    $("#btnPhoto").click(function () {
        var o = confirm('តើអ្នកពិតជាចង់ផ្លាស់ប្តូររូបថតមែនទេ?');
        if(o)
        {
            var file_data = $('#photo').prop('files')[0];
            var form_data = new FormData();
            form_data.append('photo', file_data);
            form_data.append('employee_id', $("#employee_id").val());
            $("#sms4").removeClass('hide');
            $.ajax({
                type: 'POST',
                url:burl + '/employee/savephoto',
                data: form_data,
                type: 'POST',
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
                },
                success:function(sms){
                    $("#sms4").addClass('hide');
                    $("#btnPhoto").attr("disabled","true");
                },
            });

        }
    });

    // edit general education
    $("#btnEditEducation").click(function (event) {
        edu = {
            name: $("#general_education").val(),
            school: $("#school_name").val(),
            place: $("#study_place").val(),
            year: $("#study_year").val()
        };
        event.preventDefault();
        $("#btnEditEducation").attr("disabled", "true");
        $("#edu td input").removeAttr("disabled");
        $("#group5").removeClass("hide");
    });
    // search button of the modal
    $("#btnSearch").click(function () {
        searchCompany($("#search_name").val());
    });
    // register event key enter on search box in modal search
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
    });
    // upload document
    $("#btnSaveDoc").click(function () {
        var o = confirm('តើអ្នកពិតជាចង់ផ្លាស់ប្តូររូបថតមែនទេ?');
        if(o)
        {
            var file_data = $('#doc').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file_name', file_data);
            form_data.append('employee_id', $("#employee_id").val());
            $.ajax({
                type: 'POST',
                url:burl + '/employee/savedoc',
                data: form_data,
                type: 'POST',
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
                },
                success:function(sms){
                    var file_name = $("#doc").val();
                    var link = "<a href='" + burl +"/document/" + file_name.replace(/.*(\/|\\)/, '') + "' target='_blank'>" + file_name.replace(/.*(\/|\\)/, '') + "</a>";
                    var tr ="";
                    tr +="<tr id='" + sms + "'>";
                    tr +="<td>" + link + "</td>";
                    tr +="<td>" + '<a href="#" class="btn btn-link" onclick="delDoc(this,event)"><i class="fa fa-remove text-danger"></i></a>' + "</td>";
                    tr +="</tr>";
                    if($("#block4 tr:last-child").length>0)
                    {
                        $("#block4 tr:last-child").after(tr);
                    }
                    else{
                        $("#block4").html($("#block4").html() + tr);
                    }
                    $("#doc").val("");
                },
            });

        }
    });
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
    $("#btnPhoto").removeAttr("disabled");
}
// button cancel
function rm(obj, evt) {
    evt.preventDefault();
    var o = confirm('ពិតជាចង់បោះបង់ចោល?');
    if(o)
    {
        $(obj).parent().parent().remove();
    }

}
// save education
function saveEdu(obj, evt) {
    evt.preventDefault();
    var tr = $(obj).parent().parent();
    var tds = $(tr).children('td');
    var abc = {
        id: $(tr).attr("id"),
        level_name: $(tds[0]).children('input').val(),
        school_name: $(tds[1]).children('input').val(),
        study_place: $(tds[2]).children('input').val(),
        study_year: $(tds[3]).children('input').val(),
        employee_id: $("#employee_id").val()
    };
   // save to db
    $.ajax({
        type: "POST",
        url: burl +"/employee/updatetraining",
        data: abc,
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
        },
        success: function (sms) {
            if(sms)
            {
              // disable input
                $(tr).attr("id", sms);
                $(tds[0]).children('input').attr("disabled", "true");
                $(tds[1]).children('input').attr("disabled", "true");
                $(tds[2]).children('input').attr("disabled", "true");
                $(tds[3]).children('input').attr("disabled", "true");
                // change save button to edit button
                var save_btn = $(tds[3]).children('a')[0];
                var cancel_btn = $(tds[3]).children('a')[1];
                $(save_btn).html("<i class='fa fa-pencil text-primary'></i>");
                $(save_btn).attr('onclick', "edit(this,event)");
                $(save_btn).attr('class', "btn btn-link");
                $(cancel_btn).html("<i class='fa fa-remove text-danger'></i>");
                $(cancel_btn).attr('onclick', "del(this,event)");
                $(cancel_btn).attr('class', "btn btn-link");
            }
        }
    });
}
// save training course
function saveTraining(obj, evt) {

    evt.preventDefault();
    var tr = $(obj).parent().parent();
    var tds = $(tr).children('td');
    var training_course = {
        id: $(tr).attr("id"),
        name: $(tds[0]).children('input').val(),
        training_place: $(tds[1]).children('input').val(),
        training_year: $(tds[2]).children('input').val(),
        employee_id: $("#employee_id").val()
    };
    // save to db
    $.ajax({
        type: "POST",
        url: burl +"/training/save",
        data: training_course,
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
        },
        success: function (sms) {
            if(sms)
            {
                // disable input
                $(tr).attr("id", sms);
                $(tds[0]).html(training_course.name);
                $(tds[1]).html(training_course.training_place);
                $(tds[2]).html(training_course.training_year);

                // change save button to edit button
               $(tds[3]).html('<a href="#" onclick="editTraining(this,event)"><i class="fa fa-pencil text-primary"></i></a>&nbsp;&nbsp;<a href="#" onclick="delTraining(this,event)"><i class="fa fa-remove text-danger"></i></a>');
            }
        }
    });
}
// save criminal
function saveCriminal(obj, evt) {
    evt.preventDefault();
    var tr = $(obj).parent().parent();
    var tds = $(tr).children('td');
    var crim = {
        name: $(tds[0]).children('input').val() ,
        employee_id: $("#employee_id").val(),
        id: $(tr).attr("id")
    };
    $.ajax({
        type: "POST",
        url: burl +"/employee/updatecriminal",
        data: crim,
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
        },
        success: function (sms) {
            if(sms)
            {
                // disable input
                $(tr).attr("id", sms);
                $(tds[0]).html( $(tds[0]).children('input').val());
                $(tds[0]).children('input').remove();
                // change save button to edit button
                $(tds[1]).children('a')[1].remove();
                var cancel_btn = $(tds[1]).children('a')[0];
                $(cancel_btn).html("<i class='fa fa-remove text-danger'></i>");
                $(cancel_btn).attr('onclick', "delCrm(this,event)");
                $(cancel_btn).attr('class', "btn btn-link");
            }
        }
    });
}
// edit training
function edit(obj, evt) {
    evt.preventDefault();
    var tr = $(obj).parent().parent();
    var tds = $(tr).children('td');
    var tdata = {
        id: $(tr).attr("id"),
        level_name: $(tds[0]).children('input').val(),
        school_name: $(tds[1]).children('input').val(),
        study_place: $(tds[2]).children('input').val(),
        study_year: $(tds[3]).children('input').val()
    };
    oldTraining = {
        id: $(tr).attr("id"),
        level_name: $(tds[0]).children('input').val(),
        school_name: $(tds[1]).children('input').val(),
        study_place: $(tds[2]).children('input').val(),
        study_year: $(tds[3]).children('input').val()
    };
    // enable text box
    $(tds[0]).children('input').removeAttr("disabled");
    $(tds[1]).children('input').removeAttr("disabled");
    $(tds[2]).children('input').removeAttr("disabled");
    $(tds[3]).children('input').removeAttr("disabled");
    // change to save btn
    var save_btn = $(tds[3]).children('a')[0];
    $(save_btn).html("រក្សាទុក");
    $(save_btn).attr("class", "btn btn-primary btn-flat");
    $(save_btn).attr("onclick", "saveEdu(this,event)");
    var cancel_btn = $(tds[3]).children('a')[1];
    $(cancel_btn).html("បោះបង់");
    $(cancel_btn).attr('class', "btn btn-danger btn-flat");
    $(cancel_btn).attr("onclick", "cancelEdit(this,event)");
}
// edit training course
function editTraining(obj, evt) {
    evt.preventDefault();
    var tr = $(obj).parent().parent();
    var tds = $(tr).children('td');
    oldCourse = {
        name: $(tds[0]).html(),
        training_place: $(tds[1]).html(),
        training_year: $(tds[2]).html()
    }
    $(tds[0]).html("<input type='text' value='" + oldCourse.name + "'>");
    $(tds[1]).html("<input type='text' value='" + oldCourse.training_place + "'>");
    $(tds[2]).html("<input type='text' value='" + oldCourse.training_year + "'>");
    $(tds[3]).html("<a href='#' class='btn btn-primary btn-flat' onclick='saveTraining(this, event)'>រក្សាទុក</a> <a href='#' class='btn btn-danger btn-flat' onclick='cancelEditCourse(this, event)'>បោះបង់</a>");

}
// cancel edit training course
function cancelEditCourse(obj, evt) {
    evt.preventDefault();
    var tr = $(obj).parent().parent();
    var tds = $(tr).children('td');
    $(tds[0]).html(oldCourse.name);
    $(tds[1]).html(oldCourse.training_place);
    $(tds[2]).html(oldCourse.training_year);
    $(tds[3]).html('<a href="#" onclick="editTraining(this,event)"><i class="fa fa-pencil text-primary"></i></a>&nbsp;&nbsp;<a href="#" onclick="delTraining(this,event)"><i class="fa fa-remove text-danger"></i></a>');
}
// function to cancel edit
function cancelEdit(obj, evt) {
    evt.preventDefault();
    var tr = $(obj).parent().parent();
    var tds = $(tr).children('td');
    $(tds[0]).children('input').val(oldTraining.level_name);
    $(tds[1]).children('input').val(oldTraining.school_name);
    $(tds[2]).children('input').val(oldTraining.study_place);
    $(tds[3]).children('input').val(oldTraining.study_year);
    // change save button to edit button
    var save_btn = $(tds[3]).children('a')[0];
    var cancel_btn = $(tds[3]).children('a')[1];
    $(save_btn).html("<i class='fa fa-pencil text-primary'></i>");
    $(save_btn).attr('onclick', "edit(this,event)");
    $(save_btn).attr('class', "btn btn-link");
    $(cancel_btn).html("<i class='fa fa-remove text-danger'></i>");
    $(cancel_btn).attr('onclick', "del(this,event)");
    $(cancel_btn).attr('class', "btn btn-link");
    $(tds[0]).children('input').attr("disabled", "true");
    $(tds[1]).children('input').attr("disabled", "true");
    $(tds[2]).children('input').attr("disabled", "true");
    $(tds[3]).children('input').attr("disabled", "true");
}
// delete training
function del(obj, evt) {
    evt.preventDefault();
    var id = $(obj).parent().parent().attr('id');
    var o = confirm('តើអ្នកពិតជាចង់លុបមែនទេ?');
    // delete
    if(o)
    {
        $.ajax({
            type: "GET",
            url: burl + "/education/delete/" + id,
            success: function (sms) {
                if(sms)
                {
                    $(obj).parent().parent().remove();
                }
            }
        });
    }

}
// delete training
function delTraining(obj, evt) {
    evt.preventDefault();
    var id = $(obj).parent().parent().attr('id');
    var o = confirm('តើអ្នកពិតជាចង់លុបមែនទេ?');
    // delete
    if(o)
    {
        $.ajax({
            type: "GET",
            url: burl + "/training/delete/" + id,
            success: function (sms) {
                if(sms)
                {
                    $(obj).parent().parent().remove();
                }
            }
        });
    }
}
// save language
function saveLang(obj, evt) {
    evt.preventDefault();
    var tr = $(obj).parent().parent();
    var tds = $(tr).children('td');
    var lang = {
        name: $(tds[0]).children('input').val(),
        employee_id: $("#employee_id").val()
    };
    $.ajax({
        type: "POST",
        url: burl +"/employee/updatelanguage",
        data: lang,
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
        },
        success: function (sms) {
            if(sms)
            {
                // disable input
                $(tr).attr("id", sms);
                $(tds[0]).children('input').attr("disabled", "true");

                // change save button to edit button
                var save_btn = $(tds[1]).children('a')[0];
                var cancel_btn = $(tds[1]).children('a')[1];
                $(save_btn).remove();
                $(cancel_btn).html("<i class='fa fa-remove text-danger'></i>");
                $(cancel_btn).attr('onclick', "delLanguage(this,event)");
                $(cancel_btn).attr('class', "btn btn-link");
            }
        }
    });
}
// delete a language
function delLanguage(obj, evt) {
    evt.preventDefault();
    var id = $(obj).parent().parent().attr('id');
    var o = confirm('តើអ្នកពិតជាចង់លុបមែនទេ?');
    // delete
    if(o)
    {
        $.ajax({
            type: "GET",
            url: burl + "/employee/dellang/" + id,
            success: function (sms) {
                if(sms)
                {
                    $(obj).parent().parent().remove();
                }
            }
        });
    }
}
// delete criminal
function delCrm(obj, evt) {
    evt.preventDefault();
    var id = $(obj).parent().parent().attr('id');
    var o = confirm('តើអ្នកពិតជាចង់លុបមែនទេ?');
    // delete
    if(o)
    {
        $.ajax({
            type: "GET",
            url: burl + "/employee/delcrm/" + id,
            success: function (sms) {
                if(sms)
                {
                    $(obj).parent().parent().remove();
                }
            }
        });
    }
}
// delete document
function delDoc(obj, evt) {
    evt.preventDefault();
    var doc_id = $(obj).parent().parent().attr("id");
    var o = confirm('តើអ្នកពិតជាចង់លុបមែនទេ?');
    if(o)
    {
        $.ajax({
            type: "GET",
            url: burl + "/employee/deldoc/" + doc_id,
            success: function (sms) {
                $(obj).parent().parent().remove();
            }
        });
    }
}
// delete experience
function delExp(obj, evt) {
    evt.preventDefault();
    var id = $(obj).parent().parent().attr('id');
    var o = confirm('តើអ្នកពិតជាចង់លុបមែនទេ?');
    // delete
    if(o)
    {
        $.ajax({
            type: "GET",
            url: burl + "/employee/delexp/" + id,
            success: function (sms) {
                if(sms)
                {
                    $(obj).parent().parent().remove();
                }
            }
        });
    }
}
// function to save new experience
function saveExp(obj, evt) {
    evt.preventDefault();
    var tr = $(obj).parent().parent();
    var tds = $(tr).children('td');
    var xp = {
        id: $(tr).attr('id'),
        description: $(tds[0]).children('input').val(),
        company_name: $(tds[1]).children('input').val(),
        employee_id: $("#employee_id").val()
    };
    $.ajax({
        type: "POST",
        url: burl +"/employee/saveexp",
        data: xp,
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
        },
        success: function (sms) {
            if(sms)
            {
                // disable input
                $(tr).attr("id", sms);
                $(tds[0]).html(xp.description);
                $(tds[1]).html(xp.company_name);
                // change save button to edit button
               var btn = "<a href='#' class='btn btn-link' onclick='editExp(this,event)'><i class='fa fa-pencil text-primary'></i></a> <a href='#' class='btn btn-link' onclick='delExp(this,event)'><i class='fa fa-remove text-danger'></i></a>";
                $(tds[2]).html(btn);
            }
        }
    });
}
function editExp(obj, evt) {
    evt.preventDefault();
    var tr = $(obj).parent().parent();
    var tds = $(tr).children('td');
    var desc = $(tds[0]).html();
    var cname = $(tds[1]).html();
    $(tds[0]).html("<input type='text' class='form-control' value='" + desc+ "'>");
    $(tds[1]).html("<input type='text' class='form-control' value='" + cname+ "'>");
    $(tds[2]).html("<a href='#' class='btn btn-primary btn-flat' onclick='saveExp(this,event)'>រក្សាទុក</a> <a href='#' class='btn btn-danger btn-flat' onclick='rm(this,event)'>បោះបង់</a>");
}
// save status
function save_status(obj, emp_id) {
    $("#frm5 input[type='checkbox']").not($(obj)).removeAttr("checked");
    $("#frm5 input[type='checkbox']").not($(obj)).val(0);

    $(obj).val(1);
    var ch = $(obj).attr('id');
    if(ch=='ch3')
    {
        $("#frm6").hide();
    }
    else{
        $("#frm6").show();
    }
    var data = {
        id: emp_id,
        has_husband: $("#ch1").val(),
        has_wife: $("#ch2").val(),
        is_single: $("#ch3").val()
    };
    $.ajax({
        type: "POST",
        url: burl +"/employee/updatestatus",
        data: data,
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
        },
        success: function (sms) {

        }
    });
}
var old_spouse = {};
var old_father = {};
var old_mother = {};
function editFamily(evt, obj) {
    $(obj).attr("disabled","disabled");
    evt.preventDefault();
    // enable input
    $(".spouse-box input").removeAttr("disabled");
    // show save button
    $(".spouse-btn").show();
    // set old spouse object
    old_spouse = {
      name: $("#s_name").val(),
      live: $("#s_live").val(),
      die: $("#s_die").val(),
      age: $("#s_age").val(),
      career: $("#s_career").val(),
      home: $("#s_home").val(),
      street: $("#s_street").val(),
      krom: $("#s_krom").val(),
      village: $("#s_village").val(),
      commune: $("#s_commune").val(),
      district: $("#s_district").val(),
      province: $("#s_province").val()
    };
}
function editFather(evt, obj) {
    $(obj).attr("disabled","disabled");
    evt.preventDefault();
    // enable input
    $(".father-box input").removeAttr("disabled");
    // show save button
    $(".father-btn").show();
    // set old spouse object
    old_father = {
        name: $("#f_name").val(),
        live: $("#f_live").val(),
        die: $("#f_die").val(),
        age: $("#f_age").val(),
        career: $("#f_career").val(),
        home: $("#f_home").val(),
        street: $("#f_street").val(),
        krom: $("#f_krom").val(),
        village: $("#f_village").val(),
        commune: $("#f_commune").val(),
        district: $("#f_district").val(),
        province: $("#f_province").val()
    };
}
function editMother(evt, obj) {
    $(obj).attr("disabled","disabled");
    evt.preventDefault();
    // enable input
    $(".mother-box input").removeAttr("disabled");
    // show save button
    $(".mother-btn").show();
    // set old spouse object
    old_mother = {
        name: $("#m_name").val(),
        live: $("#m_live").val(),
        die: $("#m_die").val(),
        age: $("#m_age").val(),
        career: $("#m_career").val(),
        home: $("#m_home").val(),
        street: $("#m_street").val(),
        krom: $("#m_krom").val(),
        village: $("#m_village").val(),
        commune: $("#m_commune").val(),
        district: $("#m_district").val(),
        province: $("#m_province").val()
    };
}
function cancel_spouse() {
    $("#s_name").val(old_spouse.name);
    $("#s_live").val(old_spouse.live);
    $("#s_die").val(old_spouse.die);
    $("#s_age").val(old_spouse.age);
    $("#s_career").val(old_spouse.career);
    $("#s_home").val(old_spouse.home);
    $("#s_street").val(old_spouse.street);
    $("#s_krom").val(old_spouse.krom);
    $("#s_village").val(old_spouse.village);
    $("#s_commune").val(old_spouse.commune);
    $("#s_district").val(old_spouse.district);
    $("#s_province").val(old_spouse.province);
    $("#s_die").removeAttr("checked");
    $("#s_live").removeAttr("checked");
    if($("#s_live").val()==1)
    {

        $("#s_live").prop("checked",true);
    }
    if($("#s_die").val()==1)
    {

        $("#s_die").prop("checked", true);
    }
    $(".spouse-btn").hide();
    $("#btnSpouse").removeAttr("disabled");
    $(".spouse-box input").attr("disabled","disabled");
}
function cancel_father() {
    $("#f_name").val(old_father.name);
    $("#f_live").val(old_father.live);
    $("#f_die").val(old_father.die);
    $("#f_age").val(old_father.age);
    $("#f_career").val(old_father.career);
    $("#f_home").val(old_father.home);
    $("#f_street").val(old_father.street);
    $("#f_krom").val(old_father.krom);
    $("#f_village").val(old_father.village);
    $("#f_commune").val(old_father.commune);
    $("#f_district").val(old_father.district);
    $("#f_province").val(old_father.province);
    $("#f_die").removeAttr("checked");
    $("#f_live").removeAttr("checked");
    if($("#f_live").val()==1)
    {

        $("#f_live").prop("checked",true);
    }
    if($("#f_die").val()==1)
    {

        $("#f_die").prop("checked", true);
    }
    $(".father-btn").hide();
    $("#btnFather").removeAttr("disabled");
    $(".father-box input").attr("disabled","disabled");
}
function cancel_mother() {
    $("#m_name").val(old_mother.name);
    $("#m_live").val(old_mother.live);
    $("#m_die").val(old_mother.die);
    $("#m_age").val(old_mother.age);
    $("#m_career").val(old_mother.career);
    $("#m_home").val(old_mother.home);
    $("#m_street").val(old_mother.street);
    $("#m_krom").val(old_mother.krom);
    $("#m_village").val(old_mother.village);
    $("#m_commune").val(old_mother.commune);
    $("#m_district").val(old_mother.district);
    $("#m_province").val(old_mother.province);
    $("#m_die").removeAttr("checked");
    $("#m_live").removeAttr("checked");
    if($("#m_live").val()==1)
    {

        $("#m_live").prop("checked",true);
    }
    if($("#m_die").val()==1)
    {

        $("#m_die").prop("checked", true);
    }
    $(".mother-btn").hide();
    $("#btnMother").removeAttr("disabled");
    $(".mother-box input").attr("disabled","disabled");
}
function live_status(obj) {
    $(".spouse-box input[type='checkbox']").not($(obj)).val(0);
    $(".spouse-box input[type='checkbox']").not($(obj)).removeAttr("checked");
    $(obj).val(1);
}
function father_status(obj) {
    $(".father-box input[type='checkbox']").not($(obj)).val(0);
    $(".father-box input[type='checkbox']").not($(obj)).removeAttr("checked");
    $(obj).val(1);
}
function mother_status(obj) {
    $(".mother-box input[type='checkbox']").not($(obj)).val(0);
    $(".mother-box input[type='checkbox']").not($(obj)).removeAttr("checked");
    $(obj).val(1);
}
// update spouse
function update_spouse(employee_id) {
    var spouse = {
        id: employee_id,
        name: $("#s_name").val(),
        live: $("#s_live").val(),
        die: $("#s_die").val(),
        age: $("#s_age").val(),
        career: $("#s_career").val(),
        home: $("#s_home").val(),
        street: $("#s_street").val(),
        krom: $("#s_krom").val(),
        village: $("#s_village").val(),
        commune: $("#s_commune").val(),
        district: $("#s_district").val(),
        province: $("#s_province").val(),
        husband: $("#ch1").val(),
        wife: $("#ch2").val(),
        single: $("#ch3").val()
    };
    $.ajax({
        type: "POST",
        url: burl +"/employee/updatespouse",
        data: spouse,
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
        },
        success: function (sms) {
            if(sms)
            {
                $(".spouse-btn").hide();
                $("#btnSpouse").removeAttr("disabled");
                $(".spouse-box input").attr("disabled","disabled");
            }
            else
            {
                alert("មិនអាចកែប្រែទិន្នន័យបានទេ សូមពិនិត្យម្តងទៀត!");
            }
        }
    });
}
function save_father(emp_id) {
    var father = {
        id: $("#father_id").val(),
        name: $("#f_name").val(),
        live: $("#f_live").val(),
        die: $("#f_die").val(),
        age: $("#f_age").val(),
        career: $("#f_career").val(),
        home: $("#f_home").val(),
        street: $("#f_street").val(),
        krom: $("#f_krom").val(),
        village: $("#f_village").val(),
        commune: $("#f_commune").val(),
        district: $("#f_district").val(),
        province: $("#f_province").val(),
        type: 'father',
        employee_id: emp_id
    };
    $.ajax({
        type: "POST",
        url: burl +"/employee/updatefather",
        data: father,
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
        },
        success: function (sms) {
            if(sms)
            {
                $(".father-btn").hide();
                $("#btnFather").removeAttr("disabled");
                $(".father-box input").attr("disabled","disabled");
                $("#father_id").val(sms);
            }
            else
            {
                alert("មិនអាចកែប្រែ ឬរក្សាទិន្នន័យបានទេ សូមពិនិត្យម្តងទៀត!");
            }
        }
    });
}
function save_mother(emp_id) {
    var mother = {
        id: $("#mother_id").val(),
        name: $("#m_name").val(),
        live: $("#m_live").val(),
        die: $("#m_die").val(),
        age: $("#m_age").val(),
        career: $("#m_career").val(),
        home: $("#m_home").val(),
        street: $("#m_street").val(),
        krom: $("#m_krom").val(),
        village: $("#m_village").val(),
        commune: $("#m_commune").val(),
        district: $("#m_district").val(),
        province: $("#m_province").val(),
        type: 'mother',
        employee_id: emp_id
    };
    $.ajax({
        type: "POST",
        url: burl +"/employee/updatemother",
        data: mother,
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
        },
        success: function (sms) {
            if(sms)
            {
                $(".mother-btn").hide();
                $("#btnmother").removeAttr("disabled");
                $(".mother-box input").attr("disabled","disabled");
                $("#mother_id").val(sms);
            }
            else
            {
                alert("មិនអាចកែប្រែ ឬរក្សាទិន្នន័យបានទេ សូមពិនិត្យម្តងទៀត!");
            }
        }
    });
}
function changeTrainingStatus()
{
    var st = $("input[name='is_trained']:checked").val();
    if(st=='yes')
    {
        $("#tblTrainingCourse").removeClass('hide');

    }
    else
    {
        $("#tblTrainingCourse").addClass('hide');

    }
    // update training status
    $.ajax({
        type: "POST",
        url: burl +"/training/updatestatus",
        data: {
            id: $("#employee_id").val(),
            training: st
        },
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
        },
        success: function (sms) {

        }
    });
}
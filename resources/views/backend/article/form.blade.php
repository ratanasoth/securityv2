@extends('layouts.app')

@section('content')

<style>
    /* demo styles -summernote */
    .btn-toolbar > .btn-group.note-fontname {
        display: none;
    }
    .icontrol{
        display: flex;
        margin-top: 2px;
    }
    .idelete {
        margin-left: 15px;
        color: #DD5044;
        cursor: pointer;
        float: left;
        margin: 0 auto;
    }
    .iedit {
        color: #DD5044;
        cursor: pointer;
        float: left;
        margin: 0 auto;
    }
    .thumbover:hover {

    }
    .pic-thumb {
        float: left;
        width:100px;
        height:70px;
        margin-bottom: 20px;
        margin-right: 5px;
    }
    .pic-thumb img {
        width: 100%;
        height: 100%;
    }
    
</style>


<div class="panel" id="spy3">
    <div class="panel-heading bg-primary">
        <span class="panel-title">
            <span class="fa fa-table"></span> Article</span>

        </div>
        <div class="panel-body pn">
            {!! Form::open(array('url' => isset($article->id) ? URL::route('article.update', $article->id) : URL::route('article.store'), 'class'=>'form-horizontal' ,'method' => isset($article->id )? 'put' : 'post','files'=> true)) !!}

            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="title" class="col-lg-2 control-label"> Title</label>
                <div class="col-lg-9">
                    <input type="text" id="title" class="form-control" name="title" value="{{ isset($article->title)?$article->title:old('title') }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="sname" class="col-lg-2 control-label">Video Link</label>

                <div class="col-lg-9">
                    <input type="text" class="form-control mtagsinput" id="txtSkills"  value = "{{ isset($article->video)?$article->video:old('video') }}" name = "video" data-role="tagsinput">
                </div>
            </div>
            <div class="form-group">
                <label for="sname" class="col-lg-2 control-label">Category</label>

                <div class="col-lg-9">
                    {!! Form::select('category_id', $categories, isset($article->category_id)?$article->category_id : null, ['class' => 'form-control','readonly']) !!}
                </div>
            </div>

            <div class="form-group">
                <label for="picture" class="col-lg-2 control-label"> Photo</label>
                <div class="col-lg-9">
                    <div class="thumbnail" style="float: left; width: 100%;">
                        <div id="mimg"></div>
                        <a href="#" onclick="add_pic()" style="float: left;">
                            <img class="img-thumbnail" src="{{ url('media_photo?id=89ea19c0-9c29-11e6-acce-eb12cb179d56&width=400&height=400')}}" style="width: 100px; height: auto;">
                        </a>
                    </div>
                </div>
            </div>

            <div class="form-group">
              <label for="body" class="col-lg-2 control-label">Body</label>
              <div class="col-lg-9">
                <textarea class="form-control" rows="10" cols="80" name="body" required>{{ isset($article->body)?$article->body:old('body') }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-9 col-lg-offset-2">
                <a href="{{url('article')}}" class="btn btn-default"> Cancel </a>
                <button type="submit" class="btn btn-primary"> Post </button>
            </div>
        </div>
        <input type="hidden" name="bid" id="bcid" value="{{ isset($article->id)?$article->id:Uuid::generate()->string }}">


    {!! Form::close() !!}

</div>
</div>



<div class="modal fade modal-upload-image" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Upload Image</h4>
        </div>
        <form id="form_upload" class="panel well" enctype="multipart/form-data" style="height: 70px;">
            <input type="hidden" name="hid" class="hid">
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*" name="file" id="upload_image">
                </div>
            </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" />
          <!--   <div class="form-group">
                <div class="col-sm-12">
                  <button type="button" class="btn btn-primary loadImg" style="margin-top: 50px;">Submit</button>
                </div>
            </div> -->
            </form>

        </div>
    </div>
</div>

<script type="text/javascript">


    var elt = $('#txtSkills'); 
    

    $(document).ready(function(){

        reloadImage();
        $(".bootstrap-tagsinput input").removeAttr("style");
        $('#schedule').change(function() {
            if($(this).val() == '') {
                $(this).val('<?php echo date('m/d/Y'); ?>');
            }
        });

        $('form').submit(function() {

            
        });
        $(".options").click(function () {
            var option = $(this).val();
            if(option == 'level') {
                $('.'+ option).removeClass('hidden');
                $('.student').addClass('hidden');
            } else {
                $('.'+ option).removeClass('hidden');
                $('.level').addClass('hidden');
            }
        });
        $('#level').change(function() {
            var selText = '';
            $("#level option:selected").each(function () {
                var $this = $(this);
                if ($this.length) {
                    selText += $this.text()+' , ';
                }
            });
            $('.receivers').val(selText);
        });
        $('#student').change(function() {
            //$('.receivers').val($('#student option:selected').text());
            var selText = '';
            $("#student option:selected").each(function () {
                var $this = $(this);
                if ($this.length) {
                    selText += $this.text()+' , ';
                }
            });
            $('.receivers').val(selText);
        });
        
        $('#upload_image').change(function() {
            var hid = $('.hid').val();
            $.ajax({
                type: "POST",
                url : "{{ URL::to('/upload_image') }}",
                headers: {
                    "Authorization": "Bearer <?php echo Auth::user()->api_token ?>"
                },
                data: new FormData($("#form_upload")[0]),
                //dataType:'json',
                async:false,
                type:'post',
                processData: false,
                contentType: false,
                success : function(data){
                    var obj = $.parseJSON(data);
                    if(obj['name'] != '') {
                        if(hid != '') {
                            update_picture('<?php echo Uuid::generate()->string; ?>', obj['name'], hid);
                        } else {
                            update_photo('<?php echo Uuid::generate()->string; ?>', obj['name']);
                        }
                    }
                }
            },"html");
        });


    });
    function update_photo(uuid, photo) {
        var bid = $('#bcid').val();
        //console.log(bid);
        $.ajax({
            type: "POST",
            url : "/article/add_photo",
            data:{_token:'<?php echo csrf_token() ?>', id:uuid, photo:photo, aid:bid },
            success : function(data){
                $('.modal-upload-image').modal('hide');
                reloadImage();
            }
        },"html");
    }

    function update_picture(uuid, photo, id) {
        var bid = $('#bcid').val();
        $.ajax({
            type: "POST",
            url : "/article/update_picture",
            data:{_token:'<?php echo csrf_token() ?>', mid:bid, photo:photo, pid:id },
            success : function(data){
                $('.modal-upload-image').modal('hide');
                reloadImage();
            }
        },"html");
    }
    function delete_pic(mid) {
        var r = confirm("Are you sure want to delete this picture ?");
        if (r == true) {
            $.ajax({
                type: "POST",
                url : "/article/delete_picture",
                data:{_token:'<?php echo csrf_token() ?>', mid:mid },
                success : function(data){
                    reloadImage();
                }
            },"html");
        } else {
            return false;
        }
        
    }

    function update_pic(id) {
        $('.modal-upload-image').modal('show');
        //$('#upload_image').val('');
        $('.hid').val(id);
    }

    function add_pic() {
        $('.modal-upload-image').modal('show');
        $('#upload_image').val('');
        $('.hid').val('');
    }

    function reloadImage() {
        var bid = $('#bcid').val();
        
        $.ajax({
            type: "GET",
            url : "/article/load_images/" + bid,
            data:{_token:'<?php echo csrf_token() ?>'},
            success : function(data){

                var obj = $.parseJSON(data);
                //console.log(obj);

                $('#mimg').html('');
                $.each( obj, function( key, value ) {
                    var img = '<?php echo url('media_photo?id='); ?>'+value+'&width=100&height=70';

                    $('#mimg').append('<div class="pic-thumb"><img class="img-thumbnail" src="'+img+'"><div class="icontrol"><span onclick="update_pic(this.id)" id="'+value+'" class="fa fa-edit iedit"></span><span onclick="delete_pic(this.id)" id="'+value+'" class="fa fa-trash idelete"></span><div></div>');

                });
            }
        },"html");
    }

</script>
@endsection
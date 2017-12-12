@extends('backend.students.profile')

@section('sub-log')

<div class="panel" id="spy3">
    <div class="panel-heading bg-primary">
      <span class="panel-title">
          <span class="fa fa-table"></span> &nbsp; {{$ptitle}}</span>
       <div class="pull-right">
            <a id="add_log" class="mr20" href="#"><span class="fa fa-plus" style="color: #fff;" ></span></a>
        </div>
    </div>
    <div class="col-xs-12 panel well">
        <div class="box-body table-responsive no-padding">
           @if(Session::get('msg_log_success'))
            <div class="alert alert-success">
                <i class="fa fa-user" aria-hidden="true"></i>
                {{ Session::get('msg_log_success') }}
            </div>
            @endif
            @if(Session::get('user_success_update'))
              <div class="alert alert-success">
               <i class="fa fa-wrench" aria-hidden="true"></i>
               {{ Session::get('user_success_update') }}
              </div>
            @endif
            @if(Session::get('user_had_delete'))
              <div class="alert alert-success">
                <i class="fa fa-trash" aria-hidden="true"></i>
               {{ Session::get('user_had_delete') }}
              </div>
            @endif
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Time</th>
                  <th>User</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
            <?php
              $pagex = @$_GET['page'];
              if(!$pagex)
                  $pagex = 1;
              $i = 10 * ($pagex - 1) + 1;
            ?>
                  @foreach($logs as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ date("d/m/Y",strtotime($row->time)) }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->description }}</td>
                        <td>

                          <?php if($row->is_user_input == 1){ ?>
                             <a class="update-log" data-href="{{$row->id}}" ><span class="fa fa-pencil"></span> </a> &nbsp;&nbsp;&nbsp;
                            <a onclick="return confirm('Are you sure want to delete this ?');" href="{{ url('/student/'.$row->id.'/destroyLog/'.$student->id) }}"><span class="fa fa-trash"></span> </a>
                           <?php } ?>

                        </td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
      </div>
</div>
{{$logs->links()}}
<!-- Modal -->
<div class="modal fade log" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Student Log</h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
     $('#add_log').click(function(evt) {
         evt.preventDefault();
            $('.log').modal('show');
            $.ajax({
                type: "POST",
                url : "/student/log_form",
                data:{_token:'<?php echo csrf_token() ?>', student_id:'<?php echo $student->id ?>' },
                success : function(data){
                    $('.log .modal-body').html(data);
                }
            },"html");
        });

      $('.update-log').click(function() {
            $('.log').modal('show');
            var id = $(this).attr('data-href');
            $.ajax({
                type: "POST",
                url : "/student/log_form",
                data:{_token:'<?php echo csrf_token() ?>', student_id:'<?php echo $student->id ?>', id: id },
                success : function(data){
                    $('.log .modal-body').html(data);
                }
            },"html");
        });

  });
</script>

@endsection

@extends('layouts.app')

@section('content')

<div class="panel" id="spy3">
    <div class="panel-heading bg-primary">
        <span class="panel-title">
            <span class="fa fa-table"></span> {{ $ptitle }}</span>
            <div class="pull-right">
            <a href="{{url('/article/create')}}" class="mr20"><span class="fa fa-plus" style="color:#fff;"></span></a>
        </div>
    </div>
    <div class="panel-body pn">
      @if(Session::get('message_success'))
            <div class="alert alert-success">
              <i class="fa fa-user" aria-hidden="true"></i>
                {{ Session::get('message_success') }}
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
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
             foreach ($broadcasts as $key => $b) { ?>
                <tr>
                    <td>{{($broadcasts->currentPage()-1)*10+$i}}</td>
                    <td>{{$b->title}}</td>
                    <td>{{$b->category_name}}</td>
                    <td>{{$b->date}}</td>
                    <td>
                        <a href="{{ url('/article/'.$b->id.'/edit') }}"><span class="fa fa-pencil"></span></a> |
                        <a class="btnDelete"
                                 id = "{{$b->id}}"
                                 title="Delete article">
                                 <i class="fa fa-trash"></i>
                             </a>
                    </td>
                </tr>
            <?php $i++; } ?>
            </tbody>
        </table>
    </div>
</div>

 <div id="articleDeleteModal" class="modal fade" tabindex="-1" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
       {!! Form::open(array('url' => URL::route('article.destroy',0), 'method' => 'DELETE', 'id' => 'article-delete-form')) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i style="color:#ffe63b" class="fa fa-2x fa-warning "></i>Delete Article<span id="school-name-delete"></span> 
                </h4>
             </div>
             <div class="modal-body">
                 Are you sure want to delete this ?</p>
             </div>
    
             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Okay</button>
             </div>
         {!! Form::close() !!}
      </div>
    </div>
 </div> 
 
 <script>
 $(document).ready(function(){
     $(".btnDelete").click(function(){
       form = document.getElementById('article-delete-form');
       form.action = "article/" + this.id;
       $('#articleDeleteModal').modal();
     });
 });
 </script>
{{ $broadcasts->links() }}
@endsection
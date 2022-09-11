@extends('todolists.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <div style="display:flex">
            @php
                $done = 0;
            @endphp
            @foreach ($data as $list)
                @php
                    $sts = $list->status;
                @endphp
                @if($sts==2)
                    @php
                    $done++;
                    @endphp
                @endif
            @endforeach
            <div style="width:90%">
                <h3 class="card-title">To Do Lists</h3>
                <br>
                <p class="text-secondary">{{$done}} list done</p>
            </div>
            
            <p class="text-secondary"></p>
            <div style="width:10%" class="pull-right">
                <a class="btn btn-success" href="{{ route('todolists.create') }}"><i class="fas fa-plus"></i> Add new</a>
            </div>
        </div>
    </div>

    <div class="card-body table-responsive p-0" style="height: 350px;">
        <table class="table table-sm table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th style="display:none"></th>
                    <th style="width: 5%" class="text-center text-secondary">NO.</th>
                    <th class="text-secondary">&nbsp;&nbsp;&nbsp;TO DO</th>
                    <th class="text-secondary">STATUS</th>
                    <th style="width: 20%" class="text-right text-secondary">ACTION</th>
                </tr>
            </thead>
            <tbody>
            @php
                $row_no = 0;
            @endphp
            @foreach ($data as $list)
                @php
                    $row_no = $row_no + 1;
                    $sts = $list->status;
                @endphp
                @if($sts==1)
                    <!-- @php
                    $sts = 'in process';
                    @endphp -->
                    <tr>
                        <td style="display:none">{{ $list->id }}</td>
                        <td class="text-center align-middle">{{ $row_no }}</td>
                        <td><a class="font-weight-bold text-dark">{{ $list->to_do }}</a><br><a class="text-secondary">{{ $list->desc }}</a></td>
                        <td class="align-middle"><button type="button" class="btn btn-primary btn-sm rounded-pill">in process</button></td>
                        <td class="text-right align-middle">
                            <button type="button" class="btn btn-secondary btn_chck"><i class="fas fa-check"></i></button>
                            <button type="button" class="btn btn-secondary btn_edit"><i class="fas fa-pen"></i></button>
                            <!-- <button type="button" class="btn btn-secondary btn_show">...</button> -->
                            <button type="button" class="btn btn-secondary deleteBtn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                @else  
                    <tr>
                        <td style="display:none">{{ $list->id }}</td>
                        <td class="text-center align-middle">{{ $row_no }}</td>
                        <td><a class="font-weight-bold text-dark">{{ $list->to_do }}</a><br><a class="text-secondary">{{ $list->desc }}</a></td>
                        <td class="align-middle"><button type="button" class="btn btn-success btn-sm rounded-pill">Done</button></td>
                        <td class="text-right align-middle">
                            <!-- <button type="button" class="btn btn-secondary btn_show">...</button> -->
                            <button type="button" class="btn btn-secondary deleteBtn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>  
                @endif
                
                
                
            @endforeach
            </tbody>
        </table>
    </div>

</div>

<!-- MODAL EDIT -->
<div class="modal fade editTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="<?= route('update.task.details') ?>" method="post" id="update-task-form">
                    @csrf
                     <input type="hidden" name="task_id">
                     <div class="form-group">
                         <label for="">To Do</label>
                         <input type="text" class="form-control" name="to_do" placeholder="Enter task name">
                         <span class="text-danger error-text task_name_error"></span>
                     </div>
                     <div class="form-group">
                         <textarea class="form-control" name="desc" style="height:100px;resize:none;"></textarea>
                         <span class="text-danger error-text task_desc_error"></span>
                     </div>
                     <div style="display:flex">
                        <div style="width:50%" class="form-group">
                            <label for="">Start Date</label>
                            <input type="text" class="form-control datepicker" name="start_date" placeholder="YYYY-MM-DD">
                            <span class="text-danger error-text task_desc_error"></span>
                        </div>
                        <div style="width:50%" class="form-group">
                            <label for="">Due Date</label>
                            <input type="text" class="form-control datepicker" name="due_date" placeholder="YYYY-MM-DD">
                            <span class="text-danger error-text task_desc_error"></span>
                        </div>
                     </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-block btn-success">Save Changes</button>
                     </div>
                 </form>
                

            </div>
        </div>
    </div>
</div>

<!-- MODAL SHOW -->
<div class="modal fade showTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="<?= route('update.task.details') ?>" method="post" id="update-task-form">
                    @csrf
                     <input type="hidden" name="task_id">
                     <div class="form-group">
                         <label for="">To Do</label>
                         <input type="text" class="form-control" name="to_do" placeholder="Enter task name" readonly>
                         <span class="text-danger error-text task_name_error"></span>
                     </div>
                     <div class="form-group">
                         <textarea class="form-control" name="desc" style="height:100px;resize:none;" readonly></textarea>
                         <span class="text-danger error-text task_desc_error"></span>
                     </div>
                     <div style="display:flex">
                        <div style="width:40%" class="form-group">
                            <label for="">Start Date</label>
                            <input type="text" class="form-control datepicker" name="start_date" readonly>
                            <span class="text-danger error-text task_desc_error"></span>
                        </div>
                        <div style="width:40%" class="form-group">
                            <label for="">Due Date</label>
                            <input type="text" class="form-control datepicker" name="due_date" readonly>
                            <span class="text-danger error-text task_desc_error"></span>
                        </div>
                     </div>
                     <div class="form-group">
                         <!-- <button type="submit" class="btn btn-block btn-success">Save Changes</button> -->
                     </div>
                 </form>
                

            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $( function() {
            $( ".datepicker" ).datepicker({
                dateFormat: 'yy-mm-dd'
            });
        } );
$(document).on('click','.btn_chck', function(){
    var id = $(this).parent().siblings(':eq(0)').html();
    // alert(country_id);
    var sts = '2';
    // $('.editCountry').find('form')[0].reset();
    // $('.editCountry').find('span.error-text').text('');
    $.post('<?= route("get.todo.update_task") ?>',{id:id,sts:sts}, function(data){
        //  alert(data.details.to_do);
        // $(this).parent().siblings(':eq(2)').html("sssssssssssssssss");
        window.location.href = "{{ route('todolists.index') }}";
        
    },'json');
});

$(document).on('click','.btn_edit', function(){
    var id = $(this).parent().siblings(':eq(0)').html();
    // alert(country_id);
    // $('.editCountry').find('form')[0].reset();
    // $('.editCountry').find('span.error-text').text('');
    $.post('<?= route("get.todo.details") ?>',{task_id:id}, function(data){
        $('.editTask').find('input[name="task_id"]').val(data.details.id);
        $('.editTask').find('input[name="to_do"]').val(data.details.to_do);
        $('.editTask').find('textarea[name="desc"]').val(data.details.desc);
        $('.editTask').find('input[name="start_date"]').val(data.details.start_date);
        $('.editTask').find('input[name="due_date"]').val(data.details.due_date);
        $('.editTask').modal('show');
        
    },'json');
});

$(document).on('click','.btn_show', function(){
    var id = $(this).parent().siblings(':eq(0)').html();
    // alert(country_id);
    // $('.editCountry').find('form')[0].reset();
    // $('.editCountry').find('span.error-text').text('');
    $.post('<?= route("get.todo.details") ?>',{task_id:id}, function(data){
        $('.showTask').find('input[name="task_id"]').val(data.details.id);
        $('.showTask').find('input[name="to_do"]').val(data.details.to_do);
        $('.showTask').find('textarea[name="desc"]').val(data.details.desc);
        $('.showTask').css('background', '#00000073');
        $('.showTask').modal('show');
        
    },'json');
});
//UPDATE TASK DETAILS
$('#update-task-form').on('submit', function(e){
    e.preventDefault();
    var form = this;
    $.ajax({
        url:$(form).attr('action'),
        method:$(form).attr('method'),
        data:new FormData(form),
        processData:false,
        dataType:'json',
        contentType:false,
        beforeSend: function(){
                $(form).find('span.error-text').text('');
        },
        success: function(data){
                if(data.code == 0){
                    toastr.error(data.msg);
                }else{
                    window.location.href = "{{ route('todolists.index') }}";
                    $('.editTask').find('form')[0].reset();
                    $('.editTask').modal('hide');
                    toastr.success(data.msg);
                }
        }
    });
});

//DELETE TASK RECORD
$(document).on('click','.deleteBtn', function(){
    var id = $(this).parent().siblings(':eq(0)').html();
    var url = '<?= route("delete.todo") ?>';

    swal.fire({
            title:'Are you sure?',
            html:'You want to <b>delete</b> this Task',
            showCancelButton:true,
            showCloseButton:true,
            cancelButtonText:'Cancel',
            confirmButtonText:'Yes, Delete',
            cancelButtonColor:'#d33',
            confirmButtonColor:'#556ee6',
            width:300,
            allowOutsideClick:false
    }).then(function(result){
            if(result.value){
                $.post(url,{id:id}, function(data){
                    if(data.code == 1){
                        toastr.success(data.msg);
                        window.location.href = "{{ route('todolists.index') }}";
                    }else{
                        toastr.error(data.msg);
                    }
                },'json');
            }
    });

});
</script>
@endsection

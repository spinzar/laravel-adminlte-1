@extends('admin.layouts.base')
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">创建</h3>
        <div class="box-tools">
            <div class="btn-group pull-right" style="margin-right: 10px">
                <a href="{{url(config('admin.prefix').'/auth/permission')}}" class="btn btn-sm btn-default"><i class="fa fa-list"></i>&nbsp;列表</a>
            </div> 
            <div class="btn-group pull-right" style="margin-right: 10px">
                <a onclick="history.back(1)" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i>&nbsp;返回</a>
            </div>
        </div>
    </div>
    <form id="addForm" method="post" action="" class="form-horizontal">
        <div class="box-body">
            <div class="form-group">
                <label class="col-md-2 control-label">名称</label>
                <div class="col-md-8">
                    <div class="help-block with-errors"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-pencil"></i>
                        </span>
                        <input name="name" value="" type="text" class="form-control" placeholder="输入名称" required> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">标识</label>
                <div class="col-md-8">
                    <div class="help-block with-errors"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-pencil"></i>
                        </span>
                        <input name="slug" value="" type="text" class="form-control" placeholder="输入标识" required> 
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="col-md-2"></div>
            <div class="btn-group col-md-8">
                <button type="submit" class="btn btn-info pull-right">提交</button>
                <button type="reset" class="btn btn-warning  pull-left">撤销</button>
            </div>
        </div>
    </form>
    <!-- END FORM-->
</div>
@endsection
@section('otherjs')
<script>
    $('.select2').select2();
    $('#addForm').validator().on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            layer.load(1, {shade: [0.1, '#fff']});
            $.ajax({
                url: "{{url(config('admin.prefix').'/auth/permission')}}",
                type: 'post',
                dataType: "json",
                data: $("#addForm").serialize(),
                success: function (res) {
                    layer.closeAll();
                    if (res.status == 1) {
                        layer.msg(res.msg, {icon: 1});
                        location.href = "{{url(config('admin.prefix')).'/auth/permission'}}";
                    } else {
                        layer.msg(res.msg, {icon: 5});
                    }
                }
            });
        }
        return false;
    })
</script>
@endsection
@extends('admin.layout.master')
@section('content')
        <ul class="nav nav-tabs" role="tablist">
            <li><a href="/laravel/blog/public/admin/tag">标签列表</a></li>
            <li class="active"><a href="/tag/create">修改标签</a></li>
        </ul>
        <form method="post" class="form-horzontal" action="../{{$model['id']}}" role="form">
            {{csrf_field()}}
            @method('PUT')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">标签管理</h3>
                </div>

                <div class="panel-body">

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">标签</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{$model['name']}}" >
                        </div>

                    </div>

                </div>
            </div>
            <button class="btn btn-primary">保存数据</button>
        </form>
@endsection

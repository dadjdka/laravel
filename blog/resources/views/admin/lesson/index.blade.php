@extends('admin.layout.master')
@section('content')
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="">课程列表</a></li>
            <li><a href="lesson/create">新增课程</a></li>
        </ul>
        <form method="post" class="form-horzontal" action="changPassword" role="form">
            {{csrf_field()}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">视频课程列表</h3>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="100">编号</th>
                                <th>课程名称</th>
                                <th width="120">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)


                            <tr>
                                <td> {{$item['id']}} </td>
                                <td> {{$item['name']}} </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                    <a href="tag/{{$item['id']}}/edit" class="btn btn-default">编辑</a>
                                        <a href="javascript:;" onclick="del({{$item['id']}})" class="btn btn-default">删除</a>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </form>

        <script>
            function del(id){
                layer.confirm('确定要删除吗?', {icon: 3, title:'提示'}, function(index){

                    $.ajax({
                        url: 'tag/'+id,
                        method: 'DELETE',
                        success: function(res){



                            if (res.valid == 1) {
                                layer.msg(res.message,{ icon: 1,time: 1000} ,function(){
                                    location.reload()
                                });
                            }

                        }
                    })

                });
            }


        </script>
@endsection

@extends('admin.layout.master')
@section('content')
<style>
    label{
        margin-bottom:0px
    }
</style>
<script src="https://unpkg.com/vue/dist/vue.js"></script>




        <ul class="nav nav-tabs" role="tablist">
            <li><a href="/laravel/blog/public/admin/lesson">课程列表</a></li>
            <li class="active"><a href="/lesson/create">新增课程</a></li>
        </ul>
        <form method="post" class="form-horzontal" action="../lesson" role="form" enctype ="multipart / form-data">
            {{csrf_field()}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">课程管理</h3>
                </div>

                <div class="panel-body">

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">课程</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title"  required>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">介绍</label>
                        <div class="col-sm-10">
                            <textarea name="introduce" class="form-control" rows="5" required></textarea>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">预览图</label>
                        <div class="col-sm-10">
                            <input id="preview" type="file" name="preview"  class="form-control" data-min-file-count="1" required >
                            {{-- <input type="text" class="form-control" name="preview"  required value="no.jpg"> --}}
                        </div>

                        <script>
$(function () {
        //0.初始化fileinput
        var oFileInput = new FileInput();
        oFileInput.Init("preview", "/component/uploader");
    });
    var FileInput = function () {
        var oFile = new Object();

        //初始化fileinput控件（第一次初始化）
        oFile.Init = function (ctrlName, uploadUrl) {
            var control = $('#' + ctrlName);

            //初始化上传控件的样式
            control.fileinput({
                language: 'zh', //设置语言
                uploadUrl: uploadUrl, //上传的地址
                allowedFileExtensions: ['jpg', 'gif', 'png'],//接收的文件后缀
                //showUploadedThumbs:false,
                // uploadClass: 'hidden',
                showUpload: false, //是否显示上传按钮
                showCaption: false,//是否显示标题
                browseClass: "btn btn-info", //按钮样式
                dropZoneEnabled: false,//是否显示拖拽区域
                //minImageWidth: 150, //图片的最小宽度
                //minImageHeight: 150,//图片的最小高度
                //maxImageWidth: 150,//图片的最大宽度
                //maxImageHeight: 150,//图片的最大高度
                maxFileSize: 2048,//单位为kb，如果为0表示不限制文件大小
                maxFileCount: 2, //表示允许同时上传的最大文件个数
                minFileCount: 1,
                enctype: 'multipart/form-data',
                validateInitialCount: true,
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
                fileActionSettings : {
                    // showUpload: false,
                    // showRemove: false,
                //    showZoom:false
                }
            });



            //导入文件上传完成之后的事件
            $("#preview").on("fileuploaded", function (event, data, previewId, index) {
                console.log('455')
                alert(data.response.code);
                // $("#divControl").hide();
            });



            $('#preview').on('fileerror', function(event, data, msg) {

                console.log(data)

            });
        }
        return oFile;
    };


                        </script>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">推荐</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio"  name="iscommend"  value="1">是
                            </label>
                            <label class="radio-inline">
                                <input type="radio"  name="iscommend" value="0" checked>否
                            </label>
                        </div>

                    </div>

                    <div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">热门</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="ishot"  value="1">是
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ishot" value="0" checked>否
                            </label>
                        </div>

                    </div>
                </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">点击数</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="click"  required value="0">
                        </div>

                    </div>


                </div>
            </div>

            <div class="panel panel-default" id="app" >
                <div class="panel-heading">
                    <h3 class="panel-title">视频管理</h3>
                </div>

                <div class="panel-body">
                    <div class="panel panel-default" v-for="(v,k) in videos">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">视频标题</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="v.title">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">视频地址</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" v-model="v.path">
                                        <span class="input-group-btn">
                                            <input type="file" class="form-control"  :id="v.id">
                                            {{-- <button class="btn btn-defaul" type="button" >上传</button> --}}
                                        </span>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="panel-footer">
                            <button class="btn btn-success btn-sm" @click.prevent="del(k)">删除视频</button>
                        </div>
                    </div>

                </div>
                <div class="panel-footer">
                    <button class="btn btn-default" @click.prevent="add">添加视频</button>
                </div>
                <textarea name="videos"  >@{{videos}}</textarea>
            </div>





                <script>




                </script>


            <button class="btn btn-primary">保存数据</button>
        </form>

        <script>
            new Vue({
                el:"#app",
                data:{
                    videos:[]
                },
                methods:{
                    // 添加
                    add:function(){
                        var field = {title: '',path: '',id:'vid'+Date.parse(new Date())}
                        this.videos.push(field);
                        setTimeout(() => {
                            up(field);
                        }, 200);

                    },
                    // 删除
                    del:function(k){
                        this.videos.splice(k,1);
                    }
                },
            })

            function up(field) {
//0.初始化fileinput

var oFileInput = new FileInput();
oFileInput.Init(field.id, "/component/oss?");

 function FileInput() {
    console.log(field);
    var oFile = new Object();

    //初始化fileinput控件（第一次初始化）
    oFile.Init = function (ctrlName, uploadUrl) {

        var controls = $('#' + ctrlName);

        //初始化上传控件的样式
        controls.fileinput({
            language: 'zh', //设置语言
            uploadUrl: uploadUrl, //上传的地址
            allowedFileExtensions: ['jpg', 'gif', 'png','mp4'],//接收的文件后缀
            //showUploadedThumbs:false,
            // uploadClass: 'hidden',
            showUpload: false, //是否显示上传按钮
            // showCaption: false,//是否显示标题
            browseClass: "btn btn-info", //按钮样式
            dropZoneEnabled: false,//是否显示拖拽区域

            maxFileSize: 0,//单位为kb，如果为0表示不限制文件大小
            maxFileCount: 1, //表示允许同时上传的最大文件个数
            minFileCount: 1,
            enctype: 'multipart/form-data',
            validateInitialCount: true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",

        });


        //导入文件上传完成之后的事件
        $("#"+ctrlName).on("fileuploaded", function (event, data, previewId, index) {
            console.log(data.response.message)
            mes = data.response.message;
            field.path = mes;
            // return;

            // alert(data.response.code);
            // $("#divControl").hide();
        });



        $("#"+ctrlName).on('fileerror', function(event, data, msg) {

            console.log(data)

        });
    }
    // console.log(field.id)
    return oFile;
    };



};

        </script>

            {{-- <script>
            function upload(){


                require(['oss'],function(oss){
                    var id ='#pickVideo';
                    var uploader = oss.upload({
                        //获取签名
                        serverUrl: '/component/oss?',
                        //上传目录
                        dir: 'vid',
                        //按键元素
                        pick: id,
                        accept:{
                            title:'Images',
                        }
                    });
                    uploader.on('startUpload',function(){
                        console.log('开始上传');
                    })
                    uploader.on('uploadSuccess',function(file,response){
                        console.log('上传成功')
                    })
                    uploader.on('uploadProgress',function(file,percentage){
                        console.log('上传进度')
                    })
                    uploader.on('uploadComplete',function(){
                        console.log('上传结束')
                    })
                });
            }
            </script> --}}
@endsection

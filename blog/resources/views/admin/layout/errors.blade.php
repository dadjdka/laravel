@if (count($errors) > 0 )
<div class="modal fade" id='modal-message'>
    <div class="modal-dialog">
        <div class="modal-content">
            <!--style="background-color: black;color: white"-->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>
              <h4 class="modal-title" id="addFormLabel">
                友情提示
              </h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal">关闭</button>
            </div>
          </div>
    </div>

</div>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

        $(function () {
            $('#modal-message').modal('show');

        })

</script>
@endif

<div id="flash-overlay-modal" class="modal fade {{ isset($modalClass) ? $modalClass : '' }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">友情提示</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                   <i class="fa fa-info-circle fa-4x"></i>
                </div>
                <div class="row">
                    <div class="col-sm-9">{!! $body !!}</div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>

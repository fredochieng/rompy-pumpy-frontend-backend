<div class="modal fade" id="ModalActivateAccount_{{$model->user_id}}">
    <div class="modal-dialog modal-xl">
        <form class="" method="POST" action="{{ route('model.activate') }}" role="form" autocomplete="off">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Activate Model - #{{$model->model_no}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="model_id" value="{{ $model->user_id }}">
                    <div class="card-body">
                        <p>Are you sure you want to activate this account?</p>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info"><i class="fas fa-solid fa-check"></i> Activate Account</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

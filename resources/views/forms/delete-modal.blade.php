<div class="modal fade" id="delete" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" id="action_form" action="">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('action.title') }}</h5>
                    <button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('action.text') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal_close" data-dismiss="modal">{{ __('action.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('action.yes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

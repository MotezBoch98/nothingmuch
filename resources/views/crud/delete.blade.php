<!--
<div class="modal" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you, want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" id="delete-btn">Delete</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('table[data-form="deleteForm"]').on('click', '.form-delete', function(e) {
        e.preventDefault();
        var $form = $(this);
        $('#confirm').modal({
                backdrop: 'static',
                keyboard: false
            })
            .on('click', '#delete-btn', function() {
                $form.submit();
            });
    });
</script>
-->
<form action="{{ route('abonne.destroy', $user->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <div class="modal fade" id="ModalDelete{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ _('User Delete') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal body">You sure you want to delete <b>{{ $user->name }}</b>?</div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary"
                        data-dismiss="modal">{{ _('Cancel') }}</button>
                    <button type="button" class="btn btn-outline-secondarydanger"
                        data-dismiss="modal">{{ _('Delete') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="bk-delete-modal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <form class="modal-content" id="bk-delete-form" method="POST">
            @csrf
            @method('DELETE')

            <div class="modal-header">
                <h5 class="modal-title">Deleting</h5>
                <button class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                Are you sure you want to delete the selected record?
            </div>

            <div class="modal-footer">
                <button class="mr-0 btn btn-danger bk-min-w-50" type="submit">
                    Yes
                </button>
                <button class="btn btn-secondary bk-min-w-50" data-dismiss="modal">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

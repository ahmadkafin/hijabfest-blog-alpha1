<div class="modal fade" id="users-modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Hapus artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Apa kamu yakin akan menghapus <span class="delete-title"
                        style="font-weight: 800; text-decoration: underline;"></span> ?</h5>
                <hr>
                <p>Dengan menghapus User <span class="delete-title"
                        style="font-weight: 800; text-decoration: underline;"></span>, Kamu akan <b
                        style="text-transform: uppercase">menghapus semua data transaksi & data tenan </b>, yang
                    berkaitan dengan event ini.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form method="POST" id="form-user-delete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Ya, hapus saja.</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-harga-booth" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Harga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Kamu akan mengubah harga booth #<span class="titles"></span></h5>
                <hr>
                <form method="POST" id="page-booth-update">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="harga">Masukan harga baru</label>
                        <input type="text" class="form-control" name="booth_price" id="input-harga" />
                    </div>
                    <button type="submit" class="btn btn-info btn-sm">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="hapus-booth-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                <h5>Apa kamu yakin akan menghapus booth #<span class="delete-title"
                        style="font-weight: 400; text-decoration: underline;"></span> ?</h5>
                <hr>
                <p>Dengan menghapus booth #<span class="delete-title"
                        style="font-weight: 400; text-decoration: underline;"></span>, Kamu juga akan menghapus tenant
                    yang terdaftar di booth
                    ini</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form method="POST" id="form-booth-delete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Ya, hapus saja.</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-booth-number" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Nomor Booth</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Kamu akan mengubah harga booth #<span class="titles"></span></h5>
                <hr>
                <form method="POST" id="page-booth-update-number">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="harga">Masukan nomor baru booth</label>
                        <input type="text" class="form-control" name="booth_nomor" id="input-nomor" autofocus />
                    </div>
                    <button type="submit" class="btn btn-info btn-sm">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
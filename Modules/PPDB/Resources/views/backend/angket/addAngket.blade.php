<div class="disabled-backdrop-ex">
    <!-- Modal -->
    <div class="modal fade text-left modal-primary" id="addAngket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel4">Tambah Pertanyaan Angket </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('ppdb.angket.add') }}" method="POST">
                  @csrf
                    <div class="row">
                      <div div class="col-12">
                          <div class="form-group">
                            <label for="pertanyaan">Pertanyaan</label>
                            <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" value="" />
                          </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Tambah</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
                </form>
              </div>
            </div>
        </div>
    </div>
  </div>
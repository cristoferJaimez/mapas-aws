<!-- Modal -->
<div class="modal fade" id="exampleModalToggle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered  shodow-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body  mx-auto ">
                <form class="row g-3 ">
                    <div class="col-md-6 col-sm-12">
                      <label for="file_users" class="visually-hidden">Docuemnt</label>
                      <input type="file" required class="form-control-sm file_csv" name="file_csv" accept=".csv" id="file_csv" placeholder="">
                    </div>
                    <div class="col-md-6 col-sm-12 d-grid gap-2 d-md-flex justify-content-md-end">
                      <button type="submit" class="btn btn-sm btn-outline-primary mb-3">save users</button>
                    </div>
                  </form>
                  <div id="data_csv"></div>
                  <div id="contenido_csv" class=""></div>
                  <div id="btn_clear"></div>
            </div>

        </div>
    </div>
</div>

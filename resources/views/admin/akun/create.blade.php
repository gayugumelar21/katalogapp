<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formCreate" class="needs-validation" enctype="multipart/form-data" novalidate>
      {{ csrf_field() }}  {{ method_field('POST') }}
      <input type="hidden" id="id" name="id">
      <div class="modal-body">

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" required>
          <div class="valid-feedback" style="text-align: left;">
            Username Tidak Boleh Kosong.
        </div>
        <div class="invalid-feedback" style="text-align: left;">
            Username Tidak Boleh Kosong.
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" required>
          <div class="valid-feedback" style="text-align: left;">
            Email Tidak Boleh Kosong.
        </div>
        <div class="invalid-feedback" style="text-align: left;">
            Email Tidak Boleh Kosong.
          </div>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" class="form-control" name="password" id="password" placeholder="Masukan Password" required>
          <div class="valid-feedback" style="text-align: left;">
            Password Tidak Boleh Kosong.
        </div>
        <div class="invalid-feedback" style="text-align: left;">
            Password Tidak Boleh Kosong.
          </div>
        </div>
        <div class="form-group">
          <label for="role">Role</label>
          <select class="form-control" name="role" id="role">
            <option value="admin">Admin</option>
            <option value="member">Member</option>
          </select>
        </div>

      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="createAkun()" class="btn btn-primary">Save</button>
        </div>
    </form>
    </div>
  </div>
</div>
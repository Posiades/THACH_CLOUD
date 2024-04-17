@extends('admin/layout')
@section('title', 'ADD HOSTING')
@section('noidung')
<div class="container">
  <h2>ADD HOSTING</h2>
  <form method="post" action="{{ route('admin.post_addhosting') }}">
      @csrf
      <div class="form-group">
        <label for="nameHosting">Hosting Images:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-image"></i></span>
            </div>
            <input type="file" name="img" class="form-control" id="nameHosting" placeholder="Enter hosting name" required>
        </div>
    </div>
      <div class="form-group">
          <label for="nameHosting">Hosting Name:</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-server"></i></span>
              </div>
              <input type="text" name="namehosting" class="form-control" id="nameHosting" placeholder="Enter hosting name" required>
          </div>
      </div>
      <div class="form-group">
          <label for="type">Type:</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-code"></i></span>
              </div>
              <input type="text" name="type" class="form-control" id="type" placeholder="Enter type" required>
          </div>
      </div>
      <div class="form-group">
          <label for="moTa">Description:</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
              </div>
              <textarea class="form-control" name="mota" id="moTa" placeholder="Enter description" rows="3" required></textarea>
          </div>
      </div>
      <div class="form-group">
          <label for="giaTien">Price:</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
              </div>
              <input type="text" name="giatien" class="form-control" id="giaTien" placeholder="Enter price" required>
          </div>
      </div>
      <div class="form-group">
          <label for="bandwith">Data Hosting:</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-database"></i></span>
              </div>
              <input type="text" name="datahosting" class="form-control" id="bandwith" placeholder="Enter data hosting" required>
          </div>
      </div>
      <div class="form-group">
          <label for="bandwidth">Bandwidth:</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-wifi"></i></span>
              </div>
              <input type="text" name="bandwidth" class="form-control" id="bandwidth" placeholder="Enter bandwidth" required>
          </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection

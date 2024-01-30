<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>Patrons Data</title>
</head>

<body>

  <div class="container col-5 bg-dark-subtle mt-3 mb-3 p-4 rounded-2">
    <h3 class="text-center p-2">Patron's Data</h3>

    <form action="{{ route('patrons.update', $patron->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $patron->name }}">
      </div>

      <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" class="form-control" name="nik" id="nik" value="{{ $patron->nik }}">
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="string" class="form-control" name="phone" id="phone" value="{{ $patron->phone }}">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{ $patron->email }}">
      </div>

      <div class="mb-3">
        <label for="birthdate" class="form-label">Birthdate</label>
        <input type="date" class="form-control" name="birthdate" id="birthdate" value="{{ $patron->birthdate }}">
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" id="address" value="{{ $patron->address }}">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>

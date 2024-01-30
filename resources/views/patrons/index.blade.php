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

    <form action="{{ route('patrons.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" name="name" id="name">
      </div>

      <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" class="form-control" name="nik" id="nik">
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="string" class="form-control" name="phone" id="phone">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email">
      </div>

      <div class="mb-3">
        <label for="birthdate" class="form-label">Birthdate</label>
        <input type="date" class="form-control" name="birthdate" id="birthdate">
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" id="address">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <div class="container col-12">
    <table class="table table-primary table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">NIK</th>
          <th scope="col">Phone</th>
          <th scope="col">Email</th>
          <th scope="col">Birthdate</th>
          <th scope="col">Address</th>
          <th scope="col" class="pr-0">Options</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($patrons as $patron)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $patron->name }}</td>
            <td>{{ $patron->nik }}</td>
            <td>{{ $patron->phone }}</td>
            <td>{{ $patron->email }}</td>
            <td>{{ $patron->birthdate }}</td>
            <td>{{ $patron->address }}</td>
            <td>
              <div class="d-flex flex-row gap-2">
                <a href="{{ route('patrons.edit', $patron->id) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('patrons.destroy', $patron->id) }}" method="post">
                  @csrf
                  @method('DELETE')

                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>

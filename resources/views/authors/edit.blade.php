<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>Author's Data</title>
</head>

<body>
  <div class="container col-5 bg-dark-subtle mt-3 mb-3 p-4 rounded-2">
    <h3 class="text-center p-2">Author's Data</h3>

    <form action="{{ route('authors.update', $author->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $author->name }}">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

</body>

</html>

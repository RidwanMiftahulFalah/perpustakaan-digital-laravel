<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>Books Data</title>
</head>

<body>

  <div class="container col-5 bg-dark-subtle mt-3 mb-3 p-4 rounded-2">
    <h3 class="text-center p-2">Book's Data</h3>

    <form action="{{ route('books.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title">
      </div>

      <div class="mb-3">
        <label for="author_id" class="form-label">Author</label>
        <select class="form-select" name="author_id" id="author_id">
          @foreach ($authors as $author)
            <option value="{{ $author->id }}">
              {{ $author->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="publish_date" class="form-label">Publication Date</label>
        <input type="date" class="form-control" name="publish_date" id="publish_date">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <div class="container col-10">
    <table class="table table-primary table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Publication Date</th>
          <th scope="col" class="pr-0">Options</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($books as $book)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author->name }}</td>
            <td>{{ $book->publish_date }}</td>
            <td class="d-flex flex-row gap-2">
              <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>

              <form action="{{ route('books.destroy', $book->id) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</body>

</html>

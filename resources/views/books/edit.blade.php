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

    <form action="{{ route('books.update', $book->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $book->title }}">
      </div>

      <div class="mb-3">
        <label for="author_id" class="form-label">Author</label>
        <select class="form-select" name="author_id" id="author_id">
          @foreach ($authors as $author)
            <option value="{{ $author->id }}" {{ $book->author_id === $author->id ? 'selected' : '' }}>
              {{ $author->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="publish_date" class="form-label">Publication Date</label>
        <input type="date" class="form-control" name="publish_date" id="publish_date"
          value="{{ $book->publish_date }}">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>

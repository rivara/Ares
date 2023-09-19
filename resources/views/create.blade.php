<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
  
@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="container">
      <div class="py-5 text-center">
        <p class="lead">
        Prueba técnica CRUD de productos con Laravel
        </p>
      </div>
      <div class="row">
        <div class="col-md-8 offset-md-4">
            <form class="w-px-500 p-3 p-md-3" action="{{ route('create') }}" method="get" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="form-group col-md-6 mb-3">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="name" id="name"  >
                  </div>
                  <div class="form-group col-md-6 mb-3">
                    <label for="Description">Description</label>
                    <input type="text" class="form-control" name="description" id="description">
                  </div>
                  <div class="form-group col-md-2 mb-3">
                    <label for="Units">Units</label>
                    <input type="number" class="form-control" name="units" id="units" min="1"  >
                  </div>
                  <button type="submit" class="btn btn-primary">graba</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>      
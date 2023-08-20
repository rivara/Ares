<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">
    <style>
    .editable-column {
        border: 1px solid #ccc;
        padding: 5px;
        cursor: pointer;
    }
    </style>
</head>
<body class="bg-light">
        <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="data:image/jpeg;base64,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" 
            alt="" width="100" height="72">
            <h2>Prueba Grupo Ruiz</h2>
            <p class="lead">
            Prueba técnica CRUD de productos con Laravel
            </p>
        </div>
        <div class="row">
            <div class="col-md-1 offset-md-11">
                <div class="m-3">
                <form class="w-px-500 p-3 p-md-3" action="{{ route('new') }}" method="get" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                    </button>
                </form>  
                </div>
            </div>
            <div class="col-md-12 order-md-1">
                <table id="productsTable" class="display" style="width:100%"></table>
            </div>
        </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        //DataTable
        $('#productsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('index') }}",
        
            columns: [
                { data:'id',  name: 'id', title:'Id' },
                { data:'name',name:'name',title:'Name'},
                { data:'description',name:'description',title:'Description'},
                { data:'units',name:'units',title:'Units'}
            ],
            columnDefs: [
                {
                    
                    targets: [1], 
                    render: function(data, type, row) {
                        if (type === 'display') {
                            return '<div contenteditable class="editable-column">' + row.name + '</div>';
                        }
                        return data;
                    }
                },
                {
                    targets: [2], 
                    render: function(data, type, row) {
                        if (type === 'display') {
                            return '<div contenteditable class="editable-column">' + row.description + '</div>';
                        }
                        return data;
                    }
                },
                {
                    targets: [3], 
                    render: function(data, type, row) {
                        if (type === 'display') {
                            return '<div contenteditable class="editable-column">' + row.units + '</div>';
                        }
                        return data;
                    }
                },
                {       
                    targets: [4],    
                    render : function(data, type, row){
                            // Delete form
                            return '<form method="post"  action="{{ route("destroy") }}">@csrf <input type="hidden" name="id" value="' +row.id + '"><button type="submit"  style="margin-bottom: 10px;" class="btn btn-danger"/>  <i class="fa fa-minus"></i></button></form>';
                       
                    },
                },
            ]
        });

        // Dynamic update function 
        // AJAX call to save the new value to the database
        // using the row element ID and column name
        $('#productsTable').on('blur', '.editable-column', function() {
            var rowIndex = $(this).closest('tr').index();
            var id =$('#productsTable tr:eq('+(rowIndex+1)+') td:eq(0)').text();
            var name =$('#productsTable tr:eq('+(rowIndex+1)+') td:eq(1)').text();
            var description =$('#productsTable tr:eq('+(rowIndex+1)+') td:eq(2)').text();
            var units =$('#productsTable tr:eq('+(rowIndex+1)+') td:eq(3)').text();
            $.ajax({
            type: 'post',
            url:"{{ route('update') }}",
            dataType: 'json', 
            data: {
                    id: id ,
                    name: name, 
                    description:description,
                    units:units
                },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(error);
            }
            });
        });
 
</script>
</html>
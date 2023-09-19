<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css','resources/scss/app.scss','resources/js/app.js'])
</head>

<body class="bg-light">
        <div class="container">
        <div class="py-5 text-center">
        
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
            <div class="col-md-12 order-md-1 mb-5">
                <table id="productsTable" class="display" style="width:100%"></table>
            </div>
        </div>
</body>

<script type="module">
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
                            return '<form method="post"  action="{{ route("destroy") }}">@csrf <input type="hidden" name="id" value="'+row.id+'"><button type="submit"  style="margin-bottom: 10px;" class="btn btn-danger"/>  <i class="fa fa-minus"></i></button></form>';
                       
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
            
            //if empty value not send and refresh site
            if((name === "")||(description === "")||(units === "")){
                alert("The values doesn´t be empty");
                location.reload() 
            }else{

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
            }


        });
 
</script>
</html>
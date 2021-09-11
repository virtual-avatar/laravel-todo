<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- Remember to include jQuery :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer></script>
    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


    <title>ToDo List</title>
    <style>
        body {
            margin-bottom: 100px;
        }
        .page-link {
            border-width: 1px;
        }
        .page-item {
            margin-left: 20px;
        }
        .modal {
            display: none;
            vertical-align: middle;
            position: relative;
            z-index: 1;
            max-width: 300px;
            max-height: 150px;
            box-sizing: border-box;
            width: 50%;
            background: #fff;
            padding: 15px 30px;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            -o-border-radius: 8px;
            -ms-border-radius: 8px;
            border-radius: 8px;
            -webkit-box-shadow: 0 0 10px #000;
            -moz-box-shadow: 0 0 10px #000;
            -o-box-shadow: 0 0 10px #000;
            -ms-box-shadow: 0 0 10px #000;
            box-shadow: 0 0 10px #000;
            text-align: left;
        }
        .page-link {
            position: inherit;
        }
    </style>
</head>
<body>

@yield('content')

</body>
</html>

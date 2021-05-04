<head>
    <title>demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="js/muservalidate.js"></script>
    <script src="js/paginatemuser.js"></script>
    <script src="js/demo.js"></script>
    <style>
        .tha {
            color: white !important;
            padding: 5px !important;
        }

        input.error {
            border: 1px solid red;
        }
    </style>
</head>

<body>
    <div id="table_data">
        @yield('content')
    </div>
</body>

</html>

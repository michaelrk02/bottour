<html>
    <head>
        <title><?php echo htmlspecialchars($title); ?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- jQuery -->
        <script src="<?php echo base_url('public/jquery/js/jquery-3.6.0.min.js'); ?>"></script>

        <!-- marked.js -->
        <script src="<?php echo base_url('public/marked/js/marked.min.js'); ?>"></script>

        <!-- Bootstrap 5 -->
        <link rel="stylesheet" href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css'); ?>">
        <script src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js'); ?>"></script>
    </head>
    <body>
        <div style="display: flex; flex-direction: column; min-height: 100vh">
            <div style="flex: 1 0 auto">
                <div class="bg-primary p-2">
                    <h1 class="text-light">BoT Virtual Tour</h1>
                </div>
                <div>

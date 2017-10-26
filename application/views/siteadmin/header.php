<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>Site Administration</title>

        <!-- Bootstrap CSS -->    
        <link href="<?php echo ADMIN_THEME_URL; ?>css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="<?php echo ADMIN_THEME_URL; ?>css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="<?php echo ADMIN_THEME_URL; ?>css/elegant-icons-style.css" rel="stylesheet" />
        <link href="<?php echo ADMIN_THEME_URL; ?>css/font-awesome.min.css" rel="stylesheet" />    
        <!-- full calendar css-->
        <link href="<?php echo ADMIN_THEME_URL; ?>assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="<?php echo ADMIN_THEME_URL; ?>assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
        <!-- easy pie chart-->
        <link href="<?php echo ADMIN_THEME_URL; ?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
        <!-- owl carousel -->
        <link rel="stylesheet" href="<?php echo ADMIN_THEME_URL; ?>css/owl.carousel.css" type="text/css">
        <link href="<?php echo ADMIN_THEME_URL; ?>css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <!-- Custom styles -->
        <link rel="stylesheet" href="<?php echo ADMIN_THEME_URL; ?>css/fullcalendar.css">
        <link href="<?php echo ADMIN_THEME_URL; ?>css/widgets.css" rel="stylesheet">
        <link href="<?php echo ADMIN_THEME_URL; ?>css/style.css" rel="stylesheet">
        <link href="<?php echo ADMIN_THEME_URL; ?>css/style-responsive.css" rel="stylesheet" />
        <link href="<?php echo ADMIN_THEME_URL; ?>css/xcharts.min.css" rel=" stylesheet">	
        <link href="<?php echo ADMIN_THEME_URL; ?>css/jquery-ui-1.10.4.min.css" rel="stylesheet">
        
        <link href="<?php echo ADMIN_THEME_URL; ?>css/bootstrap-datetimepicker.css" rel="stylesheet">
        <link href="<?php echo ADMIN_THEME_URL; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
          <script src="js/lte-ie7.js"></script>
        <![endif]-->
    </head>
    <script src="<?php echo CKEDITOR . "ckeditor.js" ?>"></script>
    <script>

        var editor;
        // The instanceReady event is fired, when an instance of CKEditor has finished
        // its initialization.
        CKEDITOR.on('instanceReady', function (ev) {
            editor = ev.editor;

            // Show this "on" button.
            document.getElementById('readOnlyOn').style.display = '';

            // Event fired when the readOnly property changes.
            editor.on('readOnly', function () {
                document.getElementById('readOnlyOn').style.display = this.readOnly ? 'none' : '';
                document.getElementById('readOnlyOff').style.display = this.readOnly ? '' : 'none';
            });
        });

        function toggleReadOnly(isReadOnly) {
            // Change the read-only state of the editor.
            // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setReadOnly
            editor.setReadOnly(isReadOnly);
        }

        CKEDITOR.config.allowedContent = true;
        CKEDITOR.editorConfig = function (config) {
            allowedContent: 'p[*] h1[*] h2[*] h3[*] h4[*] span[*] div[*] img[*] a[*]';
        };

    </script>
</head>
<body>
    <section id="container" class="">

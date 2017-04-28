
<?php 


function set_header($title)
{
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="/ressource/img/favicon.ico" rel="icon" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php if(isset($title)){ echo $title; } ?></title>
     <link rel="stylesheet" href="/ressource/css/style.css">
          <link rel="stylesheet" href="/ressource/css/checkbox.css">

     <link rel="stylesheet" href="/ressource/css/bootstrap2.min.css">
     <link rel="stylesheet" href="/ressource/css/bootstrap-datetimepicker.min.css">
     <link rel="stylesheet" href="/ressource/css/calendar.css">
     <link rel="stylesheet" href="/ressource/css/font-awesome.min.css">
     <link rel="stylesheet" href="/ressource/css/fontawesome-iconpicker.min.css">
     <link rel="stylesheet" href="/ressource/css/star-rating.min.css">
     <link rel="stylesheet" href="/ressource/css/pnotify/pnotify.css">
     <link rel="stylesheet" href="/ressource/css/pnotify/pnotify.buttons.css">
     <link rel="stylesheet" href="/ressource/css/pnotify/pnotify.nonblock.css">
     <link rel="stylesheet" href="/ressource/css/bootstrap-colorpicker.min.css">
     <link rel="stylesheet" href="/ressource/css/select2.min.css">
    
     
     
             <!-- Scripts -->
             <script type="text/javascript" src="/ressource/js/jquery.min.js" ></script>
        <script type="text/javascript" src="/ressource/js/pnotify/pnotify.desktop.js" ></script>
        <script type="text/javascript" src="/ressource/js/pnotify/pnotify.history.js" ></script>
        <script type="text/javascript" src="/ressource/js/pnotify/pnotify.nonblock.js" ></script>
        <script type="text/javascript" src="/ressource/js/pnotify/pnotify.buttons.js" ></script>
        <script type="text/javascript" src="/ressource/js/pnotify/pnotify.js" ></script>
        <script type="text/javascript" src="/ressource/js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="/ressource/js/moment.js" ></script>
        <script type="text/javascript" src="/ressource/js/bootstrap-datetimepicker.min.js" ></script>
        <script type="text/javascript" src="/ressource/js/ckeditor/ckeditor.js" ></script>
        <script type="text/javascript" src="/ressource/js/respond.min.js" ></script>
        <script type="text/javascript" src="/ressource/js/html5shiv.js" ></script>
        <script type="text/javascript" src="/ressource/js/select2.min.js"></script>
</head>
<body>
<?php
}


function set_footer(){
?>
<script type="text/javascript" src="/ressource/js/form/datetimepicker.js"></script>

<script type="text/javascript" src="/ressource/js/select2.full.min.js"></script>
<script type="text/javascript" src="/ressource/js/form/select.js"></script>
<script type="text/javascript" src="/ressource/js/inputmask.min.js"></script>
<script type="text/javascript" src="/ressource/js/form/phonenumber.js"></script>
<script type="text/javascript" src="/ressource/js/chat.js"></script>

</body>
</html>
<?php
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('assets') }}/images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/bootstrap/css/bootstrap.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css"> --}}
  
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets') }}/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/select2/select2.min.css">
    <!-- Select2 -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets') }}/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/main.css">
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.min.js"></script>
    
    {{-- floating wa --}}
    <script src="{{ asset('assets') }}/vendor/floating-wa/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/floating-wa/floating-wpp.min.css">
    <script src="{{ asset('assets') }}/vendor/floating-wa/floating-wpp.min.js"></script>
</head>
<style>
    @media (max-width:1600px) {
        .topdesktop {
            margin-top: 50px;
        }

        .topproduk {
            margin-top: 80px;
            padding-top: 10px;
        }
        .slider-m {
            display: none;
        }
        .slider-d {
            display: block;
        }
        .forgot {
            padding-right: 300px;
        }
    }

    @media (max-width:480px) {
        .topdesktop {
            margin-top: 0px;
        }

        .topproduk {
            margin-top: 0px;
        }

        .slider-m {
            display: block;
        }
        .slider-d {
            display: none;
        }
        .forgot {
            padding-right: 160px;
        }
        .gmbr {
            width: 100%;
        }
    }

    

</style>

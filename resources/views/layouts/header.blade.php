<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Livewire Study</title>

    <!-- App Style -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    {{--Alpine JS--}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>
    <style>
        .main{
            min-height: 400px;
            /* border:1px solid #000; */
        }
        input.error, textarea.error{
            border:1px solid red;
        }

        .error-message{
            color:red;
        }


        progress {
            border-radius: 7px;
        }
        progress::-webkit-progress-bar {
            background-color: lightgray;
            border-radius: 7px;
        }
        progress::-webkit-progress-value {
            background-color: blue;
            border-radius: 7px;
        }
    </style>
    </style>
    <livewire:styles />
</head>
<body>
    <div class="container main" role="main">
        <h1 class="mt-2"> Laravel Livewire Basics Study from Laracast </h1>
        <hr/>



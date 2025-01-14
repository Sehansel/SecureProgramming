<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
            .card {
                width: 13rem;
                border: 1px solid #ddd;
                border-radius: 5px;
                overflow: hidden;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: 0.3s;
                margin-top: 30px;
                margin-left: 20px;
                margin-right: 10px;
            }

            .card:hover {
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            }

            .card-img {
                width: 100%;
                height: auto;
            }

            .card-body {
                padding: 15px;
            }

            .card-title {
                font-size: 1.25rem;
                margin-bottom: 10px;
            }

            .card-text {
                font-size: 1rem;
                color: #666;
            }

            .btn {
                display: inline-block;
                padding: 10px 15px;
                background-color: #007bff;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: 0.2s;
                margin-top: 10px;
            }

            .btn:hover {
                background-color: #0056b3;
            }

            .btnU {
                display: inline-block;
                padding: 10px 15px;
                background-color: green;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: 0.2s;
                margin-top: 10px;
            }

            .btnU:hover {
                background-color: green;
            }

            .btnD {
                display: inline-block;
                padding: 10px 15px;
                background-color: red;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: 0.2s;
                margin-top: 10px;
            }

            .btnD:hover {
                background-color: red;
            }

            .page{
                display: flex;
                margin: 5px;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                <div class="page">
                    @foreach ($publishers as $publisher)
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title" style="color: white">{{$publisher->publisherName}}</h5>
                            <a href="{{route('publisherDetail', ['id'=>Crypt::encrypt($publisher->id)])}}" class="btn">Detail</a>
                            @can('admin')
                            <div>
                                <a href="{{route('editPublisher', ['id'=>Crypt::encrypt($publisher->id)])}}" class="btnU">Update</a>
                                <form action="{{route('deletePublisher', ['id'=>Crypt::encrypt($publisher->id)])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btnD">Delete</a>
                                </form>
                            </div>
			    @endcan
                            </div>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
        
    </body>
</html>

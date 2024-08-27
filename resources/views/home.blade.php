@extends('layouts.app')

@section('content')
    <style>
        /* Styles specific to the Home page */
        .home-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Full viewport height */
            text-align: center;
            margin-left: auto; /* Adjusts for the sidebar width */
            transition: margin-left 0.3s ease-in-out;
        }

        .home-content h1,
        .home-content h2 {
            margin: 0;
            color: black; /* Optional: Set text color to contrast with background */
        }

        .content.collapsed .home-content {
            margin-left: 0;
        }
    </style>
    <div class="home-content">
        <h1>Welcome to Maintenance Report!!!</h1>
        <h2>Maintenance Apps</h2>
    </div>
@endsection

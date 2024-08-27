@extends('layouts.app')

@section('content')
    <h1>Task Description</h1>

    <!-- Button to Open Modal -->
    <button id="openModalBtn">Add Task Description</button>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Task Description Form</h2>
            <form action="/submit-task-description" method="POST">
                @csrf
                <label for="description">Description:</label><br>
                <textarea id="description" name="description"></textarea><br><br>

                <label for="location">Location:</label><br>
                <input type="text" id="location" name="location" placeholder="Enter a location"><br><br>

                <label for="reason">Reason:</label><br>
                <input type="text" id="reason" name="reason"><br><br>

                <label for="priority">Priority Status:</label><br>
                <select id="priority" name="priority">
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                </select><br><br>

                <label for="technician">Technician:</label><br>
                <input type="text" id="technician" name="technician"><br><br>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Script for Modal -->
    <script>
        // Get modal elements
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("openModalBtn");
        var span = document.getElementsByClassName("close")[0];

        // Open the modal when the button is clicked
        btn.onclick = function() {
            modal.style.display = "flex"; // Use flex to center modal
        }

        // Close the modal when the user clicks on <span> (x)
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Initialize Google Maps Autocomplete
        function initAutocomplete() {
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input);

            // Bias the autocomplete object to the user's geographical location
            // in order to give better results for cities.
            autocomplete.setBounds(new google.maps.LatLngBounds(
                new google.maps.LatLng(-85, -180),
                new google.maps.LatLng(85, 180)
            ));

            // Add event listener for when the user selects an address from the dropdown
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                // You can handle the selected place details here if needed
                console.log(place);
            });
        }

        // Load the autocomplete function when the window loads
        window.onload = function() {
            initAutocomplete();
        };
    </script>
@endsection

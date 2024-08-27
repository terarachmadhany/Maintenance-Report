@extends('layouts.app')

@section('content')
    <h1>Change Request Form</h1>

    <!-- Button to Open Modal -->
    <button id="openModalBtn">Add Change Request</button>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Change Request Form</h2>
            <form action="/submit-change-request" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="project_name">Project Name:</label><br>
                <input type="text" id="project_name" name="project_name"><br><br>

                <label for="project_description">Project Description:</label><br>
                <textarea id="project_description" name="project_description"></textarea><br><br>

                <label for="ticket_number">Ticket Number:</label><br>
                <input type="text" id="ticket_number" name="ticket_number"><br><br>

                <label for="request_by">Request By:</label><br>
                <input type="text" id="request_by" name="request_by"><br><br>

                <label for="contact">Contact:</label><br>
                <input type="text" id="contact" name="contact"><br><br>

                <label for="date_time">Date & Time:</label><br>
                <input type="datetime-local" id="date_time" name="date_time"><br><br>

                <label for="document">Upload Document:</label><br>
                <input type="file" id="document" name="document"><br><br>

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
    </script>
@endsection

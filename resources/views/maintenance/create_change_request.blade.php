@extends('layouts.app')

@section('content')
    <h1>Task Description Form</h1>

    <button id="openModalBtn">Add Task Description</button>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Task Description Form</h2>
            <form action="{{ route('maintenance.storeChangeRequest') }}" method="POST">
                @csrf
                <!-- Form fields -->
                <label for="project_name">Project Name:</label><br>
                <input type="text" id="project_name" name="project_name"><br><br>

                <label for="project_description">Project Description:</label><br>
                <textarea id="project_description" name="project_description"></textarea><br><br>

                <label for="change_name">Change Name:</label><br>
                <textarea id="change_name" name="change_name"></textarea><br><br>

                <label for="ticket_number">Ticket Number:</label><br>
                <input type="text" id="ticket_number" name="ticket_number"><br><br>

                <label for="requested_by">Request By:</label><br>
                <input type="text" id="requested_by" name="requested_by"><br><br>

                <label for="contact">Contact:</label><br>
                <input type="text" id="contact" name="contact"><br><br>

                <label for="date">Date :</label><br>
                <input type="date" id="date" name="date"><br><br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Modal script -->
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

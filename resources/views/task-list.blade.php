@extends('layouts.app')

@section('content')
    <h1>Task List</h1>

    <!-- Button to Open Modal -->
    <button id="openModalBtn">Add Task List</button>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Task List Form</h2>
            <form action="/submit-task-list" method="POST">
                @csrf
                <label for="estimated_time">Estimated Time of Work:</label><br>
                <input type="text" id="estimated_time" name="estimated_time"><br><br>

                <label for="duration">Duration:</label><br>
                <select id="duration" name="duration">
                    <option value="1 hour">1 hour</option>
                    <option value="2 hours">2 hours</option>
                    <option value="Half Day">Half Day</option>
                    <option value="Full Day">Full Day</option>
                </select><br><br>

                <label for="list_task">List Task:</label><br>
                <input type="text" id="list_task" name="list_task"><br><br>

                <label for="cost">Cost:</label><br>
                <input type="text" id="cost" name="cost"><br><br>

                <label for="date_needed">Date Needed:</label><br>
                <input type="date" id="date_needed" name="date_needed"><br><br>

                <label for="approval_requester">Approval of Requester:</label><br>
                <input type="text" id="approval_requester" name="approval_requester"><br><br>

                <label for="approval_manager">Approval of Project Manager:</label><br>
                <input type="text" id="approval_manager" name="approval_manager"><br><br>

                <label for="approval_date">Approval Date:</label><br>
                <input type="date" id="approval_date" name="approval_date"><br><br>

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

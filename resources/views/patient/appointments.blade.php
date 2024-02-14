
<!-- resources/views/patient/appointments.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Make an Appointment</h1>

    <form id="appointmentForm">
        <div>
            <label for="specialty">Choose Specialty:</label>
            <select id="specialty" name="specialty">
                <option value="">Select Specialty</option>
                
            </select>
        </div>

        <div>
            <label for="doctor">Choose Doctor:</label>
            <select id="doctor" name="doctor">
                <option value="">Select Doctor</option>
            </select>
        </div>

        <button type="submit">Book Appointment</button>
    </form>

    <div id="doctorList"></div>
@endsection

@section('scripts')
    <script>
        // AJAX request to fetch available doctors based on selected specialty
        $('#specialty').change(function() {
            var specialtyId = $(this).val();
            $.get('/available-doctors', { specialty_id: specialtyId }, function(data) {
                $('#doctor').empty().append('<option value="">Select Doctor</option>');
                $.each(data.doctors, function(index, doctor) {
                    $('#doctor').append('<option value="' + doctor.id + '">' + doctor.name + '</option>');
                });
            });
        });

        // AJAX request to fetch and display available doctors on page load
        $(document).ready(function() {
            $.get('/available-doctors', function(data) {
                $.each(data.doctors, function(index, doctor) {
                    $('#doctorList').append('<p>' + doctor.name + ' (' + doctor.specialty.name + ')</p>');
                });
            });
        });

        // Form submission handling
        $('#appointmentForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            // Handle form submission here
        });
    </script>
@endsection

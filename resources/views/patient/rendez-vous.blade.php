<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Appointment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    
    <form id="rendezVousForm" action="{{ route('rendezVousStore') }}" method="POST">
        @csrf
        <input type="hidden" name="iddoctor" value="{{ $idDoctor }}">
        <input type="hidden" name="date" id="selectedDate">

        <div class="mx-auto grid max-w-screen-lg px-6 pb-20">
            <div class="">
                <p class="mt-8 font-serif text-xl font-bold text-blue-900">Séléctionnez les heures disponibles</p>
                <div class="mt-4 grid grid-cols-4 gap-2 lg:max-w-xl">
                    @php
                        $hours = ['08:00', '09:00', '10:00', '11:00', '14:00', '15:00', '16:00', '17:00'];
                    @endphp
                    @foreach ($hours as $hour)
                        @php
                            $isDisabled = in_array($hour, $existingDates);
                            $class = $isDisabled ? 'bg-red-500 text-white' : 'bg-emerald-100 text-emerald-900';
                        @endphp
                        <button class="date-button rounded-lg px-4 py-2 font-medium active:scale-95 {{ $class }}"
                            value="{{ $hour }}" {{ $isDisabled ? 'disabled' : '' }}>
                            {{ $hour }}
                        </button>
                    @endforeach
                </div>
            </div>
            <button id="confirmButton"
                class="mt-8 w-56 rounded-full border-8 border-emerald-500 bg-emerald-600 px-10 py-4 text-lg font-bold text-white transition hover:translate-y-1"
                disabled>Prendre le rendez-vous</button>
        </div>
    </form>

    </div>
    <script src="https://unpkg.com/flowbite@1.5.2/dist/datepicker.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateButtons = document.querySelectorAll('.date-button');
            let selectedButton = null;

            // Add click event listener to each date button
            dateButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (!button.disabled) {
                        // Disable all date buttons
                        dateButtons.forEach(btn => {
                            btn.disabled = true;
                            btn.classList.remove('selected');
                        });

                        // Enable the selected date button
                        button.classList.add('selected');
                        selectedButton = button;

                        // Set the value of the hidden input field to the selected date
                        document.getElementById('selectedDate').value = button.value;

                        // Enable the "Book Now" button
                        document.getElementById('confirmButton').disabled = false;
                    }
                });
            });

            // Add click event listener to the "Book Now" button
            document.getElementById('confirmButton').addEventListener('click', function(event) {
                // Prevent the default form submission
                event.preventDefault();

                // Disable the selected button
                if (selectedButton) {
                    selectedButton.disabled = true;
                }

                // Submit the form
                document.getElementById('rendezVousForm').submit();
            });
        });
    </script>
</body>

</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-800 text-gray-200 flex justify-center">
    <div class="rounded-lg w-3/4 flex justify-center mt-8">
        <table class="shadow-md w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">Sensors</th>
                <th class="px-6 py-3">Temperature</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sensors as $sensor)
                <tr id="sensor-{{$sensor->sensor}}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th class="px-6 py-4">Sensor {{ $sensor->sensor }}</th>
                    <th class="px-6 py-4">{{ $sensor->temperature }}°C</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function updateRow(id, temperature) {
            const sensorElement = document.getElementById(`sensor-${id}`);
            if (!sensorElement) return;

            const temperatureElement = sensorElement.children[1];
            temperatureElement.textContent = `${temperature}°C`;
        }

        function updateSensorsInfo() {
            fetch("/api/sensors").then((response) => {
                return response.json();
            }).then((sensors) => {
                for (const sensor of sensors) {
                    updateRow(sensor.sensor, sensor.temperature);
                }
            });
        }

        setInterval(updateSensorsInfo, 5000);
    </script>
</body>
</html>

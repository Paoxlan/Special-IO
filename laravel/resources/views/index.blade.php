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
<body class="bg-slate-800 text-gray-200">
    <div class="w-screen flex justify-center">
        <table class="w-9/12 border-2 text-left">
            <thead>
            <tr>
                <th class="border-2">Sensors</th>
                <th class="border-2">Temperature</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sensors as $sensor)
                <tr id="sensor-{{$sensor->sensor}}">
                    <th class="border-2">Sensor {{ $sensor->sensor }}</th>
                    <th class="border-2">{{ $sensor->temperature }}°C</th>
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

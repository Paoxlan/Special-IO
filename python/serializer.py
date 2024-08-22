import serial, requests

arduino = serial.Serial(baudrate=9600, port='/dev/ttyACM0')

while True:
    try:
        line = arduino.readline().decode()
        [sensor, value] = line.strip().split("|", 2)

        requests.post("http://127.0.0.1:8000/api/update-sensor", json = {
           "sensor": int(sensor) + 1,
           "temperature": float(value)
        })

        print(f"Retrieved sensor {sensor}: Temperature {value}")
    except KeyboardInterrupt:
        arduino.close()
        break
    except:
        print("Error reading line. Retrying..")
        continue

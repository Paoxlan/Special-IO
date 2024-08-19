import serial

arduino = serial.Serial(baudrate=9600, port='/dev/ttyACM0')

while True:
    try:
        msg = arduino.readline().decode()
        print(msg, end="")
    except KeyboardInterrupt:
        arduino.close()
        break
    except:
        print("Error reading line. Retrying..")
        continue
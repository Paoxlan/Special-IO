#include <OneWire.h>
#include <DallasTemperature.h>

const int ONE_WIRE_BUS = 2;

OneWire oneWire(ONE_WIRE_BUS);
DallasTemperature sensors(&oneWire);

int numDevices;
DeviceAddress tempDeviceAddress;

void setup() {
  Serial.begin(9600);
  sensors.begin();

  numDevices = sensors.getDeviceCount();
  Serial.println(numDevices);
}

void loop() {
  sensors.requestTemperatures();

  for (size_t i = 0; i < numDevices; i++) {
    if (!sensors.getAddress(tempDeviceAddress, i)) continue;

    float tempC = sensors.getTempC(tempDeviceAddress);
    Serial.print(i);
    Serial.print("|");
    Serial.println(tempC);
  }

  delay(5000);
}

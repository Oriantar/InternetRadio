#include "Arduino.h"
#include "WiFi.h"
#include "SPI.h"
//#include "SD.h"
//#include "FS.h"
#include "vs1053_ext.h"

#include <WiFi.h>
#include <WiFiMulti.h>

#include <HTTPClient.h>


// Digital I/O used
//#define SD_CS        5
#define VS1053_MOSI   23
#define VS1053_MISO   19 
#define VS1053_SCK    18
#define VS1053_CS      2
#define VS1053_DCS     4
#define VS1053_DREQ   35
#define USE_SERIAL Serial

WiFiMulti wifiMulti;
long start = 0;
long requestInterval = 1000;

String ssid =     "Glamdring";
String password = "12345678";
String zender = "streambbr.ir-media-tec.com/berlin/mp3-128/vtuner_web_mp3/"; 

int volume=10;

VS1053 mp3(VS1053_CS, VS1053_DCS, VS1053_DREQ, VSPI, VS1053_MOSI, VS1053_MISO, VS1053_SCK);

//The setup function is called once at startup of the sketch
void setup() {
    //pinMode(SD_CS, OUTPUT);      digitalWrite(SD_CS, HIGH);
    Serial.begin(115200);
    SPI.begin(VS1053_SCK, VS1053_MISO, VS1053_MOSI);
    //SD.begin(SD_CS);
    WiFi.disconnect();
    WiFi.mode(WIFI_STA);
    WiFi.begin(ssid.c_str(), password.c_str());
    while (WiFi.status() != WL_CONNECTED) delay(1500);
    
    //mp3.connecttohost("stream.landeswelle.de/lwt/mp3-192");                 // mp3 192kb/s
    //mp3.connecttohost("http://radio.hear.fi:8000/hear.ogg");                // ogg
    //mp3.connecttohost("tophits.radiomonster.fm/320.mp3");                   // bitrate 320k
    //mp3.connecttohost("http://star.jointil.net/proxy/jrn_beat?mp=/stream"); // chunked data transfer
    //mp3.connecttohost("http://stream.srg-ssr.ch/rsp/aacp_48.asx");          // asx
    //mp3.connecttohost("www.surfmusic.de/m3u/100-5-das-hitradio,4529.m3u");  // m3u
    //mp3.connecttohost("https://raw.githubusercontent.com/schreibfaul1/ESP32-audioI2S/master/additional_info/Testfiles/Pink-Panther.wav"); // webfile
    //mp3.connecttohost("http://stream.revma.ihrhls.com/zc5060/hls.m3u8");    // HLS
    //mp3.connecttohost("https://mirchiplaylive.akamaized.net/hls/live/2036929/MUM/MEETHI_Auto.m3u8"); // HLS transport stream
    //mp3.connecttoFS(SD, "320k_test.mp3"); // SD card, local file
    
}

// The loop function is called in an endless loop
void loop()
{
    checkZender();
    checkVolume();
    MP3Unit();
    
    
}

void MP3Unit(){
    mp3.begin();
    mp3.setVolume(volume);
    mp3.connecttohost(zender);

}
int enoughTimePassed(){
  if(millis() > start + requestInterval){
    start = millis();
    return true;
  }
  else{
    return false;
  }
}
void checkZender(){
  if(!enoughTimePassed()){
    return;
  }
  if((wifiMulti.run() == WL_CONNECTED)) {

    HTTPClient http;

    USE_SERIAL.print("[HTTP] begin...\n");
        // configure traged server and url
        //http.begin("https://www.howsmyssl.com/a/check", ca); //HTTPS
    http.begin("http://pi.local/RadioOutput"); //HTTP

    USE_SERIAL.print("[HTTP] GET...\n");
        // start connection and send HTTP header
    int httpCode = http.GET();

        // httpCode will be negative on error
    if(httpCode > 0) {
            // HTTP header has been send and Server response header has been handled
    USE_SERIAL.printf("[HTTP] GET... code: %d\n", httpCode);

            
    if(httpCode == HTTP_CODE_OK) {
      String payload = http.getString();
                USE_SERIAL.println(payload);
                
                zender = (payload);
                
            }
        } else {
            USE_SERIAL.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
        }

        http.end();
    }

}

void checkVolume(){
      if(!enoughTimePassed()){
    return;
  }
  if((wifiMulti.run() == WL_CONNECTED)) {

    HTTPClient http;

    USE_SERIAL.print("[HTTP] begin...\n");
        // configure traged server and url
        //http.begin("https://www.howsmyssl.com/a/check", ca); //HTTPS
    http.begin("http://pi.local/volume/volumeOutput"); //HTTP

    USE_SERIAL.print("[HTTP] GET...\n");
        // start connection and send HTTP header
    int httpCode = http.GET();

        // httpCode will be negative on error
    if(httpCode > 0) {
            // HTTP header has been send and Server response header has been handled
    USE_SERIAL.printf("[HTTP] GET... code: %d\n", httpCode);

            
    if(httpCode == HTTP_CODE_OK) {
      String payload = http.getString();
                USE_SERIAL.println(payload);
                volume = payload.toInt();
                
                
            }
        } else {
            USE_SERIAL.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
        }

        http.end();
    }
}



// next code is optional:
// void vs1053_info(const char *info) {                // called from vs1053
//     Serial.print("DEBUG:        ");
//     Serial.println(info);                           // debug infos
// }
void vs1053_showstation(const char *info){          // called from vs1053
    Serial.print("STATION:      ");
    Serial.println(info);                           // Show station name
}
void vs1053_showstreamtitle(const char *info){      // called from vs1053
    Serial.print("STREAMTITLE:  ");
    Serial.println(info);                           // Show title
}
void vs1053_showstreaminfo(const char *info){       // called from vs1053
    Serial.print("STREAMINFO:   ");
    Serial.println(info);                           // Show streaminfo
}
void vs1053_eof_mp3(const char *info){              // called from vs1053
    Serial.print("vs1053_eof:   ");
    Serial.print(info);                             // end of mp3 file (filename)
}
void vs1053_bitrate(const char *br){                // called from vs1053
    Serial.print("BITRATE:      ");
    Serial.println(String(br)+"kBit/s");            // bitrate of current stream
}
void vs1053_commercial(const char *info){           // called from vs1053
    Serial.print("ADVERTISING:  ");
    Serial.println(String(info)+"sec");             // info is the duration of advertising
}
void vs1053_icyurl(const char *info){               // called from vs1053
    Serial.print("Homepage:     ");
    Serial.println(info);                           // info contains the URL
}
void vs1053_eof_speech(const char *info){           // called from vs1053
    Serial.print("end of speech:");
    Serial.println(info);
}
void vs1053_lasthost(const char *info){             // really connected URL
    Serial.print("lastURL:      ");
    Serial.println(info);
}


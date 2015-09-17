# MirrorBin
Mirror bin is an adapted version of the original doxbin source which includes an option to mirror and index Pastebin doxes to prevent **DMCA notices** and **hosting take-downs**. This version includes support for regular text files and can detect and dynamically switch between mirrors and non-mirrors.

## Installation
1. Upload the contents to your webserver
2. Remove the DISABLEPOST file from the /dox directory to begin posting doxes.
3. Either upload your .txt file to the /dox directory manually, upload it to Pastebin and paste
the JavaScript embed code in the .txt file, or use the web interface to upload a dox.
4. In some instances, you may have to ensure that the correct permissions are set for the uploaded files. In this case, you should run chmod -R 755 on the uploaded files to fix their permissions.

## Disclaimer
This application will prevent most hosts from being able to take down your site due to the fact that most hosts do not consider embeding of illegal content to be a violation of their terms. However, you should be sure to confirm this with your host, and make sure that you abide by all relevant laws. Personally, I have confirmed that **OVH** will allow such a website to be hosted with no problems. This application is for educational purposes only, use it in its entirety, or parts of it at your own risk.

## Features
- Automatic switching between mirrored & local doxes
- Filesize support for mirrored doxes
- Online status for mirrored doxes
- Special error handling for mirrored doxes including private & removed pastes
- Based on nacash's original doxbin source code
- Special indexing and searching to inlude all mirrored & local doxes

## Screenshots
![Screenshot 1](http://i.imgur.com/SkwG96Y.png)
![Screenshot 2](http://i.imgur.com/VtT5fvz.png)
![Screenshot 3](http://i.imgur.com/1hwIvOf.png)

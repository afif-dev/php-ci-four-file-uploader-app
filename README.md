# PHP, CodeIgniter 4 - File Uploader App

File Uploader project is build with Codeigniter 4 (PHP Programming language). Enable user to upload single & multiple of image or pdf files.
Automatically upload single & multiple of image or pdf with Dropzone.js.

1. Single Upload
2. Multiple Upload
3. Dropzone


### .env file
This variables is required in .env file

```        
  # upload file max in kb
  app.uploadFileMax = 1500

  # upload directory & path
  app.publicUploadDir = '/public/uploads/'
  app.publicUploadPath = '/uploads/'

  # allow upload (true, false, 'mock') //mock = temporary file upload as mockup
  app.allowUpload = 'mock'
```        

### Upload folder
1. 📁 {app.publicUploadDir}/files
2. 📁 {app.publicUploadDir}/thumbs

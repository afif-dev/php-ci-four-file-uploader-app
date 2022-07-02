<?= $this->extend('templates/layouts/default') ?>

<?= $this->section('content') ?>

<section class="section is-main-section">
  
  <div class="card">
    <div class="card-content">
      <p><strong>File Uploader</strong> project is build with Codeigniter 4 (PHP Programming language). 
      Enable user to upload single & multiple of image or pdf files.<br/>Automatically upload single & multiple of image or pdf with Dropzone.js.
      </p>
      <ol type="1" class="m-4">
        <li><a href="/upload/single">Single Upload</a></li>
        <li><a href="/upload/multiple">Multiple Upload</a></li>
        <li><a href="/upload/dropzone">Dropzone</a></li>
      </ol> 
      <h3 class="is-size-4">.env file</h3>
      <p>This variables is required in .env file</p>
      <pre class="mb-4">
        <code>
        # upload file max in kb
        app.uploadFileMax = 1500

        # upload directory & path
        app.publicUploadDir = '/public/uploads/'
        app.publicUploadPath = '/uploads/'

        # allow upload (true, false, 'mock') //mock = temporary file upload as mockup
        app.allowUpload = 'mock'
        </code>
      </pre>
      <h3 class="is-size-4">Upload folder</h3>
      <ol type="1" class="m-4">
        <li>📁 {app.publicUploadDir}/files</a></li>
        <li>📁 {app.publicUploadDir}/thumbs</a></li>
      </ol>
    </div>
  </div>

</section>

<?= $this->endSection() ?>

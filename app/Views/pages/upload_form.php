<?= $this->extend('templates/layouts/default') ?>

<?= $this->section('content') ?>

<section class="section is-main-section">

  <?php  
  if($allow_upload === 'mock') {
    echo $this->include('templates/noti-upload');
  } 
  ?>

<?php $success = session()->getFlashdata('success'); 
if (isset($success)): ?>
  <article class="message is-success">
    <div class="message-header">
      <p>Success</p>
      <button class="delete" aria-label="delete"></button>
    </div>
    <div class="message-body">
    <?php foreach ($success as $key => $data): ?>
      <div><?=  esc($key) .' : '. esc($data) ?></div>
    <?php endforeach; ?>
    </div>
  </article>
<?php endif; ?>
  
<?php $errors = session()->getFlashdata('errors'); 
if (isset($errors)): ?>
  <article class="message is-danger">
    <div class="message-header">
      <p>Error</p>
      <button class="delete" aria-label="delete"></button>
    </div>
    <div class="message-body">
    <?php foreach ($errors as $error): ?>
      <div><?= esc($error) ?></div>
    <?php endforeach; ?>
    </div>
  </article>
<?php endif; ?>
  
<div class="card">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-upload"></i></span>
        <?= esc($title) ?> of Image File
      </p>
    </header>
    <div class="card-content">
      <?= form_open_multipart('upload/img', ["id"=>"single-upload", "class"=>"file-uploader"]) ?>
        <input class="input is-normal mb-3" type="file" name="file" />
        <input type="submit" class="button is-primary" value="Upload Image" />
      </form>
    </div>
  </div>

  <div class="card">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-upload"></i></span>
        <?= esc($title) ?> of PDF File
      </p>
    </header>
    <div class="card-content">
      <?= form_open_multipart('upload/pdf', ["id"=>"single-upload", "class"=>"file-uploader"]) ?>
        <input class="input is-normal mb-3" type="file" name="file" />
        <input type="submit" class="button is-primary" value="Upload PDF" />
      </form>
    </div>
  </div>
</section>

<?= $this->endSection() ?>

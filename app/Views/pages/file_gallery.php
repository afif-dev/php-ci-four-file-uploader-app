<?php
$files_arr = [];
foreach($files as $file){
  if($file->guessExtension() != '') {
  $files_arr[] = $file;
  }
}
?>
<?= $this->extend('templates/layouts/default') ?>

<?= $this->section('content') ?>

<section class="section is-main-section">
  <article class="message is-info">
    <div class="message-header">
      <p>Info</p>
      <button class="delete" aria-label="delete"></button>
    </div>
    <div class="message-body">
      <strong>File Uploader</strong> project is build with Codeigniter 4 (PHP Programming language). 
      Enable user to upload single & multiple of image or pdf files.<br/>Automatically upload single & multiple of image or pdf with Dropzone.js. Check <a href="/documentation">docs</a>
    </div>
  </article>
  <div class="card">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-folder-multiple-image"></i></span>
        Total files is <?= count($files_arr) ?>
      </p>
    </header>
    <div class="card-content">
      <div class="columns is-multiline is-mobile">
      <?php
      krsort($files_arr);
      foreach($files_arr as $kfile => $file):
        ?>  
        <div class="column is-full-mobile is-half-is-one-third-tablet is-one-third-desktop is-one-quarter-widescreen is-one-fifth-fullhd break-word">
          <div class="box">
            <?php 
            if(in_array($file->guessExtension(), $accept_ext)): ?> 
            <div class="block">
            <figure class="image">
            <a class="js-modal-trigger" data-target="modal-<?= esc($file->getBasename()); ?>">
              <img src="<?= base_url().'/uploads/thumbs/'.esc($file->getBasename()); ?>" />
            </a>  
            </figure>
            </div>
            <div id="modal-<?= esc($file->getBasename()); ?>" class="modal">
              <div class="modal-background"></div>
              <div class="modal-content">
                <div class="image">
                  <img src="<?= base_url().'/uploads/files/'.esc($file->getBasename()); ?>" alt="" />
                </div>
              </div>
              <button class="modal-close is-large" aria-label="close"></button>
            </div>
            <?php elseif($file->guessExtension() == 'pdf'): ?>
            <div class="block">
            <figure class="image">
            <a href="/file-gallery/download/<?= esc($file->getBasename()); ?>">
              <img src="/assets/img/pdf-cover.jpg" alt="" />
            </a>
            </figure>
            </div>
            <?php endif; ?>
            <div class="block">
              <p class="is-size-7">
              Filename: <?= esc($file->getBasename()); ?> <br/>
              Filesize: <?= esc($file->getSizeByUnit('kb')); ?> kb
              </p>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
      </div>
      
    </div>
  </div>

</section>

<?= $this->endSection() ?>

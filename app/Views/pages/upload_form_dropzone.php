<?= $this->extend('templates/layouts/default') ?>

<?= $this->section('content') ?>

<section class="section is-main-section">
  
  <?php
  if($allow_upload === 'mock') {
    echo $this->include('templates/noti-upload');
  } 
  ?>

  <div class="card"> 
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-upload"></i></span>
        <?= esc($title) ?> of Image File
      </p>
    </header>
    <div class="card-content">
        <?= form_open_multipart('upload/img', ["id"=>"my-dropzone","class"=>"dropzone"]) ?>
            <input type="hidden" name="no-redirect" value="1">
            <div class="previews"></div>    
            <div class="fallback">
                <input class="input is-normal mb-3" type="file" name="file" multiple />
                <input type="submit" class="button is-primary" value="Upload Image" />
            </div>    
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
        <?= form_open_multipart('upload/pdf', ["id"=>"my-dropzone-pdf","class"=>"dropzone"]) ?>
            <input type="hidden" name="no-redirect" value="1">
            <div class="previews"></div>    
            <div class="fallback">
                <input class="input is-normal mb-3" type="file" name="file" multiple />
                <input type="submit" class="button is-primary" value="Upload PDF" />
            </div>    
        </form>
    </div>
  </div>
</section>

<?= $this->endSection() ?>

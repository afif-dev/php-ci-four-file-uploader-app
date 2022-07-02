<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-aside-expanded">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeIgniter - <?= esc($title) ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
    <!-- Icons  -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css" type="text/css" />
    
    <!-- Style -->
    <link rel="stylesheet" href="/assets/js/dropzone/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/main.min.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/styles.css" type="text/css" />
</head>
<body>
<div id="app">
<nav id="navbar-main" class="navbar is-fixed-top is-hidden-desktop">
<div class="navbar-brand">
    <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
    <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
    </a>
    <div class="navbar-item is-flex-grow-1 is-justify-content-center">
    <a href="/" class="has-text-black"><p><span><b>CI 4</b> File Uploader</span></p></a>
    </div>
</div>
</nav>
<aside class="aside is-placed-left is-expanded">
<div class="aside-tools">
    <div class="aside-tools-label">
    <a href="/" class="has-text-light"><span><b>CI 4</b> File Uploader</span></a>
    </div>
</div>
<div class="menu is-menu-main">
    <p class="menu-label">General</p>
    <ul class="menu-list">
    <li>
        <a href="/file-gallery" class="<?= $active_page == 'fgpg'? 'is-active router-link-active': '' ?> has-icon">
        <span class="icon"><i class="mdi mdi-folder-multiple-image"></i></span>
        <span class="menu-item-label">File Gallery</span>
        </a>
    </li>
    </ul>
    <p class="menu-label">File Upload</p>
    <ul class="menu-list">
    <li>
        <a href="/upload/single" class="<?= $active_page == 'supg'? 'is-active router-link-active': '' ?> has-icon">
        <span class="icon"><i class="mdi mdi-upload"></i></span>
        <span class="menu-item-label">Single Upload</span>
        </a>
    </li>
    <li>
        <a href="/upload/multiple" class="<?= $active_page == 'mupg'? 'is-active router-link-active': '' ?> has-icon">
        <span class="icon"><i class="mdi mdi-upload-multiple"></i></span>
        <span class="menu-item-label">Multiple Upload</span>
        </a>
    </li>
    <li>
        <a href="/upload/dropzone" class="<?= $active_page == 'dupg'? 'is-active router-link-active': '' ?> has-icon">
        <span class="icon"><i class="mdi mdi-progress-upload"></i></span>
        <span class="menu-item-label">Dropzone</span>
        </a>
    </li>
    </ul>
    <p class="menu-label">About</p>
    <ul class="menu-list">
    <li>
        <a href="/documentation" class="<?= $active_page == 'documentation'? 'is-active router-link-active': '' ?> has-icon">
        <i class="icon mdi mdi-desktop-mac"></i></span>
        <span class="menu-item-label">Docs</span>
        </a>
    </li>
    <li>
        <a href="https://github.com/afif-dev" target="_blank" class="has-icon">
        <span class="icon has-update-mark"><i class="mdi mdi-github-circle"></i></span>
        <span class="menu-item-label">GitHub</span>
        </a>
    </li>
    <li>
        <a href="https://justboil.me/bulma-admin-template/free-html-dashboard/" target="_blank" class="has-icon">
        <span class="icon"><i class="mdi mdi-help-circle"></i></span>
        <span class="menu-item-label">Admin Themes</span>
        </a>
    </li>
    </ul>
</div>
</aside>
<section class="section py-5 is-hidden-desktop">
</section>
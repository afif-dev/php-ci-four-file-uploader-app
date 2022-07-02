<?php

namespace App\Controllers;

use CodeIgniter\Files\FileCollection;

class FileGallery extends BaseController
{   
    protected $upload_dir, $upload_path;  

    public function __construct() {
        $this->upload_dir =  env('app.publicUploadDir', '/public/uploads/');
        $this->upload_path =  env('app.publicUploadPath', '/uploads/');
    }

    public function index()
    {

        $files = new FileCollection([
            ROOTPATH . $this->upload_dir .'files/',
        ]);

        $data['title'] = 'File Gallery';
        $data['active_page'] = 'fgpg';
        $data['files'] = $files;
        $data['accept_ext'] = ['jpg', 'jpeg', 'gif', 'png'];
            
        $data['errors'] = [];

        return view('pages/file_gallery', $data);
    }

    public function dowloadFile($path)
    {
        return $this->response->download( ROOTPATH . $this->upload_dir .'files/'. $path, null);
    }
}
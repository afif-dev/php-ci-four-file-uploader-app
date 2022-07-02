<?php

namespace App\Controllers;

use CodeIgniter\Files\FileCollection;

class FileGallery extends BaseController
{   
    protected $upload_dir, $upload_path;  

    public function __construct() {
        $this->upload_dir =  env('app.publicUploadDir', '/public/uploads/');
        $this->upload_path =  env('app.publicUploadPath', '/uploads/');
    
        $upload_dir = ROOTPATH . $this->upload_dir;
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $upload_files_dir = ROOTPATH . $this->upload_dir.'files/';
        if (!is_dir($upload_files_dir)) {
            mkdir($upload_files_dir, 0755, true);
        }
        $upload_thumbs_dir = ROOTPATH . $this->upload_dir.'thumbs/';
        if (!is_dir($upload_thumbs_dir)) {
            mkdir($upload_thumbs_dir, 0755, true);
        }
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

    public function reset()
    {
        $upload_dir = ROOTPATH . $this->upload_dir;
        if (is_dir($upload_dir)) {
            $this->rmdir_recursive($upload_dir);
        }
        mkdir($upload_dir, 0755, true);
        $upload_files_dir = ROOTPATH . $this->upload_dir.'files/';
        mkdir($upload_files_dir, 0755, true);
        $upload_thumbs_dir = ROOTPATH . $this->upload_dir.'thumbs/';
        mkdir($upload_thumbs_dir, 0755, true);

        return redirect()->to('/');
    }

    public function rmdir_recursive($dir) {
        foreach(scandir($dir) as $file) {
            if ('.' === $file || '..' === $file) continue;
            if (is_dir("$dir/$file")) $this->rmdir_recursive("$dir/$file");
            else unlink("$dir/$file");
        }
        rmdir($dir);
    }
}
<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploaderService
{
    private $targetDirectory;

    public function __construct($targetDirectory){
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadFile $file){
        $fileName = md(uniqid()).'.'.$file->guessExtension();

        try{
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileExeption $e) {
            // ... gérer l'exception si quelque chose se passe pendant le téléchargement du fichier
        }

        return $fileName;
    }

    public function getTargetDirectory(){
        return $this->getTargetDirectory;
    }
}
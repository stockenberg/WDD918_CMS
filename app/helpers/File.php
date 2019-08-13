<?php


namespace app\helpers;

/**
 * Class File
 * File Upload Utility
 * @package app\helpers
 */
class File
{
    private $extWhitelist = ['application/pdf', 'image/png', 'image/jpeg', 'image/gif'];
    private $file;
    private $size = 10000000;
    private $errorCodeMessages = array(
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk',
        8 => 'A PHP extension stopped the file upload'
    );

    /**
     * File constructor.
     * Takes $_FILES and stores it locally
     * @param $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Checks Valid Extension, valid Size and is there are errors
     * @return bool
     */
    private function validate()
    {
        if (isset($this->file)) {
            if (!$this->isValidExt()) {
                return false;
            }

            if (!$this->hasValidSize()) {
                return false;
            }

            if ($this->hasErrors()) {
                return false;
            }

            return true;
        }
    }

    /**
     * If file is validated, move it to project folder
     * returns Filename
     * @return mixed $name
     */
    public function store()
    {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/';
        $name = $this->file['name'];
        $fullpath = $target_dir . $name;

        if ($this->validate()) {
            if (move_uploaded_file($this->file['tmp_name'], $fullpath)) {
                return $name;
            }
        }
    }

    /**
     * @return bool
     */
    private function isValidExt(): bool
    {
        return in_array($this->file['type'], $this->extWhitelist);
    }

    /**
     * @return bool
     */
    private function hasValidSize(): bool
    {
        return $this->file['size'] <= $this->size;
    }

    /**
     * @return bool
     */
    private function hasErrors(): bool
    {
        return array_key_exists($this->file['error'], $this->errorCodeMessages);
    }


}


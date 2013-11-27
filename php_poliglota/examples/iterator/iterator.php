<?php
class ReadLineIterator implements Iterator
{
    private $file_path;
    private $line;
    private $line_number;
    private $fp;

    public function __construct($path)
    {
        $this->file_path = $path;
    }

    public function __destruct()
    {
        if (null !== $this->fp) {
            fclose($this->fp);
        }
    }

    private function open()
    {
        if (null == $this->fp) {
            $this->fp = fopen($this->file_path, 'r');
        }
    }

    public function key()
    {
        return $this->line_number;
    }

    public function current()
    {
        return $this->line;
    }

    public function next()
    {
        // fooo!
    }

    public function rewind()
    {
        $this->open();
        fseek($this->fp, 0);
    }

    public function valid()
    {
        $this->line = fgets($this->fp);
        $this->line_number++;
        return $this->line !== false;
    }
}

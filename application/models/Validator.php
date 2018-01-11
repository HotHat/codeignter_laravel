<?php
/**
 * Created by cncn.com.
 * User: lyhux
 * Date: 2018/1/11
 * Time: 9:58
 */

namespace App\Models;
use Illuminate\Validation;
use Illuminate\Filesystem;
use Illuminate\Translation;

class Validator
{
    private $factory;

    public function __construct()
    {
        $filesystem = new Filesystem\Filesystem();
        $fileLoader = new Translation\FileLoader($filesystem, APPPATH.'language');
        $translator = new Translation\Translator($fileLoader, 'english');
        $this->factory = new Validation\Factory($translator);
    }

    public function getFactory() {
        return $this->factory;
    }

    static function make($data, $rules, $messages)
    {
        $validator = new Validator();
        $factory = $validator->getFactory();

        return $factory->make($data, $rules, $messages);
    }
}
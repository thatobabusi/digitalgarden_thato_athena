<?php

namespace App\Http\Controllers\Backend\Admin\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

/**
 * Class SystemEnvController
 *
 * @package App\Http\Controllers\Backend\Admin\System
 */
class SystemEnvController extends Controller
{
    /**
     * @var DotenvEditor
     */
    protected $editor;

    /**
     * SystemEnvController constructor.
     *
     * @param DotenvEditor $editor
     */
    public function __construct(DotenvEditor $editor)
    {
        $this->editor = $editor;
    }

    public function test(): void
    {
        //https://github.com/JackieDo/Laravel-Dotenv-Editor

        /*$backupNow = DotenvEditor::backup();
        $file = DotenvEditor::load();
        $file->getContent();

        if(!$file->keyExists('THAAAT')) {
            $file->backup()
                ->addEmpty()
                ->addComment('This is a comment line')
                ->setKey('THAAAT', 'http://example.com')
                ->save();
        }*/

        /*foreach($file->getKeys() as $index => $key) {
            dd($index, $key);
        }
        dd($file->getKeys());*/

        //$rawContent = DotenvEditor::getContent();
        //dd($file3);
        //$latestBackup = DotenvEditor::getLatestBackup();

        //$getAllBackups = DotenvEditor::getBackups();

        //$file = DotenvEditor::setKey('ENV_KEY', 'anything-you-want', 'your-comment');
        //$content = DotenvEditor::getContent();
        //dd($getAllBackups);
    }
}

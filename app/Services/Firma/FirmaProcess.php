<?php

namespace App\Services\Firma;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use Throwable;

class FirmaProcess
{
    private $firma;

    private $cadena;
    private $password;
    private $llavePrivada;

    private $rootPath, $signPath;

    public $error = false, $message = '';

    function __construct($password, $llavePrivada, $cadena)
    {
        $this->cadena = $cadena;
        $this->password = $password;
        $this->llavePrivada = $llavePrivada;

        $this->rootPath = 'C:\\laragon\\www\\keys\\shell_command\\';
        $this->signPath = 'C:\\laragon\\www\\keys\\sign.bat';
    }

    public function firmar()
    {
        try {
            $prefix = Str::random(5);

            $key_name = $prefix . 'key.pem';
            $pass_name = $prefix . 'pass.txt';
            $string_name = $prefix . 'str.txt';

            $client = Storage::createLocalDriver(['root' => $this->rootPath]);
            $client->put($key_name, $this->llavePrivada->get());
            $client->put($pass_name, $this->password);
            $client->put($string_name, $this->cadena);

            $process = new Process([$this->signPath, $this->rootPath, $key_name, $pass_name,  $string_name]);

            $process->mustRun();
            dd( $this->llavePrivada->get());
            $firma = $process->getOutput();

            dd( 12);
            $this->firma = preg_replace("/\r|\n/", "", $firma);
            if(trim($this->firma()) == ''){
                $this->error = true;
                $this->message = 'No se pudo firmar';
            }

            return $this->firma;
        } catch (Throwable $exception) {
            dd($exception);
            Log::error($exception);
            $this->error = true;
            $this->message = 'Error al firmar';
            return null;
        } finally {
            $client->delete($key_name);
            $client->delete($pass_name);
            $client->delete($string_name);
        }
    }

    public function firma()
    {
        return $this->firma;
    }
}

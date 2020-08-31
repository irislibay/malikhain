<?php

namespace App\Jobs;

use App\File;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File as FacadeFile;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Throwable;

class ProcessImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 7200;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 2;

    protected $original_filename;
    protected $file_path;
    private $file_id;
    private $style_image;

    /**
     * Create a new job instance.
     *
     * @param String $filename
     * @param String $original_filename
     * @param String $style_image
     */
    public function __construct(String $filename, String $original_filename, String $style_image)
    {
        $this->original_filename = $original_filename;
        $file = File::create(['filename' => $original_filename]);
        $this->file_id = $file->id;
        $this->file_path = public_path('/uploads/').$filename;
        $this->style_image = $style_image;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $process = new Process(['scripts/venv/bin/python', 'scripts/neural_style/main.py', $this->file_path, $this->style_image]);
        $process->setTimeout(7200);
        $process->setIdleTimeout(7200);
        $process->run();

        if (!$process->isSuccessful()) {
            FacadeFile::delete($this->file_path);
            Log::error(new ProcessFailedException($process));
        }

        File::destroy($this->file_id);
    }

    /**
     * Handle a job failure.
     *
     * @param  Throwable  $exception
     * @return void
     */
    public function failed(Throwable $exception)
    {
        FacadeFile::delete($this->file_path);
        File::destroy($this->file_id);
    }
}

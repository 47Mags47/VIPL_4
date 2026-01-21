<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ServeConfig extends Command
{
    protected $signature = 'serve-config';
    protected $description = 'Выполняет необходимую настройку перед выпуском в произвотсвенную среду';

    public function handle()
    {
        ### SUDO check
        ##################################################
        $this->line('Проверка на sudo');
        if (posix_getuid() === 0) {
            $this->info('Проверка прошла упешно');
        } else {
            $this->error('Запустите комманду с правами администратора');
            return;
        }

        ### get username
        ##################################################
        $this->newLine();
        $username = $this->ask('Под каким пользователем будет доступна программа?', 'root');

        ### PHP extensions check
        ##################################################
        $this->newLine();
        $this->line('Проверка наличия расширений php');

        $required_extensions = collect(['ctype', 'curl', 'dom', 'fileinfo', 'filter', 'hash', 'mbstring', 'openssl', 'pcre', 'PDO', 'session', 'tokenizer', 'xml']);
        $load_extensions = collect(get_loaded_extensions());
        $missing_extensions = $required_extensions->diff($load_extensions);

        if ($missing_extensions->count() > 0) {
            $this->error('Следующие расширения не загружены: ' . $missing_extensions->map(fn($extension) => '"' . $extension . '"')->implode(','));
            return;
        } else
            $this->info('Все расширения загружены');

        ### Create folders
        ##################################################
        $this->newLine();
        $this->line('Создание каталогов');

        $disks = collect(config('filesystems.disks'))
            ->filter(fn($disk) => $disk['driver'] === 'local');

        foreach ($disks as $disk => $data) {
            $path = base_path() . '/' . $data['root'];

            $this->components->task($disk . ': ' . $path, function () use ($path) {
                if (!file_exists($path))
                    mkdir($path, 775, true);
            });
        }

        dd('end');

        ### Folder permissions
        ##################################################
        $this->newLine();
        $this->line('Установка необходимых прав на каталоги');

        $command = 'sudo chown -R ' . $username . ':www-data ' . base_path();
        $this->comment('Выполнение: "' . $command . '"');
        $SetFolderChownProcess = Process::fromShellCommandline($command);
        $SetFolderChownProcess->run();
        if (!$SetFolderChownProcess->isSuccessful()) {
            throw new ProcessFailedException($SetFolderChownProcess);
        }

        $command = 'sudo find ' . base_path() . ' -type f -exec chmod 664 {} \;';
        $this->comment('Выполнение: "' . $command . '"');
        $SetFileChmodProcess = Process::fromShellCommandline($command);
        $SetFileChmodProcess->run();
        if (!$SetFileChmodProcess->isSuccessful()) {
            throw new ProcessFailedException($SetFileChmodProcess);
        }

        $command = 'sudo find ' . base_path() . ' -type d -exec chmod 775 {} \;';
        $this->comment('Выполнение: "' . $command . '"');
        $SetFolderChmodProcess = Process::fromShellCommandline($command);
        $SetFolderChmodProcess->run();
        if (!$SetFolderChmodProcess->isSuccessful()) {
            throw new ProcessFailedException($SetFolderChmodProcess);
        }

        $command = 'sudo chgrp -R www-data ' . base_path() . '/storage ' . base_path() . '/bootstrap/cache';
        $this->comment('Выполнение: "' . $command . '"');
        $SetStorageGroupProcess = Process::fromShellCommandline($command);
        $SetStorageGroupProcess->run();
        if (!$SetStorageGroupProcess->isSuccessful()) {
            throw new ProcessFailedException($SetStorageGroupProcess);
        }

        $command = 'sudo chmod -R ug+rwx ' . base_path() . '/storage ' . base_path() . '/bootstrap/cache';
        $this->comment('Выполнение: "' . $command . '"');
        $SetStorageChmodProcess = Process::fromShellCommandline($command);
        $SetStorageChmodProcess->run();
        if (!$SetStorageChmodProcess->isSuccessful()) {
            throw new ProcessFailedException($SetStorageChmodProcess);
        }
    }
}

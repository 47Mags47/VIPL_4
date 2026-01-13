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
        if(posix_getuid() === 0){
            $this->info('Проверка прошла упешно');
        }else{
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
        $extensions = ['Ctype', 'cURL', 'DOM', 'Fileinfo', 'Filter', 'Hash', 'Mbstring', 'OpenSSL', 'PCRE', 'PDO', 'Session', 'Tokenizer', 'XML'];

        $flag = true;
        $table_content = [];
        foreach ($extensions as $extension) {
            $has = in_array('ctype', get_loaded_extensions());

            if($has){
                $table_content[] = [$extension, 'Загружен'];
            }else{
                $table_content[] = [$extension, 'Не загружен'];
                $flag = false;
            }
        }

        $this->table(['Расширение', 'Статус'], $table_content);

        if(!$flag){
            $this->error('Некоторые расширения не загружены');
            return;
        }

        ### Folder permissions
        ##################################################
        $this->newLine();
        $this->line('Установка необходимых прав на каталоги');

        $command = 'sudo chown -R ' . $username . ':www-data ' . base_path();
        $this->comment('Выполнение: "' . $command . '"');
        $SetFolderChownProcess = Process::fromShellCommandline($command);
        $SetFolderChownProcess->run();
        if(!$SetFolderChownProcess->isSuccessful()){
            throw new ProcessFailedException($SetFolderChownProcess);
        }

        $command = 'sudo find ' . base_path() . ' -type f -exec chmod 664 {} \;';
        $this->comment('Выполнение: "' . $command . '"');
        $SetFileChmodProcess = Process::fromShellCommandline($command);
        $SetFileChmodProcess->run();
        if(!$SetFileChmodProcess->isSuccessful()){
            throw new ProcessFailedException($SetFileChmodProcess);
        }

        $command = 'sudo find ' . base_path() . ' -type d -exec chmod 775 {} \;';
        $this->comment('Выполнение: "' . $command . '"');
        $SetFolderChmodProcess = Process::fromShellCommandline($command );
        $SetFolderChmodProcess->run();
        if(!$SetFolderChmodProcess->isSuccessful()){
            throw new ProcessFailedException($SetFolderChmodProcess);
        }

        $command = 'sudo chgrp -R www-data ' . base_path() . '/storage ' . base_path() . '/bootstrap/cache';
        $this->comment('Выполнение: "' . $command . '"');
        $SetStorageGroupProcess = Process::fromShellCommandline($command );
        $SetStorageGroupProcess->run();
        if(!$SetStorageGroupProcess->isSuccessful()){
            throw new ProcessFailedException($SetStorageGroupProcess);
        }

        $command = 'sudo chmod -R ug+rwx '. base_path() . '/storage ' . base_path() . '/bootstrap/cache';
        $this->comment('Выполнение: "' . $command . '"');
        $SetStorageChmodProcess = Process::fromShellCommandline($command );
        $SetStorageChmodProcess->run();
        if(!$SetStorageChmodProcess->isSuccessful()){
            throw new ProcessFailedException($SetStorageChmodProcess);
        }
    }
}

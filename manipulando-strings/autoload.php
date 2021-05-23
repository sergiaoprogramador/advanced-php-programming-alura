<?php

spl_autoload_register( function ($classe) {
    $prefixo = "App\\";
    $diretorio = __DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR;

    // strncmp compara as strings, strlen é o tamanho da string
    if(strncmp($prefixo, $classe, strlen($prefixo))  !== 0) return;
    
    $namespace = substr($classe, strlen($prefixo));
    
    // directory_separator é uma constante que identifica a barra separação de diretorio do sistema
    $namespace_arquivo = str_replace('\\', DIRECTORY_SEPARATOR, $namespace);
    $arquivo = $diretorio.$namespace_arquivo.'.php';

    if (file_exists($arquivo)) {
        require $arquivo;
    }
});
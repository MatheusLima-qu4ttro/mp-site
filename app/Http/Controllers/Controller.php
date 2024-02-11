<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function decimalSave($number){
        // Verifica se o número já está no formato correto (ponto como separador decimal e sem separador de milhares)
        if (preg_match('/^\d+(\.\d+)?$/', $number)) {
            // O número já está no formato correto, retorna como está
            return $number;
        }

        // Substitui vírgula por ponto para o decimal e remove pontos de milhar, se necessário
        $formattedNumber = str_replace(',', '.', str_replace('.', '', $number));

        return $formattedNumber;
    }

    public static function decimalShow($number){
        // Verifica se o número já está formatado corretamente
        if (is_string($number) && preg_match('/^\d{1,3}(\.\d{3})*,\d{2}$/', $number)) {
            // O número já está no formato desejado, retorna como está
            return $number;
        }

        // Formata o número com duas casas decimais, usando vírgula como separador decimal e ponto como separador de milhares
        return number_format($number, 2, ',', '.');
    }

    public static function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            return unlink($dir);
        }

        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            if (!self::deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }

        }

        return rmdir($dir);
    }
}

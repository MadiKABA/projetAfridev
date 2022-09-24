<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;
class Connection extends Model
{
    use HasFactory;
    public static function connection($sql)
    {
        $hf_hostname = "noumkia";
        $hf_port = "4900";
        $hf_database = "LEOGESsv2";
        $hf_user = "kaba";
        $hf_password = "";
        $hf_dsn = sprintf("odbc:DRIVER={HFSQL};DNS={HFSQL};Server Name=%s; Server Port=%s;Database=%s;UID=%s;PWD=%s;", $hf_hostname, $hf_port, $hf_database, $hf_user, $hf_password);
        try {

            $hf_dbh = new PDO($hf_dsn);
            //echo "connexion effectuee";
            $hf_dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query= $hf_dbh->prepare($sql);
            return $query;
        }catch (PDOException $e) {
            echo $e;
        }
    }
}

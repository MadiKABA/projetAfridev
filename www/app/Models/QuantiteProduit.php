<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class QuantiteProduit extends Model
{

    use HasFactory;
    //cette permet de verifier si un produit existe deja en stock
    public static function getQteProd($cleprod)
    {
        $sql='SELECT * FROM data_QTEPROD WHERE PRCLEUNIK='.$cleprod;
        $resultat = Connection::connection($sql);
        $resultat->execute();
        return $resultat->fetch(PDO::FETCH_OBJ);
    }

    //fonction pour enregistrer une entree stock
    public static function add($cleProd,$qteStock,$date_inv)
    {
        $date_mvt_initial = date('YmdHis',strtotime(NOW()));
        $sql="INSERT  INTO data_QTEPROD(PRCLEUNIK,QTE_STOCK,ALERTE,DATE_INV,QTE_INV,MVT_INITIAL,MVT_DERNIER)
        VALUES(?,?,?,?,?,?,?)";
        $resultat = Connection::connection($sql);
        $resultat->execute([$cleProd,$qteStock,1,$date_inv,$qteStock,$date_mvt_initial,$date_mvt_initial]);
        return "insertion reussie";
    }

    public static function updateEntreeQteProd($cleProd,$qteStock)
    {
        //dd(false);
        $date_mvt_initial = date('YmdHis',strtotime(NOW()));
        $sql="UPDATE data_QTEPROD SET QTE_STOCK=QTE_STOCK+$qteStock,MVT_DERNIER=? WHERE PRCLEUNIK=?";
        $resultat = Connection::connection($sql);
        $resultat->execute([$date_mvt_initial,$cleProd]);
    }

}

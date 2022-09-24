<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;
class Mouvement extends Model
{
    use HasFactory;

    public static function getALL()
    {
        $sql = 'SELECT * FROM data_Mouvements';
        $resultat = Connection::connection($sql);
        $resultat->execute();
        return $resultat->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getReferemce()
    {

        $sql = 'SELECT DISTINCT ref_mvt FROM data_Mouvements';
        $resultat = Connection::connection($sql);
        $resultat->execute();
        return $resultat->fetchAll(PDO::FETCH_OBJ);

    }
    public static function add($data){

        $mouvement=json_decode(json_encode($data[0]),false);
        //dd($produit);
        $PRCLEUNIK=$mouvement->produit->id;

        $sql = "SELECT * FROM data_produits WHERE PRCLEUNIK=$PRCLEUNIK";
        $resultat = Connection::connection($sql);
        $resultat->execute();
        $produit=$resultat->fetch(PDO::FETCH_OBJ);
        $LibProd=$mouvement->produit->designation;
        //var_dump($LibProd);
        //dd($LibProd);
        $date_mvt=date('Ymd',strtotime(date('d-m-y')));
        $entree=true;
        $type_mvt=1;
        $Quantite=$mouvement->quantite*$mouvement->produit->colisage;
        $montant=$mouvement->quantite*$mouvement->produit->colisage*$mouvement->produit->prix_unitaire_ht;
        $ref_mvt=$mouvement->produit->ref;
        $Observations=$mouvement->commentaire;
        $pmp=(double)$produit->pmp;
        $PrixAchat=(int)$produit->prix_achat;
        $PrixVente=(int)$produit->prix_base;


        /*$sql="INSERT INTO data_Mouvements(PRCLEUNIK,LibProd,date_mvt,entree,type_mvt,Quantite,montant,ref_mvt,Observations,pmp,PrixAchat,PrixVente)
        VALUES(6054,'ARACHIDES GRILLEES SALEES 100G alert(1)',GETDATE(),true,1,62,10000,ref2,$Observations,25.0,750,900)";
        $resultat = Connection::connection($sql);*/
        //return $resultat->execute();
        $sql='INSERT INTO data_Mouvements(PRCLEUNIK,LibProd,date_mvt,entree,type_mvt,Quantite,montant,ref_mvt,Observations,pmp,PrixAchat,PrixVente)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?)';
        $resultat = Connection::connection($sql);
        $resultat->execute([$PRCLEUNIK,$LibProd,$date_mvt,$entree,$type_mvt,$Quantite,$montant,$ref_mvt,$Observations,$pmp,$PrixAchat,$PrixVente]);

        //mise a jour de la quantite stock du produit
        if (QuantiteProduit::getQteProd($PRCLEUNIK))
        {

            QuantiteProduit::updateEntreeQteProd($PRCLEUNIK,$Quantite);
        }else{
            QuantiteProduit::add($PRCLEUNIK,$Quantite,$date_mvt);
        }
        // $resultat->execute([6054,"ARACHIDES GRILLEES SALEES 100G alert(1)",'20/12/2022',true,1,62,10000,"ref2","inventaire juillet",25.0,750,900]);
    }

    public static function getByReference($ref)
    {
        $sql = "SELECT * FROM data_Mouvements where data_Mouvements.ref_mvt='$ref'";
        $resultat = Connection::connection($sql);
        $resultat->execute();
        return $resultat->fetchAll(PDO::FETCH_OBJ);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Commande extends Model
{
    use HasFactory;
    public static function saveLigneCommande($data){
        $totalHT=0;
        $totalTTC=0;
        $commande_id=0;
        $fournisseur_id=0;
        foreach ($data[0] as $value){
            $commandes=json_decode(json_encode($value),false);
            //les information de la commande
            $totalHT=+$commandes->produit->prix_ht;
            $totalTTC=+$commandes->produit->prix_ttc;
            $commande_id=$commandes->id;
            $fournisseur_id=$commandes->produit->fournisseur_id;
            //information ligne commande
            $qtiteProd=$commandes->produit->colisage*$commandes->quantite;
            $sql='INSERT INTO data_LigneCdeFou(NumCommande,PRCLEUNIK,LibProd,Quantite,Remise,TauxTVA,Qte_Livree,prix_achat,Soldee,ref_fourn,Qte_Gratuite,
                            Conditionnement)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)';
            $resultat = Connection::connection($sql);
            $resultat->execute([$commandes->id,$commandes->produit->id,$commandes->produit->designation,$qtiteProd,0,$commandes->tva,
                $qtiteProd,$commandes->produit->prix_unitaire_ht,false,"fourniseur1",0,$qtiteProd]);
        }
        $date_modification = date('YmdHis',strtotime(NOW()));
        $sql="INSERT INTO data_CdeFou(NumCommande,DateCommande,NumFournisseur,TotalHT,TotalTVA,TotalTTC,EtatCommande,Observations,
                        DateLivPrev,FO_PORT,HEURE_LIV,DateModif,PcRemise)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $resultat = Connection::connection($sql);
        $resultat->execute([$commande_id,0,$fournisseur_id,$totalHT,0,$totalTTC,0,'observation1',0,0,0,$date_modification,0]);
    }
    
    public static  function getLigneCommande(){
        $sql="SELECT * FROM data_LigneCdeFou";
        $resultat = Connection::connection($sql);
        $resultat->execute();
        return $resultat->fetchAll(PDO::FETCH_OBJ);
    }

    public static  function showCommande($id){
        $sql="SELECT * FROM data_LigneCdeFou,data_QTEPROD WHERE NumCommande=$id
                                              AND data_QTEPROD.PRCLEUNIK=data_LigneCdeFou.PRCLEUNIK";
        $resultat = Connection::connection($sql);
        $resultat->execute();
        return $resultat->fetchAll(PDO::FETCH_OBJ);
    }

    public static  function getCommande(){
        $sql="SELECT * FROM data_CdeFou,data_FOURNISSEURS
                             WHERE data_CdeFou.NumFournisseur=data_FOURNISSEURS.NumFournisseur";
        $resultat = Connection::connection($sql);
        $resultat->execute();
        return $resultat->fetchAll(PDO::FETCH_OBJ);
    }
}

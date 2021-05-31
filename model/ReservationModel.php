<?php
include "connection.php";   
class ReservationModel extends connection{

    private $con;

    public function __construct(){
        $connection = new connection();
        $this->con= $connection->connect();
    }

    public function reservation($idCustomer, $checkin,$checkout){
        $sql    =   "INSERT INTO reservation(`idCustomer`, `checkIn`, `chekOut`) VALUES (?,?,?)";
        $stmt   =   $this->con->prepare($sql);
        $stmt->execute([$idCustomer,$checkin,$checkout]);
         $idreservation  =   $this->con->lastInsertId();
         return $idreservation ;
    }

    public function reserve_room($array,$idreservation){
        foreach($array as $key =>$value){    
                $sql    =   "INSERT INTO `results`(`idProperty`, `idReservation`) VALUES ((select IdProperty from bien where type = '$value[Roomtype]' and (bedtype= '$value[bedtype]' or bedtype is Null ) and view= '$value[viewtype]' ),?)";
                $stmt   =   $this->con->prepare($sql);
                $stmt->execute([$idreservation]); 
        }
    }

    public function pension($array,$idreservation){
        foreach($array as $key => $value){
            $sql    =   "INSERT INTO results (`idProperty`, `idReservation`) VALUES (?,?)";
            $stmt   =   $this->con->prepare($sql);
            $stmt->execute([$value['idpension'],$idreservation]);
        }
    }

    public function InsertBA($array,$idreservation){
        foreach($array as $key => $value){
            if ($value['type'] == 'bungalow'){
                $sql    =   "INSERT INTO results (`idProperty`, `idReservation`) VALUES (5,?)";
                $stmt   =   $this->con->prepare($sql);
                $stmt->execute([$idreservation]); 
            } else if ($value['type'] == 'appartment'){
                $sql    =   "INSERT INTO results (`idProperty`, `idReservation`) VALUES (6,?)";
                $stmt   =   $this->con->prepare($sql);
                $stmt->execute([$idreservation]);
            }
        }
    }

    public function kids($array,$idreservation){
        foreach($array as $key => $value){
            $sql    =   "INSERT INTO results (`idProperty`, `idReservation`) VALUES (?,?)";
            $stmt   =   $this->con->prepare($sql);
            $stmt->execute([$value['idofferschild'],$idreservation]);
        }
    }

    public function bill($nbrOfDays,$idreservation){
        /* Calculate Total Price  */
        $sqlCalc    =   "SELECT SUM(b.price) as `total` FROM bien as b , results as r WHERE b.idProperty = r.idProperty AND r.idReservation =?";
        $stmtCalc   =   $this->con->prepare($sqlCalc);
        $stmtCalc->execute([$idreservation]);
        $row   = $stmtCalc->fetch(PDO::FETCH_ASSOC);
        /*  */
        $totalPrice =   $row['total'];
        $finalPrice = $totalPrice * $nbrOfDays;
        /* Insert Totale Price In Bill Tabke */
        $sqlinsert  =   "INSERT INTO `tarifs`(`idReservation`, `totalPrice`, `nbrOfDays`, `finalPrice`) VALUES (?,?,?,?)";
        $stmtinsert =   $this->con->prepare($sqlinsert);
        $stmtinsert->execute([$idreservation,$totalPrice,$nbrOfDays,$finalPrice]);
        return $finalPrice;
    }


}
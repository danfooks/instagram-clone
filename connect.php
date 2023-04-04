<?php
ConnectDB();

function ConnectDB() {
        $hostname = 'elvis.rowan.edu';
        $username = 'fooksd3';
        $password = '1MuguVA87!';
        $dbname = 'fooksd3';

        try {
                $dbh = new PDO("mysql:host=$hostname;dbname=$dbname",
                                $username, $password);
        }
        catch(PDOException $e){
                die ('PDO error in "ConnectDB(): ' . $e->getMessage() );
        }

        return $dbh;
}
?>

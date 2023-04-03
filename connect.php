<?php
ConnectDB();

function ConnectDB() {
        $hostname = 'elvis.rowan.edu';
        $username = 'heitma24';
        $password = '1Sady8TE2!';
        $dbname = 'heitma24';

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

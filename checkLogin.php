<?
//checkLogin
        if (!include('connect.php')) {
                die('error finding connect file');
        }
        $dbh = ConnectDB();

// Check the form was filled in correctly
if ( !isset($_POST['username']) ||
     !isset($_POST['password'])
) {
    die("You did not fill in the form correctly.  Try again.");
}

$username = $_POST['username'];
$password = $_POST['password'];

// php to send info to DB in try/catch
try {
        $sql  = "SELECT User_Id from User ";
        $sql .= "WHERE Email = :email";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':email',$email);
        $stmt->execute();

	$result = $stmt.fetch();
        $stmt = null;
}catch(Exception $e){
        echo "Error";
        echo $e->getMessage();
}

echo $result;
?>

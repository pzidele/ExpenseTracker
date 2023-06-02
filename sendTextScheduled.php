<?php

require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

class Main {
    public const ACCOUNT_SID ='AC472684af8877904a3a87c2c401c4e981';
    public const AUTH_TOKEN = '59a8227a8b3c169578792cc57d011b35';
    private const VERIFICATION_CODE_LENGTH = 6;

    public static function main() {
        self::getRemoteConnection();
    }
   private static function sendText($phoneNumber, $spent) {
        $twilio = new Client(self::ACCOUNT_SID, self::AUTH_TOKEN);
        $message = $twilio->messages->create(
            $phoneNumber,
            array(
                'from' => '+18445922502', //'+18663937309',
                'body' => 'Hello from Expense Tracker! You have spent ' . $spent . ' this month'
            )
        );
        echo 'sent text';
    }
  
   private static function getRemoteConnection() {
        try {
            $dbName = 'expense-tracker';
            $userName = 'admin';
            $password = 'admin123';
            $hostName = 'expense-tracker.cxrkxxwwy4gq.us-east-1.rds.amazonaws.com';
            $port = '3306';
$con = mysqli_connect($hostName, $userName, $password, $dbName);
            if ($con) {
                echo 'Connection successful!!';
              
              $query = 'SELECT * FROM Users WHERE UserSendText = true';

                $date = new DateTime();
                $month = $date->format('n');
                $year = $date->format('Y');

                $spent = 0.0;
                $userId = array();
              $phoneAndId = array();
              
              // Execute query
                $result = $con->query($query);

                while ($row = $result->fetch_assoc()) {
                    $userId[] = $row['UserID'];
                    $phoneAndId[$row['UserID']] = $row['UserNumber'];
                }

                foreach ($userId as $id) {
                    $query2 = 'SELECT SUM(ExpenseAmount) AS sumExpenses FROM Expenses WHERE UserID = ' . $id . ' AND MONTH(ExpenseDate) = ' . $mo$
                    $result2 = $con->query($query2);
                  while ($row2 = $result2->fetch_assoc()) {
                        $spent = $row2['sumExpenses'];
                        $userSpent = '$' . number_format($spent, 2);
                        self::sendText($phoneAndId[$id], $userSpent);
                    }
                }
            }

            return $con;
            } catch (mysqli_sql_exception $e) {
            echo 'ERROR ' . $e->getMessage();
        }
        return null;
}
}

Main::main();
?>


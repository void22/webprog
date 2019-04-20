<table>
    <tr>
        <th>ID</th>
        <th>Feladó</th>
        <th>Dátum</th>
        <th>Üzenet</th>
    </tr>
    <?php
        require_once 'database.php';
        
        $db = connectToDatabase();
        if (!is_null($db))
        {
            try
            {
                $stmt = $db->query("SELECT * FROM messages");
                while ($row = $stmt->fetch())
                {
                    echo '<tr>';
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['sender'] . "<br>(" . $row['email'] . ")</td>";
                    echo "<td>" . date("Y/m/d H:i:s", strtotime($row['date'])) . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo '</tr>';
                }
            } catch (PDOException $ex) {     echo $ex->getMessage(); }
        }
    ?>
</table>
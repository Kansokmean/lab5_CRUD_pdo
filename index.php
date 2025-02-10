<?php
define("HOST", "127.0.0.1");
define("PORT", "3303");
define("DB", "db_lab_five");
define("USER", "root");
define("PWS", "123MeanM@@n");

try {
    $dsn = "mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DB . ";charset=utf8mb4";
    $pdo = new PDO($dsn, USER, PWS, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

    $insertStmt = $pdo->prepare("INSERT INTO tbl_lab (name, gender) VALUES (:name, :gender)");
    $insertStmt->execute([
        ':name' => 'Kan Theary',
        ':gender' => 'F'
    ]);

    $updateStmt = $pdo->prepare("UPDATE tbl_lab SET name = :newName WHERE id = :id");
    $updateStmt->execute([
        ':newName' => 'Kan Sokmean',
        ':id' => 1
    ]);

    $deleteStmt = $pdo->prepare("DELETE FROM tbl_lab WHERE id = :id");
    $deleteStmt->execute([
        ':id' => 3
    ]);

    $stm = $pdo->prepare("SELECT * FROM tbl_lab");
    $stm->execute();

    if ($stm->rowCount() > 0) {
?>
        <table border='1' cellpadding='10'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
            </tr>
            <?php while ($row = $stm->fetch()) { ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['gender']) ?></td>
                </tr>
            <?php } ?>
        </table>
<?php
    } else {
        echo "<p>No records found.</p>";
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

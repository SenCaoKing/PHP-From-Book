<?php
    // PDO  扩展
    // PDO 是一个数据库连接抽象类库 — 自 5.1.0 版本起内置于 PHP 当中 — 它提供了一个通用的接口来与不同的数据库进行交互。比如你可以使用相同的简单代码来连接 MySQL 或是 SQLite：
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=laravel_test', 'root', 'root');
    $statement = $pdo->query("SELECT * FROM articles");
    $row = $statement->fetch(PDO::FETCH_ASSOC); // fetch从结果集中获取下一行；fetchAll返回一个包含结果集中所有行的数组
    echo htmlspecialchars($row['title']);
?>
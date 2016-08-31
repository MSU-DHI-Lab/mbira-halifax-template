<?php

require "lib/site.php";

// place
if(isset($_POST['user']) && isset($_POST['type']) && isset($_POST['id']) && isset($_POST['comment']) && isset($_POST['convo_id'])) {

        $sql = "INSERT INTO mbira_location_comments (location_id, user_id, comment, replyTo, isPending) VALUES (:location, :user, :comment, :reply, 'yes')";

        try {
            $pdo = new PDO("mysql:dbname=$dbname;host=$dbhost;charset=utf8", $dbuser, $dbpass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $pdo->prepare($sql);
            $statement->execute(array('location' => $_POST['id'], 'user' => $_POST['user'], 'comment' => $_POST['comment'], 'reply' => $_POST['convo_id'] ));
        }
        catch(PDOException $pdoE)
        {
            echo $pdoE->getMessage().'<br/>';
            var_dump($pdoE);
        }
    header("location: placeSingle-Conversations.php?type=".$_POST['type']."&id=".$_POST['id']);
}


else if(isset($_POST['user']) && !isset($_POST['type']) && isset($_POST['id']) && isset($_POST['comment']) && isset($_POST['convo_id'])) {

        $sql = "INSERT INTO mbira_exploration_comments (exploration_id, user_id, comment, replyTo, isPending) VALUES (:exploration, :user, :comment, :reply, 'yes')";

        try {
            $pdo = new PDO("mysql:dbname=$dbname;host=$dbhost;charset=utf8", $dbuser, $dbpass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $pdo->prepare($sql);
            $statement->execute(array('exploration' => $_POST['id'], 'user' => $_POST['user'], 'comment' => $_POST['comment'], 'reply' => $_POST['convo_id'] ));
        }
        catch(PDOException $pdoE)
        {
            echo $pdoE->getMessage().'<br/>';
            var_dump($pdoE);
        }
    header("location: explorationSingle-Conversations.php?id=".$_POST['id']);
}



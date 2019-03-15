<?php

class Jointures
{
    public function getNews()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_p4', 'root', '');
        $q = $db->query('SELECT news.contains_news, news.title_news, users.pseudo  
          FROM news INNER JOIN users ON news.id_author = users.id');

        while($data = $q->fetch()){
            echo '<p>' . $data['pseudo'] . '</p> <p>' . $data['title_news'] .'</p> <p>' .$data['contains_news'] . '</p>';
        }
    }

    public function getTypeUser()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_p4', 'root', '');
        $q = $db->query('SELECT users.pseudo, profils.user_type FROM users INNER JOIN profils ON users.id_profil = profils.id');

        while($data = $q->fetch()){
            echo '<p>' . $data['pseudo'] . ' || ' .$data['user_type'] . '</p>';
        }
    }

    public function getCommentNews()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_p4', 'root', '');
        $q = $db->query('SELECT users.pseudo, comments.contains_comment  
          FROM comments INNER JOIN users ON comments.id_user = users.id');

        while($data = $q->fetch()){
            echo '<p>' . $data['pseudo'] . '</p> <p>' . $data['contains_comment'] .'</p>';
        }
    }

}

 $jointures = new Jointures();
    $jointures->getNews();
    $jointures->getCommentNews();









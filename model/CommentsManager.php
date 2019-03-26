<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 15/03/2019
 * Time: 14:22
 */

class CommentsManager
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param PDO $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    public function addComment($idUser, $getUrlIdNews, $containsComment)
    {

        $q = $this->db->prepare('INSERT INTO comments(id_user, id_news, contains_comment) 
        VALUE (:id_user, :url_Value, :content)');

        $q->execute(array(
            ":id_user" => $idUser,
            ":url_Value" => $getUrlIdNews,
            ":content" => $containsComment
        ));
    }

    public function getComment($infoComment)
    {
        $q = $this->db->query('SELECT * FROM comments WHERE id = ' . $infoComment);
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $comment = new Comment($data);
        }
        return $comment;
    }

    public function getCommentsList()
    {
        $comments = [];

        $q = $this->db->query('SELECT * FROM comments ORDER BY date_create DESC ');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    public function update($infoComment)
    {
        $q = $this->db->prepare('UPDATE comments SET date_create = NOW() WHERE id =' . $infoComment);
        $q->execute();
    }

    public function getCommentsNews($infosNews)
    {
        $comments = [];
        $q = $this->db->query('SELECT * FROM comments  WHERE id_news =' . $infosNews.' ORDER BY date_create DESC');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    public function insertedCommentsSigned()
    {
        $db = PDOFactory::connectedAtDataBase();

        $q = $db->query('SELECT * FROM comments ORDER BY date_create DESC');
        $data = $q->fetch();

        $insert = $db->prepare('INSERT INTO
        report_comment(id_comment, id_news, id_user, reported_content, reporting_date)
        VALUE (:id, :id_news, :id_user, :contains_comment, :date_create)');

        $insert->execute(array(
            ":id" => $data['id'],
            ":id_news" => $data['id_news'],
            ":id_user" => $data['id_user'],
            ":contains_comment" => $data['contains_comment'],
            ":date_create" => $data['date_create']
        ));
    }
}
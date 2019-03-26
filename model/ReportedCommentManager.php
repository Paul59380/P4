<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 26/03/2019
 * Time: 09:41
 */

class ReportedCommentManager
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getComment($infoComment)
    {
        $q = $this->db->query('SELECT * FROM report_comment WHERE id =' .$infoComment);
        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $comment = new ReportedComment($data);
        }
        return $comment;
    }

    public function updateComment($infoId, $content, $idOriginal)
    {
        $q = $this->db->prepare("UPDATE report_comment SET reported_content = :content WHERE id = :id");
        $q->execute(array(
            ":content" => $content,
            ":id" => $infoId
        ));

        $q = $this->db->prepare("UPDATE comments SET contains_comment = :content WHERE id = :id");
        $q->execute(array(
            ":content" => $content,
            ":id" => $idOriginal
        ));
    }
}
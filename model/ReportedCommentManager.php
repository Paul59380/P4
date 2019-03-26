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

    public function updateComment($idReportedComment, $content, $idOriginal)
    {
        $q = $this->db->prepare("UPDATE report_comment SET reported_content = :content WHERE id = :id");
        $q->execute(array(
            ":content" => $content,
            ":id" => $idReportedComment
        ));

        $q = $this->db->prepare("UPDATE comments SET contains_comment = :content WHERE id = :id");
        $q->execute(array(
            ":content" => $content,
            ":id" => $idOriginal
        ));
    }

    public function deleteComment($idReportedComment, $idOriginal)
    {
        $q = $this->db->prepare('DELETE FROM report_comment WHERE id= :idReported');
        $q->execute(array(
            ":idReported" => $idReportedComment
        ));

        $q = $this->db->prepare('DELETE FROM comments WHERE id = :idOriginal');
        $q->execute(array(
            ":idOriginal" => $idOriginal
        ));
    }
}
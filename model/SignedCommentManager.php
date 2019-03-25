<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 25/03/2019
 * Time: 11:00
 */

class SignedCommentManager
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function resortCommentsSigned()
    {
        $comments =  [];

        $db = PDOFactory::connectedAtDataBase();
        $q = $db->query('SELECT * FROM report_comment ORDER BY reporting_date DESC');
        while ($data = $q->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new SignedComment($data);
        }
        return $comments;
    }
}
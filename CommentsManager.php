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

    public function addComment($pseudo, $content)
    {

    }

    public function getComment($infoComment)
    {

    }

    public function getCommentsList()
    {

    }

    public function getUserComments($infosUser)
    {

    }
}
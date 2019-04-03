<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 25/03/2019
 * Time: 11:00
 */

namespace model;

class SignedCommentManager
{
    protected $db;
    protected static $instance;

    protected function __construct()
    {
        $this->db = PDOFactory::connectedAtDataBase();
    }

    protected function __clone() {}

    public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function resortCommentsSigned()
    {
        $comments =  [];

        $q = $this->db->query('SELECT * FROM report_comment ORDER BY id DESC');
        while ($data = $q->fetch(\PDO::FETCH_ASSOC))
        {
            $comments[] = new SignedComment($data);
        }
        return $comments;
    }
}
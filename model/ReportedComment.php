<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 26/03/2019
 * Time: 09:27
 */

class ReportedComment
{
    protected $id;
    protected $id_comment;
    protected $id_news;
    protected $id_user;
    protected $reported_content;
    protected $reporting_date;
    protected $originalComment;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            $this->$method($value);
        }

        $db = PDOFactory::connectedAtDataBase();
        $commentManager = new CommentsManager($db);
        $data = $commentManager->getComment($this->id_comment);
        $this->originalComment = $data;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id_news
     */
    public function setId_news($id_news)
    {
        $this->id_news = $id_news;
    }

    public function getIdNews()
    {
        return $this->id_news;
    }

    /**
     * @param mixed $id_user
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
    }

    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_comment
     */
    public function setId_comment($id_comment)
    {
        $this->id_comment = $id_comment;
    }

    public function getIdComment()
    {
        return $this->id_comment;
    }

    /**
     * @param mixed $reported_content
     */
    public function setReported_content($reported_content)
    {
        $this->reported_content = $reported_content;
    }

    public function getReportedContent()
    {
        return $this->reported_content;
    }


    /**
     * @param mixed $reporting_date
     */
    public function setReporting_date($reporting_date)
    {
        $this->reporting_date = $reporting_date;
    }


    public function getReportingDate()
    {
        return $this->reporting_date;
    }

    /**
     * @param mixed $originalComment
     */
    public function setOriginal_comment($originalComment)
    {
        $this->originalComment = $originalComment;
    }

    public function getOriginalComment()
    {
        return $this->originalComment;
    }
}
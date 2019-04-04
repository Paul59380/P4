<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 25/03/2019
 * Time: 11:02
 */

namespace model;
class SignedComment
{
    protected $id;
    protected $id_comment;
    protected $id_news;
    protected $id_user;
    protected $reported_content;
    protected $reporting_date;
    protected $user;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            $this->$method($value);
        }

        $userManager = UserManager::getInstance();
        $this->user = $userManager->getUser($this->id_user);
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdComment()
    {
        return $this->id_comment;
    }

    /**
     * @param mixed $id_comment
     */
    public function setId_comment($id_comment)
    {
        $this->id_comment = $id_comment;
    }

    /**
     * @return mixed
     */
    public function getIdNews()
    {
        return $this->id_news;
    }

    public function setId_news($id_news)
    {
        $this->id_news = $id_news;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getReportedContent()
    {
        return $this->reported_content;
    }

    public function setReported_content($reported_content)
    {
        $this->reported_content = $reported_content;
    }

    /**
     * @return mixed
     */
    public function getReportingDate()
    {
        return $this->reporting_date;
    }

    public function setReporting_date($reporting_date)
    {
        $this->reporting_date = $reporting_date;
    }
}

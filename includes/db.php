<?php

class DB
{
    protected $database;
    
    const TABLE_APPLICATION = 'tbl_application';
    const TABLE_CONTACT = 'tbl_contact';
    const TABLE_JOB = 'tbl_job';
    const TABLE_RECOMMENDATION = 'tbl_recommendation';
    const TABLE_USER = 'tbl_user';
    
    /**
     * Constructor
     */
    function __construct()
    {
        $this->database = new medoo([
            'database_type' => 'mysql',
            'database_name' => DB_NAME,
            'server' => DB_HOST,
            'username' => DB_USER,
            'password' => DB_PASSWORD,
            'charset' => 'utf8'
        ]);
    }
    
    /**
     * Get last query
     * @return string
     */
    function getLastQuery()
    {
        return $this->database->last_query();
    }
    
    /**
     * Get user data by ID
     * @param int $user_id
     * @return array|bool
     */
    public function getUser($user_id)
    {
        return $this->database->get(
            static::TABLE_USER,
            ['id', 'name', 'email', 'token', 'role', 'facebook_id'],
            ['id'=> $user_id]
        );
    }
    
    /**
     * Get users data byID
     * @param array $user_ids
     * @return array
     */
    public function getUsers($user_ids)
    {
        return $this->database->select(
            static::TABLE_USER,
            ['id', 'name', 'email', 'token', 'role', 'facebook_id'],
            ['id'=> is_array($user_ids) ? $user_ids : array($user_ids)]
        );
    }
    
    /**
     * Get user data by Social ID
     * @param int $user_social_id
     * @return array|bool
     */
    public function getUserBySocialId($user_social_id)
    {
        return $this->database->get(
            static::TABLE_USER,
            ['id', 'name', 'email', 'token', 'role', 'facebook_id'],
            ['facebook_id'=> $user_social_id]
        );
    }
    
    /**
     * Insert user data
     * @param array $data
     * @return int
     */
    public function insertUser($data)
    {
        return $this->database->insert(
            static::TABLE_USER,
            $data
        );
    }
    
    /**
     * Update user data by ID
     * @param int $user_id
     * @param array $data
     * @return int
     */
    public function updateUser($user_id, $data)
    {
        return $this->database->update(
            static::TABLE_USER,
            $data,
            ['id'=> $user_id]
        );
    }
    
    /**
     * Update user data by Social ID
     * @param int $user_social_id
     * @param array $data
     * @return int
     */
    public function updateUserBySocialId($user_social_id, $data)
    {
        return $this->database->update(
            static::TABLE_USER,
            $data,
            ['facebook_id'=> $user_social_id]
        );
    }
    
    /**
     * Get Contact by ID
     * @param int $contact_id
     * @return array|bool
     */
    public function getContact($contact_id)
    {
        return $this->database->get(
            static::TABLE_CONTACT,
            ['id', 'name', 'picture_url', 'facebook_id', 'user_id'],
            ['id'=> $contact_id]
        );
    }
    
    /**
     * Get all contacts of user by User ID
     * @param int $user_id
     * @return array|bool
     */
    public function getContactsByUserId($user_id)
    {
        return $this->database->select(
            static::TABLE_CONTACT,
            ['id', 'name', 'picture_url', 'facebook_id', 'user_id'],
            ['user_id'=> $user_id]
        );
    }
    
    /**
     * Get all contacts by Social ID
     * @param int $contact_social_id
     * @return array
     */
    public function getContactsBySocialId($contact_social_id)
    {
        return $this->database->select(
            static::TABLE_CONTACT,
            ['id', 'name', 'picture_url', 'facebook_id', 'user_id'],
            ['facebook_id'=> $contact_social_id]
        );
    }
    
    /**
     * Get all contact users by Social ID
     * @param int $contact_social_id
     * @return array
     */
    public function getContactUsersBySocialId($contact_social_id)
    {
        $contacts = $this->getContactsBySocialId($contact_social_id);
        $users = [];
        if (!empty($contacts))
        {
            $users_id = [];
            foreach ($contacts AS $contact)
            {
                $users_id[] = $contact['user_id'];
            }
            $users = $this->getUsers($users_id);
        }
        return $users;
    }
    
    /**
     * Insert contact data
     * @param array $data
     * @return type
     */
    public function insertContact($data)
    {
        return $this->database->insert(
            static::TABLE_CONTACT,
            $data
        );
    }
    
    /**
     * Update contact data by ID
     * @param int $contact_id
     * @param array $data
     * @return int
     */
    public function updateContact($contact_id, $data)
    {
        return $this->database->update(
            static::TABLE_USER,
            $data,
            ['id'=> $contact_id]
        );
    }
    
}


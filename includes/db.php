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
     * Get user data by ID
     * @param int $user_id
     * @return array|bool
     */
    public function getUser($user_id)
    {
        return $this->database->get(
            static::TABLE_USER,
            ['id', 'name', 'email', 'token', 'role', 'facebook_id'],
            ['id'=> intval($user_id)]
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
            ['facebook_id'=> intval($user_social_id)]
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
            ['id'=> intval($user_id)]
        );
    }
    
    /**
     * Update user data by Social ID
     * @param int $user_id
     * @param array $data
     * @return int
     */
    public function updateUserBySocialId($user_social_id, $data)
    {
        return $this->database->update(
            static::TABLE_USER,
            $data,
            ['facebook_id'=> intval($user_social_id)]
        );
    }
    
}


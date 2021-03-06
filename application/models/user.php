<?php

/**
 * User Class
 *
 * Transforms users table into an object.
 * This is just here for use with the example in the Controllers.
 *
 * @licence 	MIT Licence
 * @category	Models
 * @author  	Simon Stenhouse
 * @link    	http://stensi.com
 */
class User extends DataMapper {

//    var $has_one = array("tipo_usuario");
    
    
    var $has_many = array("property");
    var $validation = array(
        array(
            'field' => 'name',
            'label' => 'nombre',
            'rules' => array('required', 'trim')
        ),
        array(
            'field' => 'lastname',
            'label' => 'apellido',
            'rules' => array('trim', 'max_length' => 40, 'utf8')
        ),
        array(
            'field' => 'password',
            'label' => 'clave',
            'rules' => array('required', 'trim', 'max_length' => 40, 'encrypt')
        ),
        array(
            'field' => 'email',
            'label' => 'dirección de email',
            'rules' => array('required', 'trim', 'unique', 'valid_email')
        )
    );
    

    /**
     * Constructor
     *
     * Initialize DataMapper.
     */
    function _construct($id=null) {
        $this->db_params = array_merge(array('dbcollat' => 'utf8_general_ci'));

        
        parent::__construct($id);
        
    
    }
    
    
    public function get_user_published_properties()
    {
        
        
        $user_properties = $this->get_properties();
        $published_user_properties = array();
        
        foreach ($user_properties as $user_property)
        {
            if($user_property->display_property)
                    $published_user_properties []= $user_property;
        }
        
        return $published_user_properties;
    }
    
       public function get_published_properties()
    {
        
        
        $user_properties = $this->get_properties();
        $published_user_properties = array();
        
        foreach ($user_properties as $user_property)
        {
            if($user_property->display_property)
                    $published_user_properties []= $user_property;
        }
        
        return $published_user_properties;
    }
    
    public function inscribe_property($newProperty)
    {
        $this->save($newProperty);
    }
    
    public function get_number_of_properties()
    {
        return $this->property->get_paged()->paged->total_rows;
    }
    
    
    
    public function get_number_of_posted_properties()
    {
        
        return count($this->property->where('display_property',1)->get()->all);
        
    }
    
    public function get_agents()
    {
        $agents = new User();
        $agents->where("company", $this->id)->get();
        if($agents->count() >= 1)
                return $agents;
        
        return false;
            
    }
    
     public function get_company_object()
    {
         if(!$this->company)
                 return false;

         
        $company = new User();
        $company->where("id", $this->company)->get();
        if($company->count() >= 1)
                return $company;
        
        return false;
    }
    
    public function has_agent($agent_id=0)
    {
        $agents = $this->get_agents();        
        if($agents->result_count() <= 0)
            return false;
        
        
        return $agents->where("id", $agent_id)->where("company",$this->id)->count() >= 1;
    }
    
    public function get_properties() {
        return $this->property->get()->all;
    }
    
    public function can_create_property()
    {
        return $this->get_number_of_properties() <= $this->posts_left * 3;
    }
    
    
    
    public static function email_exists($email='')
    {
        if(!$email)
            return false;
        
        $possible_user = new User();
        $possible_user->where("email",$email)->get();
        
        $if_user_exists = $possible_user->id;
        return (bool) $if_user_exists;
        
    }


    // --------------------------------------------------------------------

    /**
     * Login
     *
     * Authenticates a user for logging in.
     *
     * @access	public
     * @return	bool
     */
    function _encrypt($field, $params='') { // optional second parameter is not used
        // Don't encrypt an empty string
        if ($field) {
    
            $this->{$field} = sha1($this->{$field});
            
        }
    }

    public static function login($email, $password) {
        // Create a temporary user object
        $u = new Usuario();

        // Get this users stored record via their username

        $u->where(array("email"=>$email,"clave" => $password))->get();

       

        // If the username and encrypted password matched a record in the database,
        // this user object would be fully populated, complete with their ID.
        // If there was no matching record, this user would be completely cleared so their id would be empty.
        if (empty($u->id)) {
            // Login failed, so set a custom error message


            return FALSE;
        } else {
            // Login succeeded
            return $u;
        }
    }

    // --------------------------------------------------------------------

    /**
     * Encrypt (prep)
     *
     * Encrypts this objects password with a random salt.
     *
     * @access	private
     * @param	string
     * @return	void
     */
}

/* End of file user.php */
/* Location: ./application/models/user.php */
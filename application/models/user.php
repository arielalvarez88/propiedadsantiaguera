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
            'rules' => array('required', 'trim', 'utf8')
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
    function _construct() {
        $this->db_params = array_merge(array('dbcollat' => 'utf8_general_ci'));

        parent::DataMapper();
        
    
    }
    
    public function get_number_of_properties()
    {
        return $this->properties->get_paged()->paged->total_rows;
    }
    
    
    
    public function get_number_of_posted_properties()
    {
        return count($this->properties->where('display_property',1)->get()->all);
        
    }
    
    
    public function can_create_property()
    {
        return $this->get_number_of_properties() <= $this->posts_left * 3;
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
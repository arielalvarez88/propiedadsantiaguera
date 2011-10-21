<?php
class Propiedades extends CI_Controller
{
    public function index()
    {
        $data['topLeftSide'] = $this->load->view('blocks/propiedades','',true);
        $data['topRightSide'] = $this->load->view('blocks/advertising','',true);
        $data['topRightSide'] .= $this->load->view('blocks/subscribe','',true);
        $menuTiposDePropiedadData['sectionName'] = 'propiedades';
        $data['topLeftSide'] .= $this->load->view('blocks/menuTiposDePropiedad',$menuTiposDePropiedadData,true);
        $this->load->view('page',$data);
    }
    
    public function agregar_propiedades()
    {
        $blocks['topLeftSide'] = $this->load->view('forms/add_properties_form.php','',true);
        $this->load->view('page',$blocks);
    }
    
    public function ver($id=null)
    {
        if(!($id && is_numeric($id) && $id >= 1))
            echo 'error';
        
        $propiedadObject['propiedad'] = 'prueba';
        $data['topLeftSide'] =$this->load->view('blocks/propiedadViewer',$propiedadObject,true);
        $data['topRightSide'] =$this->load->view('blocks/userViewer',$propiedadObject,true);
        $data['topRightSide'] .=$this->load->view('blocks/monedaPrecio',$propiedadObject,true);
        $data['topRightSide'] .=$this->load->view('blocks/pdfConverter',$propiedadObject,true);
        $data['topRightSide'] .=$this->load->view('blocks/sharePropertyWithAFriend',$propiedadObject,true);
        $data['bottomLeftSide'] =$this->load->view('blocks/propertyInfo',$propiedadObject,true);
        $data['bottomLeftSide'] .= $this->load->view('blocks/propertyUbicationGmap',$propiedadObject,true);
        $data['bottomRightSide'] =$this->load->view('blocks/solicitudDeInformacion',$propiedadObject,true);
        
        
        $this->load->view('page',$data);
            
    }
    
    public function validate(){
                
        
        if ($this->form_validation->run('property') == false)
        {
                $this->error();
        }
        else
        {
            $this->save_property();
        }
    }
    
    private function save_property()
    {
        $newProperty = new Property();
        
        
        $newPropertyInfo = $this->input->post();
        $newProperty->terrain = $newProperty['property-terrain'];
        $newProperty->bathrooms = $newProperty['property-bathrooms'];
        $newProperty->sector = $newProperty['property-sector'];
        $newProperty->construction = $newProperty['property-sector'];
        $newProperty->livinrooms = $newProperty['property-livinrooms'];
        $newProperty->address = $newProperty['property-address'];
        $newProperty->stories = $newProperty['property-stories'];
        $newProperty->kitchens = $newProperty['property-kitchens'];
        $newProperty->status = $newProperty['property-status'];
        $newProperty->bedrooms = $newProperty['property-bedrooms'];
        $newProperty->parkings = $newProperty['property-parkings'];
        $newProperty->sell_price_dollars = $newProperty['property-selling_prices_dollars'];
        $newProperty->sell_price_pesos = $newProperty['property-selling_prices_dollars'];
        $newProperty->rent_price_dollars = $newProperty['rent_price_dollars'];
        $newProperty->rent_price_pesos = $newProperty['rent_price_pesos'];
        
        
        $newUser->password = $userInfo['signup-bedrooms'];
        
        $newUser->tel = $userInfo['signup-tel'];
        $newUser->cel = $userInfo['signup-cel'];
        $newUser->fax = $userInfo['signup-fax'];
        $newUser->website = $userInfo['signup-website'];        
        $newUser->rnc = $userInfo['signup-rnc'];
        $newUser->address = $userInfo['signup-address'];
        $newUser->description = $userInfo['signup-description'];
        
        $newUser->save();
        
        User_handler::loginAndSaveInCookies($newUser->email, $newUser->password);
        
    }


    private function signup_form_error() {

        $repopulateForm['name'] = $this->input->post('signup-name');
        $repopulateForm['lastname'] = $this->input->post('signup-lastname');
        $repopulateForm['company'] = $this->input->post('signup-company');
        $repopulateForm['email'] = $this->input->post('signup-email');
        $repopulateForm['tel'] = $this->input->post('signup-tel');
        $repopulateForm['cel'] = $this->input->post('signup-cel');
        $repopulateForm['website'] = $this->input->post('signup-website');
        $repopulateForm['description'] = $this->input->post('description');
        $repopulateForm['clientType'] = $this->input->post('signup-client-type');
       
       
        $repopulateForm['errores'] = validation_errors();

        $signUpData['signUpForm'] = $this->load->view('blocks/newUserType', '', true);
        $signUpData['signUpForm'] .= $this->load->view('forms/signup_informacion_general', $repopulateForm, true);
        
        $data['topLeftSide'] = $this->load->view('blocks/signUpForm', $signUpData, true);
        $this->load->view('page.php', $data);
    }
}
?>

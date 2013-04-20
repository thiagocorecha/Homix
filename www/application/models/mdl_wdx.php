<?php
class Mdl_wdx extends Model{
	function Mdl_wdx(){
		parent::Model();
	}//end constructor


    function get_general($main_page){
        $wdx['main_page'] = $main_page;
        return $wdx;
    }//end get_general()

    

}//end model
	
?>
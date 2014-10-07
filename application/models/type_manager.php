<?php



class Type_manager extends CI_Model
{

	var $tbl_type			=	"types";
	var $tbl_cat_liaison	=	"cat_has_type";
	var $tbl_fiche_liaison	=	"fiche_has_type";






	public function get_types($slug="")
	{
		$query = $this->db->get($this->tbl_type);
		if($slug!="")
		{
			$query = $this->db->where("slug",$slug);
		}
		$types = $query->result();
		
		return $types;
	}
	
	
	
	
	/***
	*
	*	Function get_cat_types()
	*
	*
	*	Permet de retourner la liste des types. 
	*	Fonctionnement :
	*	$type->get_cat_types($id_category) : retourne un tableau contenant les types appartenant à une catégorie donnée.
	*	$type->get_cat_types($id_categorie, TRUE) : idem, mais sous la forme d'une chaine d'éléments séparés par une virgule.
	*
	*
	*
	*	@id_category : (int) identifiant de la catégorie
	*	@$to_string :	(bool) TRUE ou FALSE.
	*
	*	@return : un tableau ou une chaine en fonction de @to_string
	*/
	public function get_cat_types($id_category, $to_string = FALSE)
	{
		$query = $this->db->get_where($this->tbl_cat_liaison, array("category_id"=>$id_category));
		$results = $query->result();
		$returned_array = array();
		foreach($results as $key => $result )
		{
			array_push($returned_array,$result->type_slug);
		}
		
		if($to_string==TRUE)
		{
			$returned_string = "";
			$i=0;
			foreach($results as $key =>$type)
			{
				if($i>=1){
					$returned_string .= ", ";
				}
				$returned_string .= $type->type_slug;
				
				$i++;
			}
			
			return $returned_string;
		}else{
			return $returned_array;	
		}
		
	}
	
	
	
	
	/***
	*
	*	Function update_cat_types()
	*
	*
	*	Permet de metre à jour les types d'une catégorie
	*
	*
	*
	*	@id_category : (int) identifiant de la catégorie concernée
	*	@$types_array :	(array) tableau listant les types concernés.
	*/

	public function update_cat_types($id_category,$types_array)
	{
		//On supprime les types de la catégorie
		$this->delete_cat_type($id_category);
		 
		//On ajoute les catégories concernées
		$this->add_cat_type($id_category,$types_array);
	}
	
	
	public function delete_cat_type($id_category)
	{
		$this->db->delete("cat_has_type", array("category_id"=>$id_category));
	}
	
	
	
	public function add_cat_type($id_category,$types_array)
	{
		$datas = array();
		foreach($types_array as $key => $type_slug)
		{
			$data = array(
				"category_id" 	=> 	$id_category,
				"type_slug"		=>	$type_slug
			);
			array_push($datas,$data);
		}
		
		$query = $this->db->insert_batch("cat_has_type",$datas);
	}
	
	
}
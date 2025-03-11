<?php
/**
 * 
 */
class My_model extends CI_Model
{
	// New Method 

	function insert($tname,$data)
	{
        $this->db->insert($tname,$data);
		return $this->db->insert_id();

	}

	function select($tname)
	{
		return $this->db->get($tname)->result_array();
	}

	function select_where($tname,$conn)
	{
       return $this->db->where($conn)->get($tname)->result_array();
	}

	function update($tname,$conn,$data)
	{
       $this->db->where($conn)->update($tname,$data);
	}

	function delete($tname,$conn)
	{
		$this->db->where($conn)->delete($tname);
	}

	function get_product()
	{
		return $this->db->query("SELECT * FROM product_tbl,category_tbl WHERE 
		product_tbl.category_tbl_id = category_tbl.category_tbl_id")->result_array();
	}
    // Search Function 
	function search_product($search)
	{
		return $this->db->query("SELECT * FROM product_tbl,category_tbl WHERE 
		product_tbl.category_tbl_id = category_tbl.category_tbl_id AND (product_name LIKE '%$search%' 
		OR category_name LIKE '%$search%')")->result_array();
	}

}
?>
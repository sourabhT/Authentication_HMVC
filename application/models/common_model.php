<?php


/*  
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Common_Model extends CI_Model {
	 public function __construct() {
        parent::__construct();
     }
	 
      
   public function getCategoryByUrl($seo_pagename) {
		$this->db->select('*');
        $this->db->from('categories');
        $this->db->where('page_url',$seo_pagename);
		$this->db->where('status','Y');              
        $query = $this->db->get();
        return $query->row();
   }
   
   public function getCategoryByID($category_id) {
		$this->db->select('*');
        $this->db->from('categories');
        $this->db->where('category_id',$category_id);
		$this->db->where('status','Y');              
        $query = $this->db->get();
        return $query->row();
		
   }
   public function getPublisherByID($publisher_id) {
		$this->db->select('*');
        $this->db->from('publishers');
        $this->db->where_in('publisher_id',$publisher_id);
		//$this->db->where('status','Y');              
        $query = $this->db->get();
		$this->db->last_query();
		//exit;
        return $query->row();
		
   }
   
   public function getReportsByCategoryId($perpage = 10 , $start_from = 0 ,$category_id) {
		$this->db->select("*");
		$this->db->from('reports');
		$this->db->where('category_id',$category_id);
		$this->db->where('status','Y');
		$this->db->order_by('report_id','DESC');
        $this->db->limit($perpage,$start_from);
        $query = $this->db->get();
        //$this->db->last_query();
		// exit;
        return $query->result();
   }
   public function getNewsByCategoryId($perpage = 10 , $start_from = 0 ,$category_id) {
		$this->db->select("*");
		$this->db->from('news');
		$this->db->where('category_id',$category_id);
		$this->db->where('status','Y');
		$this->db->order_by('news_id','DESC');
        $this->db->limit($perpage,$start_from);
        $query = $this->db->get();
        //$this->db->last_query();
		// exit;
        return $query->result();
   }
    public function getRecordDataLimit($perpage = 10 , $start_from = 0,$tablename,$array_field ,$order_id , $sort = 'ASC') {
		$this->db->select("*");
        $this->db->from($tablename);
		foreach($array_field as $key => $value ){
        $this->db->where($key,$value);
		}
		$this->db->order_by($order_id,$sort);
        $this->db->limit($perpage,$start_from);
        $query = $this->db->get();
		//$this->db->last_query();
	  // exit;
        return $query->result();
   }
   
     public function rowCount($tablename,$where_field,$cond ) {
        $this->db->where($where_field,$cond);    
		$this->db->from($tablename);
        $count = $this->db->count_all_results();     
	 return $count;        
   }
   
    public function publisherOrderedListName() {
        $query = $this->db->query("SELECT distinct LEFT(`publisher_name`, 1) as name ,`publisher_id`,`publisher_name`,`publisher_description`,`publisher_logo`,`status`  FROM `publishers`  WHERE `status` = 'Y' ORDER BY LEFT(`publisher_name`, 1) ASC");    
	
		return $query->result();        
   }
   
    public function tagOrderedListName() {
        $query = $this->db->query("SELECT distinct LEFT(`tag_name`, 1) as name,`tag_id`,`tag_name` FROM `tags` WHERE `status` = 'Y' ORDER BY LEFT(`tag_name`, 1) ASC ");    
	
		return $query->result();        
   }
   
   public function insertToLeads($data) {
        $this->db->insert('leads', $data);
   }
   
   
   
   // 

}
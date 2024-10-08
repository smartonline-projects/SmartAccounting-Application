<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_akuntansi_sa extends CI_Model {

   
	var $table = 'ms_akunsaldo';
	var $column_order = array('kodeakun', 'debet','kredit',null); 
	var $column_search = array('kodeakun','debet','kredit'); 
	var $order = array('kodeakun' => 'asc'); 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

	private function _get_datatables_query( $bulan, $tahun )
	{
		//$this->db->from($this->table);		
		$this->db->select('ms_akun.kodeakun, ms_akun.namaakun, ms_akunsaldo.debet, ms_akunsaldo.kredit, ms_akunsaldo.id')->from('ms_akun');
		$this->db->join('ms_akunsaldo','ms_akunsaldo.kodeakun=ms_akun.kodeakun','left');
		$this->db->where(array('ms_akunsaldo.tahun' => $tahun,'ms_akunsaldo.bulan' => $bulan));
		$i = 0;
		
	    
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					
					//$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

			
					
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	
	
	function get_datatables( $bulan, $tahun )
	{
		
		$this->_get_datatables_query( $bulan, $tahun );
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);	
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered( $bulan, $tahun )
	{
		$this->_get_datatables_query( $bulan, $tahun );
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}


}


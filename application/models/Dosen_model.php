<?php 

  /**
   * summary
   */
    class Dosen_model extends CI_model{
        public function getAllDosen()
    {
        // //menggunakan cara pertama
        // $query = $this->db->get->('Dosen');
        // return &query->result_array();
        // menggunakan cara cepat methode chaining // pemanggil data base
        return $this->db->get('dosen')->result_array();
        
        }

    public function tambahDataDosen()
    {
      $data =[
         "nip" =>$this->input->post('nip',true),
         "namadosen" =>$this->input->post('namadosen',true),
      ];
      $this->db->insert('dosen', $data);
    }

    public function getDosenById()
    {
     return $this-db->get_where('dosen',['id' =>$id])->row_array();
    }
    

        public function cariDataDosen()
        {
            $keyword = $this->input->post('keyword', true);
            $this->db->like('nip', $keyword); 
            $this->db->or_like('namadosen', $keyword);
            return $this->db->get('dosen')->result_array(); 
        }

        public function ubahDataDosen()
        {
            $data = [
                 "kode" => $this->input->post('kode', true),
                "matakuliah" => $this->input->post('matakuliah', true),
                "sks" => $this->input->post('sks', true),
                "semester" => $this->input->post('semester', true),
                "jurusan" => $this->input->post('jurusan', true),
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('dosen', $data);
        }

        public function hapusDataDosen($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('dosen');
        }

    } 

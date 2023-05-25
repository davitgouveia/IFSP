<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtomodel extends CI_Model {
    function __construct() {

    }

    public function inserir($data) {
        $this->db->insert('produto', $data);
    }

    public function alterar($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('produto', $data);
    }

    public function excluir($id) {
        $this->db->where('id', $id);
        $this->db->delete('produto');
    }

    public function listar() {
        // //Inner Join provisorio
        // $this->db->select('produto.*,categoria.nome');
        // $this->db->from('produto');
        // $this->db->join('categoria', 'produto.id_categoria = categoria.id');

        $this->db->from('produto'); //retirar se usar innerjoin
        $this->db->order_by('produto.nome', 'asc');

        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }


    public function filtrar($array) {

        //Inner Join
        $this->db->select('produto.*,categoria.nome');
        $this->db->from('produto');
        $this->db->join('categoria', 'produto.id_categoria = categoria.id');

        //Filtro
        foreach($array as $item => $value) {
            if ($item == 'produto.nome')
                $this->db->like($item, $value, 'both');
            else
                $this->db->where($item, $value);
        }

        $this->db->order_by('produto.nome');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

}
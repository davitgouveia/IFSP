<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	header('Access-Control-Allow-Methods: POST, OPTIONS');
	header('Access-Control-Allow-Headers: *');
	exit;
}

class Produto extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model("produtomodel");
	}

	public function adicionar() 
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		
		$p = (object) $this->input->post();

		if ($this->form_validation->run() == FALSE) {
			$rps = array(
				'status' => false,
				'erros' => validation_errors()
			);
		} else {
			$e = (object)[];
			$e->nome = $p->nome;
			$e->status = $p->status;
			
			if (!isset($p->id)) {
				$e->data_cad = date("Y-m-d H:i:s");

				$this->produtomodel->inserir($e);

				$rps = array(
					'status' => true,
					'mensagem' => 'Cadastro realizado com sucesso!'
				);
			} else {
				$e->data_alt = date("Y-m-d H:i:s");
				$id = $p->id;

				$this->produtomodel->alterar($id, $e);

				$rps = array(
					'status' => true,
					'mensagem' => 'Alteração realizada com sucesso!'
				);
			}
		}
		echo json_encode($rps);
	}

	public function listar() {
		
		$cat = $this->produtomodel->listar();

		$data = array();

			foreach ($cat as $linha) {
				$linha->id = intval($linha->id);
				$linha->data_cad = date("d/m/Y H:i:s", strtotime($linha->data_cad));
				if ($linha->data_alt != null)
				$linha->data_alt = date("d/m/Y H:i:s", strtotime($linha->data_alt));

				$data[] = $linha;
			}

		$rps = array(
			'status' => true,
			'obj' => $data
		);

		echo json_encode($rps);
	}

	public function excluir() {
		$id = $this->input->post('id');

		$this->produtomodel->excluir($id);

		echo json_encode([
			'status' => true,
			'mensagem' => "Exclusão realizada com sucesso."
		]); 
	}

	public function listaproduto() {
		$data = $this->produtomodel->listaproduto();

		$rps = array(
			'status' => true,
			'obj' => $data
		);

		echo json_encode($rps);
	}

	//Filtros
	public function filtrar() {
        $pesq = [];

        if ($this->input->post("nome") != '')
            $pesq['produto.nome'] = $this->input->post("nome");

        if ($this->input->post("status") != '')
            $pesq['produto.status'] = $this->input->post("status");

        $data = $this->produtomodel->filtrar($pesq);

        if (count($data) > 0) {
            $rps = array(
                'produto.status' => true,
                'obj' => $data
            );
        } else {
            $rps = array(
                'produto.status' => false,
                'erro' => 'Não foi encontrado nenhum registro que satisfaça ao filtro.'
            );
        }

        echo json_encode($rps);
    }
}
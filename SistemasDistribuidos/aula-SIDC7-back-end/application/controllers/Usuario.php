<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function adicionar() 
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required');
		$this->form_validation->set_rules('senha', 'Senha', 'trim|required');

		$p = (object) $this->input->post();

		if ($this->form_validation->run() == FALSE) {
			$rps = array(
				'status' => false,
				'erros' => validation_erros()
			);
		} else {
			$e = (object)[];
			$e->nome = $p->nome;
			$e->email = $p->email;
			$e->senha = $p->senha;

			if (!isset($p->id)) {
				$e->data_cad = date("Y-m-d H:i:s");

				$this->usuariomodel->inserir($e);

				$rps = array(
					'status' => true,
					'mensagem' => 'Cadastro realizado com sucesso!'
				);
			} else {
				$e->data_alt = date("Y-m-d H:i:s");
				$id = $p->id;

				$this->usuariomodel->alterar($id, $e);

				$rps = array(
					'status' => true,
					'mensagem' => 'Alteração realizada com sucesso!'
				);
			}
		}
	}

	public function listar() {

		$cat = $this->usuariomodel->listar();

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

		$this->usuariomodel->excluir($id);

		echo json_encode([
			'status' => true,
			'mensagem' => "Exclusão realizada com sucesso."
		]); 
	}

	public function listausuario() {
		$data = $this->usuariomodel->listausuario();
		$rps = array(
			'status' => true,
			'obj' => $data
		);

		echo json_encode($rps);
	}
}
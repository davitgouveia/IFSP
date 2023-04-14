import React, { useState, useEffect} from "react";
import Api from '../../services/api';
import { withRouter } from "react-router";
import Swal from "sweetalert2";
import { useToasts } from "react-toast-notifications";
import LoadingOverlay from "react-loading-overlay";
import { Modal, ModalTitle } from "react-bootstrap";

const Categoria = () => {
    const [ modal, setModal ] = useState(false);
    const [ acao, setAcao ] = useState();

    function adicionar() {
        setModal(true);
        setAcao('Adicionar');
    }

    function fecharModal() {
        setModal(false);
    }

    return (
        <>
        <div className="subheader espaco-header-pedidos subheader-transparent" id="kt_subheader">
          <div className="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            {/*begin::Details*/}
            <div className="d-flex align-items-center flex-wrap mr-2">
              {/*begin::Title*/}
              <h5 className="text-dark font-weight-bold mt-6 mb-2 mr-5">Categoria</h5>
              {/*end::Title*/}
              {/*begin::Separator*/}
              <div className="subheader-separator subheader-separator-ver mt-6 mb-2 mr-5 bg-gray-200" />
              {/*end::Separator*/}
            </div>
            {/*end::Details*/}          
            {/*begin::Toolbar*/}
            <div className="d-flex align-items-center">
                <button className="btn btn-success mt-5"
                onClick={e => {adicionar()}}>
                    <i className="fas fa-plus"></i>Adicionar</button>
            </div>
            {/*end::Toolbar*/}
          </div>
        </div>
     
       
        {/*begin::Entry*/}
        <div className="d-flex flex-column-fluid">
            {/*begin::Container*/}
            <div className="container">
        
        {/*begin::Row*/}
        <div className="row">

        </div>
        {/*end::Row*/}
              

              {/*end::Dashboard*/}
            </div>
            {/*end::Container*/}
          </div>
          {/*end::Entry*/}
        
        {/*end::Content*/}
        {/*begin::Footer*/}
        <div className="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
          {/*begin::Container*/}
          <div className="container d-flex flex-column flex-md-row align-items-center justify-content-between">
            {/*begin::Copyright*/}
            <div className="text-dark order-2 order-md-1">
              <span className="text-muted font-weight-bold mr-2">2023©</span>
              <a href="#" target="_blank" className="text-dark-75 text-hover-primary">LAC</a>
            </div>
            {/*end::Copyright*/}
            {/*begin::Nav*/}
            <div className="nav nav-dark order-1 order-md-2">
              {/*Aqui Link e informação a direita */}
            </div>
            {/*end::Nav*/}
          </div>
          {/*end::Container*/}
        </div>
        {/*end::Footer*/}
        {/*end::Wrapper*/}
        {/*end::Page*/}
        {/*end::Main*/}     

        <Modal size={"xl"} show={modal} onHide={() => fecharModal()}>
            <Modal.Header>
                <Modal.Title>Categoria</Modal.Title>
            </Modal.Header>

            <Modal.Footer>
                <button type="button" onClick={e => {fecharModal()}}
                className="btn btn-secondary">Fechar</button>
            </Modal.Footer>
        </Modal>
        </>
    );
}

export default withRouter(Categoria);
<?php
class Form_Pessoa extends Zend_Form
{
	public function init()
	{
		$this->setName('pessoa');
		$this->setAction('/participantes/cadastro');
		$this->setMethod('post');
		$this->setAttrib('id', 'pessoa');
		$this->setAttrib('role', 'form');
		
		$pessoa_id = new Zend_Form_Element_Text('f_pessoa_id');
		$pessoa_id->setRequired(false)
				        ->setValue('')
				        ->setLabel('Id da pessoa')
				        ->setAttrib('id', 'f-pessoa-id')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Id da pessoa');
		
		$nome = new Zend_Form_Element_Text('f_nome');
		$nome->setRequired(true)
				        ->addErrorMessage('O Nome precisa ser informado.')
				        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Nome')
				        ->setAttrib('id', 'f-nome')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Nome');
		
		$data_nasc = new Zend_Form_Element_Text('f_data_nasc');
		$data_nasc->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Data de nascimento')
				        ->setAttrib('id', 'f-data-nasc')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Data de nascimento');
		
		$endereco = new Zend_Form_Element_Text('f_endereco');
		$endereco->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Endereço')
				        ->setAttrib('id', 'f-endereco')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Endereço');
		
		$complemento = new Zend_Form_Element_Text('f_complemento');
		$complemento->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Complemento')
				        ->setAttrib('id', 'f-complemento')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Complemento');
		
		$bairro = new Zend_Form_Element_Text('f_bairro');
		$bairro->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Bairro')
				        ->setAttrib('id', 'f-bairro')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Bairro');
		
		$cidade = new Zend_Form_Element_Text('f_cidade');
		$cidade->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Cidade')
				        ->setAttrib('id', 'f-cidade')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Cidade');
		
		$uf = new Zend_Form_Element_Text('f_uf');
		$uf->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('UF')
				        ->setAttrib('id', 'f-uf')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'UF');
		
		$cep = new Zend_Form_Element_Text('f_cep');
		$cep->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('CEP')
				        ->setAttrib('id', 'f-cep')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'CEP');
		
		$telefone = new Zend_Form_Element_Text('f_telefone');
		$telefone->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Telefone')
				        ->setAttrib('id', 'f-telefone')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Telefone');
		
		$telefone2 = new Zend_Form_Element_Text('f_telefone2');
		$telefone2->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Telefone 2')
				        ->setAttrib('id', 'f-telefone2')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Telefone 2');
		
		$celular = new Zend_Form_Element_Text('f_celular');
		$celular->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Celular')
				        ->setAttrib('id', 'f-celular')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Celular');
		
		$celular2 = new Zend_Form_Element_Text('f_celular2');
		$celular2->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Celular 2')
				        ->setAttrib('id', 'f-celular2')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Celular 2');
		
		$email = new Zend_Form_Element_Text('f_email');
		$email->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('E-mail')
				        ->setAttrib('id', 'f-email')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'E-mail');
		
		$paroquia = new Zend_Form_Element_Text('f_paroquia');
		$paroquia->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Paróquia')
				        ->setAttrib('id', 'f-paroquia')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Paróquia');
				        
		$batizado = new Zend_Form_Element_Checkbox('f_batizado');
        $batizado->setRequired(false)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->setValue('')
            ->setLabel('Batizado?')
            ->setAttrib('id', 'f-batizado')
            ->setAttrib('placeholder', 'Batizado?');
		
		$batizado_em_qual_igreja = new Zend_Form_Element_Text('f_batizado_em_qual_igreja');
		$batizado_em_qual_igreja->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Batizado em qual igreja')
				        ->setAttrib('id', 'f-batizado_em_qual_igreja')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Batizado em qual igreja');
				        
		$catequese = new Zend_Form_Element_Checkbox('f_catequese');
        $catequese->setRequired(false)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->setValue('')
            ->setLabel('Catequese?')
            ->setAttrib('id', 'f-catequese')
            ->setAttrib('placeholder', 'Catequese?');
				        
		$crisma = new Zend_Form_Element_Checkbox('f_crisma');
        $crisma->setRequired(false)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->setValue('')
            ->setLabel('Crismado?')
            ->setAttrib('id', 'f-crisma')
            ->setAttrib('placeholder', 'Crismado?');
       
       $estado_civil = new Zend_Form_Element_Select('f_estado_civil');
       $estado_civil->setRequired(false)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->setRegisterInArrayValidator(false)
               ->setValue('')
               ->setLabel('Estado Civil')
               ->setAttrib('id', 'f-estado_civil')
               ->setAttrib('class', 'form-control')
               ->setAttrib('placeholder', 'Estado Civil');
		
		$casado_em_qual_igreja = new Zend_Form_Element_Text('f_casado_em_qual_igreja');
		$casado_em_qual_igreja->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Casado em qual igreja')
				        ->setAttrib('id', 'f-casado_em_qual_igreja')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Casado em qual igreja');
				        
		$participou_go_rcc = new Zend_Form_Element_Checkbox('f_participou_go_rcc');
        $participou_go_rcc->setRequired(false)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->setValue('')
            ->setLabel('Participa da RCC?')
            ->setAttrib('id', 'f-participou_go_rcc')
            ->setAttrib('placeholder', 'Participa da RCC?');
		
		$quanto_tempo = new Zend_Form_Element_Text('f_quanto_tempo');
		$quanto_tempo->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Há quanto tempo')
				        ->setAttrib('id', 'f-quanto_tempo')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Há quanto tempo');
		
		$data_cadastro = new Zend_Form_Element_Text('f_data_cadastro');
		$data_cadastro->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Data de cadastro')
				        ->setAttrib('id', 'f-data_cadastro')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Data de cadastro');
		
		$observacao = new Zend_Form_Element_Text('f_observacao');
		$observacao->setRequired(false)
        		        ->addFilter('StripTags')
				        ->addfilter('StringTrim')
				        ->setValue('')
				        ->setLabel('Observação')
				        ->setAttrib('id', 'f-observacao')
				        ->setAttrib('class', 'form-control')
				        ->setAttrib('placeholder', 'Observação');
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Gravar')
		       ->setAttrib('class', 'btn btn-primary');
		       
		$this->addElements(
			array(
				$pessoa_id,
				$nome,
				$data_nasc,
				$endereco,
				$complemento,
				$bairro,
				$cidade,
				$uf,
				$cep,
				$telefone,
				$telefone2,
				$celular,
				$celular2,
				$email,
				$paroquia,
				$batizado,
				$batizado_em_qual_igreja,
				$catequese,
				$crisma,
				$estado_civil,
				$casado_em_qual_igreja,
				$participou_go_rcc,
				$quanto_tempo,
				$data_cadastro,
				$observacao,
				$submit
			)
		);
		
		$this->setElementDecorators(array(
			'ViewHelper'
		));
		
		$this->setDecorators(array());       
	}
}
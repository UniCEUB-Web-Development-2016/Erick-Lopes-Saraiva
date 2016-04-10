<?php
abstract class API{

	/** Sobre Restfull API
	*
	* REST eh um acronimo que significa em ingles Representational State Transfer
	* Podemos dizer que uma API Restfull eh baseada em coisas ou "substantivos" como recursos ao contrario de outras APIs
	* que sao baseadas em acoes ou verbos.
	* Em REST temos somente quatro verbos que efetivamente nos indicam COMO manipular nossos substantivos esses verbos sao:
	* GET - "Pega" algum dado
	* POST - "Insere" algum dado
	* PUT - "Substitui" algum dado
	* DELETE - "Deleta" algum dado
	* Se eu falo pro servidor GET usuario id=1 eh intuitivo dizer que irei recuperar as informacoes do referido usuario se eu 
	* troco o verbo a acao que nosso servidor ira realizar deve ser correspondente com o verbo.
	* 
	* Tudo isso eh muito bom e muito bem, soh que nada disso tem a ver com Representacao como indica o nome REST 
	* Representacao diz respeito ao estado recurso do substantivo que estamos "manipulando" naquele dado momento
	* A Representacao de um dado tem que obrigatoriamente possuir toda a informação para realizar a acao que queremos
	* Se voce deseja recuperar um usuario do sistema voce obrigatoriamente deve saber o id se nao eh impossivel recuperar 
	* o usuario, eh como chegar em uma lanchonete e pedir um sorvete sem indicar o sabor e a quantidade. 
	*  
	* De forma mais tecnica, se desejamos inserir um novo usuario em nosso sistema precisamos de uma serie de informacoes
	* essas informacoes devem estar em um formato que nosso sistema possa compreender normalmente utilizamos JSON que é 
	* um dos melhores se nao o melhor formato para se descrever valores de um objeto.
	*
	* Logo, podemos concluir que Representational State Transfer pode ser compreendido como uma estrategia para transferir/manipular 
	* de um lado para outro (de um host para outro/de um servico para outro) representacoes que descrevem inequivocamente o estado de
    * um determinado substantivo/objeto/entidade
	* 
	* Entao podemos definir que o proposito real da API é efetivamente desvincular a aplicacao web da pagina web, isso gera varios beneficios
	* pois agora podemos abstrair a camada cliente da camada servidor alem de fornecer servicos para sites em dominios distintos do nosso, isso se chama 
	* CORS Cross Origin Resource Sharing, e permite o compartilhamento da sua API com sites distintos do seu, como não é o foco desse trabalho irei deixar 
	* inteiramente a criterio do leitor visitar a pagina http://enable-cors.org/ e aprender mais sobre essa tecnologia, um ponto importante é que estaremos
	* habilitando CORS nessa API, isso introduz uma vulnerabilidade de seguranca que deve ser tratada, uma vez que REST é baseado em HTTP e HTTP é STATELESS
	* ou seja O SERVIDOR NAO CONHECE NINGUEM, pense como se você tivesse que se apresentar toda vez para falar com seus amigos pois eles nao coneseguem determinar 
	* quem você é. Essa é a vida do servidor HTTP se vc habilita CORS ele vai LIBERAR PRA GERAL manipular sua API e isso... fode tudo. 
	* por isso você vai ter que tratar esse problema quando for implementar esse codigo pra sua aplicação #sorry
	*/

	/**
     * Propriedade: request
     * O request original... esse codigo associado sera destruido uma vez que o restante do codigo for implementado
     */
	protected $request = '';	
	/**
     * Propriedade: method
     * O metodo HTTP utiliziado GET, POST, PUT ou DELETE
     */
    protected $method = '';
    
    /**
     * Propriedade: noun
     * O substantivo/modelo/classe/objeto referenciado
     */
    protected $noun = '';
  	
  	/**
  	* Propriedade: verb
  	* Um descritor adicional para uma acao a ser realizada pelo substantivo
   	*/
    protected $verb = '';
    
    /**
     * Propriedade: args
     * Descritores adicionais para o substantivo
     */	
    protected $args = Array();
    
    /**
    * Propriedade: data
    * Armazena os dados de um request tipo put (codificado em JSON)
    * Ou uma imagem/video/7zip/tar.gz
    */
    protected $data = Null;
    /**
    * Propriedade: datatype
    * Descreve o tipo de arquivo do $data
    */
    protected $datatype = 'unknown';
    /**
    * Construtor: __construct
    * Habilita CORS, monta o request para envio ao controller 
    */
	public function __construct($request) {
		//Habilita o ccrs 1 
		//header("Access-Control-Allow-Orgin: *");
		//Habilita o cors 2
		//header("Access-Control-Allow-Methods: *");
		//Indicar como o nosso servidor vai responder requests
		/*header("Content-Type: application/json");

		$this->noun = evalNoun($request);
		$this->verb =_evalVerb($request);
		$this->args =_evalArgs($request);
		$this->data = evalData($request);
		$this->method =_evalMethod($_SERVER['REQUEST_METHOD']);
		*/


		}
		
		/*Function: _evalMethod
		* Essa funcao eh responsavel por extrair o metodo HTTP
		*/
		private function _evalMethod($request_loc){
			$method_loc='Invalid Method'
		switch($request_loc){
			case 'GET':
				$method_loc='GET';
				break;
			case 'POST':

				break;
			default:
				$this->_response('Invalid Method', 405);
				break;
			}
		}
		
		/*Function: _evalNoun
		* Essa funcao eh responsavel por extrair o substantivo do request 
		*/
		private function _evalNoun($request_loc){
			preg_match("/\/([^\/]+)\//", $request_loc, $noun_loc);
			return ($noun_loc);
		}
		
		/*Function: _evalVerb
		* Essa funcao vai determinar se existe um verbo para ser extraido do request
		* implementar regex
		*/
		private function _evalVerb($request_loc){
			preg_match("/\/([^\/]+)\//", $request_loc, $noun_loc);
			return ($verb_loc);
		}
		
		/*Function: _evalArgs
		* Essa funcao vai extrair os argumentos para um array
		* implementar regex para extrair todos os campos posteriores
		*/
		private function _evalArgs($request_loc){
			preg_match("/\/([^\/]+)\//", $request_loc, $noun_loc);
			return($args_loc);
		}

		/*Function: _evalData
		* Essa funcao vai determinar pelo tipo de arquivo se os dados associados com um request sao do tipo jason, imagem, video ou zip/tar.gz
		* implementar regex tipo do arquivo pela exensão
		*/
		private function _evalData($request_loc){
			$type = 'unknown'
			return($data_loc,$type)

		}

		/*Function: _requestStatus
		* Essa funcao ira efetivamente construir o a resposta que iremos enviar, note que esse metodo serve para construir o request 
		*/		
		private function _requestStatus($code) {

		}

		/*Function: _response 
		* Constroi a resposta e envia para o cliente efetivamente indicando por meio do status code o estado da transferencia que foi realizado
		*/		
		private function _response($data_loc, $status = 200) {

		}
		public function getRequest(){
			return ($this->request);
		}
	}
}
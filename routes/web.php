<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    $this->get('/', 'AdminController@index')->name('admin.home');
    $this->get('/ajuda', 'AdminController@ajuda')->name('admin.ajuda');

    //Clientes Rotas
    $this->get('clientes', 'ClienteController@index')->name('todosClientes');
    $this->get('/clientes/create', 'ClienteController@create')->name('criarCliente');
    $this->post('/clientes/create', 'ClienteController@store')->name('storeCliente');
    $this->get('/clientes/show/{id}', 'ClienteController@show')->name('showCliente');
    $this->get('/clientes/update/{id}', 'ClienteController@update')->name('updateIdCliente');
    $this->post('/clientes/update', 'ClienteController@updateCliente')->name('updateCliente');
    $this->get('/clientes/delete/{id}', 'ClienteController@delete')->name('showDeleteCliente');
    $this->post('/clientes/delete', 'ClienteController@deleteCliente')->name('deleteCliente');
    //Filtro
    $this->post('clientes', 'ClienteController@searchCliente')->name('searchCliente');

    //entregadores
    $this->get('entregadores', 'EntregadorController@index')->name('todosEntregadores');
    $this->get('/entregadores/create', 'EntregadorController@create')->name('criarEntregador');
    $this->post('/entregadores/create', 'EntregadorController@store')->name('storeEntregador');
    $this->get('/entregadores/show/{id}', 'EntregadorController@show')->name('showEntregador');
    $this->get('/entregadores/update/{id}', 'EntregadorController@update')->name('updateIdEntregador');
    $this->post('/entregadores/update', 'EntregadorController@updateEntregador')->name('updateEntregador');
    $this->get('/entregadores/delete/{id}', 'EntregadorController@delete')->name('showDeleteEntregador');
    $this->post('/entregadores/delete', 'EntregadorController@deleteEntregador')->name('deleteEntregador');
    //Filtro
    $this->post('entregadores', 'EntregadorController@searchEntregador')->name('searchEntregador');

    //Entregas Rotas
    $this->get('entregas', 'EntregaController@index')->name('todasEntregas');
    $this->get('/entregas/create', 'EntregaController@create')->name('criarEntrega');
    $this->post('/entregas/create', 'EntregaController@store')->name('storeEntrega');
    $this->get('/entregas/show/{id}', 'EntregaController@show')->name('showEntrega');
    $this->get('/entregas/update/{id}', 'EntregaController@update')->name('updateIdEntrega');
    $this->post('/entregas/update', 'EntregaController@updateEntrega')->name('updateEntrega');

    //Filtro
    $this->post('entregas', 'EntregaController@searchEntrega')->name('searchEntrega');

    //Rota para criar array json para input tela de entrega
    $this->any('/clientes/buscar/{id}', 'ClienteController@buscarCliente')->name('GetDadosCliente');
    //Rota para criar array json para input tela de entregador
    $this->any('/entregadores/buscar/{id}', 'EntregadorController@buscarEntregador')->name('GetDadosEntregador');
    //Rota para criar array json para input tela de entrega
    $this->any('/produtos/buscar/{id}', 'ProdutoController@buscarProduto')->name('GetDadosProduto');

    //Produtos Rotas
    $this->get('produtos', 'ProdutoController@index')->name('todosProdutos');
    $this->get('/produtos/create', 'ProdutoController@create')->name('criarProdutos');
    $this->post('/produtos/create', 'ProdutoController@store')->name('storeProdutos');
    $this->get('/produtos/show/{id}', 'ProdutoController@show')->name('showProdutos');
    $this->get('/produtos/update/{id}', 'ProdutoController@update')->name('updateIdProdutos');
    $this->post('/produtos/update', 'ProdutoController@updateProduto')->name('updateProdutos');
    $this->get('/produtos/delete/{id}', 'ProdutoController@delete')->name('showDeleteProdutos');
    $this->post('/produtos/delete', 'ProdutoController@deleteProduto')->name('deleteProdutos');
    //Filtro
    $this->post('produtos', 'ProdutoController@searchProduto')->name('searchProduto');



    //Rota relatorio
    $this->get('/produto', 'RelatorioController@produto');
    $this->get('/EntregasRelatorios', 'RelatorioController@EntregasRelatorios');
    $this->get('/ClientesRelatorios', 'RelatorioController@ClientesRelatorios')->name('ClientesRelatorios');
    $this->get('/ProdutosRelatorios', 'RelatorioController@ProdutosRelatorios')->name('ProdutosRelatorios');
    $this->get('/pdfProduto', 'RelatorioController@GeraProdutoPdf')->name('GeraProdutoPdf');
    $this->get('/pdfCliente', 'RelatorioController@GeraClientePdf')->name('GeraClientePdf');
    $this->get('/pdfEntrega', 'RelatorioController@GeraEntregaPdf')->name('GeraEntregaPdf');
});

$this->post('atualizar-perfil', 'Admin\UserController@profileUpdate')->name('profile.update')->middleware('auth');
$this->get('perfil', 'Admin\UserController@profile')->name('profile')->middleware('auth');
$this->get('/', 'Site\SiteController@index')->name('home')->middleware('auth');


Auth::routes();

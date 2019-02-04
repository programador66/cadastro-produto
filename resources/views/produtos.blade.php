@extends('app',["current"=>"produtos"])

@section('body')
    
<div class="jumbotron">
        <div style="">    
            <div style="float:left; margin-right: 1%;">
            <h4> Produtos</h4>
            </div>
            <div >
            <a href="produtos/modal" class="btn btn-success" data-toggle="modal" data-target="#cadastrarProd" >Inserir</a>
            </div>
        </div>
        <hr>
        <table class="table table-hover ">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ações</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($prod as $prods)
                        <tr> 
                            <td>{{$prods->id}} </td>
                            <td>{{$prods->nome}} </td>
                            <td>{{$prods->estoque}} </td>
                            <td>{{$prods->preco}} </td>
                            
                        <td>
                            <button   class="btn btn-danger btn-sm"  data-target = "#excluirProd{{$prods->id}}" data-toggle="modal">Excluir</button>
                            <a href="" class="btn btn-primary btn-sm" data-target = "#editarProd{{$prods->id}}" data-toggle="modal">Editar</a>
                        </td>
                        </tr>
                        <div class="modal" tabindex="-1" role="dialog" id="excluirProd{{$prods->id}}">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Excluir Produto</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p>Deseja Realmente excluir?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                                      <a href="/produtos/excluir/{{$prods->id}}"  class="btn btn-danger btn-sm" >Excluir</a>
                                    </div>
                                  </div>
                                </div>
                              </div>


                            <div class="modal fade" id="editarProd{{$prods->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="title">Edição de Produtos</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="/produtos/edit/{{$prods->id}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                              <label for="recipient-name" class="col-form-label">Nome Produto:</label>
                                              <input type="text" class="form-control" id="nomeProd" name="nomeProd" value="{{$prods->nome}}">
                                            </div>
                            
                                            <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Estoque:</label>
                                                    <input type="text" class="form-control" id="estoqueProd" name="estoqueProd" value="{{$prods->estoque}}">
                                                  </div>
                                                  <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Preço:</label>
                                                        <input type="text" class="form-control" id="precoProd" name="precoProd" value="{{$prods->preco}}">
                                                    </div>
                                                       
                                                            
                                                       
                                                      <div class="form-group ">
                                                            <label for="inputEstado">Categoria</label>
                                                            <select id="prodCombo" name="prodCombo" class="form-control">
                                                                    <option selected>Escolher...</option>
                                                                 @foreach ($cat as $cats)
                                                            <option value="{{$cats->id}}">{{$cats->nome}}</option>
                                                                @endforeach
                                                            </select>
                                                          </div>
                                                         
                            
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                                  </div>
                                          </form>
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                            
                        

                    @endforeach


                </tbody>
              </table>
         
</div>


<div class="modal fade" id="cadastrarProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="title">Cadastro de Produtos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/produtos" method="POST">
                @csrf
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nome Produto:</label>
                <input type="text" class="form-control" id="nomeProd" name="nomeProd" ">
                </div>

                <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Estoque:</label>
                        <input type="text" class="form-control" id="estoqueProd" name="estoqueProd">
                      </div>
                      <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Preço:</label>
                            <input type="text" class="form-control" id="precoProd" name="precoProd">
                        </div>
                           
                                
                           
                          <div class="form-group ">
                                <label for="inputEstado">Categoria</label>
                                <select id="prodCombo" name="prodCombo" class="form-control">
                                        <option selected>Escolher...</option>
                                     @foreach ($cat as $cats)
                                <option value="{{$cats->id}}">{{$cats->nome}}</option>
                                    @endforeach
                                </select>
                              </div>
                             

                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                      </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>


@endsection
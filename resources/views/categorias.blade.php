@extends('app',["current"=>"categorias"])

@section('body')
    
    
<div class="jumbotron">
        <div style="">    
            <div style="float:left; margin-right: 1%;">
            <h4> Categorias</h4>
            </div>
            <div >
            <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#cadastrarCat" >Inserir</button>
            </div>
        </div>
        <hr>
        <table class="table table-hover ">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cat as $cats)
                        <tr> 
                            <td>{{$cats->id}} </td>
                            <td>{{$cats->nome}} </td>
                        <td>
                            <button   class="btn btn-danger btn-sm"  data-target = "#excluirCat{{$cats->id}}" data-toggle="modal">Excluir</button>
                            <a href="" class="btn btn-primary btn-sm" data-target = "#editarCat{{$cats->id}}" data-toggle="modal">Editar</a>
                        </td>
                        </tr>

                        <div class="modal" tabindex="-1" role="dialog" id="excluirCat{{$cats->id}}">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Excluir Categoria</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p>Deseja Realmente excluir?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                                      <a href="/categorias/excluir/{{$cats->id}}"  class="btn btn-danger btn-sm" >Excluir</a>
                                    </div>
                                  </div>
                                </div>
                              </div>


                        <div class="modal fade" id="editarCat{{$cats->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="title">Cadastro de Categorias</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <div class="modal-body">
                                    <form action="/categorias/edit/{{$cats->id}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">ID: </label>
                                                <input type="text" class="form-control" id="idCat" name="idCat" value="{{$cats->id}}" disabled>
                                                <label for="recipient-name" class="col-form-label">Nome Categoria:</label>
                                             <input type="text" class="form-control" id="nomeCat" name="nomeCat" value="{{$cats->nome}}">
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


<div class="modal fade" id="cadastrarCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="title">Cadastro de Categorias</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/categorias" method="POST">
                @csrf
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nome Categoria:</label>
                  <input type="text" class="form-control" id="nomeCat" name="nomeCat">
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
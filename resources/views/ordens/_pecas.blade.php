<div class="card ">
  <div class="card-body">
    <?php
        $itemPeca = old('pecas', isset($pedido) ? $pedido->pecas : [[]]);
    ?>
    <div class="pecas">
    <h3>Peca(s)</h3>
        @foreach ($itemPeca as $key => $pec)
        <div class="row peca ">
            <hr>
            <div class="col-lg-8 col-md-6 form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="material-icons">Peças</i></span>
                    </div>
                
                    <select name="pecas[{{$key}}][peca_id]" data-max="10" required class="form-control select">
                        <option value="" {{isset($pedido) ? '' : 'selected'}} disabled>Selecione um peca</option>
                        @foreach($pecas as $peca)   
                            <option 
                            data-quantidade="{{$peca->quantidade}}"
                            value="{{$peca->id}}" {{ (array_key_exists('peca_id', $pec) ? $pec['peca_id'] : (isset($pec->pivot) ? $pec['pivot']['peca_id'] : '')) == $peca->id ? 'selected' : '' }}
                            >
                            {{$peca->nome}} | {{$peca->valorVenda}}
                            </option>
                        @endforeach          
                    </select>  
                    <span class="mensagem-erro">{{$errors->first('pecas.'.$key.'.peca_id')}}</span>
                            
                </div>
            </div>
            <div class="col-lg-3 col-md-5 form-group">
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" class="input-group-text menos">-</button>
                    </div>
                    <input 
                        type="text" 
                        required 
                        class="form-control quantidade text-center" 
                        value="{{array_key_exists('quantidade', $pec) ? $pec['quantidade'] : (isset($pec->pivot) ? $pec['pivot']['quantidade'] : 1)}}"  
                        name="pecas[{{$key}}][quantidade]" 
                        placeholder="Quantidade"
                        readonly
                    >
                    <div class="input-group-btn">
                        <button type="button"class="input-group-text mais">+</button>
                    </div>
                    <span class="mensagem-erro">{{$errors->first('pecas.'.$key.'.quantidade')}}</span>
                </div>                 
            </div>
            <div class="col-lg-1 col-sm-12 form-group {{(isset($pedido) ? count($itemPeca) : '') > 1 ? '' : 'd-none'}}">
                <button type="button" class="btn btn-danger btn-block excluir-peca"><strong>X</strong></button>
            </div>
            <hr>
        </div>
        @endforeach
    </div>
    <div class="text-center">
        <button type="button" id="adicionar-peca" class="btn btn-primary"><strong>+</strong></button>
    </div>

  </div>
</div>
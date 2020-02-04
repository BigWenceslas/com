@extends('template')

@section('titre')
    Résiliations
@endsection

@section('contenu')

 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Formulaire d'enregistrement des <em>Résiliations</em></h3>
              </div>
                 @if ($etat == 'editer')
               {!! Form::open(['route' => ['resiliations.update', $resiliation->id], 'method' => 'put', 'role' => 'form', 'files' => true]) !!}
              
                <div class="card-body">

               @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
                  <div class="form-group">
                    <label for="numero">Numéro</label>
                    <input required="" value="{{$resiliation->numero}}" type="text" class="form-control" id="numero" name="numero" placeholder="numero">
                  </div>
                  <div class="form-group">
                    <label for="raison">Raison</label>
                    <input required="" type="text" value="{{$resiliation->raison}}" class="form-control" id="raison" name="raison" placeholder="Raison">
                  </div>


                <div class="form-group">
                    <label for="date">Date</label>
                    <input required="" type="date" value="{{$resiliation->date}}" class="form-control" id="date" name="date" placeholder="Date">
                  </div>

                   <div class="form-group">
                    <label for="prenom">Equipe</label>
                    <select name="equipe" id="equipe" class="form-control">
                       @foreach($equipes as $d)
                        <option @if($resiliation->equipe->id == $d->id) selected @endif value="{{ $d->id }}">{{ $d->libelle }}</option>
                        @endforeach
                    </select>
                  </div>
                  </div>
             
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
             </form>
              @elseif ($etat == 'liste')
                 <form method="PUT" action="{{route('resiliations.create')}}">
              
                {{ csrf_field() }}
                <div class="card-body">
                  @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
             
                    <div class="form-group">
                    <label for="numero">Numéro</label>
                    <input required="" type="text" class="form-control" id="numero" name="numero" placeholder="numero">
                  </div>
                  <div class="form-group">
                    <label for="raison">Raison</label>
                    <input required="" type="text" class="form-control" id="raison" name="raison" placeholder="Raison">
                  </div>


                <div class="form-group">
                    <label for="date">Date</label>
                    <input required="" type="date" class="form-control" id="date" name="date" placeholder="Date">
                  </div>


                   <div class="form-group">
                    <label for="prenom">Equipe</label>
                    <select name="equipe" id="equipe" class="form-control">
                       @foreach($equipes as $d)
                        <option value="{{ $d->id }}">{{ $d->libelle }}</option>
                        @endforeach
                    </select>
                  </div>
                  </div>
             
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
             </form>
              @endif
               
            </div>

          </div>
        

 <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Liste des <em>Résiliations</em></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Equipe</th>
                  <th>Numéro</th>
                  <th>Raison</th>
                  <th>Date</th>
                  <th>Modifier</th>
                  <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>
                   @foreach($resiliations as $p)
                <tr>
                  <td>{{$p->equipe->libelle}}</td>
                  <td>{{$p->numero}}</td>
                  <td>{{$p->raison}}</td>
                  <td>{{$p->date}}</td>
                  <td><a href="{{ route('resiliations.edit', $p->id) }}" class ='btn btn-warning'> Modifier</a></td>
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['resiliations.destroy', $p->id]]) !!}
                                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger', 'onclick' => 'return confirm(\'Vraiment supprimer cet enregistrement ?\')']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                </tr>
                   @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Equipe</th>
                  <th>Numéro</th>
                  <th>Raison</th>
                  <th>Date</th>
                  <th>Modifier</th>
                  <th>Supprimer</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
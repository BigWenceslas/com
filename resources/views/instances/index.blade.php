@extends('template')

@section('titre')
    Personnels
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
                <h3 class="card-title">Formulaire d'enregistrement de Personnels</h3>
              </div>
                 @if ($etat == 'editer')
               {!! Form::open(['route' => ['personnels.update', $personnel->id], 'method' => 'put', 'role' => 'form', 'files' => true]) !!}
              
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
                    <label for="nom">Nom</label>
                    <input required="" value="{{$personnel->nom}}" type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                  </div>
                  <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input required="" type="text" value="{{$personnel->nom}}" class="form-control" id="prenom" name="prenom" placeholder="Prenom">
                  </div>
                   <div class="form-group">
                    <label for="prenom">Equipe</label>
                    <select name="equipe" id="equipe" class="form-control">
                       @foreach($equipes as $d)
                        <option @if($personnel->equipe->id == $d->id) selected @endif value="{{ $d->id }}">{{ $d->libelle }}</option>
                        @endforeach
                    </select>
                  </div>
                  </div>
             
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
             </form>
              @elseif ($etat == 'liste')
                 <form method="PUT" action="{{route('personnels.create')}}">
              
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
                    <label for="nom">Nom</label>
                    <input required="" type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                  </div>
                  <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input required="" type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom">
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
              <h3 class="card-title">Liste du personnel</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Equipe</th>
                  <th>Modifier</th>
                  <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>
                   @foreach($personnels as $p)
                <tr>
                  <td>{{$p->nom}}</td>
                  <td>{{$p->prenom}}</td>
                  <td>{{$p->equipe->libelle}}</td>
                  <td><a href="{{ route('personnels.edit', $p->id) }}" class ='btn btn-warning'> Modifier</a></td>
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['personnels.destroy', $p->id]]) !!}
                                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger', 'onclick' => 'return confirm(\'Vraiment supprimer cet enregistrement ?\')']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                </tr>
                   @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Photo</th>
                  <th>Nomr</th>
                  <th>Prenom</th>
                  <td>Modifier</td>
                  <td>Supprimer</td>
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
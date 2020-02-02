@extends('template')

@section('titre')
    Etudes
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
                <h3 class="card-title">Formulaire d'enregistrement des Etudes</h3>
              </div>
                 @if ($etat == 'editer')
               {!! Form::open(['route' => ['etudes.update', $etude->id], 'method' => 'put', 'role' => 'form', 'files' => true]) !!}
              
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
                    <label for="nom">libelle</label>
                    <input required="" value="{{$etude->libelle}}" type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                  </div>
                  <div class="form-group">
                    <label for="prenom">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">  </option>
                    </select>
                  </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input required="" type="text" value="{{$etude->date}}" class="form-control" id="date" name="date" placeholder="Date">
                  </div>

                   <div class="form-group">
                    <label for="prenom">Equipe</label>
                    <select name="equipe" id="equipe" class="form-control">
                       @foreach($equipes as $d)
                        <option @if($etudes->equipe->id == $d->id) selected @endif value="{{ $d->id }}">{{ $d->libelle }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
             
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
             </form>
              @elseif ($etat == 'liste')
                 <form method="PUT" action="{{route('etudes.create')}}">
              
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
                    <label for="nom">libelle</label>
                    <input required="" value="" type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                  </div>
                  <div class="form-group">
                    <label for="prenom">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="Type1"> Type1 </option>
                        <option value="Type2"> Type2 </option>
                        <option value="Type3"> Type3 </option>
                        <option value="Type4"> Type4 </option>
                    </select>
                  </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input required="" type="text" class="form-control" id="date" name="date" placeholder="Date">
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
              <h3 class="card-title">Liste des etudes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Equipe</th>
                  <th>Libelle Etude</th>
                  <th>Type</th>
                  <th>Date</th>
                  <th>Modifier</th>
                  <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>
                   @foreach($etudes as $p)
                <tr>
                  <td>{{$p->equipe->libelle}}</td>
                  <td>{{$p->libelle}}</td>
                  <td>{{$p->type}}</td>
                  <td>{{$p->date}}</td>
                  <td><a href="{{ route('etudes.edit', $p->id) }}" class ='btn btn-warning'> Modifier</a></td>
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['etudes.destroy', $p->id]]) !!}
                                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger', 'onclick' => 'return confirm(\'Vraiment supprimer cet enregistrement ?\')']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                </tr>
                   @endforeach
                </tbody>
                <tfoot>
                <tr>
                   <th>Equipe</th>
                  <th>Libelle Etude</th>
                  <th>Type</th>
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

@section('javascripts') 

@endsection
@extends('template')

@section('titre')
    Equipes
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
                <h3 class="card-title">Formulaire d'enregistrement des Equipes</h3>
              </div>
              @if ($etat == 'editer')
               {!! Form::open(['route' => ['equipes.update', $equipe->id], 'method' => 'put', 'role' => 'form', 'files' => true]) !!}
              
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
                    <label for="nom">Libelle</label>
                    <input required="" value="{{$equipe->libelle}}" type="text" class="form-control" id="libelle" name="libelle" placeholder="libelle Equipe">
                  </div>
                </div>
             
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
             </form>
              @elseif ($etat == 'liste')
                <form method="PUT" action="{{route('equipes.create')}}">
                  {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="nom">Libelle</label>
                    <input required="" type="text" class="form-control" id="libelle" name="libelle" placeholder="libelle Equipe">
                  </div>
                 
                </div>
             
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
             {!! Form::close() !!}
              @endif
                
            </div>

          </div>
        

 <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Liste des Equipes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Libelle</th>
                  <th>Nombre de membres</th>
                  <th>Modifier</th>
                  <th>Supprimer</th>
                </tr>
                </thead>
                <tbody>
                  <!-- {{dump($equipes)}} -->
                   @foreach($equipes as $p)
                <tr>
                  <td>{{$p->libelle}}</td>
                  <td>{{count($p->personnels)}}</td>
                  <td><a href="{{ route('equipes.edit', $p->id) }}" class ='btn btn-warning'> Modifier</a></td>
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['equipes.destroy', $p->id]]) !!}
                                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger', 'onclick' => 'return confirm(\'Vraiment supprimer cet enregistrement ?\')']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                </tr>
                   @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Libelle</th>
                  <th>Nombre de membres</th>
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
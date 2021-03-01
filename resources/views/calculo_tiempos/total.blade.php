@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
    <h1>HORAS TOTALES</h1>
@endsection


@section('main-content')

<div class="col-sm-6">
    <h1>HORAS TOTALES</h1>


    <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                

                @foreach ($consulta2 as $itemconsulta2)
                    
                
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Cedula</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-5 col-form-label">{{ $itemconsulta2->cedula }}</label>
                    </div>
                </div>      
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Nombre</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-5 col-form-label">{{ $itemconsulta2->nombre }}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Apellido</label>
                    <div class="col-sm-6">
                        <label for="staticEmail" class="col-sm-5 col-form-label">{{ $itemconsulta2->apellido }}</label>
                    </div>
                </div>
                @endforeach


                @foreach ($consulta as $itemconsulta2)
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">HORAS TOTALES TRABAJADAS</label>
                    <div class="col-sm-6">
                        <input type="input" class="form-control" name="date" value="{{$itemconsulta2->tiempo_trabajado}}" readonly>
                    </div>
                </div>
                @endforeach
                

                @foreach ($consulta4 as $itemconsulta4)
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">DIAS TOTALES TRABAJADOS</label>
                    <div class="col-sm-6">
                        <input type="input" class="form-control" name="date" value="{{$itemconsulta4->num_dias}} DIAS" readonly>
                    </div>
                </div>
                @endforeach
                

                @foreach ($consulta3 as $itemconsulta3)
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">ATRASOS</label>
                    <div class="col-sm-6">
                        <input type="input" class="form-control" name="date" value="{{$itemconsulta3->retraso_trabajado}}" readonly>
                    </div>
                </div>
                @endforeach
                
                
                


            </li>

          </ul>

          
        </div>
      </div>
    </div>
<div class="col-sm-6">

      <h1>PERMISOS TOTALES</h1>


      <div class="card text-center">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                  
                  
                       
                  
                  <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">HORAS TOTALES DE PERMISOS</label>
                      <div class="col-sm-6">
                      @foreach ($consulta7 as $itemconsulta7)
                          <input type="input" class="form-control" name="date" value="{{$itemconsulta7->tiempo_permiso}}" readonly>
                          @endforeach
                      </div>
                  </div>
                 
                  
                  <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">CANTIDAD DE PERMISOS SOLICITADOS</label>
                      <div class="col-sm-6">
                      @foreach ($consulta8 as $itemconsulta8)
                          <input type="input" class="form-control" name="date" value="{{$itemconsulta8->cantidad_permisos}}" readonly>
                          @endforeach
                      </div>
                  </div>
                

                 
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">PERMISOS APROBADOS</label>
                    <div class="col-sm-6">
                    @if($consulta5)
                        @foreach ($consulta5 as $itemconsulta5)
                            <input type="input" class="form-control" name="date" value="{{$itemconsulta5->permisos1}}" readonly>     
                        @endforeach                         
                    @else
                        <input type="input" class="form-control" name="date" value="0" readonly>
                    @endif
                      </div>
                  </div>
                  

                 
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">PERMISOS DESAPROBADOS</label>
                    <div class="col-sm-6">
                    @if($consulta6)
                        @foreach ($consulta6 as $itemconsulta6)
                            <input type="input" class="form-control" name="date" value="{{$itemconsulta6->permisos2}}" readonly> 
                        @endforeach  
                    @else
                        <input type="input" class="form-control" name="date" value="0" readonly> 
                    @endif
                    
                    </div>
                </div>
                 

                
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">PERMISOS PENDIENTES</label>
                    <div class="col-sm-6">
                        @if($consulta9)
                            @foreach ($consulta9 as $itemconsulta9)
                                <input type="input" class="form-control" name="date" value="{{$itemconsulta9->permisos3}}" readonly>   
                            @endforeach  
                        @else  
                            <input type="input" class="form-control" name="date" value="0" readonly>   
                        @endif
                    </div>
                  </div>
                 
                
            

              </li>
  
            </ul>
          </div>
        </div>

    </div>











@endsection


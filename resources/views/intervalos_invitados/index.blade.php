@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection

<section id="main-content">
    <div class="col-md-12 row center-xs panel-heading ">
        <div class="col-xs-12">

            {!!link_to_route('IntervalosInvitados.create', 'Agregar nuevo intervalo', $invitado->id,['class'=>'btn btn-info btn-block btn-3d'])!!}
        </div>
    </div>

    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

        <thead>
            <tr>
                <th>Fecha</th>
                <th>Targeta_rfid</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Puertas</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invitado->intervalos as $intervalo)
                <tr>
                    <td>{{$intervalo->fecha}}</td>
                    <td>{{$intervalo->targeta_rfid}}</td>
                    <td>{{$intervalo->desde}}</td>
                    <td>{{$intervalo->hasta}}</td>
                    <th>{!!link_to_route('IntervalosInvitados.show', $title = 'ver', $parameters = $intervalo, $attributes = ['class'=>'btn btn-primary'])!!}</th>
                    <?php
                        $hoy = \Carbon\Carbon::now();
                        $fecha_del_intervalo_desde = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $intervalo->fecha.' '.$intervalo->desde);
                        $fecha_del_intervalo_hasta = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $intervalo->fecha.' '.$intervalo->hasta);
                        $editable= false;
                        $concluible=false;
                        if (!($hoy->diffInMinutes($fecha_del_intervalo_hasta,false ) < 0)){
                            $editable = true;
                        }
                        if ($hoy->diffInMinutes($fecha_del_intervalo_desde,false )*$hoy->diffInMinutes($fecha_del_intervalo_hasta,false) < 0){
                            $concluible=true;
                        }

                    ?>
                    @if($concluible)
                        <th>
                        {!!link_to_route('IntervalosInvitados.concluir', $title = 'Concluir', $parameters = $intervalo, $attributes = ['class'=>'btn btn-info'])!!}
                        </th>

                    @elseif($editable)
                        <th>
                            {!!Form::open(['route'=>['IntervalosInvitados.destroy',$intervalo], 'method'=>'DELETE'])!!}
                            {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                            {!!Form::close()!!}
                        </th>

                    @else

                        <th>
                            {!!Form::submit('Eliminar',['class'=>'btn btn-default'])!!}
                        </th>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

</section>

@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('assets/plugins/dataTables/js/jquery.dataTables.js') !!}
    {!! Html::script('assets/plugins/dataTables/js/dataTables.bootstrap.js') !!}
    <script>
        $(document).ready(function() {
            $('#example').dataTable();
        });
    </script>
@endsection
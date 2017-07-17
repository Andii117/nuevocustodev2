<div class="form-group">
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                             <div class="form-group">
                                 {!!Form::button('TOMAR_FOTO',['class'=>'btn btn-primary'])!!}
                              </div>
                            <br><br>
                            <div class="form-group">
                                <div class="col-sm-3">
                                {!!Form::label('nombre','NOMBRE:')!!}
                                </div>
                                <div class="col-sm-9">
                                {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <div class="col-sm-3">
                                   {!!Form::label('apellido','APELLIDO:')!!}
                                </div>
                                <div class="col-sm-9">
                                    {!!Form::text('apelido',null,['class'=>'form-control','placeholder'=>'Ingresa el Apellido del usuario'])!!}
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                               <div class="col-sm-3">
                                   {!!Form::label('cedula','CEDULA:')!!}
                               </div>
                               <div class="col-sm-9">
                                   {!!Form::number('cedula',null,['class'=>'form-control','placeholder'=>'Ingresa el Cedula del usuario'])!!}
                               </div>
                            </div>
                        <br><br>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    {!!Form::label('celular','CELULAR:')!!}
                                </div>
                                <div class="col-sm-9">
                                    {!!Form::number('celular',null,['class'=>'form-control','placeholder'=>'Ingresa el Numero de Celular del usuario'])!!}
                                </div>
                                </div>
                        <br><br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">FECHA DE NACIMIENTO:</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" name="fecha_nacimiento" required="" placeholder="DD/MM/YYYY">
                                        </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                <div class="col-sm-3">
                                    {!!Form::label('email','E-MAIL:')!!}
                                </div>
                                <div class="col-sm-9">
                                {!!Form::text('correo',null,['class'=>'form-control','placeholder'=>'Ingresa el E-mail del usuario'])!!}
                                </div>
                                </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('rfid','RFID:')!!}
                            </div>
                            <div class="col-sm-6">
                                {!!Form::text('tarjeta_rfid',null,['class'=>'form-control','placeholder'=>'Ingresa el Numero de RFID del usuario'])!!}
                            </div>
                            <div class="col-sm-3">
                                {!!Form::submit('GENERAR',['class'=>'btn btn-primary'])!!}
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!!Form::label('cargo','CARGO:')!!}
                            </div>
                            <div class="col-sm-9">
                                <select class="form-control">
                                    @foreach($cargos as $cargo)
                                        <option>{{$cargo->nombre}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <br><br>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-6">
                                    <div class="radio">
                                        {{ Form::radio('asignar_horario_nomal', 0, false)}}<label>Asignar Horario Asignado al Cargo</label>
                                    </div>
                                    <div class="radio">
                                        {{ Form::radio('asignar_horario_especial', 0,false)}}<label>Asignar Horario Especial</label>
                                     </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>


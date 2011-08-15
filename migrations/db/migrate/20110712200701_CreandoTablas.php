<?php

class CreandoTablas extends Ruckusing_BaseMigration {

    public function up() {
        $propiedades = $this->create_table('propiedades');
        $propiedades->column('direccion', 'string');
        $propiedades->column('precio_venta', 'float');
        $propiedades->column('precio_venta_dolares', 'boolean');
        $propiedades->column('precio_alquiler', 'float');
        $propiedades->column('precio_alquiler_dolares', 'boolean');
        $propiedades->column('sector', 'string', array('limit' => 40));
        $propiedades->column('coordenadas', 'string', array('limit' => 100));
        $propiedades->column('visitas', 'integer');
        $propiedades->column('habitaciones', 'integer', array('limit' => 3));
        $propiedades->column('banos', 'integer', array('limit' => 3));
        $propiedades->column('salas', 'integer', array('limit' => 3));
        $propiedades->column('cocinas', 'integer', array('limit' => 3));
        $propiedades->column('parqueos', 'integer', array('limit' => 3));
        $propiedades->column('terreno', 'float');
        $propiedades->column('construccion', 'float');
        $propiedades->column('niveles', 'integer', array('limit' => 3));



        $usuarios = $this->create_table('usuarios');
        $usuarios->column('nombre', 'string', array('limit' => 20));
        $usuarios->column('apellido', 'string', array('limit' => 20));
        $usuarios->column('email', 'string', array('limit' => 30));
        $usuarios->column('clave', 'string', array('limit' => 40));
        $usuarios->column('pagina_web', 'string', array('limit' => 30));
        $usuarios->column('descripcion', 'string', array('limit' => 100));
        $usuarios->column('foto', 'string', array('limit' => 100, 'default' => '/images/usuarios/defaultUserPicture.png'));

        $archivos = $this->create_table('archivos');
        $archivos->column('ruta', 'string');



        $tipo_usuarios = $this->create_table('tipos_usuarios');
        $tipo_usuarios->column('nombre', 'string', array('limit' => 20));
        $tipo_usuarios->column('descripcion', 'string', array('limit' => 50));


        $tipos_usuarios_usuarios = $this->create_table('tipos_usuarios_usuarios');
        $tipos_usuarios_usuarios->column('tipo_usuario_id', 'integer');
        $tipos_usuarios_usuarios->column('usuario_id', 'integer');

        $tipos_propiedades = $this->create_table('tipos_propiedades');
        $tipos_propiedades->column('nombre', 'string', array('limit' => 20));
        $tipos_propiedades->column('descripcion', 'string', array('limit' => 40));


        $propiedades_usuarios = $this->create_table('propiedades_usuarios');
        $propiedades_usuarios->column('propiedad_id', 'integer');
        $propiedades_usuarios->column('usuario_id', 'integer');


        $estados_propiedades = $this->create_table('estados_propiedades');
        $estados_propiedades->column('nombre', 'string', array('limit' => 20));
        $estados_propiedades->column('descripcion', 'string', array('limit' => 40));


        $propiedades_tipos_propiedades = $this->create_table('propiedades_tipos_propiedades');
        $propiedades_tipos_propiedades->column('propiedad_id', 'integer');
        $propiedades_tipos_propiedades->column('tipo_propiedad_id', 'integer');

        $estados_propiedades_propiedades = $this->create_table('estados_propiedades_propiedades');
        $estados_propiedades_propiedades->column('estado_propiedad_id', 'integer');
        $estados_propiedades_propiedades->column('propiedad_id', 'integer');

        $tipos_archivos = $this->create_table('tipos_archivos');
        $tipos_archivos->column('nombre', 'string', array('limit' => 20));
        $tipos_archivos->column('descripcion', 'string', array('limit' => 40));

        $archivos_tipos_archivos = $this->create_table('archivos_tipos_archivos');
        $archivos_tipos_archivos->column('tipo_archivo_id', 'integer');
        $archivos_tipos_archivos->column('archivo_id', 'integer');

        $caracteristicas_propiedades = $this->create_table('caracteristicas_propiedades');
        $caracteristicas_propiedades->column('nombre', 'string', array('limit' => 30));
        $caracteristicas_propiedades->column('descripcion', 'string', array('limit' => 40));

        $caracteristicas_propiedades_propiedades = $this->create_table('caracteristicas_propiedades_propiedades');
        $caracteristicas_propiedades_propiedades->column('caracteristica_propiedad_id', 'integer');
        $caracteristicas_propiedades_propiedades->column('propiedad_id', 'integer');

        $propiedades->finish();
        $usuarios->finish();
        $archivos->finish();
        $tipo_usuarios->finish();
        $tipos_usuarios_usuarios->finish();
        $tipos_propiedades->finish();
        $propiedades_usuarios->finish();
        $estados_propiedades->finish();
        $propiedades_tipos_propiedades->finish();
        $estados_propiedades_propiedades->finish();
        $tipos_archivos->finish();
        $archivos_tipos_archivos->finish();
        $caracteristicas_propiedades->finish();
        $caracteristicas_propiedades_propiedades->finish();
    }

//up()

    public function down() {
        $this->drop_table('propiedades');
        $this->drop_table('usuarios');
        $this->drop_table('archivos');
        $this->drop_table('tipos_usuarios');
        $this->drop_table('tipos_usuarios_usuarios');
        $this->drop_table('tipos_propiedades');
        $this->drop_table('propiedades_usuarios');
        $this->drop_table('estados_propiedades');
        $this->drop_table('propiedades_tipos_propiedades');
        $this->drop_table('estados_propiedades_propiedades');
        $this->drop_table('tipos_archivos');
        $this->drop_table('archivos_tipos_archivos');
        $this->drop_table('caracteristicas_propiedades');
        $this->drop_table('caracteristicas_propiedades_propiedades');
    }

//down()
}

?>

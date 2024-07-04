<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start">
      <div class="flex flex-wrap items-start justify-end ">

        <router-link to="/admin/works"
          class="inline-flex px-5 py-3 text-white bg-red-400 hover:bg-red-700 focus:bg-red-800 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-rotate-left" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>
          Devolver
        </router-link>



      </div>
    </div>
    <div class="mr-6">
      <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Completar orden de trabajo</h1>
    </div>
    <!-- TABLE DATA -->
    <div class="flex ml-5">
      <el-form
        :model="form"
        label-width="auto"
        style="max-width: 100%"
        :label-position="'top'"
        ref="formRef"
        :rules="rules">
        <!-- DATOS DE LA FILA DE CLIENTES -->
        <p>Cliente</p>
        <div class="flex">
          <el-form-item prop="name" label="Nombre del cliente:" class="px-2">
            <el-input v-model="form.name" class="px-1" style="width: 220px;"
              disabled/>
          </el-form-item>
          <el-form-item prop="lastname1" label="Apellido paterno:" class="px-2">
            <el-input v-model="form.lastname1" class="px-1" style="width: 220px;"
              disabled/>
          </el-form-item>
          <el-form-item prop="lastname2" label="Apellido materno:" class="px-2">
            <el-input v-model="form.lastname2" class="px-1" style="width: 220px;"
              disabled/>
          </el-form-item>
          <el-form-item prop="tradename" label="Nombre comercial:" class="px-2">
            <el-input v-model="form.tradename" class="px-1" style="width: 220px;"
              disabled/>
          </el-form-item>
        </div>
        <!-- FILA DE LOS EMPLEADOS (RESPONSABLE Y AYUDANTE) -->
        <p>Empleados</p>
        <div class="flex" style="width:100%;">
          <el-form-item prop="responsable" class="px-2" label="Responsable" >
            <el-select v-model="form.responsable" placeholder="Selecciona el fumigador" style="width: 220px">
              <el-option label="Juan" value="juan" />
              <el-option label="Pepe" value="pepe" />
              <el-option label="Jesus" value="jesus" />
            </el-select>
          </el-form-item>
          <el-form-item prop="ayudante" class="px-2" label="Ayudante" >
            <el-select v-model="form.ayudante" placeholder="Selecciona el fumigador" style="width: 220px">
              <el-option label="Juan" value="juan" />
              <el-option label="Pepe" value="pepe" />
              <el-option label="Jesus" value="jesus" />
            </el-select>
          </el-form-item>
        </div>
        <!-- FILA DE LOS PRODUCTOS (INTERNOS) -->
        <p>Productos internos</p>
        <div class="flex" style="width:100%;">
          <el-form-item prop="productoInt1" class="px-2" label="Producto interno #1" >
            <el-select v-model="form.productoInt1" placeholder="Selecciona el producto" style="width: 220px">
              <el-option label="Sipermetrina" value="Sipermetrina" />
              <el-option label="Alpha Sipermetrina" value="Alpha Sipermetrina" />
              <el-option label="Deltametrina" value="Deltametrina" />
              <el-option label="Cuaternario de amonio" value="Cuaternario de amonio" />
              <el-option label="Piretrina natural" value="Piretrina natural" />
              <el-option label="Carbendamezin" value="Carbendamezin" />
              <el-option label="Cumin pasta" value="Cumin pasta" />
              <el-option label="Siege" value="Siege" />
            </el-select>
          </el-form-item>
          <el-form-item prop="productoInt2" class="px-2" label="Producto interno #2" >
            <el-select v-model="form.productoInt2" placeholder="Selecciona el producto" style="width: 220px">
              <el-option label="Sipermetrina" value="Sipermetrina" />
              <el-option label="Alpha Sipermetrina" value="Alpha Sipermetrina" />
              <el-option label="Deltametrina" value="Deltametrina" />
              <el-option label="Cuaternario de amonio" value="Cuaternario de amonio" />
              <el-option label="Piretrina natural" value="Piretrina natural" />
              <el-option label="Carbendamezin" value="Carbendamezin" />
              <el-option label="Cumin pasta" value="Cumin pasta" />
              <el-option label="Siege" value="Siege" />
            </el-select>
          </el-form-item>
        </div>
        <!-- FILA DE LOS PRODUCTOS (EXTERNOS) -->
        <p>Productos externos</p>
        <div class="flex" style="width:100%;">
          <el-form-item prop="productoExt1" class="px-2" label="Producto externo #1" >
            <el-select v-model="form.productoExt1" placeholder="Selecciona el producto" style="width: 220px">
              <el-option label="Sipermetrina" value="Sipermetrina" />
              <el-option label="Alpha Sipermetrina" value="Alpha Sipermetrina" />
              <el-option label="Deltametrina" value="Deltametrina" />
              <el-option label="Cuaternario de amonio" value="Cuaternario de amonio" />
              <el-option label="Piretrina natural" value="Piretrina natural" />
              <el-option label="Carbendamezin" value="Carbendamezin" />
              <el-option label="Cumin pasta" value="Cumin pasta" />
              <el-option label="Siege" value="Siege" />
            </el-select>
          </el-form-item>
          <el-form-item prop="productoExt2" class="px-2" label="Producto externo #2" >
            <el-select v-model="form.productoExt2" placeholder="Selecciona el producto" style="width: 220px">
              <el-option label="Sipermetrina" value="Sipermetrina" />
              <el-option label="Alpha Sipermetrina" value="Alpha Sipermetrina" />
              <el-option label="Deltametrina" value="Deltametrina" />
              <el-option label="Cuaternario de amonio" value="Cuaternario de amonio" />
              <el-option label="Piretrina natural" value="Piretrina natural" />
              <el-option label="Carbendamezin" value="Carbendamezin" />
              <el-option label="Cumin pasta" value="Cumin pasta" />
              <el-option label="Siege" value="Siege" />
            </el-select>
          </el-form-item>
        </div>
        <!-- FILA DE RECOMENDACIONES -->
        <p>Recomendaciones</p>
        <div class="flex">
          <el-form-item prop="noTrapear" class="px-2" label="No trapear:">
            <el-col :span="11" style="width: 220px">
              <el-date-picker
                v-model="form.noTrapear"
                type="date"
                placeholder="No trapear:"
                format="DD/MM/YYYY"
                value-format="DD-MM-YYYY"
              />
            </el-col>
          </el-form-item>
          <el-form-item prop="noIngresar" class="px-7" label="No ingresar:">
            <el-col :span="11" style="width: 220px">
              <el-time-select
                v-model="form.noIngresar"
                style="width: 220px"
                start="00:00"
                step="01:00"
                end="23:59"
                format="hh:mm A"
                placeholder="Seleccionar hora"
              />
            </el-col>
          </el-form-item>
          <el-form-item prop="otraDosis" class="px-2" label="Otra dosis:">
            <el-col :span="11" style="width: 220px">
              <el-date-picker
                v-model="form.otraDosis"
                type="date"
                placeholder="Otra dosis:"
                format="DD/MM/YYYY"
                value-format="DD-MM-YYYY"
              />
            </el-col>
          </el-form-item>
          <el-form-item prop="hora" class="px-7" label="Hora:">
            <el-col :span="11" style="width: 220px">
              <el-time-select
                v-model="form.hora"
                style="width: 220px"
                start="00:00"
                step="00:15"
                end="23:59"
                format="hh:mm A"
                placeholder="Seleccionar hora"
              />
            </el-col>
          </el-form-item>
        </div>
        <!-- FILA DE REQUIERE DE -->
        <p>Requiere de:</p>
        <div class="flex">
          <el-form-item prop="requiere1" label="" class="px-10">
            <el-checkbox-group v-model="form.requiere1">
              <el-checkbox label="Nada" value="Nada"></el-checkbox>
              <el-checkbox label="Factura" value="Factura"></el-checkbox>
              <el-checkbox label="Certificado" value="Certificado"></el-checkbox>
              <el-checkbox label="Remision" value="Remision"></el-checkbox>
            </el-checkbox-group>
          </el-form-item>
        </div>
        <!-- FILA DE DATO -->
        <p>Datos:</p>
        <div class="flex">
          <el-form-item prop="requiere2" label="" class="px-10">
            <el-checkbox-group v-model="form.requiere2" label="Requiere de">
              <el-checkbox label="Credito" value="Credito"></el-checkbox>
              <el-checkbox label="Bitacora" value="Bitacora"></el-checkbox>
              <el-checkbox label="Agendar" value="Agendar"></el-checkbox>
              <el-checkbox label="Cancelar" value="Cancelar"></el-checkbox>
              <el-checkbox label="Ellos hablan" value="Ellos hablan"></el-checkbox>
            </el-checkbox-group>
          </el-form-item>
        </div>
        <!-- FILA DE PAGO -->
        <p>Pago:</p>
        <div class="flex">
          <el-form-item prop="pago" label="Se cobro:" class="px-2" style="width: 240px;">
            <el-input v-model="form.pago" class="px-1" placeholder="Ingresa el monto" type="number"/>
          </el-form-item>
          <el-form-item prop="requiere3" label="Se pago?" class="px-10">
            <el-radio-group v-model="form.requiere3">
              <el-radio value="Pagado" size="large" border>Pagado</el-radio>
              <el-radio value="No Pagado" size="large" border>No Pagado</el-radio>
            </el-radio-group>
          </el-form-item>
        </div>

        <div style="color:white; display:flex; justify-content: center; transition:10s;">
          <el-form-item>
            <el-button type="primary" @click="submitForm">Guardar</el-button>
          </el-form-item>
        </div>
      </el-form>
    </div>
    <!-- END TABLE DATA -->
  </div>

</template>

<script>
import { ElNotification } from 'element-plus';
import { useRoute } from 'vue-router';
import axios from 'axios';
export default {
  name: 'AdminCompleteWorksComponent',

  data: () => ({
    tableData: [],
    formRef: undefined,
    uploadRef: undefined,
    url: process.env.VUE_APP_ROOT_ASSETS,
    urlApi: process.env.VUE_APP_ROOT_API,
    form: {
      responsable:'',
      ayudante: 'No aplica',
      productoInt1: '',
      productoInt2: 'No aplica',
      productoExt1: '',
      productoExt2: 'No aplica',
      noTrapear: '',
      noIngresar: '',
      otraDosis: '',
      hora: '',
      pago: '',
      requiere1: [],
      requiere2: [],
      requiere3: [],
    },
    rules: {
      responsable: [
        { required: true, message: 'El responsable es requerido', trigger: 'blur' },
      ],
      productoInt1: [
        { required: true, message: 'El producto interno es requerido', trigger: 'blur' },
      ],
      productoExt1: [
        { required: true, message: 'El producto externo es requerido', trigger: 'blur' },
      ],
      noTrapear: [
        { required: true, message: 'La fecha deberia ser requerida', trigger: 'blur' },
      ],
      noIngresar: [
        { required: true, message: 'La hora deberia ser requerida', trigger: 'blur' },
      ],
      otraDosis: [
        { required: true, message: 'La fecha deberia ser requerida', trigger: 'blur' },
      ],
      hora: [
        { required: true, message: 'La hora deberia ser requerida', trigger: 'blur' },
      ],
      requiere1: [
        { required: true, message: 'Este campo es requeriado', trigger: 'blur' },
      ],
      requiere2: [
        { required: true, message: 'Este campo es requeriado', trigger: 'blur' },
      ],
      requiere3: [
        { required: true, message: 'Este campo es requeriado', trigger: 'blur' },
      ],
      pago: [
        { required: true, message: 'El pago es requerido', trigger: 'blur' },
        { min: 1, max: 10, message: 'Longitud debería ser 1 a 10', trigger: 'blur' }
      ],
    }
  }),  
  mounted() {
  this.refresh();
  const route = useRoute();
  if (route.params && route.params.id) {
    this.id = route.params.id;
    axios.get('orden/' + this.id).then(res => {
      if (res.data && res.data.data) {
        console.log(res);
        let datos = res.data.data;
        const ordenData = res.data.data;
        this.form.id_orden = ordenData.id;
        this.form.plague1 = datos.plague1;
        this.form.plague2 = datos.plague2;
        this.form.id_cliente = datos.id_cliente;
        this.form.name = datos.name;
      } else {
        console.error('Response data is undefined or null');
      }
    }).catch(error => {
      console.error('Error fetching orden data:', error);
    });

    axios.get('clientes/' + this.id).then(res => {
      if (res.data && res.data.data) {
        console.log(res);
        let datos = res.data.data;
        const clienteData = res.data.data;
        this.form.id_cliente = clienteData.id;
        this.form.name = datos.name;
        this.form.lastname1 = datos.lastname1;
        this.form.lastname2 = datos.lastname2;
        this.form.tradename = datos.tradename;
      } else {
        console.error('Response data is undefined or null');
      }
    }).catch(error => {
      console.error('Error fetching clientes data:', error);
    });
  } else {
    console.error('route.params.id is undefined');
  }
},

    
    methods: {
    errorUpload(error) {
      console.log(error);
    },
    refresh() {
      this.tableData = [];
      axios.get('orden').then(res => {
        this.tableData = res.data.data;
      })
    },
    submitForm() {
      this.$refs.formRef.validate((valid) => {
        if (valid) {
          axios.post('completarOrden', this.form)
            .then(response => {
              console.log('Form submitted successfully:', response.data);
              this.$router.push('/admin/worksComplete');
              ElNotification({
                title: 'Alerta',
                message: 'Registro insertado correctamente',
                type: 'success'
              })
            })
            .catch(error => {
              console.error('Error submitting form:', error);
              ElNotification({
                title: 'Error',
                message: 'Favor de llenar los campos',
                type: 'error'
              })
            });
        } else {
          console.log('Validation failed');
          ElNotification({
            title: 'Error',
            message: 'Favor de llenar los campos',
            type: 'error'
          });
          return false;
        }
      });
    },
  }
}
</script>
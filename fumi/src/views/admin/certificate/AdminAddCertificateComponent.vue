<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start">
      <div class="flex flex-wrap items-start justify-end">
        <router-link to="/admin/clients" class="inline-flex px-5 py-3 text-white bg-red-400 hover:bg-red-700 focus:bg-red-800 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-rotate-left" aria-hidden="true" style="margin-top: 5px; margin-left: -5px; margin-right:10px;"></i>
          Devolver
        </router-link>
      </div>
    </div>
    <div class="mr-6">
      <h1 class="py-6 px-2 text-4xl font-semibold mb-2">Creacion de certificados</h1>
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
          <el-form-item prop="name" label="Nombre del comercio:" class="px-2">
            <el-input v-model="form.tradename" class="px-1" style="width: 220px;"
              placeholder="Ingresa el nombre del comercio"
              disabled/>
          </el-form-item>
          <el-form-item prop="name" label="Nombres:" class="px-7">
            <el-input v-model="form.name" class="px-1" style="width: 220px;"
              placeholder="Ingresa sus nombres"
              disabled/>
          </el-form-item>
          <el-form-item prop="name" label="Apellido paterno:" class="px-7">
            <el-input v-model="form.lastname1" class="px-1" style="width: 220px;"
              placeholder="Ingresa su primer apellido"
              disabled/>
          </el-form-item>
          <el-form-item prop="name" label="Apellido materno:" class="px-7">
            <el-input v-model="form.lastname2" class="px-1" style="width: 220px;"
              placeholder="Ingresa su segundo apellido"
              disabled/>
          </el-form-item>
        </div>
        <!-- FILA DE LAS PLAGAS (PROBLEMATICA) -->
        <p>Problematica</p>
        <div class="flex" style="width:100%;">
          <el-form-item prop="plague1" class="px-2" label="Tipo de plaga #1" >
            <el-select v-model="form.plague1" placeholder="Selecciona la plaga" style="width: 220px">
              <el-option label="Cucarachas" value="Cucarachas" />
              <el-option label="Pulgas" value="Pulgas" />
              <el-option label="Chinches" value="Chinches" />
              <el-option label="Cucaracha de cocina" value="Cucaracha de cocina" />
              <el-option label="Garrapatas" value="Garrapatas" />
              <el-option label="Palomillas" value="Palomillas" />
              <el-option label="Roedores" value="Roedores" />
              <el-option label="Hormigas" value="Hormigas" />
            </el-select>
          </el-form-item>
          <el-form-item prop="plague2" class="px-7" label="Tipo de plaga #2">
            <el-select v-model="form.plague2" placeholder="Selecciona la plaga" style="width: 220px">
              <el-option label="Nada" value="solamente" />
              <el-option label="Cucarachas" value="Cucarachas" />
              <el-option label="Pulgas" value="Pulgas" />
              <el-option label="Chinches" value="Chinches" />
              <el-option label="Cucaracha de cocina" value="Cucaracha de cocina" />
              <el-option label="Garrapatas" value="Garrapatas" />
              <el-option label="Palomillas" value="Palomillas" />
              <el-option label="Roedores" value="Roedores" />
              <el-option label="Hormigas" value="Hormigas" />
            </el-select>
          </el-form-item>
        </div>
        <!-- FILA DE FECHAS -->
        <p>Fechas</p>
        <div class="flex">
          <el-form-item prop="date1" class="px-2" label="Fecha de orden:">
            <el-col :span="11" style="width: 220px">
              <el-date-picker
                v-model="form.date1"
                type="date"
                placeholder="Orden"
                format="DD/MM/YYYY"
                value-format="DD-MM-YYYY"
              />
            </el-col>
          </el-form-item>
          <el-form-item prop="date2" class="px-7" label="Fecha para asistir:">
            <el-col :span="11" style="width: 220px">
              <el-date-picker
                v-model="form.date2"
                type="date"
                placeholder="Orden"
                format="DD/MM/YYYY"
                value-format="DD-MM-YYYY"
              />
            </el-col>
          </el-form-item>
          <el-form-item prop="time1" class="px-7" label="De hora:">
            <el-col :span="11" style="width: 220px">
              <el-time-select
                v-model="form.time1"
                style="width: 220px"
                start="08:30"
                step="00:15"
                end="20:30"
                format="hh:mm A"
                placeholder="Seleccionar hora"
              />
            </el-col>
          </el-form-item>
          <el-form-item prop="time2" class="px-7" label="A hora:">
            <el-col :span="11" style="width: 220px">
              <el-time-select
                v-model="form.time2"
                style="width: 220px"
                start="08:30"
                step="00:15"
                end="20:30"
                format="hh:mm A"
                placeholder="Seleccionar hora"
              />
            </el-col>
          </el-form-item>
        </div>
        <!-- FILA DE TIPO DE CONTRATACION -->
        <p>Contratacion:</p>
        <div class="flex">
          <el-form-item prop="hiring" label="" class="px-10">
            <el-checkbox-group v-model="form.hiring">
              <el-checkbox label="Nada" value="Nada"></el-checkbox>
              <el-checkbox label="Presupuesto" value="Presupuesto"></el-checkbox>
              <el-checkbox label="Fumigar" value="Fumigar"></el-checkbox>
              <el-checkbox label="Garantia" value="Garantia"></el-checkbox>
              <el-checkbox label="Cortesia" value="Cortesia"></el-checkbox>
            </el-checkbox-group>
          </el-form-item>
        </div>
        <!-- FILA DE REQUIERE DE -->
        <p>Requiere de:</p>
        <div class="flex">
          <el-form-item prop="requires" label="" class="px-10">
            <el-checkbox-group v-model="form.requires" label="Requiere de">
              <el-checkbox label="Nada" value="Nada"></el-checkbox>
              <el-checkbox label="Factura" value="Factura"></el-checkbox>
              <el-checkbox label="Certificado" value="Certificado"></el-checkbox>
              <el-checkbox label="Remision" value="Remision"></el-checkbox>
            </el-checkbox-group>
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
  name: 'AdminAddWorksComponent',
  data: () => ({
    tableData: [],
    formRef: undefined,
    uploadRef: undefined,
    url: process.env.VUE_APP_ROOT_ASSETS,
    urlApi: process.env.VUE_APP_ROOT_API,
    form: {
      name: '',
      plague1: '',
      plague2: 'Nada',
      date1: '',
      date2: '',
      time1: '',
      time2: '',
      hiring: [],
      requires: [],
      infoorden_delete: 'Alta'
    },
    rules: {
      plague1: [
        { required: true, message: 'El tipo de plaga es requerida', trigger: 'blur' },
      ],
      date1: [
        { required: true, message: 'La fecha deberia ser requerida', trigger: 'blur' },
      ],
      date2: [
        { required: true, message: 'La fecha deberia ser requerida', trigger: 'blur' },
      ],
      time1: [
        { required: true, message: 'La hora deberia ser requerida', trigger: 'blur' },
      ],
      time2: [
        { required: true, message: 'La hora deberia ser requerida', trigger: 'blur' },
      ],
      hiring: [
        { required: true, message: 'La contratacion deberia ser requeriada', trigger: 'blur' },
      ],
      requires: [
        { required: true, message: 'Requiere de deberia ser requerido', trigger: 'blur' },
      ],
    }
  }),
  mounted() {
    this.refresh();
    const route = useRoute();
    this.id = route.params.id;
    axios.get('clientes/' + this.id).then(res => {
      console.log(res);
      let datos = res.data.data;
      const clienteData = res.data.data;
      this.form.id_cliente = clienteData.id;
      this.form.name = datos.name;
      this.form.lastname1 = datos.lastname1;
      this.form.lastname2 = datos.lastname2;
      this.form.tradename = datos.tradename;
    })
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
    successUpload(response) {
      console.log(response);
      this.refresh();
      this.$router.push('/admin/works');
      ElNotification({
        title: 'Alerta',
        message: 'Registro insertado correctamente',
        type: 'success'
      });
    },
    submitForm() {
      this.$refs.formRef.validate((valid, fields) => {
        if (valid) {
          console.log(fields);
          axios.post('orden', this.form).then(response => {
            this.successUpload(response);
          }).catch(error => {
            console.log(error);
            ElNotification({
              title: 'Error',
              message: 'Favor de llenar los campos',
              type: 'error'
            });
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
      })
    }
  }
}
</script>

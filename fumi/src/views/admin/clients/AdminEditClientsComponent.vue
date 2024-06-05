<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start">

      <div class="flex flex-wrap items-start justify-end ">

        <router-link to="/admin/clients"
          class="inline-flex px-5 py-3 text-white bg-red-400 hover:bg-red-700 focus:bg-red-800 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-rotate-left" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>
          Devolver
        </router-link>

      </div>

    </div>

    <div class="mr-6">
      <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Modificar cliente</h1>
    </div>


    <!-- TABLE INSERT -->
    <!-- Primera Fila -->
    <div class="flex">
      <el-form :model="form" label-width="auto" style="max-width: 100%" ref="formRef" :rules="rules"
        :label-position="'top'">

        <!--  FILA DATOS DEL CLIENTE -->
        <p class="px-5">Datos del cliente:</p>
        <div class="flex">
          <el-form-item prop="name" label="Nombres:" class="px-2" style="width: 240px;">
            <el-input v-model="form.name" class="px-1" placeholder="Ingresa sus nombres" />
          </el-form-item>
          <el-form-item prop="lastname1" label="Apellidos Paterno:" class="px-5">
            <el-input v-model="form.lastname1" class="px-1" placeholder="Ingresa su apellido paterno" />
          </el-form-item>
          <el-form-item prop="lastname2" label="Apellidos Materno:" class="px-5">
            <el-input v-model="form.lastname2" class="px-1" placeholder="Ingresa su apellido materno" />
          </el-form-item>
          <el-form-item prop="tradename" label="Nombre Comercial:" class="px-10">
            <el-input v-model="form.tradename" class="" placeholder="Ingresa el nombre del comercio" />
          </el-form-item>
        </div>

        <!-- Segunda Fila -->
        <br>
        <p class="px-5">Domicilio:</p>
        <div class="flex">
          <el-form-item prop="street" label="Tipo de calle:" class="px-2">
            <el-select v-model="form.street" placeholder="Tipo de calle" class=" px-1" style="width: 220px;">
              <el-option label="Av." value="Av." />
              <el-option label="Calle" value="Calle" />
              <el-option label="Callejón" value="Callejon" />
            </el-select>
          </el-form-item>

          <el-form-item prop="home" label="Domicilio:" class=" px-7" style="width: 350px;">
            <el-input v-model="form.home" class="px-1" placeholder="Ingresa el domicilio" />
          </el-form-item>

          <el-form-item prop="numAddress" label="Numero:" class=" px-7" style="width: 350px;">
            <el-input v-model="form.numAddress" class="px-1" placeholder="Ingresa el numero de domicilio"
              type="number" />
          </el-form-item>

          <el-form-item prop="cp" label="Codigo postal:" class="px-4">
            <el-input v-model="form.cp" class="px-1" placeholder="Ingresa el codigo postal" />
          </el-form-item>


        </div>

        <!-- Tercera Fila -->
        <div class="flex">
          <el-form-item prop="cologne" label="Colonia:" class="px-2">
            <el-select v-model="form.cologne" placeholder="Selecciona la  colonia" class="px-1" style="width: 220px;">
              <el-option label="Primera de mayo" value="primerademayo" />
              <el-option label="Madero" value="madero" />
            </el-select>
          </el-form-item>
          <el-form-item prop="id_city" label="Ciudad:" class="px-7" style="width: 350px;">
            <el-select v-model="form.id_city" placeholder="Selecciona la ciudad">
              <el-option v-for="ciudad in ciudades" :key="ciudad.id" :label="ciudad.ciudad" :value="ciudad.id" />
            </el-select>
          </el-form-item>
          <el-form-item prop="type_of_place" label="Tipo de comercio:" class="px-7" style="width: 25%">
            <el-select v-model="form.type_of_place" placeholder="Selecciona el tipo de lugar">
              <el-option label="Restaurante" value="restaurante" />
              <el-option label="Bodega" value="bodega" />
            </el-select>
          </el-form-item>
        </div>

        <!-- Datos del domicilio Fila -->
        <div class="px-5">
          <br>
          <p>Datos del domicilio:</p>
          <el-form-item prop="how_to_get" label="Como llegar:" class="pt-5 px-10">
            <el-input v-model="form.how_to_get" type="textarea" maxlength="200" show-word-limit
              placeholder="Agrega como llegar al domicilio" />
          </el-form-item>
          <el-form-item prop="description" label="Decripcion:" class="pt-4 px-10">
            <el-input v-model="form.description" type="textarea" maxlength="200" show-word-limit
              placeholder="Agrega una descripcion" />
          </el-form-item>
        </div>

        <!-- Sexta Fila -->
        <br>
        <p class="px-5">Contacto:</p>
        <div class="flex">
          <el-form-item prop="cell_phone" label="Numero de celular:" class="px-10" style="width: 25%">
            <el-input v-model="form.cell_phone" placeholder="Celular" />
          </el-form-item>
          <el-form-item prop="number_fixed_number" label="Numero fijo:" class="px-10" style="width: 25%">
            <el-input v-model="form.number_fixed_number" placeholder="Celular" />
          </el-form-item>
        </div>


        <!-- Octava fila -->
        <br>
        <p class="px-5">Contratacion:</p>
        <div class="flex">
          <el-form-item prop="recruitment_data" label="Tipo de contratacion:" class="px-10">
            <el-checkbox-group v-model="form.recruitment_data">
              <el-checkbox label="Nada" value="Nada"></el-checkbox>
              <el-checkbox label="Presupuesto" value="Presupuesto"></el-checkbox>
              <el-checkbox label="Fumigar" value="Fumigar"></el-checkbox>
              <el-checkbox label="Garantia" value="Garantia"></el-checkbox>
              <el-checkbox label="Cortesia" value="Cortesia"></el-checkbox>
            </el-checkbox-group>
          </el-form-item>
        </div>

        <div style="color:white; display:flex; justify-content: center; transition:10s;">
          <el-form-item>
            <el-button type="primary" @click="updateDatos">Modificar</el-button>
          </el-form-item>
        </div>
      </el-form>
    </div>
    <!-- END TABLE DATA -->
  </div>

</template>

<script>
import { useRoute } from 'vue-router';
import { ElNotification } from 'element-plus';
import axios from 'axios';

export default {
  name: 'AdminEditClientComponent',
  data: () => ({
    formRef: undefined,
    uploadRef: undefined,
    url: process.env.VUE_APP_ROOT_ASSETS,
    urlApi: process.env.VUE_APP_ROOT_API,
    ciudades: [],
    form: {
      name: '',
      lastname1: '',
      lastname2: '',
      tradename: '',
      street: '',
      home: '',
      numAddress: '',
      cp: '',
      cologne: '',
      id_city: '',
      type_of_place: '',
      description: '',
      how_to_get: '',
      cell_phone: '',
      number_fixed_number: 'Ninguno',
      recruitment_data: ['Nada']
    },
    id: 0,
    rules: {
      name: [
        { required: true, message: 'El nombre es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      lastname1: [
        { required: true, message: 'El apellido paterno es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      lastname2: [
        { required: true, message: 'El apellido materno es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      street: [
        { required: true, message: 'El tipo de calle es requerido', trigger: 'blur' }
      ],
      home: [
        { required: true, message: 'El domicilio es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      numAddress: [
        { required: true, message: 'El número de domicilio es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      cp: [
        { required: true, message: 'El código postal es requerido', trigger: 'blur' },
        { min: 5, max: 5, message: 'La longitud debería ser de 5 dígitos', trigger: 'blur' }
      ],
      cologne: [
        { required: true, message: 'La colonia es requerida', trigger: 'blur' }
      ],
      id_city: [
        { required: true, message: 'La ciudad es requerida', trigger: 'blur' }
      ],
      type_of_place: [
        { required: true, message: 'El tipo de comercio es requerido', trigger: 'blur' }
      ],
      description: [
        { required: true, message: 'La descripción es requerida', trigger: 'blur' },
        { min: 1, max: 200, message: 'Longitud debería ser 1 a 200', trigger: 'blur' }
      ],
      how_to_get: [
        { required: true, message: 'Cómo llegar es requerido', trigger: 'blur' },
        { min: 1, max: 200, message: 'Longitud debería ser 1 a 200', trigger: 'blur' }
      ],
      cell_phone: [
        { required: true, message: 'El número de celular es requerido', trigger: 'blur' },
        { min: 10, max: 13, message: 'Longitud debería ser 10 a 13', trigger: 'blur' }
      ],
      recruitment_data: [
        { required: true, message: 'Requiere de es requerido', trigger: 'blur' },
      ],
    }
  }),
  methods: {
    refresh() {
      this.tableData = []
      axios.get('clientes').then(res => {
        this.tableData = res.data.data
      })
    },
    successUpload(response) {
      console.log('Datos enviados:', this.form)
      console.log(response)
      this.refresh()
      axios.patch('clientes/' + this.id, this.form).then(response => {
        console.log('Form submitted successfully:', response.data)
        console.log(response)
        this.$router.push('/admin/clients');
        ElNotification({
          title: 'Alerta',
          message: 'Registro insertado correctamente',
          type: 'success'
        })
      }).catch(error => {
        console.log(error)
        ElNotification({
          title: 'Error',
          message: 'Favor de llenar los campos',
          type: 'error'
        })
      })
    },
    updateDatos() {
      this.$refs.formRef.validate((valid, fields) => {
        if (valid) {
          console.log(fields);
          this.successUpload();
        } else {
          console.log('Validation failed');
          ElNotification({
            title: 'Error',
            message: 'Favor de llenar los campos',
            type: 'error'
          })
          return false;
        }
      });
    },
    fetchCiudades() {
      axios.get('verCiudades')
        .then(response => {
          console.log('Ciudades:', response.data);
          this.ciudades = response.data;
        })
        .catch(error => {
          console.error('Error fetching ciudades:', error);
        });
    },
  },
  mounted() {
    this.refresh();
    this.fetchCiudades();
    const route = useRoute();
    this.id = route.params.id;
    axios.get(`clientes/${this.id}`).then(res => {
      console.log(res);
      let datos = res.data.data;
      if (datos) {
        this.form.name = datos.name || '';
        this.form.lastname1 = datos.lastname1 || '';
        this.form.lastname2 = datos.lastname2 || '';
        this.form.tradename = datos.tradename || '';
        this.form.street = datos.street || '';
        this.form.home = datos.home || '';
        this.form.numAddress = datos.numAddress || '';
        this.form.cp = datos.cp || '';
        this.form.cologne = datos.cologne || '';
        this.form.id_city = datos.id_city || '';
        this.form.type_of_place = datos.type_of_place || '';
        this.form.description = datos.description || '';
        this.form.how_to_get = datos.how_to_get || '';
        this.form.cell_phone = datos.cell_phone || '';
        this.form.number_fixed_number = datos.number_fixed_number || 'Ninguno';
      }
    });
  }
}
</script>

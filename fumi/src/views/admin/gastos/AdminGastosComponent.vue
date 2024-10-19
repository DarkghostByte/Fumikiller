<template>
  <div>
    <div class="mr-6">
      <h1 class="py-6 px-5 text-4xl font-semibold mb-2">Caja</h1>
    </div>

    <div class="container mx-auto">
      <div class="mb-4 centerFiltros">
        <el-date-picker class="mx-2" v-model="selectedDate" @change="filterData" type="date" format="DD-MM-YYYY"
          value-format="DD-MM-YYYY" placeholder="Seleccionar fecha" style="width: 25%;" />
        <el-date-picker class="mx-2" v-model="selectedDate1" @change="filterData1" type="date" format="DD-MM-YYYY"
          value-format="DD-MM-YYYY" placeholder="Seleccionar fecha" style="width: 25%;" />
        <el-input class="px-2" placeholder="Buscar" v-model="searchQueryName" @input="filterDataName"
          style="width: 25%;" />
        <el-input class="px-2" placeholder="Buscar" v-model="searchQueryAddress" @input="filterDataAddress"
          style="width: 25%;" />

      </div>
    </div>


    <div class="flex flex-wrap items-center justify-center mt-6">
      <router-link to="/admin/admin/city"
        class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-blue-600 hover:bg-blue-1000 focus:bg-blue-900 rounded-md ml-6 mb-5 shadow-lg justify-center items-center"
        style="width:300px; height:100px; font-size:26px; text-align: center;">
        <div class="row">
          <h3 class="txtH3" style="font-size:32px; margin-bottom:-15px;">$ {{ totalIngresos }}</h3>
          <h2>Ingresos</h2>
        </div>
        <i class="fa-solid fa-solid fa-money-bill-trend-up fa-rotate-by fa-2xl" aria-hidden="true"
          style="margin-left: 215px; position:absolute; color: rgba(0, 0, 0, 0.20); --fa-rotate-angle: -30deg;"></i>
      </router-link>

      <router-link to="/admin/admin/city"
        class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-green-600 hover:bg-green-1000 focus:bg-green-900 rounded-md ml-6 mb-5 shadow-lg justify-center items-center"
        style="width:300px; height:100px; font-size:26px; text-align: center;">
        <div class="row">
          <h3 class="txtH3" style="font-size:32px; margin-bottom:-15px;">$ {{ totalEgresos }}</h3>
          <h2>Egresos</h2>
        </div>
        <i class="fa-solid fa-money-bill fa-rotate-by fa-2xl" aria-hidden="true"
          style="margin-left: 215px; position:absolute; color: rgba(0, 0, 0, 0.20); --fa-rotate-angle: -30deg;"></i>

      </router-link>

      <router-link to="/admin/admin/city"
        class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-orange-600 hover:bg-orange-1000 focus:bg-orange-900 rounded-md ml-6 mb-5 shadow-lg justify-center items-center"
        style="width:300px; height:100px; font-size:26px; text-align: center;">
        <div class="row">
          <h3 class="txtH3" style="font-size:32px; margin-bottom:-15px;">$ {{ totalSaldo }}</h3>
          <h2>Saldo</h2>
        </div>
        <i class="fa-solid fa-cash-register fa-rotate-by fa-2xl" aria-hidden="true"
          style="margin-left: 215px; position:absolute; color: rgba(0, 0, 0, 0.20); --fa-rotate-angle: -30deg;"></i>
      </router-link>
    </div>

    <div class="table-container mt-2" style="width:100%;">
      <div class="flex items-start justify-center">
        <div class="mx-6 row">
          <div class="flex mb-2 items-center justify-center">
            <h1 class="txtH1">Resumen Ingresos</h1>
            <el-button @click="dialogVisibleCreate = true" class="ml-2 el-button el-button--primary">
              <i class="fa-solid fa-solid fa-money-bill-trend-up" aria-hidden="true"
                style="margin-left: -5px; margin-right:5px;"></i>
              Insertar Ingreso
            </el-button>
          </div>
          <div class="flex">
            <el-table :data="tableData1" :default-sort="{ prop: 'id', order: 'ascending' }" stripe
              style="width:100%;">
              <el-table-column label="Fecha" prop="dateIngreso" width="150px" sortable />
              <el-table-column label="Descripcion" prop="descriptionIngreso" width="300px" sortable />
              <el-table-column label="Monto" prop="montoIngreso" width="150px" sortable />
            </el-table>
          </div>
          <div class="flex">
            <el-table :data="tableData3" :default-sort="{ prop: 'id', order: 'ascending' }" stripe
              style="width:100%;">
              <el-table-column prop="date1" width="150px"  />
              <el-table-column label="Parte de Fumigaciones" width="300px">
                <template #default>
                  {{ 'Fumigacion'}}
                </template>
              </el-table-column>
              <el-table-column prop="pago" width="150px"  />
            </el-table>
          </div>
        </div>

        <div class="mx-6 row">
          <div class="flex mb-2 items-start justify-center">
            <h1 class="txtH1">Resumen Egresos</h1>
            <el-button @click="dialogVisibleCreate1 = true" class="ml-2 el-button el-button--primary">
              <i class="fa-solid fa-money-bill" aria-hidden="true"
                style="margin-top:5px; margin-left: -5px; margin-right:5px;"></i>
                Insertar Egreso
            </el-button>
          </div>
          <div class="flex">
            <el-table :data="tableData2" :default-sort="{ prop: 'id', order: 'ascending' }" stripe
              style="width:100%;">
              <el-table-column label="Fecha" prop="dateEgresos" width="150px" sortable />
              <el-table-column label="Descripcion" prop="descriptionEgresos" width="300px" sortable />
              <el-table-column label="Monto" prop="montoEgresos" width="150px" sortable />
            </el-table>
          </div>
        </div>
      </div>
    </div>
    <!-- MODAL 1 -->
    <el-dialog v-model="dialogVisibleCreate" title="Nuevo Ingreso" width="20%">
      <el-form :model="form1" label-width="auto" style="max-width: 100%" ref="formRef" :rules="rules"
        :label-position="'top'">
        <div class="row">
          <el-form-item prop="dateIngreso" label="Fecha:">
            <el-col :span="11" style="width: 240px">
              <el-date-picker v-model="form1.dateIngreso" type="date" placeholder="Fecha del ingreso:" format="DD/MM/YYYY"
                value-format="DD-MM-YYYY" />
            </el-col>
          </el-form-item>
          <el-form-item prop="descriptionIngreso" label="Descripcion:" style="width: 240px;">
            <el-input v-model="form1.descriptionIngreso" type="textarea" class="px-1" placeholder="Ingresa la descripcion:" maxlength="100" show-word-limit/>
          </el-form-item>
          <el-form-item prop="montoIngreso" label="Monto:" style="width: 240px;">
            <el-input v-model="form1.montoIngreso" class="px-1" placeholder="Ingresa el monto:" type="number" />
          </el-form-item>
        </div>
      </el-form>
      <template #footer>
        <span class="dialog-footer">
          <el-button @click="dialogVisibleCreate = false">Cancelar</el-button>
          <el-button type="primary" @click="createIngreso">Crear</el-button>
        </span>
      </template>
    </el-dialog>
    <!-- END MODAL 1 -->

    <!-- MODAL 2 -->
    <el-dialog v-model="dialogVisibleCreate1" title="Nuevo Egreso" width="20%">
      <el-form :model="form2" label-width="auto" style="max-width: 100%" ref="formRef" :rules="rules2"
        :label-position="'top'">
        <div class="row">
          <el-form-item prop="dateEgresos" label="Fecha:">
            <el-col :span="11" style="width: 240px">
              <el-date-picker v-model="form2.dateEgresos" type="date" placeholder="Fecha del ingreso:" format="DD/MM/YYYY"
                value-format="DD-MM-YYYY" />
            </el-col>
          </el-form-item>
          <el-form-item prop="descriptionEgresos" label="Descripcion:" style="width: 240px;">
            <el-input v-model="form2.descriptionEgresos" type="textarea" class="px-1" placeholder="Ingresa la descripcion:" maxlength="100" show-word-limit/>
          </el-form-item>
          <el-form-item prop="montoEgresos" label="Monto:" style="width: 240px;">
            <el-input v-model="form2.montoEgresos" class="px-1" placeholder="Ingresa el monto:" type="number" />
          </el-form-item>
        </div>
      </el-form>
      <template #footer>
        <span class="dialog-footer">
          <el-button @click="dialogVisibleCreate1 = false">Cancelar</el-button>
          <el-button type="primary" @click="createEgreso">Crear</el-button>
        </span>
      </template>
    </el-dialog>
    <!-- END MODAL 2 -->

  </div>





</template>

<script>
import axios from 'axios';
import { ElNotification } from 'element-plus';

export default {
  name: 'AdminGastosComponent',
  data: () => ({
    dialogVisible: false,
    dialogVisibleView: false,
    url: process.env.VUE_APP_ROOT_ASSETS,
    urlApi: process.env.VUE_APP_ROOT_API,
    dialogVisibleCreate:false,
    dialogVisibleCreate1:false,
    tableData1: [],
    tableData2: [],
    tableData3: [],
    selectedItem: null,
    totalIngresos: 0,
    totalEgresos: 0,
    totalSaldo: 0,
    form1: {
      dateIngreso: '',
      descriptionIngreso: '',
      montoIngreso: '',
    },
    rules: {
      dateIngreso: [
        { required: true, message: 'La fecha es requerida', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      descriptionIngreso: [
        { required: true, message: 'La descripcion es requerida', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      montoIngreso: [
        { required: true, message: 'El monto es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
    },
    form2: {
      dateEgresos: '',
      descriptionEgresos: '',
      montoEgresos: '',
    },
    rules2: {
      dateEgresos: [
        { required: true, message: 'La fecha es requerida', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      descriptionEgresos: [
        { required: true, message: 'La descripcion es requerida', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      montoEgresos: [
        { required: true, message: 'El monto es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
    }
  }),
  mounted() {
    this.refresh(),
      this.fetchData();
  },
  methods: {
    refresh() {
      axios.get('ingresos')
        .then(res => {
          this.tableData1 = res.data.data;
        });

        axios.get('egresos')
        .then(res => {
          this.tableData2 = res.data.data;
        });

      axios.get('completarOrden')
        .then(res => {
          this.tableData3 = res.data.data;
          this.tableData3 = res.data.data.filter(row => row.requiere3 == 'Pagado');
        });
    },

    handleEdit() {
    },

    handleDelete() {
      axios.delete('clientes/' + this.selectedItem.id).then(res => {
        console.log(res)
        this.refresh()
        this.dialogVisible = false
      })
    },

    eliminar(row) {
      console.log(row)
      this.selectedItem = row
      this.dialogVisible = true
    },

    seleccionar(row) {
      console.log(row)
      this.selectedItem = row
      this.dialogVisibleView = true
    },

    pdf(row) {
      console.log(row)
      this.selectedItem = row
    },

    async fetchData() {
      try {
        const responseTotalDinero = await axios.get(this.urlApi + 'totalCaja');
        const {
          totalIngresos,
          totalEgresos,
          totalSaldo,
        } = responseTotalDinero.data; // Destructuring assignment

        this.totalIngresos = totalIngresos;
        this.totalEgresos = totalEgresos;
        this.totalSaldo = totalSaldo;

        console.log('Total Ingresos', this.totalIngresos);
        console.log('Total Egreso', this.totalEgresos);
        console.log('Total Caja', this.totalSaldo);
        console.log('Totales', responseTotalDinero.data);
      } catch (error) {
        console.error('Error al obtener los datos:', error);
      }
    },

    createIngreso() {
  this.$refs.formRef.validate((valid) => {
    if (valid) {
      axios.post('ingresos', this.form1)
        .then(res => {
          console.log(res);
          this.dialogVisibleCreate = false;
          this.refresh(); // Call fetchData here
          this.fetchData();
          this.$message.success('Ingreso insertado exitosamente');
          ElNotification({
            title: 'Alerta',
            message: 'Registro insertado correctamente',
            type: 'success'
          })
        })
        .catch(error => {
          console.log(error);
          this.$message.error('Error al insertar el ingreso');
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

createEgreso() {
  this.$refs.formRef.validate((valid) => {
    if (valid) {
      axios.post('egresos', this.form2)
        .then(res => {
          console.log(res);
          this.dialogVisibleCreate1 = false;
          this.refresh(); // Call fetchData here
          this.fetchData();
          this.$message.success('Egreso insertado exitosamente');
          ElNotification({
            title: 'Alerta',
            message: 'Registro insertado correctamente',
            type: 'success'
          })
        })
        .catch(error => {
          console.log(error);
          this.$message.error('Error al insertar el egreso');
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

<style>
.txtH1 {
  text-align: center;
  font-weight: bold;
  margin-bottom: 2%;

}

.txtH3 {
  font-weight: 900;

}

h2 {
  margin-top: 5%;
  text-align: center;
  font-weight: 500;
}

.box-item {
  position: absolute;
  text-align: center;
  justify-content: center;
  align-items: center;
}

.centerFiltros {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}

.table-container {
  overflow-x: auto;
}

</style>
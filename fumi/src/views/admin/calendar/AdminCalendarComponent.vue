<template>
  <div>
    <router-link to="/admin/calendar" class="btn btn-primary">
      <i class="fa fa-calendar-day" aria-hidden="true" style="margin-top: 5px;
      margin-left: -5px; margin-right:5px;"></i>
      Agenda por día
    </router-link>

    <router-link to="/admin/calendar/complete" class="btn btn-success">
      <i class="fa fa-calendar-check" aria-hidden="true" style="margin-top: 5px;
      margin-left: -5px; margin-right:5px;"></i>
      Agenda realizadas
    </router-link>
  </div>

  <div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-4">Agenda de trabajo por día</h1>
    

    <div class="flex justify-center items-center mb-4">
      <el-date-picker
        class="mx-2"
        v-model="selectedDate"
        @change="filterData"
        type="date"
        format="DD-MM-YYYY"
        value-format="DD-MM-YYYY"
        placeholder="Seleccionar fecha"
      />
      <el-input
        class="mx-2"
        v-model="selectedDate"
        @change="filterData"
        style="width: 240px"
        placeholder="Buscar por nombre"
        clearable
      />
      <el-input
        class="mx-2"
        v-model="selectedDate"
        @change="filterData"
        style="width: 240px"
        placeholder="Buscar por direccion"
        clearable
      />
      <el-input
        v-model="selectedDate"
        @change="filterData"
        style="width: 240px"
        placeholder="Buscar por celular"
        clearable
      />
    </div>

    <div class="table-container">
      <el-table :data="filteredData" :default-sort="{ prop: 'date2', order: 'descending' }" stripe>
        <el-table-column label="PDF Orden">
          <template #default="scope">
            <el-button style="color:black" type="success" circle @click="pdf(scope.row)">
              <a :href="url + 'api/ordenTrabajoCompleta/'+scope.row.id" target="_blank">
                <span class="material-symbols-outlined">lab_profile</span>
              </a>
            </el-button>
          </template>
        </el-table-column>
        <el-table-column label="Nombre" width="200px" sortable>
          <template #default="scope">
            {{ scope.row.name + ' ' + scope.row.lastname1 + ' ' + scope.row.lastname2 }}
          </template>
        </el-table-column>
        <el-table-column label="Dirección" width="200px" sortable>
          <template #default="scope">
            {{ scope.row.home + ' #' + scope.row.numAddress + ', ' + scope.row.colonia + ' #' + scope.row.codigoPostal +
            ', ' + scope.row.ciudad }}
          </template>
        </el-table-column>
        <el-table-column label="Celular" prop="cell_phone" sortable />
        <el-table-column label="Fecha de asistencia" prop="date2" width="180px" sortable />
        <el-table-column label="De" prop="time1" sortable />
        <el-table-column label="A" prop="time2" sortable />
      </el-table>
    </div>
  </div>  

  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</template>

<script>
import axios from 'axios';
import { ElNotification } from 'element-plus';
export default {
  name: 'AdminCalendarComponent',
  data: () => ({
    url: process.env.VUE_APP_ROOT_ASSETS,
    urlApi: process.env.API,
    tableData: [],
    dialogVisible: false,
    filteredData: [],
    selectedItem: {},
    selectedDate: null,
    searchQuery: '',
    today: new Date().toISOString().slice(0, 10),
  }),
  mounted() {
    this.refresh()
  },
  methods: {
    refresh() {
      this.tableData = []
      axios.get('orden').then(res => {
        this.tableData = res.data.data
        this.filteredData = this.tableData;

      })
    },
    pdf(row) {
      console.log(row)
      this.selectedItem = row
      this.selectedItem = null
    },
    confimarBaja() {
      axios.delete('orden/' + this.selectedItem.id).then(res => {
        console.log(res)
        this.refresh()
        this.dialogVisible = false
      })
    },
    bajaOrden(row) {
      console.log(row)
      this.selectedItem = row
      this.dialogVisible = true
    },
    completarOrden(row) {
      if (row && row.id) {
        console.log(row);
        this.$router.push({ path: `/admin/works/complete-works/${row.id}` });
      } else {
        console.error('Row is undefined or does not have an id:', row);
      }
    },
    filterData() {
      if (this.selectedDate) {
        // Filtra por la fecha seleccionada
        this.filteredData = this.tableData.filter(orden => orden.date2 === this.selectedDate);
        if (this.filteredData.length === 0) {
          ElNotification({
            title: 'Aviso',
            message: `No se encontraron datos para la fecha seleccionada (${this.selectedDate}).`,
            type: 'warning'
          });
        } else {
          ElNotification({
            title: 'Datos encontrados',
            message: `Se encontraron datos para la fecha seleccionada (${this.selectedDate}).`,
            type: 'success',
          });
        }
      } else {
        // Si no se selecciona ninguna fecha, muestra todos los datos
        this.filteredData = this.tableData;
        ElNotification({
            title: 'Mostrando todos los datos',
            message: 'Se estan mostrando todos los datos de la agenda.',
            type: 'info',
          });
      }
    },
  },
}
</script>

<style>

.mainfiltros{
  width:78%;
  margin-left:11%;
  
  align-items: center;
}
.filtros{
  
  margin-left: -5px;
  padding: 1.5px;
  height: 20px;
  background-color: #b5b5b5;
}
.tamaño{
  width:19.6%;
}
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 2rem;
}

.table-container {
  overflow-x: auto;
}

.btn {
  margin: 10px;
  padding: 1rem 2rem;
  border-radius: 0.75rem 0rem;
  text-decoration: none;
  color: #000000;
  font-weight: bold;
  font-size: 17px;
}

.btn-primary {
  background-color: #1877f2;
}

.btn-success {
  background-color: #4caf50;
}


</style>
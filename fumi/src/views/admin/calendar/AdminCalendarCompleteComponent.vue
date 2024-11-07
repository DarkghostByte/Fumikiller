<template>
  <div>

    <router-link to="/admin/calendar"
      class="inline-flex px-5 py-3 text-white bg-blue-400 hover:bg-blue-700 focus:bg-blue-800 rounded-md ml-6 mb-3"
      style="color:black">
      <i class="fa-solid fa-calendar-day" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>
      Agenda por día
    </router-link>

    <router-link to="/admin/calendar/complete"
      class="inline-flex px-5 py-3 text-white bg-green-400 hover:bg-green-600 focus:bg-green-700 rounded-md ml-6 mb-3"
      style="color:black">
      <i class="fa-solid fa-calendar-check" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>
      Agenda realizadas
    </router-link>
  </div>

  <div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-4">Agenda de trabajo Realizadas</h1>


    <div class="flex justify-center items-center mb-4" style="width: 100%;">
      <el-date-picker class="mx-2" v-model="selectedDate" @change="filterDate10" type="date" format="DD-MM-YYYY"
        value-format="DD-MM-YYYY" placeholder="Seleccionar fecha" style="width: 100%;"/>
      <el-date-picker class="mx-2" v-model="selectedDate1" @change="filterDate10" type="date" format="DD-MM-YYYY"
        value-format="DD-MM-YYYY" placeholder="Seleccionar fecha" style="width: 100%;"/>
      <el-input class="px-2" placeholder="Buscar por nombre" v-model="searchQueryName" @input="filterDataName" style="width: 100%;"/>
      <el-input class="px-2" placeholder="Buscar por direccion" v-model="searchQueryAddress"
        @input="filterDataAddress" style="width: 100%;"/>
    </div>

    <div class="flex justify-center items-center">
      <el-table :data="filteredData" :default-sort="{ prop: 'id', order: 'ascending' }" stripe style="width:100%;">
        <el-table-column label="PDF Orden" width="100">
          <template #default="scope">
            <el-button style="color:black" type="success" @click="pdf(scope.row)">
              <a :href="url + 'api/ordenTrabajoCompleta/' + scope.row.id" target="_blank">
                <span class="material-symbols-outlined">lab_profile</span>
              </a>
            </el-button>
          </template>
        </el-table-column>
        <el-table-column label="Nombre" width="220" sortable>
          <template #default="scope">
            {{ scope.row.name + ' ' + scope.row.lastname1 + ' ' + scope.row.lastname2 }}
          </template>
        </el-table-column>
        <el-table-column label="Dirección" width="300" sortable>
          <template #default="scope">
            {{ scope.row.home + ' #' + scope.row.numAddress + ', ' + scope.row.colonia + ' #' + scope.row.codigoPostal +
              ', ' + scope.row.ciudad }}
          </template>
        </el-table-column>
        <el-table-column label="Celular" prop="cell_phone" sortable width="120px"/>
        <el-table-column label="F. orden" prop="date1" width="120" sortable />
        <el-table-column label="F. fumigacion" prop="date2" width="150" sortable />
        <el-table-column label="Fumigador" prop="nominaEmpleado1" width="180px" sortable />
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
//import moment from 'moment';

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
    selectedDate1: null,
    searchQuery: '',
    searchQueryName: '',
    searchQueryAddress: '',
    today: new Date().toISOString().slice(0, 10),
  }),
  mounted() {
    this.refresh()
  },
  methods: {
    refresh() {
      axios.get('completarOrden').then(res => {
        this.tableData = res.data.data;

        // Imprimir tableData para verificar los datos
        console.log('tableData:', this.tableData);

        // Imprimir filteredData para verificar el resultado del filtro
        console.log('filteredData:', this.filteredData);

        this.filteredData = this.tableData;
      })
    },
    pdf(row) {
      console.log(row)
      this.selectedItem = row
      this.selectedItem = null
    },
    confimarBaja() {
      axios.delete('completarOrden/' + this.selectedItem.id).then(res => {
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

    filterDataName() {
      this.filteredData = this.tableData.filter((clientes) => {
        const combinedName = clientes.name.toLowerCase() + ' ' + clientes.lastname1.toLowerCase() + ' ' + clientes.lastname2.toLowerCase();
        return combinedName.includes(this.searchQueryName.toLowerCase());
      });
    },
filterDataAddress() {
      this.filteredData = this.tableData.filter((clientes) => {
    const combinedAddress = clientes.ciudad.toLowerCase() + ' ' + clientes.colonia.toLowerCase() + ' ' + clientes.home.toLowerCase() + ' ' + clientes.codigoPostal.toLowerCase() + ' ' + clientes.numAddress.toLowerCase();
    return combinedAddress.includes(this.searchQueryAddress.toLowerCase());
  });
    }, 

    filterDate10() {
      if (this.selectedDate && this.selectedDate1) {
        const startDate = this.selectedDate;
        const endDate = this.selectedDate1;

        // Ensure startDate is less than or equal to endDate
        if (startDate > endDate) {
          ElNotification({
            title: 'Error',
            message: 'La fecha de inicio debe ser anterior a la fecha final.',
            type: 'error'
          });
          return;
        }

        this.filteredData = this.tableData.filter(completarOrden => {
          const ingresoDate = completarOrden.date1;
          return ingresoDate && isNaN(ingresoDate) && ingresoDate >= startDate && ingresoDate <= endDate;
        });

        // Show notification based on filtered data count
        if (this.filteredData.length === 0) {
          ElNotification({
            title: 'Aviso',
            message: `No se encontraron datos para el rango de fechas seleccionado (${this.selectedDate} - ${this.selectedDate1}).`,
            type: 'warning'
          });
        } else {
          ElNotification({
            title: 'Datos encontrados',
            message: `Se encontraron datos para el rango de fechas seleccionado (${this.selectedDate} - ${this.selectedDate1}).`,
            type: 'success'
          });
        }
      } else {
        // If no dates are selected or only one is selected, show all data
        this.filteredData = this.tableData;
        ElNotification({
          title: 'Mostrando todos los datos',
          message: 'Se están mostrando todos los datos de la agenda.',
          type: 'info'
        });
      }
    },
  },
}
</script>

<style>
.mainfiltros {
  width: 78%;
  margin-left: 11%;

  align-items: center;
}

.filtros {

  margin-left: -5px;
  padding: 1.5px;
  height: 20px;
  background-color: #b5b5b5;
}

.tamaño {
  width: 19.6%;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 2rem;
  align-items: center;
  justify-content: center
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
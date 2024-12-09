<template>
  <div>

    <router-link to="/admin/calendar/complete"
      class="inline-flex px-5 py-3 text-white bg-green-400 hover:bg-green-600 focus:bg-green-700 rounded-md ml-6 mb-3"
      style="color:black">
      <i class="fa-solid fa-calendar-check" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>
      Agenda realizadas
    </router-link>
  </div>

  <div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-4">Agenda de trabajo por día</h1>



    <div class="flex justify-center items-center mb-4">
      <el-input class="px-2" placeholder="Buscar por nombre" v-model="searchQueryName" @input="filterData" style="width: 100%;"/>
      <el-input class="px-2" placeholder="Buscar por direccion" v-model="searchQueryAddress"
        @input="filterData" style="width: 100%;"/>
      <el-input class="px-2" placeholder="Buscar por celular" v-model="searchQueryPhone"
        @input="filterData" style="width: 100%;"/>
      <el-date-picker class="mx-2" v-model="selectedDate" @change="filterDate" type="date" format="DD-MM-YYYY"
      value-format="DD-MM-YYYY" placeholder="Seleccionar fecha" style="width: 100%;"/>
    <el-date-picker class="mx-2" v-model="selectedDate1" @change="filterDate" type="date" format="DD-MM-YYYY"
      value-format="DD-MM-YYYY" placeholder="Seleccionar fecha" style="width: 100%;"/>
    </div>

    <div class="table-container">
      <el-table :data="filteredData" :default-sort="{ prop: 'date2', order: 'descending' }" stripe >
        <el-table-column label="PDF Orden" width="100px">
          <template #default="scope">
            <el-button style="color:black" type="success" @click="pdf(scope.row)">
              <a :href="url + 'api/ordenTrabajo/' + scope.row.id" target="_blank">
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
        <el-table-column label="Dirección" width="240px" sortable>
          <template #default="scope">
            {{ scope.row.home + ' #' + scope.row.numAddress + ', ' + scope.row.colonia + ' #' + scope.row.codigoPostal +
              ', ' + scope.row.ciudad }}
          </template>
        </el-table-column>
        <el-table-column label="Celular" prop="cell_phone" width="100px" sortable />
        <el-table-column label="Fecha de orden" prop="date1" width="150px" sortable />
        <el-table-column label="Fecha de fumigacion" prop="date2" width="180px" sortable />
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
    selectedDate1: null,
    searchQuery: '',
    searchQueryName:'',
searchQueryAddress:'',
searchQueryPhone:'',
    today: new Date().toISOString().slice(0, 10),
  }),
  mounted() {
    this.refresh()
  },
  methods: {
    refresh() {
      axios.get('orden').then(res => {
        this.tableData = res.data.data.filter(row => row.statusOrder == 'Por realizar');
        console.log('tableData:', this.tableData);
        console.log('filteredData:', this.filteredData);
        this.filteredData = this.tableData;
      })
    },

    pdf(row) {
      console.log(row)
      this.selectedItem = row
      this.selectedItem = null
    },

    filterData() {
  this.filteredData = this.tableData.filter((orden) => {
    const combinedName = orden.name.toLowerCase() + ' ' + orden.lastname1.toLowerCase() + ' ' + orden.lastname2.toLowerCase();
    const combinedAddress = orden.ciudad.toLowerCase() + ' ' + orden.colonia.toLowerCase() + ' ' + orden.home.toLowerCase() + ' ' + orden.codigoPostal.toLowerCase() + ' ' + orden.numAddress.toLowerCase();
    
    // Check each condition based on search queries
    let shouldInclude = true; // Start with assuming inclusion

    if (this.searchQueryName) {
      shouldInclude = shouldInclude && combinedName.includes(this.searchQueryName.toLowerCase());
    }

    if (this.searchQueryAddress) {
      shouldInclude = shouldInclude && combinedAddress.includes(this.searchQueryAddress.toLowerCase());
    }

    if (this.searchQueryPhone) {
      shouldInclude = shouldInclude && orden.cell_phone.toLowerCase().includes(this.searchQueryPhone.toLowerCase());
    }

    return shouldInclude;
  });
},

    parseDate(fecha) {
      var f1 = fecha.split("-")[2]
      f1 += "-" + fecha.split("-")[1]
      f1 += "-" + fecha.split("-")[0]
      return new Date(f1)
    },
    
    filterDate() {
      if (this.selectedDate && this.selectedDate1) {
        // Convert dates to Date objects and handle null values
        const startDate = this.selectedDate;
        const endDate = this.selectedDate1;
        var f1 = this.parseDate(startDate)
        var f2 = this.parseDate(endDate)

        // Ensure startDate is less than or equal to endDate
        if (f1 > f2) {
          ElNotification({
            title: 'Error',
            message: 'La fecha de inicio debe ser anterior a la fecha final.',
            type: 'error'
          });
          return;
        }

        this.filteredData = this.tableData.filter(orden => {
          const ordenDate = this.parseDate(orden.date1);
          return ordenDate >= f1 && ordenDate <= f2;
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
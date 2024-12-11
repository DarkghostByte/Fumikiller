<template>
  <div>

    <router-link to="/admin/calendar"
      class="inline-flex px-5 py-3 text-white bg-blue-400 hover:bg-blue-700 focus:bg-blue-800 rounded-md ml-6 mb-3"
      style="color:black">
      <i class="fa-solid fa-calendar-day" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>
      Agenda por día
    </router-link>
  </div>

  <div class="container mx-auto">
    <h1 class="text-3xl font-bold">Agenda de trabajo Realizadas</h1>
  </div>

  <div class="flex justify-center items-center" style="width: 100%;">
    <el-input class="px-2" placeholder="Buscar por nombre" v-model="searchQueryName" @input="filterData" style="width: 100%;"/>
    <el-input class="px-2" placeholder="Buscar por direccion" v-model="searchQueryAddress"
      @input="filterData" style="width: 100%;"/>
      <el-input class="px-2" placeholder="Buscar por celular" v-model="searchQueryPhone"
      @input="filterData" style="width: 100%;"/>
    <el-date-picker class="mx-2" v-model="selectedDate" @change="filterDate10" type="date" format="DD-MM-YYYY"
      value-format="DD-MM-YYYY" placeholder="Seleccionar fecha" style="width: 100%;"/>
    <el-date-picker class="mx-2" v-model="selectedDate1" @change="filterDate10" type="date" format="DD-MM-YYYY"
      value-format="DD-MM-YYYY" placeholder="Seleccionar fecha" style="width: 100%;"/>
      <el-input class="px-2" placeholder="Buscar por fumigador" v-model="searchQueryFumi"
      @input="filterData" style="width: 100%;"/>
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
      <el-table-column label="O. Trabajo" sortable  width="120">
        <template #default="scope">
          {{ 'No. ' + this.formatDate(scope.row.id_orden) }}
        </template>
      </el-table-column>
      <el-table-column label="Nombre" width="220" sortable>
        <template #default="scope">
          {{ scope.row.name + ' ' + scope.row.lastname1 + ' ' + scope.row.lastname2 }}
        </template>
      </el-table-column>
      <el-table-column label="Dirección" width="360" sortable>
        <template #default="scope">
          {{ scope.row.home + ' #' + scope.row.numAddress + ', ' + scope.row.colonia + ' #' + scope.row.codigoPostal +
            ', ' + scope.row.ciudad }}
        </template>
      </el-table-column>
      <el-table-column label="Celular" prop="cell_phone" sortable width="120px"/>
      <el-table-column label="F. orden" prop="date1" width="120" sortable />
      <el-table-column label="F. fumigacion" prop="date2" width="150" sortable />
      <el-table-column label="Fumigador" prop="ariasEmpleado1" width="145" sortable />
    </el-table>
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
    searchQueryPhone: '',
    searchQueryFumi: '',
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

    formatDate(id_orden, paddingLength = 5, paddingChar = '0') {
  // Convert id to string in case it's a number
  const idString = String(id_orden);

  // Ensure paddingLength is a positive integer
  paddingLength = Math.max(0, Math.floor(paddingLength));

  // Pad the string with paddingChar
  return idString.padStart(paddingLength, paddingChar);
},

filterData() {
  this.filteredData = this.tableData.filter((completarOrden) => {
    const combinedName = completarOrden.name.toLowerCase() + ' ' + completarOrden.lastname1.toLowerCase() + ' ' + completarOrden.lastname2.toLowerCase();
    const combinedAddress = completarOrden.ciudad.toLowerCase() + ' ' + completarOrden.colonia.toLowerCase() + ' ' + completarOrden.home.toLowerCase() + ' ' + completarOrden.codigoPostal.toLowerCase() + ' ' + completarOrden.numAddress.toLowerCase();
    
    // Check each condition based on search queries
    let shouldInclude = true; // Start with assuming inclusion

    if (this.searchQueryName) {
      shouldInclude = shouldInclude && combinedName.includes(this.searchQueryName.toLowerCase());
    }

    if (this.searchQueryAddress) {
      shouldInclude = shouldInclude && combinedAddress.includes(this.searchQueryAddress.toLowerCase());
    }

    if (this.searchQueryPhone) {
      shouldInclude = shouldInclude && completarOrden.cell_phone.toLowerCase().includes(this.searchQueryPhone.toLowerCase());
    }

    if (this.searchQueryFumi) {
      shouldInclude = shouldInclude && completarOrden.ariasEmpleado1.toLowerCase().includes(this.searchQueryFumi.toLowerCase());
    }

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

        this.filteredData = this.tableData.filter(completarOrden => {
          const ordenDate = this.parseDate(completarOrden.date2);
          return ordenDate >= f1 && ordenDate <= f2;
        });

        // Show notification based on filtered data count
        
      } else {
        // If no dates are selected or only one is selected, show all data
        this.filteredData = this.tableData;
        ElNotification({
          title: 'Mostrando todos los datos',
          message: 'Se están mostrando todos los datos de la agenda.',
          type: 'info'
        });
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
    filterDate10() {
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

        this.filteredData = this.tableData.filter(completarOrden => {
          const ordenDate = this.parseDate(completarOrden.date2);
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
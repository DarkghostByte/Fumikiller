<template>
  <div>
    <div class="mr-6">
      <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Caja</h1>
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
          <h3 class="txtH3" style="font-size:32px; margin-bottom:-15px;">$1,000,000.00</h3>
          <h2>Ingresos</h2>
        </div>
        <i class="fa-solid fa-calendar-check fa-rotate-by" aria-hidden="true" 
        style="margin-top: 5px; margin-left: -5px; margin-right:10px; position:absolute; color: rgba(0, 0, 0, 0.20); --fa-rotate-angle: -20deg;"></i>
      </router-link>

      <router-link to="/admin/admin/city"
        class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-green-600 hover:bg-green-1000 focus:bg-green-900 rounded-md ml-6 mb-5 shadow-lg justify-center items-center"
        style="width:300px; height:100px; font-size:26px; text-align: center;">
        <div class="row">
          <h3 class="txtH3" style="font-size:32px; margin-bottom:-15px;">$1,000,000.00</h3>
          <h2>Egresos</h2>
        </div>
        <i class="fa-solid fa-calendar-check fa-rotate-by" aria-hidden="true" 
        style="margin-top: 5px; margin-left: -5px; margin-right:10px; position:absolute; color: rgba(0, 0, 0, 0.20); --fa-rotate-angle: -20deg;"></i>

      </router-link>

      <router-link to="/admin/admin/city"
        class="inline-flex px-5 py-3 text-black hover:text-gray-200 bg-orange-600 hover:bg-orange-1000 focus:bg-orange-900 rounded-md ml-6 mb-5 shadow-lg justify-center items-center"
        style="width:300px; height:100px; font-size:26px; text-align: center;">
        <div class="row">
          <h3 class="txtH3" style="font-size:32px; margin-bottom:-15px;">$1,000,000.00</h3>
          <h2>Saldo</h2>
        </div>
        <i class="fa-solid fa-calendar-check fa-rotate-by" aria-hidden="true" 
        style="margin-top: 5px; margin-left: -5px; margin-right:10px; position:absolute; color: rgba(0, 0, 0, 0.20); --fa-rotate-angle: -20deg;"></i>
      </router-link>
    </div>

    <div class="table-container mt-2" style="width:100%;">
      <div class="flex items-center justify-center">
        <div class="mx-6">
          <h1 class="txtH1">Resumen Ingresos</h1>
          <el-table :data="filteredData" :default-sort="{ prop: 'date2', order: 'descending' }" stripe
            style="width:100%;">
            <el-table-column label="Fecha" width="150px" sortable>
              <template #default="scope">
                {{ scope.row.name + ' ' + scope.row.lastname1 + ' ' + scope.row.lastname2 }}
              </template>
            </el-table-column>
            <el-table-column label="Descripcion" prop="cell_phone" width="150px" sortable />
            <el-table-column label="Monto" prop="date1" width="150px" sortable />
          </el-table>
        </div>
        <div class="mx-6">
          <h1 class="txtH1">Resumen Egresos</h1>
          <el-table :data="filteredData" :default-sort="{ prop: 'date2', order: 'descending' }" stripe
            style="width:100%;">
            <el-table-column label="Fecha" width="150px" sortable>
              <template #default="scope">
                {{ scope.row.name + ' ' + scope.row.lastname1 + ' ' + scope.row.lastname2 }}
              </template>
            </el-table-column>
            <el-table-column label="Descripcion" prop="cell_phone" width="150px" sortable />
            <el-table-column label="Monto" prop="date1" width="150px" sortable />
          </el-table>
        </div>
      </div>
    </div>
  </div>





</template>

<script>
import axios from 'axios';
export default {
  name: 'AdminAdminComponent',
  data: () => ({
    dialogVisible: false,
    dialogVisibleView: false,
    url: process.env.VUE_APP_ROOT_ASSETS,
    urlApi: process.env.VUE_APP_ROOT_API,
    tableData: [],
    selectedItem: null,
    totalCiudades: 0,
    totalColonias: 0,
    totalAsentamientos: 0,
    totalProductosInt: 0,
    totalProductosExt: 0,
    totalClientes: 0,
    totalOrdenes: 0,
    totalEmpleados: 0,
    totalVias: 0,
    totalProblematica: 0,
  }),
  mounted() {
    this.refresh(),
      this.fetchData();
  },
  methods: {
    refresh() {
      this.tableData = []
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
        const responseTotales = await axios.get(this.urlApi + 'totales');
        const {
          totalProductosExt,
          totalProductosInt,
          totalCiudades,
          totalColonias,
          totalProblematica,
          totalAsentamientos,
          totalClientes,
          totalOrdenes,
          totalEmpleados,
          totalVias
        } = responseTotales.data; // Destructuring assignment

        this.totalProductosExt = totalProductosExt;
        this.totalProductosInt = totalProductosInt;
        this.totalCiudades = totalCiudades;
        this.totalColonias = totalColonias;
        this.totalProblematica = totalProblematica;
        this.totalAsentamientos = totalAsentamientos;
        this.totalClientes = totalClientes;
        this.totalOrdenes = totalOrdenes;
        this.totalEmpleados = totalEmpleados;
        this.totalVias = totalVias;

        console.log('Total productos externos', this.totalProductosExt);
        console.log('Total productos internos', this.totalProductosInt);
        console.log('Total ciudades', this.totalCiudades);
        console.log('Total colonias', this.totalColonias);
        console.log('Total problematicas', this.totalProblematica);
        console.log('Total comercios', this.totalAsentamientos);
        console.log('Total clientes', this.totalClientes);
        console.log('Total ordenes', this.totalOrdenes);
        console.log('Total empleados', this.totalEmpleados);
        console.log('Total vias', this.totalVias);
        console.log('Totales', responseTotales.data);
      } catch (error) {
        console.error('Error al obtener los datos:', error);
      }
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
<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start">
      <div class="flex flex-wrap items-start justify-end ">

        <!--RUTAS ENTRES VISTAS-->
        <router-link to="/admin/calendar"
          class="inline-flex px-5 py-3 text-white bg-blue-400 hover:bg-blue-700 focus:bg-blue-800 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-user" aria-hidden="true" style="margin-top: 5px;
              margin-left: -5px; margin-right:10px;"></i>
          Agenda por dia
        </router-link>

        <router-link to="/admin/calendar/complete"
          class="inline-flex px-5 py-3 text-white bg-green-400 hover:bg-green-700 focus:bg-green-800 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-clipboard-check" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>
          Agenda realizadas
        </router-link>
        <!--FIN DE RUTAS ENTRES VISTAS-->

      </div>
    </div>
    <div class="mr-6">
      <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Agenda de trabajo por dia</h1>
    </div>
    <div class="mainfiltros flex">
      <div class="tamaño px-1 py-4">
        <el-date-picker
          class="filtros"
          placeholder="Seleccionar fecha"
          v-model="selectedDate"
          @change="filterData"
          type="date"
          format="DD-MM-YYYY"
          value-format="DD-MM-YYYY"
        />
      </div>
    </div>

    <p>Agregar el filtro para no ver antes o despues </p>


    <!-- TABLE DATA -->
    <div class="flex">




      <el-table :data="filteredData" :default-sort="{ prop: 'date2', order: 'descending' }"
        style="width: auto; margin: auto;" stripe>

        <!--BOTON PARA VISUALIZAR EL PDF DE LA ORDEN DE TRABAJO-->
        <el-table-column label="">
          <template #default="scope">
            <el-button style="color:black" size="small" type="success" @click="pdf(scope.row)">
              <a :href="url + 'api/orden-de-trabajo/' + scope.row.id_cliente + '/' + scope.row.id" target="_blank">
                <span class="material-symbols-outlined">lab_profile</span>
              </a>
            </el-button>
          </template>
        </el-table-column>
        <!--FIN DEL BOTON PARA VISUALIZAR EL PDF DE LA ORDEN DE TRABAJO-->

        <!--VISUALIZACION DE LA TABLA-->
        <el-table-column label="Nombre" sortable width="200">
          <template #default="scope">
            {{ scope.row.name + ' ' + scope.row.lastname1 + ' ' + scope.row.lastname2 }}
          </template>
        </el-table-column>
        <el-table-column label="Direccion" sortable width="220">
          <template #default="scope">
            {{ scope.row.home + ' #' + scope.row.numAddress + ', ' + scope.row.colonia + ' #' + scope.row.codigoPostal +
            ', ' + scope.row.ciudad }}
          </template>
        </el-table-column>
        <el-table-column prop="cell_phone" label="Celular" sortable width="150" />
        <el-table-column prop="date2" label="Fecha de asistencia" sortable width="170" />
        <el-table-column prop="time1" label="De" sortable width="90" />
        <el-table-column prop="time2" label="A" sortable width="90" />
        <!--FIN DE LA VISUALIZACION DE LA TABLA-->
      </el-table>
    </div>
    <!-- END TABLE DATA -->

    <!-- INICIO DEL DIALOGO PARA ELIMINAR -->
    <el-dialog v-model="dialogVisible" title="Deseas dar de baja la siguente orden de trabajo" width="1200">
      <div class="h-72 overflow-scroll" style="font-size:22px; color:black;">
        Datos la orden de trabajo
        <br>
        Nombre: {{ selectedItem.name }} {{ selectedItem.lastname1 }} {{ selectedItem.lastname2 }}
        <br>
        Direccion: {{ selectedItem.city }}, {{ selectedItem.colonia }} #{{ selectedItem.codigoPostal }}, {{
            selectedItem.home }} #{{ selectedItem.numAddress }}
        <br>
        Dia de la orden: {{ selectedItem.date1 }}
        <br>
        Dia de de asistencia: {{ selectedItem.date2 }}
        <br>
        De: {{ selectedItem.time1 }}
        <br>
        A: {{ selectedItem.time2 }}
        <br><br>
      </div>
      <template #footer>
        <div class="dialog-footer">
          <el-button type="info" @click="dialogVisible = false">Cancelar</el-button>
          <el-button type="danger" @click="confimarBaja()">
            Confirmar
          </el-button>
        </div>
      </template>
    </el-dialog>
    <!-- FIN DEL DIALOGO PARA ELIMINAR -->

  </div>
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


</style>
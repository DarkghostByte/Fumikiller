<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start">
      <div class="flex flex-wrap items-start justify-end ">

        <!--RUTAS ENTRES VISTAS-->
        <router-link to="/admin/ordenCompra/new"
          class="inline-flex px-5 py-3 text-white bg-blue-400 hover:bg-blue-700 focus:bg-blue-800 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-file" aria-hidden="true" style="margin-top: 5px;
              margin-left: -5px; margin-right:10px;"></i>
          Nueva Orden De Compra
        </router-link>
        <!--FIN DE RUTAS ENTRES VISTAS-->

      </div>
    </div>
    <div class="">
      <h1 class="py-5 px-5 text-4xl font-semibold mb-2">Ordenes de compra</h1>
    </div>
    <!--
    <div class="flex justify-between items-center mb-4" style="width: 100%;">
      <el-input class="px-2" placeholder="Buscar por nombre" v-model="searchQueryName" @input="filterDataName" />
      <el-input class="px-2" placeholder="Buscar por direccion" v-model="searchQueryAddress"
        @input="filterDataAddress" />
      <el-date-picker class="px-2" v-model="selectedDate" @change="filterData" type="date" format="DD-MM-YYYY"
        value-format="DD-MM-YYYY" placeholder="Seleccionar fecha de orden" style="width: 100%" />
      <el-date-picker class="px-2" v-model="selectedDate2" @change="filterData2" type="date" format="DD-MM-YYYY"
        value-format="DD-MM-YYYY" placeholder="Seleccionar fecha de fumigacion" style="width: 100%" />
    </div>
-->
    <!-- TABLE DATA -->
    <div class="flex" style="justify-content: center;">
      <el-table :data="filteredData" :default-sort="{ prop: 'id', order: 'descending' }" style="width: 80%" stripe>

        <!--BOTON PARA VISUALIZAR EL PDF DE LA ORDEN DE TRABAJO-->
        <el-table-column label="">
          <template #default="scope">
            <el-button style="color:black" size="small" type="success" @click="pdf(scope.row)">
              <a :href="url + 'api/ordenDeCompra/' + scope.row.id" target="_blank">
                <span class="material-symbols-outlined">lab_profile</span>
              </a>
            </el-button>
          </template>
        </el-table-column>
        <!--FIN DEL BOTON PARA VISUALIZAR EL PDF DE LA ORDEN DE TRABAJO-->

        <!--VISUALIZACION DE LA TABLA-->
        <el-table-column prop="fechaOrdenCompra" label="Fecha" sortable />
        <el-table-column prop="conceptoOrdenCompra" label="Concepto" sortable />
        <el-table-column prop="empleadoOrdenCompra" label="Empleado" sortable />
        <el-table-column prop="importeOrdenCompra" label="Importe" sortable />
        <!--FIN DE LA VISUALIZACION DE LA TABLA-->

        <!-- Botones de acción -->
        <el-table-column label="">
          <template #default="scope">
            <router-link :to="'/admin/works/edit-work/' + scope.row.id">
              <el-button style="color:black" size="small" type="warning" @click="handleEdit()"><span
                  class="material-symbols-outlined">edit</span></el-button>
            </router-link>
          </template>
        </el-table-column>
      </el-table>
    </div>
    <!-- END TABLE DATA -->

    <!-- INICIO DEL DIALOGO PARA ELIMINAR -->
    <el-dialog v-model="dialogVisible" title="Deseas desactivar la siguiente orden?" width="600" height="500">
      <div class="clientInfo">
        <div class="details">
          <i class="fa fa-user fa-2x iconDeleteOrden"></i>
          <div>
            <p>
              <strong>Nombre completo:</strong> {{ selectedItem.name }} {{ selectedItem.lastname1 }} {{
                selectedItem.lastname2 }}
            </p>
            <p>
              <strong>Nombre comercial:</strong> {{ selectedItem.tradename }}
            </p>
          </div>
        </div>
        <div class="details">
          <i class="fa fa-city fa-2x iconDeleteOrden"></i>
          <div>
            <p>
              <strong>Domicilio:</strong> {{ selectedItem.street }} {{ selectedItem.home }} #{{ selectedItem.numAddress
              }},
              {{ selectedItem.colonia }} #{{ selectedItem.codigoPostal }}, {{ selectedItem.ciudad }}
            </p>
            <p>
              <strong>Tipo de lugar:</strong> {{ selectedItem.comercio }}
            </p>
          </div>
        </div>
        <div class="details">
          <i class="fa fa-phone fa-2x iconDeleteOrden"></i>
          <div>
            <p>
              <strong>Numero de celular:</strong> {{ selectedItem.cell_phone }}
            </p>
          </div>
        </div>
        <div class="details">
          <i class="fa fa-calendar-days fa-2x iconDeleteOrden"></i>
          <div>
            <p>
              <strong>Fecha de orden:</strong> {{ selectedItem.date1 }}
            </p>
            <p>
              <strong>Fecha de fumigacion:</strong> {{ selectedItem.date2 }}
            </p>
          </div>
        </div>
      </div>
      <template #footer>
        <div class="dialog-footer">
          <el-button type="info" @click="dialogVisible = false">Cancelar</el-button>
          <el-button type="danger" @click="handleEstadoClick()">
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
  name: 'AdminWorksComponent',
  data: () => ({
    url: process.env.VUE_APP_ROOT_ASSETS,
    urlApi: process.env.API,
    tableData: [],
    selectedItem: null,
    dialogVisible: false,
    searchQueryName: '',
    searchQueryAddress: '',
    filteredData: [],
    selectedDate: null,
    selectedDate2: null,
  }),
  mounted() {
    this.refresh()
  },
  methods: {
    refresh() {
      this.tableData = []
      axios.get('ordenCompra').then(res => {
        this.tableData = res.data.data;        
        this.filteredData = this.tableData;
      })

    },
    pdf(row) {
      console.log(row)
      this.selectedItem = row
      this.selectedItem = null
    },
    handleEdit() { },

    completarOrden(row) {
      if (row && row.id) {
        console.log(row);
        this.$router.push({ path: `/admin/works/complete-works/${row.id}` });
      } else {
        console.error('Row is undefined or does not have an id:', row);
      }
    },
    handleEstadoClick() {
      const newStatus = this.selectedItem.infoorden_delete === 'Alta' ? 'Baja' : 'Alta'; // Toggle status based on current value
      axios.put('desactivarOrden/' + this.selectedItem.id, { infoorden_delete: newStatus })
        .then(response => {
          console.log('La orden se dio de baja:', response.data);
          this.refresh(); // Consider removing this line if refresh() is triggered elsewhere
          this.dialogVisible = false;
          ElNotification({
            title: 'Actualizacion de datos',
            message: `Se actualizaron los datos.`,
            type: 'success'
          });
        })
        .catch(error => {
          console.error('Error al dar de baja la orden:', error.response.data);
        });
    },

    filterDataName() {
      this.filteredData = this.tableData.filter((orden) => {
        const combinedName = orden.name.toLowerCase() + ' ' + orden.lastname1.toLowerCase() + ' ' + orden.lastname2.toLowerCase();
        return combinedName.includes(this.searchQueryName.toLowerCase());
      });
    },

    filterDataAddress() {
      this.filteredData = this.tableData.filter((orden) => {
        const combinedAddress = orden.ciudad.toLowerCase() + ' ' + orden.colonia.toLowerCase() + ' ' + orden.home.toLowerCase() + ' ' + orden.codigoPostal.toLowerCase() + ' ' + orden.numAddress.toLowerCase();
        return combinedAddress.includes(this.searchQueryAddress.toLowerCase());
      });
    },

    filterData() {
      if (this.selectedDate) {
        // Filtra por la fecha seleccionada
        this.filteredData = this.tableData.filter(orden => orden.date1 === this.selectedDate);
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

    filterData2() {
      if (this.selectedDate2) {
        // Filtra por la fecha seleccionada
        this.filteredData = this.tableData.filter(orden => orden.date2 === this.selectedDate2);
        if (this.filteredData.length === 0) {
          ElNotification({
            title: 'Aviso',
            message: `No se encontraron datos para la fecha seleccionada (${this.selectedDate2}).`,
            type: 'warning'
          });
        } else {
          ElNotification({
            title: 'Datos encontrados',
            message: `Se encontraron datos para la fecha seleccionada (${this.selectedDate2}).`,
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
  }
}
</script>

<style>
.clientInfo {
  background-color: #f5f5f5;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  border-radius: 15px;
}

.details {
  padding: 20px;
  display: flex;
}

p {
  color: #000000;
}

.client-details__title {
  color: #000;
  font-weight: bold;
  margin-bottom: 15px;
}

.iconDeleteOrden {
  color: #f32222;
  margin-right: 10px;
}
</style>
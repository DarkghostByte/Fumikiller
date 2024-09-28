<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start">
      <div class="flex flex-wrap items-start justify-end ">

        <!--RUTAS ENTRES VISTAS-->
        <router-link to="/admin/clients" class="inline-flex px-5 py-3 text-white bg-blue-400 hover:bg-blue-700 focus:bg-blue-800 rounded-md ml-6 mb-3"
            style="color:black">
              <i class="fa fa-user" aria-hidden="true" style="margin-top: 5px;
              margin-left: -5px; margin-right:10px;"></i>                
              Ver Clientes
            </router-link>

            <router-link to="/admin/works" class="inline-flex px-5 py-3 text-white bg-emerald-400 hover:bg-emerald-700 focus:bg-emerald-800 rounded-md ml-6 mb-3"
            style="color:black">
              <i class="fa fa-bookmark" aria-hidden="true" style="margin-top: 5px;
              margin-left: -5px; margin-right:10px;"></i>                
              Ver Ordenes
            </router-link>

            <router-link to="/admin/worksComplete"
          class="inline-flex px-5 py-3 text-white bg-green-400 hover:bg-green-700 focus:bg-green-800 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-clipboard-check" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>
          Ver ordenes completas
        </router-link>
        <!--FIN DE RUTAS ENTRES VISTAS-->

      </div>
    </div>
    <div class="mr-6">
      <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Ordenes de trabajo</h1>
    </div>

    <!-- TABLE DATA -->
    <div class="flex" style="justify-content: center;">
      <el-table :data="tableData" :default-sort="{ prop: 'name', order: 'descending' }" style="width: 90%" stripe>

        <!--BOTON PARA VISUALIZAR EL PDF DE LA ORDEN DE TRABAJO-->
        <el-table-column label="">
          <template #default="scope">
            <el-button style="color:black" size="small" type="success" @click="pdf(scope.row)">
              <a :href="url + 'api/ordenTrabajo/' + scope.row.id" target="_blank">
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
            {{ scope.row.home + ' #' + scope.row.numAddress + ', ' + scope.row.colonia + ' #' + scope.row.codigoPostal + ', '+scope.row.ciudad }}
          </template>
        </el-table-column>
        <el-table-column prop="date1" label="Fecha de orden" sortable width="150" />
        <el-table-column prop="date2" label="Fecha de fumigacion" sortable width="170" />
        <el-table-column prop="time1" label="De" sortable width="90" />
        <el-table-column prop="time2" label="A" sortable width="90" />
        <!--FIN DE LA VISUALIZACION DE LA TABLA-->

        <!--BOTON PARA TERMINAR LA ORDEN DE TRABAJO-->

        <el-table-column label="">
          <template #default="scope">
            <el-button style="color:black" size="small" type="warning" @click="completarOrden(scope.row)"><span
                class="material-symbols-outlined">priority</span></el-button>
          </template>
        </el-table-column>
        <!--FIN DEL BOTON PARA TERMINAR LA ORDEN DE TRABAJO-->

        <!--BOTON PARA DAR DE BAJA LA ORDEN DE TRABAJO-->
        <el-table-column label="">
          <template #default="scope">
            <el-button style="color:black" size="small" type="danger" @click="bajaOrden(scope.row)">
              <span class="material-symbols-outlined">disabled_by_default</span>
            </el-button>
          </template>
        </el-table-column>
        <!--FIN DEL BOTON PARA DAR DE BAJA LA ORDEN DE TRABAJO-->
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
          <el-button type="danger"
            @click="handleEstadoClick()">
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
  }),
  mounted() {
    this.refresh()
  },
  methods: {
    refresh() {
      this.tableData = []
      axios.get('orden').then(res => {
        this.tableData = res.data.data.filter(row => row.infoorden_delete !== 'Baja');   
        this.tableData = res.data.data.filter(row => row.statusOrder == 'Por realizar');   
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
<template>
  <div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start">
      <div class="flex flex-wrap items-start justify-end ">
        <router-link to="/admin/clients"
          class="inline-flex px-5 py-3 text-white bg-red-400 hover:bg-red-700 focus:bg-red-800 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-rotate-left" aria-hidden="true" style="margin-top: 5px; margin-left: -5px; margin-right:10px;"></i>
          Devolver
        </router-link>
      </div>
    </div>
    <div class="mr-6">
      <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Ordenes completas</h1>
    </div>

    <div class="flex">
      <el-table :data="tableData" :default-sort="{ prop: 'name', order: 'descending' }" style="width: 100%" stripe>
        <el-table-column label="">
          <template #default="scope">
            <el-button style="color:black" size="small" type="success">
              <a :href="url+'api/orden-de-trabajo/'+scope.row.id_cliente+'/'+scope.row.id" target="_blank">
                <span class="material-symbols-outlined">lab_profile</span>
              </a>
            </el-button>
          </template>
        </el-table-column>
        <el-table-column label="Nombre" sortable width="200">
          <template #default="scope">
            {{ scope.row.name+' '+scope.row.lastname1+' '+scope.row.lastname2 }}
          </template>
        </el-table-column>
        <el-table-column label="Direccion" sortable width="250">
          <template #default="scope">
            {{ scope.row.home+' #'+scope.row.numAddress+', '+scope.row.colonia+' #'+scope.row.codigoPostal+', '+scope.row.ciudad }}
          </template>
        </el-table-column>
        <el-table-column prop="pago" label="Monto" sortable width="150" />
        <el-table-column prop="requiere3" label="Datos" sortable width="170" />
        <el-table-column prop="responsable" label="Responsable" sortable width="130" />
        <el-table-column label="">
          <template #default="scope">
            <router-link :to="'/admin/works/edit-workComplete/'+scope.row.id">
              <el-button style="color:black" size="small" type="warning">
                <span class="material-symbols-outlined">edit</span>
              </el-button>
            </router-link>
          </template>
        </el-table-column>
        <el-table-column label="">
          <template #default="scope">
            <el-button style="color:black" size="small" type="danger" @click="bajaOrden(scope.row)">
              <span class="material-symbols-outlined">disabled_by_default</span>
            </el-button>
          </template>
        </el-table-column>
      </el-table>
    </div>

    <el-dialog v-model="dialogVisible" title="Deseas dar de baja la siguente orden de trabajo" width="1200">
      <div class="h-72 overflow-scroll" style="font-size:22px; color:black;">
        Datos la orden de trabajo
        <br>
        Nombre: {{ selectedItem.name }} {{ selectedItem.lastname1 }} {{ selectedItem.lastname2 }}
        <br>
        Direccion: {{ selectedItem.city }}, {{ selectedItem.colonia }} #{{ selectedItem.codigoPostal }}, {{ selectedItem.home }} #{{ selectedItem.numAddress }}
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
          <el-button type="danger" @click="confimarBaja()">Confirmar</el-button>
        </div>
      </template>
    </el-dialog>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'AdminWorksCompleteIdComponent',
  data: () => ({
    url: process.env.VUE_APP_ROOT_ASSETS,
    urlApi: process.env.API,
    tableData: [],
    selectedItem: {},
    dialogVisibleView: false,
    dialogVisible: false,
    clientId: null
  }),
  mounted() {
    this.refresh();
    this.clientId = this.$route.params.id;
  },
  methods: {
    refresh() {
      this.tableData = [];
      axios.get('completarOrden').then(res => {
        this.tableData = res.data.data.filter(order => order.id_cliente == this.clientId);
      });
    },
    bajaOrden(row) {
      if (row) {
        this.selectedItem = row;
        this.dialogVisible = true;
      }
    },
    confimarBaja() {
      if (this.selectedItem.id) {
        axios.delete('completarOrden/' + this.selectedItem.id).then(() => {
          this.refresh();
          this.dialogVisible = false;
        }).catch(error => {
          console.error('Error deleting order:', error);
        });
      }
    },
    datos(row) {
      if (row) {
        this.selectedItem = row;
        this.dialogVisibleView = true;
      }
    },
    handleEdit() {},
  }
};
</script>

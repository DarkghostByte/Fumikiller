<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start">
      <div class="flex flex-wrap items-start justify-end ">

        <router-link to="/admin/admin"
          class="inline-flex px-5 py-3 text-white bg-red-400 hover:bg-red-700 focus:bg-red-800 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-rotate-left" aria-hidden="true"
            style="margin-top: 5px; margin-left: -5px; margin-right:10px;"></i>
          Regresar
        </router-link>

        <router-link to="/admin/city/newCity"
          class="inline-flex px-5 py-3 text-white bg-blue-400 hover:bg-blue-600 focus:bg-blue-700 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-city" aria-hidden="true"
            style="margin-top: 5px; margin-left: -5px; margin-right:10px;"></i>
          Nuevo ciudad
        </router-link>

      </div>
    </div>

    <div class="mr-6">
      <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Clientes</h1>
    </div>

    <!-- Campo de búsqueda -->

    <!-- TABLE DATA -->
    <div class="flex" style="justify-content: center;">
      <el-table :data="filteredData" :default-sort="{ prop: 'ciudad', order: 'ascending' }" style="width: 40%" stripe>
        <!-- Columnas de la tabla -->

        <!-- Agrega las demás columnas aquí -->


        <el-table-column prop="ciudad" label="Nombres" sortable width="180" />
        <el-table-column prop="estado" label="Estado" sortable width="160" />

        <!-- Botones de acción -->
        <el-table-column label="">
          <template #default="scope">
            <router-link :to="'/admin/clients/edit-clients/' + scope.row.id">
              <el-button style="color:black" size="small" type="warning" @click="handleEdit()"><span
                  class="material-symbols-outlined">edit</span></el-button>
            </router-link>
          </template>
        </el-table-column>

        <el-table-column label="">
          <template #default="scope">
            <el-button style="color:black" size="small" type="danger" @click="eliminar(scope.row)"><span
                class="material-symbols-outlined">delete</span></el-button>
          </template>
        </el-table-column>
      </el-table>

      <div class="mb-4" style="width: 30%; margin-left: 2%">
        <el-input
          placeholder="Buscar por nombre, apellidos, cuidad, direccion, numero de casa, numero de telefono o ID del cliente"
          v-model="searchQuery" @input="filterData"></el-input>
      </div>
    </div>
    <!-- END TABLE DATA -->

    <!-- MODAL 1 -->
    <el-dialog v-model="dialogVisible" title="¿Deseas eliminar la siguente ciudad?" width="20%">
      <div class="h-35" style="font-size: medium;">
        Nombre: {{ selectedItem.ciudad }}
        <br>
        Estado: {{ selectedItem.estado }}
        <br>
      </div>
      <template #footer>
        <div class="dialog-footer">
          <el-button type="info" @click="dialogVisible = false">Cancelar</el-button>
          <el-button type="danger" @click="handleDelete()">
            Confirmar
          </el-button>
        </div>
      </template>
    </el-dialog>
    <!-- END MODAL 1 -->
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'AdminClientsComponent',
  data: () => ({
    dialogVisible: false,
    dialogVisibleView: false,
    url: process.env.VUE_APP_ROOT_ASSETS,
    urlApi: process.env.VUE_APP_ROOT_API,
    tableData: [],
    filteredData: [],
    selectedItem: {},
    searchQuery: ''
  }),
  mounted() {
    this.refresh();
  },
  methods: {
    refresh() {
      axios.get('ciudades').then(res => {
        this.tableData = res.data.data;
        this.filteredData = this.tableData;
      });
    },
    handleDelete() {
      axios.delete('ciudades/' + this.selectedItem.id).then(res => {
        console.log(res);
        this.refresh();
        this.dialogVisible = false;
      });
    },
    eliminar(row) {
      console.log(row);
      this.selectedItem = row;
      this.dialogVisible = true;
    },
    filterData() {
      this.filteredData = this.tableData.filter(client => {
        return client.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          client.id.toString().includes(this.searchQuery) ||
          client.lastname1.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          client.lastname2.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          client.ciudad.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          client.numAddress.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          client.home.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          client.cell_phone.toLowerCase().includes(this.searchQuery.toLowerCase());
      });
    }
  }
};
</script>

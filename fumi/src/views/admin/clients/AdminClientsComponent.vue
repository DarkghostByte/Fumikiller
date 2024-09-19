<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start">
      <div class="flex flex-wrap items-start justify-end ">

        <router-link to="/admin/works"
          class="inline-flex px-5 py-3 text-white bg-blue-400 hover:bg-blue-700 focus:bg-blue-800 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-bookmark" aria-hidden="true"
            style="margin-top: 5px; margin-left: -5px; margin-right:10px;"></i>
          Consultar Ordenes
        </router-link>

        <router-link to="/admin/clients/agregarComercio-clients"
          class="inline-flex px-5 py-3 text-white bg-green-400 hover:bg-green-600 focus:bg-green-700 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-plus-circle" aria-hidden="true"
            style="margin-top: 5px; margin-left: -5px; margin-right:10px;"></i>
          Nuevo Cliente
        </router-link>

      </div>
    </div>

    <div class="mr-6">
      <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Clientes</h1>
    </div>

    <!-- Campo de búsqueda -->
    <div class="mb-4">
      <el-input
        placeholder="Buscar por nombre, apellidos, cuidad, direccion, numero de casa, numero de telefono o ID del cliente"
        v-model="searchQuery" @input="filterData"></el-input>
    </div>

    <!-- TABLE DATA -->
    <div class="flex">
      <el-table :data="filteredData" :default-sort="{ prop: 'name', order: 'descending' }" style="width: 100%" stripe>
        <!-- Columnas de la tabla -->
        <el-table-column label="">
          <template #default="scope">
            <el-button style="color:black" size="small" type="success" @click="seleccionar(scope.row)"><span
                class="material-symbols-outlined">visibility</span></el-button>
          </template>
        </el-table-column>

        <el-table-column label="">
          <template #default="scope">
            <router-link :to="'/admin/works/add-works/' + scope.row.id">
              <el-button style="color:black" size="small" type="warning" @click="handleEdit()"><span
                  class="material-symbols-outlined">bug_report</span></el-button>
            </router-link>
          </template>
        </el-table-column>

        <el-table-column label="">
          <template #default="scope">
            <el-button style="color:black" size="small" type="info" @click="historia(scope.row)"><span
                class="material-symbols-outlined">auto_stories</span></el-button>
          </template>
        </el-table-column>

        <!-- Agrega las demás columnas aquí -->

        <el-table-column prop="name" label="Nombres" sortable width="120" />
        <el-table-column label="Apellidos" sortable width="140">
          <template #default="scope">
            {{ scope.row.lastname1 + ' ' + scope.row.lastname2 }}
          </template>
        </el-table-column>
        <el-table-column label="Dirección" sortable width="500">
          <template #default="scope">
            {{ scope.row.ciudad+', ' + scope.row.colonia + ', '+scope.row.home+' #' + scope.row.numAddress }}
          </template>
        </el-table-column>
        <el-table-column prop="cell_phone" label="Numero Celular" sortable width="150" />

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
    </div>
    <!-- END TABLE DATA -->

    <!-- MODAL 1 -->
    <el-dialog v-model="dialogVisible" title="Deseas eliminar al siguente cliente" width="1200">
      <div class="h-72 overflow-scroll">
        Datos del cliente
        <br><br>
        Nombre: {{ selectedItem.name }} {{ selectedItem.lastname1 }} {{ selectedItem.lastname2 }}
        <br><br>
        Direccion: {{ selectedItem.ciudad }}, {{ selectedItem.colonia }}, {{ selectedItem.home }}, {{
          selectedItem.codigoPostal }}
        <br><br>
        Telefono: Datos de la base de datos {{ selectedItem.cell_phone }}
        <br><br>
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

    <!-- MODAL 2 -->
    <!--
    <el-dialog v-model="dialogVisibleView" title="Datos acerca del cliente" width="1000" height="500">
  <div class="client-details">
    <h2 class="client-details__title">Datos del cliente</h2>
    <p>
      Cliente: {{ selectedItem.name }} {{ selectedItem.lastname1 }} {{ selectedItem.lastname2 }}
    </p>
    <p>Nombre comercial: {{ selectedItem.tradename }}</p>
  </div>

  <div class="address-details">
    <h2 class="address-details__title">Datos del domicilio</h2>
    <p>
      Domicilio: {{ selectedItem.street }} {{ selectedItem.home }} #{{ selectedItem.numAddress }}, {{
        selectedItem.colonia
      }} #{{ selectedItem.codigoPostal }}, {{ selectedItem.ciudad }}
    </p>
    <p>Tipo de lugar: {{ selectedItem.comercio }}</p>
  </div>

  <div class="location-details">
    <h2 class="location-details__title">Datos de la ubicación</h2>
    <p>Cómo llegar: {{ selectedItem.how_to_get }}</p>
    <p>Descripción: {{ selectedItem.description }}</p>
  </div>

  <div class="contact-details">
    <h2 class="contact-details__title">Contacto</h2>
    <p>Número de celular: {{ selectedItem.cell_phone }}</p>
    <p>Número fijo: {{ selectedItem.number_fixed_number }}</p>
  </div>

  <div class="contract-details">
    <h2 class="contract-details__title">Datos de contratación</h2>
    <p>Tipo de contratación: {{ selectedItem.recruitment_data }}</p>
  </div>

  <template #footer>
    <div class="dialog-footer">
      <el-button type="success" @click="dialogVisibleView = false">Listo</el-button>
    </div>
  </template>
</el-dialog>
-->
      <el-dialog v-model="dialogVisibleView" title="Datos del cliente" width="600" height="500" >
      <div class="clientInfo">
          <div class="details">
            <i class="fa fa-user fa-2x iconInfo"></i>
            <!-- END MODAL 2 <h2 class="client-details__title">Información del Cliente</h2>-->
            <div>
            <p>
              <strong>Nombre completo:</strong> {{ selectedItem.name }} {{ selectedItem.lastname1 }} {{ selectedItem.lastname2 }}
            </p>
            <p>
              <strong>Nombre comercial:</strong> {{ selectedItem.tradename }}
            </p>
            </div>
          </div>
          <div class="details">
            <i class="fa fa-city fa-2x iconInfo"></i>
            <!-- END MODAL 2 <h2 class="client-details__title">Información del Cliente</h2>-->
<div>
            <p>
              <strong>Domicilio:</strong> {{ selectedItem.street }} {{ selectedItem.home }} #{{ selectedItem.numAddress }}, {{
        selectedItem.colonia
      }} #{{ selectedItem.codigoPostal }}, {{ selectedItem.ciudad }}
            </p>
            <p>
              <strong>Tipo de lugar:</strong> {{ selectedItem.comercio }}
            </p>
       </div>
          </div>
          
          </div>
           <template #footer>
    <div class="dialog-footer">
      <el-button type="primary" @click="dialogVisibleView = false">Listo</el-button>
    </div>
  </template>
          </el-dialog>
    <!-- END MODAL 2 -->
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
      axios.get('clientes').then(res => {
        this.tableData = res.data.data;
        this.filteredData = this.tableData;
      });
    },
    handleEdit() { },
    handleDelete() {
      axios.delete('clientes/' + this.selectedItem.id).then(res => {
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
    seleccionar(row) {
      console.log(row);
      this.selectedItem = row;
      this.dialogVisibleView = true;
    },
    historia(row) {
      if (row && row.id) {
        console.log(row);
        this.$router.push({ path: `/admin/worksComplete/${row.id}` });
      } else {
        console.error('Row is undefined or does not have an id:', row);
      }
    },
    filterData() {
      this.filteredData = this.tableData.filter(client => {
        return client.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          client.id.toString().includes(this.searchQuery) ||
          client.lastname1.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          client.lastname2.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          client.ciudad.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          client.colonia.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          client.numAddress.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          client.home.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          client.cell_phone.toLowerCase().includes(this.searchQuery.toLowerCase());
      });
    }
  }
};
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
p{
  color:#000000;
}

.client-details__title {
  color: #000;
  font-weight: bold;
  margin-bottom: 15px;
}

.iconInfo {
  color: #409eff;
  margin-right: 10px;
}
/* Estilos adicionales para otras secciones */
.address-details {
  /* Estilos específicos para la sección de dirección */
}
/* ... */
</style>

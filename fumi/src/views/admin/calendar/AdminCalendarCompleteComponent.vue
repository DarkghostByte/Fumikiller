<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start">
      <div class="flex flex-wrap items-start justify-end ">

        <router-link to="/admin/calendar"
          class="inline-flex px-5 py-3 text-white bg-blue-400 hover:bg-blue-700 focus:bg-blue-800 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-bookmark" aria-hidden="true" style="margin-top: 5px;
              margin-left: -5px; margin-right:10px;"></i>
          Agenda por realizar
        </router-link>

        <router-link to="/admin/calendar/complete"
          class="inline-flex px-5 py-3 text-white bg-green-400 hover:bg-green-600 focus:bg-green-700 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-check" aria-hidden="true" style="margin-top: 5px;
              margin-left: -5px; margin-right:10px;"></i>
          Agenda realizadas
        </router-link>

        <router-link to="/admin/works/edit-works"
          class="inline-flex px-5 py-3 text-white bg-yellow-400 hover:bg-yellow-500 focus:bg-yellow-600 rounded-md ml-6 mb-3"
          style="color:black">
          <i class="fa fa-circle-exclamation" aria-hidden="true" style="margin-top: 5px;
              margin-left: -5px; margin-right:10px;"></i>
          **************
        </router-link>

      </div>
    </div>
    <div class="mr-6">
      <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Agenda de ordenes de trabajo realizadas</h1>
    </div>

    <p>Agregar filtros de nombre, direccion, fecha, celular y monto</p>

    <div class="mainfiltros flex">
      <div class="tamaño px-1 py-4">
        <el-date-picker class="filtros" placeholder="Buscar por fecha:" v-model="searchQuery" @change="filterData"
          type="date" format="DD-MM-YYYY" value-format="DD-MM-YYYY" />
      </div>
      <div class="tamaño px-1 py-4">
        <el-date-picker class="filtros" placeholder="Buscar por fecha:" v-model="searchQuery" @change="filterData"
          type="date" format="DD-MM-YYYY" value-format="DD-MM-YYYY" />
      </div>
      <div class="tamaño px-1 py-4">
        <el-date-picker class="filtros" placeholder="Buscar por fecha:" v-model="searchQuery" @change="filterData"
          type="date" format="DD-MM-YYYY" value-format="DD-MM-YYYY" />
      </div>
      <div class="tamaño px-1 py-4">
        <el-date-picker class="filtros" placeholder="Buscar por fecha:" v-model="searchQuery" @change="filterData"
          type="date" format="DD-MM-YYYY" value-format="DD-MM-YYYY" />
      </div>
      <div class="tamaño px-1 py-4">
        <el-date-picker class="filtros" placeholder="Buscar por fecha:" v-model="searchQuery" @change="filterData"
          type="date" format="DD-MM-YYYY" value-format="DD-MM-YYYY" />
      </div>
    </div>


    <!-- TABLE DATA -->
    <div class="flex">
      <el-table :data="tableData" :default-sort="{ prop: 'name', order: 'descending' }" style="width: 100%">

        <el-table-column label="">
          <template #default>
            <router-link to="">
              <el-button style="color:black" size="small" type="success" @click="handleDelete()"><span
                  class="material-symbols-outlined">visibility</span></el-button>
            </router-link>
          </template>
        </el-table-column>

        <el-table-column prop="nameCliente" label="Nombre" sortable width="120" />
        <el-table-column prop="lastnameCliente1" label="Apellido Paterno" sortable width="155" />
        <el-table-column prop="lastnameCliente2" label="Apellido Materno" sortable width="160" />
        <el-table-column prop="direccionCliente" label="Dirección" sortable width="120" />
        <el-table-column prop="folioCliente" label="Folio" sortable width="100" />
        <el-table-column prop="numTelefono" label="Celular" sortable width="140" />
        <el-table-column prop="fechaAsistencia" label="Fecha de asistencia" sortable width="180" />
        <el-table-column prop="horaAsistencia" label="Hora de asistencia" sortable width="180" />
      </el-table>
    </div>
    <!-- END TABLE DATA -->
  </div>

</template>

<script>

export default {
  name: 'AdminHomeComponent',

  data: () => ({
    tableData: [],
  }),
  mounted() {
    this.tableData = [{
      nameCliente: 'Luis Angel',
      lastnameCliente1: 'Peña',
      lastnameCliente2: 'Mora',
      direccionCliente: 'No. 189, Grove St, Los Angeles',
      folioCliente: 'A-00001',
      numTelefono: '6361111111',
      fechaAsistencia: '2024-03-24',
      horaAsistencia: '10:00 P.M.',
    },
    {
      nameCliente: 'Jesus Liadeo',
      lastnameCliente1: 'Chavez',
      lastnameCliente2: 'Chavez',
      direccionCliente: 'No. 189, Grove St, Los Angeles',
      folioCliente: 'A-00002',
      numTelefono: '6362222222',
      fechaAsistencia: '2024-03-24',
      horaAsistencia: '10:00 P.M.',
    }
    ]
  },
  methods: {
    handleEdit() { },
    handleDelete() { },
  }
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
</style>

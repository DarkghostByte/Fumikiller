<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <div class="container mx-auto px-4">

    <div class="flex justify-between items-center mb-4">
      <h1 class="text-2xl font-semibold">Gestión de Facturas</h1>
      <div class="flex flex-wrap items-start justify-end ">
        <router-link to="/admin/facturas/views/" class="el-button el-button--success" style="color: black;">
          <i class="fa-solid fa-book" aria-hidden="true"
            style="margin-top: 5px; margin-left: -5px; margin-right:10px;"></i>
          Consultar todas las facturas
        </router-link>
      </div>
    </div>

    <!-- Campo de búsqueda -->
    <div class="flex mb-4" style="justify-content: center;">
      <div class="flex mb-4" style="width: 80%;">
        <el-input class="px-2" placeholder="Buscar por persona moral" v-model="searchQueryTradename" @input="filterData" />
        <el-input class="px-2" placeholder="Buscar por persona fisica" v-model="searchQueryName"
          @input="filterData" />
        <el-input class="px-2" placeholder="Buscar por direccion" v-model="searchQueryAddress"
          @input="filterData" />
        <el-input class="px-2" placeholder="Buscar por celular" v-model="searchQueryPhone" @input="filterData" />
      </div>
    </div>

    <!-- TABLE DATA -->
    <div class="flex" style="justify-content: center;">
      <el-table :data="filteredData" :default-sort="{ prop: 'id', order: 'ascending' }" style="width: 100%" stripe>
        <!-- Columnas de la tabla -->
        <el-table-column label="" width="100">
          <template #default="scope">
            <el-button @click="facturasRow(scope.row)" class="ml-2 el-button el-button--primary" style="color:black">
              <span class="material-symbols-outlined">Description</span>
            </el-button>
          </template>
        </el-table-column>

        <!-- Agrega las demás columnas aquí -->
        <el-table-column label="O. Trabajo" sortable width="115">
          <template #default="scope">
            {{ 'No. ' + this.formatDate(scope.row.id_orden) }}
          </template>
        </el-table-column>
        <el-table-column label="Estado" sortable width="100">
          <template #default="scope">
            {{ scope.row.facturaOrden }}
          </template>
        </el-table-column>
        <el-table-column label="Persona fisica" sortable width="220">
          <template #default="scope">
            {{ scope.row.name + ' ' + scope.row.lastname1 + ' ' + scope.row.lastname2 }}
          </template>
        </el-table-column>

        <el-table-column prop="tradename" label="Persona moral" sortable width="180" />
        <el-table-column prop="correo" label="Correo" sortable width="160" />
        <el-table-column prop="date2" label="F. Fumigacion" sortable width="140" />
        <el-table-column prop="pago" label="Monto" sortable width="150" />

      </el-table>
    </div>
    <!-- END TABLE DATA -->

    <!-- MODAL 2 -->
    <el-dialog v-model="dialogVisibleFactura" title="Facturación" width="30%">
      <el-form :model="form2" label-width="auto" style="max-width: 100%" ref="formRef3" :rules="rules"
        :label-position="'top'">
        <div class="clientInfo">
          <div class="details">
            <i class="fa fa-user fa-2x iconInfo"></i>
            <!-- END MODAL 2 <h2 class="client-details__title">Información del Cliente</h2>-->
            <div>
              <p>
                <strong>Nombre completo:</strong> {{ selectedItem.name }} {{ selectedItem.lastname1 }}
                {{ selectedItem.lastname2 }}
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
                <strong>Domicilio:</strong> {{ selectedItem.street }} {{ selectedItem.home }} #{{
                  selectedItem.numAddress}},
                {{ selectedItem.colonia }} #{{ selectedItem.codigoPostal }}, {{ selectedItem.ciudad }}
              </p>
              <p>
                <strong>Tipo de lugar:</strong> {{ selectedItem.comercio }}
              </p>
            </div>
  
          </div>
          <div class="details">
            <i class="fa fa-phone fa-2x iconInfo"></i>
            <div>
              <p>
                <strong>Numero de celular:</strong> {{ selectedItem.cell_phone }}
              </p>
              <p>
                <strong>Correo:</strong> {{ selectedItem.correo }}
              </p>
            </div>
          </div>
          <div class="details">
            <i class="fa fa-calendar-days fa-2x iconInfo"></i>
            <div>
              <p>
                <strong>Fecha:</strong> {{ selectedItem.date1 }}
              </p>
            </div>
          </div>
          <div class="details">
            <i class="fa fa-file-contract fa-2x iconInfo"></i>
            <div>
              <el-form-item class="label-negro" prop="facturaOrden" label="Folio de factura:" style="color: black; width: 300px;">
                <el-input type="number" v-model="form2.facturaOrden" class="px-1" placeholder="Ingresa el folio"/>
              </el-form-item>
            </div>
          </div>
        </div>
      </el-form>
      
    
      <template #footer>
        <span class="dialog-footer">
          <el-button @click="dialogVisibleFactura = false">Cancelar</el-button>
          <el-button type="primary" @click="createFactura">Crear</el-button>
        </span>
      </template>
    </el-dialog>
    <!-- END MODAL 2 -->
  </div>
</template>

<script>
import axios from 'axios';
import { ElNotification } from 'element-plus';

export default {
  name: 'AdminRemisionesViewComponent',
  data: () => ({
    formRef3: undefined,
    dialogVisible: false,
    dialogVisibleView: false,
    dialogVisibleFactura: false,
    url: process.env.VUE_APP_ROOT_ASSETS,
    urlApi: process.env.VUE_APP_ROOT_API,
    tableData: [],
    filteredData: [],
    selectedItem: {},
    searchQuery: '',
    searchQueryTradename: '',
    searchQueryName: '',
    searchQueryAddress: '',
    searchQueryPhone: '',
    form2:{
      facturaOrden: '',
    },
    rules: {
      facturaOrden: [
        { required: true, message: 'Este campo es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
    },
    rules3: {
      folioFactura: [
        { required: true, message: 'Este campo es requerido', trigger: 'blur' },
      ],
    }
  }),
  mounted() {
    this.refresh();
  },
  methods: {
    refresh() {
      axios.get('completarOrden').then(res => {
        this.tableData = res.data.data.filter(row => row.facturaOrden === 'Pendiente');
        this.filteredData = this.tableData;
        console.log('Datos', this.tableData)
      });
    },
    seleccionar(row) {
      console.log(row);
      this.selectedItem = row;
      this.dialogVisibleView = true;
    },
    facturasRow(row) {
      console.log(row);
      this.selectedItem = row;
      this.dialogVisibleFactura = true;
    },

    createFactura() {
  this.$refs.formRef3.validate(async (valid) => {
    if (valid) {
      try {
        const updatedData = { facturaOrden: this.form2.facturaOrden };
        await axios.put('datoNuevo/' + this.selectedItem.id, updatedData)
          .then(response => {
            console.log('Estado actualizado correctamente:', response.data);
            this.refresh();
            ElNotification({
              title: 'Actualización de datos',
              message: `Se actualizaron los datos.`,
              type: 'success'
            });
          })
          .catch(error => {
            console.error('Error al actualizar el estado:', error);
            this.$message.error('Error al actualizar el estado');
            ElNotification({
              title: 'Error',
              message: 'Ocurrió un error al actualizar.',
              type: 'error'
            });
          });
        this.dialogVisibleFactura = false;
        this.refresh();
        this.$refs.formRef3.resetFields();
        this.$message.success('La factura se creo correctamente');
      } catch (error) {
        console.error('Error creating factura:', error.response.data);
        this.$message.error('Error al crear el factura');
        ElNotification({
          title: 'Error',
          message: 'Favor de llenar los campos',
          type: 'error'
        });
      }
    } else {
      console.log('Validation failed');
      console.log('Validation failed');
      ElNotification({
        title: 'Error',
        message: 'Favor de llenar los campos',
        type: 'error'
      });
      return false;
    }
  });
},

    filterData() {
  this.filteredData = this.tableData.filter((clientes) => {
    const combinedName = clientes.name.toLowerCase() + ' ' + clientes.lastname1.toLowerCase() + ' ' + clientes.lastname2.toLowerCase();
    const combinedAddress = clientes.ciudad.toLowerCase() + ' ' + clientes.colonia.toLowerCase() + ' ' + clientes.home.toLowerCase() + ' ' + clientes.codigoPostal.toLowerCase() + ' ' + clientes.numAddress.toLowerCase();
    
    // Check each condition based on search queries
    let shouldInclude = true; // Start with assuming inclusion

    if (this.searchQueryTradename) {
      shouldInclude = shouldInclude && clientes.tradename.toLowerCase().includes(this.searchQueryTradename.toLowerCase());
    }

    if (this.searchQueryName) {
      shouldInclude = shouldInclude && combinedName.includes(this.searchQueryName.toLowerCase());
    }

    if (this.searchQueryAddress) {
      shouldInclude = shouldInclude && combinedAddress.includes(this.searchQueryAddress.toLowerCase());
    }

    if (this.searchQueryPhone) {
      shouldInclude = shouldInclude && clientes.cell_phone.toLowerCase().includes(this.searchQueryPhone.toLowerCase());
    }

    return shouldInclude;
  });
},

    handleEstadoClick() {
      const newStatus = this.selectedItem.infoclient_delete === 'Alta' ? 'Baja' : 'Alta'; // Toggle status based on current value
      axios.put('desactivarCliente/' + this.selectedItem.id, { infoclient_delete: newStatus })
        .then(response => {
          console.log('El cliente se dio de baja:', response.data);
          this.refresh(); // Consider removing this line if refresh() is triggered elsewhere
          this.dialogVisible = false;
          ElNotification({
            title: 'Actualizacion de datos',
            message: `Se actualizaron los datos.`,
            type: 'success'
          });
        })
        .catch(error => {
          console.error('Error al dar de baja al cliente:', error.response.data);
        });
    },

    async fetchData() {
      try {
        const responseOrdenes = await axios.get(this.urlApi + 'clientes');
        this.tableData = responseOrdenes.data.data.filter(row => row.infoclient_remision !== 'No');
      } catch (error) {
        console.error('Error al obtener los datos:', error);
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
  padding: 15px;
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

.iconInfo {
  color: #409eff;
  margin-right: 10px;
}

.iconDelete {
  color: #f32222;
  margin-right: 10px;
}
</style>

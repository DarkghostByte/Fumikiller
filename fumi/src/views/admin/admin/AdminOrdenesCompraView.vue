<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <div>
    <div class="container mx-auto px-4">

      <!-- INICIO -->
      <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Gestión de Ordenes de Compra</h1>
        <div class="py-3">
          <router-link to="/admin/admin" class="el-button el-button--danger">
            <i class="fa fa-rotate-left" aria-hidden="true"
              style="margin-top: 5px; margin-left: -5px; margin-right:10px;"></i>
            Regresar
          </router-link>
        </div>

      </div>
      

      <!-- END INICIO -->

      <!-- TABLE DATA -->
    <div class="flex" style="justify-content: center;">
      <el-table :data="filteredData" :default-sort="{ prop: 'id', order: 'descending' }" style="width: 80%;" stripe>

        <!--BOTON PARA VISUALIZAR EL PDF DE LA ORDEN DE TRABAJO-->
        <el-table-column label="" style="text-align:center;" align="center">
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
        <el-table-column prop="fechaOrdenCompra" label="Fecha" sortable  align="center"/>
        <el-table-column prop="conceptoOrdenCompra" label="Concepto" sortable align="center" />
        <el-table-column prop="empleadoOrdenCompra" label="Empleado" sortable align="center"/>
        <el-table-column prop="importeOrdenCompra" label="Importe" sortable align="center"/>
        <!--FIN DE LA VISUALIZACION DE LA TABLA-->

        <!-- Botones de acción -->
        <el-table-column label="" style="text-align:center;">
          <template #default="scope">
            <button>
              <el-button style="color:black" size="small" type="warning" @click="handleEdit(scope.row)"><span
                  class="material-symbols-outlined">edit</span></el-button>
            </button>
          </template>
        </el-table-column>
      </el-table>
    </div>
    <!-- END TABLE DATA -->
      <!-- MODAL 2 -->
      <el-dialog v-model="dialogVisibleView" title="Datos del cliente" width="600" height="500">
        <div class="clientInfo">
          <div class="details">
            <i class="fa fa-user fa-2x iconInfo"></i>
            <!-- END MODAL 2 <h2 class="client-details__title">Información del Cliente</h2>-->
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
            <i class="fa fa-city fa-2x iconInfo"></i>
            <!-- END MODAL 2 <h2 class="client-details__title">Información del Cliente</h2>-->
            <div>
              <p>
                <strong>Domicilio:</strong> {{ selectedItem.street }} {{ selectedItem.home }} #{{
                  selectedItem.numAddress
                }},
                {{
                  selectedItem.colonia
                }} #{{ selectedItem.codigoPostal }}, {{ selectedItem.ciudad }}
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
                <strong>Número fijo:</strong> {{ selectedItem.number_fixed_number }}
              </p>
            </div>
          </div>
          <div class="details">
            <i class="fa fa-location-dot fa-2x iconInfo"></i>
            <div>
              <p>
                <strong>Como llegar:</strong> {{ selectedItem.how_to_get }}
              </p>
              <p>
                <strong>Descripcion:</strong> {{ selectedItem.description }}
              </p>
            </div>
          </div>
          <div class="details">
            <i class="fa fa-file-contract fa-2x iconInfo"></i>
            <div>
              <p>
                <strong>Tipo de contratación:</strong> {{ selectedItem.recruitment_data }}
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
    dialogVisibleCreateOrdenCompra: false,
    dialogVisibleEditOrdenCompra: false,
    form1: {
      fechaOrdenCompra: '',
      paraOrdenCompra: '',
      conceptoOrdenCompra: '',
      detalleOrdenCompra: '',
      empleadoOrdenCompra: '',
      importeOrdenCompra: '',
      autorizoOrdenCompra: '',
    },
    formEdit: {
      fechaOrdenCompra: '',
      paraOrdenCompra: '',
      conceptoOrdenCompra: '',
      detalleOrdenCompra: '',
      empleadoOrdenCompra: '',
      importeOrdenCompra: '',
      autorizoOrdenCompra: '',
    },
    rules: {
      fechaOrdenCompra: [
        { required: true, message: 'La fecha es requerida', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      paraOrdenCompra: [
        { required: true, message: 'Este campo es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      conceptoOrdenCompra: [
        { required: true, message: 'Este campo es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      detalleOrdenCompra: [
        { required: true, message: 'Este campo es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      empleadoOrdenCompra: [
        { required: true, message: 'Este campo es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      importeOrdenCompra: [
        { required: true, message: 'Este campo es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
      autorizoOrdenCompra: [
        { required: true, message: 'Este campo es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
    }
  }),
  mounted() {
    this.refresh();
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

    handleEdit(row) {
      console.log(row);
      this.formEdit = row;
      this.dialogVisibleEditOrdenCompra = true;
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

    submitForm() {
      this.$refs.formRef.validate((valid) => {
        if (valid) {
          axios.post('ordenCompra', this.form1)
            .then(response => {
              console.log('Form submitted successfully:', response.data);
              this.$router.push('/admin/ordenCompra');
              ElNotification({
                title: 'Alerta',
                message: 'Registro insertado correctamente',
                type: 'success'
              })
              this.refresh();
              this.dialogVisibleCreateOrdenCompra = false;
              this.$refs.formRef.resetFields();
            })
            .catch(error => {
              console.error('Error submitting form:', error);
              ElNotification({
                title: 'Error',
                message: 'Favor de llenar los campos',
                type: 'error'
              })
            });
        } else {
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

    editOrdenCompra() {
      this.$refs.formEditRef.validate((valid) => {
        if (valid) {
          console.log('Form is valid, sending PUT request');
          axios.put('ordenCompra/'+this.formEdit.id,this.formEdit)
            .then(res => {
              console.log(res);
              this.refresh();
              this.dialogVisibleEditOrdenCompra = false;
              this.$message.success('Ciudad actualizada exitosamente');
              this.$refs.formEditRef.resetFields();
              ElNotification({
                title: 'Alerta',
                message: 'Registro actualizado correctamente',
                type: 'success'
              })
            })
            .catch(error => {
              console.log(error);
              this.$message.error('Error al actualizar la ciudad');
              ElNotification({
                title: 'Error',
                message: 'Favor de verificar los datos',
                type: 'error'
              })
            });
        } else {
          console.log('Validation failed, check form errors');
          console.log('Validation failed');
          ElNotification({
            title: 'Error',
            message: 'Favor de llenar los campos',
            type: 'error'
          })
        }
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

.iconInfo {
  color: #409eff;
  margin-right: 10px;
}

.iconDelete {
  color: #f32222;
  margin-right: 10px;
}
</style>

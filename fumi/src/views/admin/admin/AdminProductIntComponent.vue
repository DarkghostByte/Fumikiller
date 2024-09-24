<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


  <div>
    <div class="container mx-auto px-4">

      <!-- INICIO -->
      <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Gestión de Productos Internos</h1>
        <div class="flex" style="width: 25%;">
          <el-input class="" placeholder="Buscar por producto interno" v-model="searchQueryProductInt"
            @input="filterDataProductInt" />
        </div>
        <div>
          <router-link to="/admin/admin" class="el-button el-button--danger">
            <i class="fa fa-rotate-left" aria-hidden="true"
              style="margin-top: 5px; margin-left: -5px; margin-right:10px;"></i>
            Regresar
          </router-link>
          <el-button @click="dialogVisibleCreate = true" class="ml-2 el-button el-button--primary">
            <i class="fa-solid fa-house-medical-circle-check" aria-hidden="true" style="margin-top: 5px; margin-left: -5px; margin-right:10px;"></i>
            Nuevo Producto Interno
          </el-button>
        </div>
      </div>
      <!-- END INICIO -->

      <!-- TABLE -->
      <div class="flex" style="justify-content: center;">
        <el-table :data="filteredData" :default-sort="{ prop: 'productoInt', order: 'ascending' }" style="width: 40%;">
          <el-table-column prop="productoInt" label="Nombre del producto Interno" sortable />
          <el-table-column label="Acciones">
            <template #default="scope">
              <div class="flex justify-around">
                <el-button style="color:black" size="small" type="warning" @click="handleEdit(scope.row)">
                  <span class="material-symbols-outlined">edit</span>
                </el-button>
                <el-button style="color:black" size="small" type="danger" @click="eliminar(scope.row)">
                  <span class="material-symbols-outlined">delete</span>
                </el-button>
              </div>
            </template>
          </el-table-column>
        </el-table>
      </div>
      <!-- END TABLE -->

      <!-- MODAL 1 -->
      <el-dialog v-model="dialogVisibleCreate" title="Agregar nuevo producto interno" width="20%">
        <el-form :model="form1" label-width="auto" style="max-width: 100%" ref="formRef" :rules="rules"
          :label-position="'top'">
          <div class="row">
            <el-form-item prop="productoInt" label="Producto Interno:">
              <el-input v-model="form1.productoInt" class="px-1" placeholder="Ingresa el producto interno" />
            </el-form-item>
          </div>
        </el-form>
        <template #footer>
          <span class="dialog-footer">
            <el-button @click="dialogVisibleCreate = false">Cancelar</el-button>
            <el-button type="primary" @click="createProductInt">Crear</el-button>
          </span>
        </template>
      </el-dialog>
      <!-- END MODAL 1 -->

    <el-dialog v-model="dialogVisible" title="¿Deseas eliminar el siguente producto interno?" width="25%" height="500">
      <div class="clientInfo">
        <div class="details">
          <i class="fa-solid fa-house-medical-circle-check fa-2x iconProductInt"></i>
          <!-- END MODAL 2 <h2 class="client-details__title">Información del Cliente</h2>-->
          <div>
            <p>
              <strong>Producto interno: </strong> {{ selectedItem.productoInt }}
            </p>
          </div>
        </div>
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
    <!-- END MODAL 2 -->

    <!-- MODAL 3 -->
    <el-dialog v-model="dialogVisibleEdit" title="Editar Producto Interno" width="25%">
      <el-form :model="formEdit" label-width="auto" style="max-width: 100%" ref="formEditRef" :rules="rules" :label-position="'top'">
        <div class="clientInfo">
          <div class="details">
            <i class="fa-solid fa-house-medical-circle-check fa-2x iconProductIntEdit"></i>
            <!-- END MODAL 2 <h2 class="client-details__title">Información del Cliente</h2>-->
            <div class="flex" style="width: 100%;">
              <el-form-item prop="productoInt" label="Producto Interno:" style="width: 100%;">
                <el-input v-model="formEdit.productoInt" class="px-1" placeholder="Ingresa el producto interno" />
              </el-form-item>
            </div>
          </div>
        </div>
      </el-form>
      <template #footer>
        <span class="dialog-footer">
          <el-button @click="dialogVisibleEdit = false">Cancelar</el-button>
          <el-button type="warning" @click="editProductInt">Actualizar</el-button>
        </span>
      </template>
    </el-dialog>
    <!-- END MODAL 3 -->

    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { ElNotification } from 'element-plus';

export default {
  name: 'AdminCologneComponent',
  data: () => ({
    dialogVisible: false,
    dialogVisibleView: false,
    dialogVisibleCreate: false,
    dialogVisibleEdit: false,
    url: process.env.VUE_APP_ROOT_ASSETS,
    urlApi: process.env.VUE_APP_ROOT_API,
    tableData: [],
    filteredData: [],
    selectedItem: {},
    searchQueryProductInt: '',
    form1: {
      productoInt: '',
    },
    formEdit: {
      productoInt: '',
    },
    rules: {
      productoInt: [
        { required: true, message: 'El producto interno es requerido', trigger: 'blur' },
        { min: 1, max: 100, message: 'Longitud debería ser 1 a 100', trigger: 'blur' }
      ],
    }
  }),
  mounted() {
    this.refresh();
  },
  methods: {
    refresh() {
      axios.get('productosInternos').then(res => {
        this.tableData = res.data.data;
        this.filteredData = this.tableData;
      });
    },

    handleEdit(row) {
      console.log(row);
      this.formEdit = row;
      this.dialogVisibleEdit = true;
    },

    eliminar(row) {
      console.log(row);
      this.selectedItem = row;
      this.dialogVisible = true;
    },

    handleDelete() {
      axios.delete('productosInternos/' + this.selectedItem.id).then(res => {
        console.log(res);
        this.refresh();
        this.dialogVisible = false;
      ElNotification({
        title: 'Eliminacion',
        message: 'Registro se elimino correctamente',
        type: 'success'
      })
      });
    },


    createProductInt() {
      this.$refs.formRef.validate((valid) => {
        if (valid) {
          axios.post('productosInternos', this.form1)
            .then(res => {
              console.log(res);
              this.dialogVisibleCreate = false;
              this.refresh();
              this.$message.success('Tipo de comercio creado exitosamente');
              ElNotification({
                title: 'Alerta',
                message: 'Registro insertado correctamente',
                type: 'success'
              })
            })
            .catch(error => {
              console.log(error);
              this.$message.error('Error al crear el tipo de comercio');
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

    filterDataProductInt() {
      this.filteredData = this.tableData.filter((productosInternos) => {
        return productosInternos.productoInt.toLowerCase().includes(this.searchQueryProductInt.toLowerCase());
      });
    },

    editProductInt() {
      this.$refs.formEditRef.validate((valid) => {
        if (valid) {
          console.log('Form is valid, sending PUT request');
          axios.put('productosInternos/'+this.formEdit.id,this.formEdit)
            .then(res => {
              console.log(res);
              this.refresh();
              this.dialogVisibleEdit = false;
              this.$message.success('Producto Interno actualizado exitosamente');
              ElNotification({
                title: 'Alerta',
                message: 'Registro actualizado correctamente',
                type: 'success'
              })
            })
            .catch(error => {
              console.log(error);
              this.$message.error('Error al actualizar el producto interno');
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
  align-items:center;

}

p {
  color: #000000;
  display: flex;
  text-align: center;
}

.client-details__title {
  color: #000;
  font-weight: bold;
  margin-bottom: 15px;
}

.iconProductInt {
  color: #f32222;
  margin-right: 10px;
}

.iconProductIntEdit {
  color: #e6a23c;
  margin-right: 10px;
}
</style>

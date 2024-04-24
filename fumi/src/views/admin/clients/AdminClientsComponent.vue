<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start">
        <div class="flex flex-wrap items-start justify-end ">

          <router-link to="/admin/clients" class="inline-flex px-5 py-3 text-white bg-blue-400 hover:bg-blue-700 focus:bg-blue-800 rounded-md ml-6 mb-3"
          style="color:black">
            <i class="fa fa-search" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>                
            Consultar Cliente
          </router-link>

          <router-link to="/admin/clients/add-clients" class="inline-flex px-5 py-3 text-white bg-green-400 hover:bg-green-600 focus:bg-green-700 rounded-md ml-6 mb-3" style="color:black">
            <i class="fa fa-plus-circle" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>                
            Nuevo Cliente
          </router-link>

        </div>


    </div>

    <div class="mr-6">
      <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Clientes</h1>
    </div>

        <!-- TABLE DATA -->
        <div class="flex">
            <el-table
                :data="tableData"
                :default-sort="{ prop: 'name', order: 'descending' }"
                style="width: 100%"
            >
            <el-table-column label="">
              <template #default>
                <el-button style="color:black"
                  size="small"
                  type="success"
                  @click="dialogVisibleView = true"
                  ><span class="material-symbols-outlined">visibility</span></el-button
                >
              </template>

              
            </el-table-column>
            <el-table-column label="">
              <template #default>
                
                <el-button style="color:black"
                  size="small"
                  type="success"
                  @click="dialogVisibleView = true"
                  ><span class="material-symbols-outlined">lab_profile</span></el-button
                >
              </template>
            </el-table-column>
                <el-table-column prop="lastname1" label="Apellidos" sortable width="125" />
                <el-table-column prop="lastname2" label="Apellidos" sortable width="125" />
                <el-table-column prop="name" label="Nombres"  sortable width="110"/>
                <el-table-column prop="city" label="Ciudad"  sortable width="155"/>                
                <el-table-column prop="home" label="Dirección" sortable width="160" />
                <el-table-column prop="cell_phone" label="Numero Celular"  sortable width="150" />
                <el-table-column prop="number_fixed_number" label="Numero Fijo"  sortable width="140" />





                <!-- 
                <el-table-column prop="apCliente" label="Apellidos" sortable width="155" />
                <el-table-column prop="nameCliente" label="Nombres"  sortable width="110"/>
                <el-table-column prop="ciudad" label="Ciudad"  sortable width="160"/>                
                <el-table-column prop="address" label="Dirección" sortable width="160" />
                <el-table-column prop="numCelu" label="Numero Celular"  sortable width="160" />
                <el-table-column prop="numTel" label="Numero Fijo"  sortable width="130" />
                -->
                <el-table-column label="">
                  <template #default>
                    <router-link to="/admin/clients/edit-clients">
                      <el-button style="color:black"
                        size="small"
                        type="warning"
                        @click="handleDelete()"
                        ><span class="material-symbols-outlined">edit</span></el-button
                      >
                    </router-link>
                  </template>
                </el-table-column>

                <el-table-column label="">
                    <template #default>
                        <el-button style="color:black"
                        size="small"
                        type="danger"
                        @click="dialogVisible = true"
                        ><span class="material-symbols-outlined">delete</span></el-button
                        >
                    </template>
                  </el-table-column>
            </el-table>
        </div>
        <!-- END TABLE DATA -->

        <!-- MODAL 1 -->

        <el-dialog
        v-model="dialogVisible"
        title="Deseas eliminar al siguente cliente"
        width="400">

        <div class="h-72 overflow-scroll">
          Datos del cliente
          <br><br>
          Nombre: Datos de la base de datos (Nombre y apellidos)
          <br><br>
          Direccion: Datos de la base de datos (Direccion)
          <br><br>
          Telefono: Datos de la base de datos (Numero de telefono)
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

        <el-dialog
        v-model="dialogVisibleView"
        title="Datos acerca del cliente"
        width="600">

        <div class="h-72 overflow-scroll">

          <p style="font-size: 18px;">Datos del cliente</p>
          Nombre: Nombre
          <br>
          Apellido Paterno: Apellido Paterno
          <br>
          Apellido Materno: Apellido Materno
          <br>
          Nombre comercial: Nombre comercial
          <br><br>

          <p style="font-size: 18px;">Direccion</p>
          Tipo de calle: Tipo de calle
          <br>
          Domicilio: Domicilio
          <br>
          Codigo postal: Codigo postal
          <br>
          Colonia: Colonia
          <br>
          Tipo de lugar: Tipo de lugar
          <br><br>

          
          <p style="font-size: 18px;">Ubicacion</p>
          Descripcion: Descripcion
          <br>
          Como llegar: Como llegar
          <br><br>

          <p style="font-size: 18px;">Contacto</p>
          Numero de celular: Numero de celular
          <br>
          Numero fijo: Numero fijo
          <br><br>
        </div>
        
        <template #footer>
            <div class="dialog-footer">
            <el-button type="success" @click="dialogVisibleView = false">Listo</el-button>
            </div>
        </template>
        </el-dialog>

        <!-- END MODAL 2 -->


    </div>
  
  </template>
  
  <script>
      import axios from 'axios';
      export default {
          name:'AdminHomeComponent',
          /*
            data:()=>({
                tableData:[],
                url:process.env.VUE_APP_ROOT_ASSETS,
          }),
          mounted(){
            this.tableData = []
            axios.get('products').then(res=>{
              this.tableData=res.data.data
            })
          },
          */
          data:()=>({
            dialogVisible: false,
            dialogVisibleView: false,
            url:process.env.VUE_APP_ROOT_ASSETS,
            tableData:[],
          }),
          mounted(){
            this.tableData = []
            axios.get('clientes').then(res=>{
              this.tableData=res.data.data
            })
          },
          methods:{
            handleEdit(){},
            handleDelete(){},
          }
      }
  </script>
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

          <router-link to="/admin/clients/agregarComercio-clients" class="inline-flex px-5 py-3 text-white bg-green-400 hover:bg-green-600 focus:bg-green-700 rounded-md ml-6 mb-3" style="color:black">
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
                stripe 
            >
            <el-table-column label="">
              <template #default="scope">
                <el-button style="color:black"
                  size="small"
                  type="success"
                  @click="seleccionar(scope.row)"
                  ><span class="material-symbols-outlined">visibility</span></el-button
                >
              </template>
            </el-table-column>
            <!--
            <el-table-column label="">
              <template #default="scope">
                <el-button style="color:black"
                  size="small"
                  type="success"
                  @click="pdf(scope.row)">
                  <a :href="url+'api/orden1/'+scope.row.id" target="_blank">
                    <span class="material-symbols-outlined">lab_profile</span>
                  </a>
                </el-button>

              </template>
            </el-table-column>
            -->

            
            <el-table-column label="">
              <template #default="scope">
                <el-button style="color:black"
                  size="small"
                  type="success"
                  @click="pdf(scope.row)">
                  <a :href="url+'api/certificado/'+scope.row.id" target="_blank">
                    <span class="material-symbols-outlined">lab_profile</span>
                  </a>
                </el-button>
              </template>
            </el-table-column>

            <el-table-column label="">
              <template #default="scope">
                <router-link :to="'/admin/works/add-works/'+scope.row.id">
                  <el-button style="color:black"
                    size="small"
                    type="warning"
                    @click="handleEdit()"
                    ><span class="material-symbols-outlined">bug_report</span></el-button>
                </router-link>
              </template>
            </el-table-column>
                <el-table-column prop="name" label="Nombres"  sortable width="120"/>
                <el-table-column label="Apellidos" sortable width="140">
                  <template #default="scope">
                    {{ scope.row.lastname1+' '+scope.row.lastname2 }}
                  </template>
                </el-table-column>
                <el-table-column prop="ciudad" label="Ciudad"  sortable width="160"/>                
                <el-table-column prop="home" label="Dirección" sortable width="150" />
                <el-table-column label="Num. de domicilio" sortable width="165">
                  <template #default="scope">
                    {{ '#'+scope.row.numAddress }}
                  </template>
                </el-table-column>
                <el-table-column prop="cell_phone" label="Numero Celular"  sortable width="150" />
                <el-table-column label="">
                  <template #default="scope">
                    <router-link :to="'/admin/clients/edit-clients/'+scope.row.id">
                      <el-button style="color:black"
                        size="small"
                        type="warning"
                        @click="handleEdit()"
                        ><span class="material-symbols-outlined">edit</span></el-button
                      >
                    </router-link>
                  </template>
                </el-table-column>

                <el-table-column label="">
                    <template #default="scope">
                        <el-button style="color:black"
                        size="small"
                        type="danger"
                        @click="eliminar(scope.row)"
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
        width="1200">

        <div class="h-72 overflow-scroll">
          Datos del cliente
          <br><br>
          Nombre: {{ selectedItem.name }} {{ selectedItem.lastname1 }} {{ selectedItem.lastname2 }}
          <br><br>
          Direccion: {{ selectedItem.ciudad }}, {{ selectedItem.colonia }}, {{ selectedItem.home }}, {{ selectedItem.codigoPostal }}
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

        <el-dialog
        v-model="dialogVisibleView"
        title="Datos acerca del cliente"
        width="1500"
        height="400">

        <div class="h-72 overflow-scroll" style="font-size: 20px;">

          <p style="font-size: 22px;">Datos del cliente</p>
          Cliente: {{ selectedItem.name }} {{ selectedItem.lastname1 }} {{ selectedItem.lastname2 }}
          <br>
          Nombre comercial: {{ selectedItem.tradename }}
          <br><br>

          <p style="font-size: 22px;">Datos del domicilio</p>
          Domicilio: {{ selectedItem.street }} {{ selectedItem.home }} #{{ selectedItem.numAddress }}, {{ selectedItem.colonia }} #{{ selectedItem.codigoPostal }}, {{ selectedItem.ciudad }}
          <br>
          Tipo de lugar: {{ selectedItem.comercio }}
          <br><br>

          
          <p style="font-size: 22px;">Datos de la ubicacion</p>
          Como llegar: {{ selectedItem.how_to_get }} 
          <br>
          Descripcion: {{ selectedItem.description }}
          <br><br>

          <p style="font-size: 22px;">Contacto</p>
          Numero de celular: {{ selectedItem.cell_phone }}
          <br>
          Numero fijo: {{ selectedItem.number_fixed_number }}
          <br><br>

          <p style="font-size: 22px;">Contacto</p>
          Tipo de contratacion: {{ selectedItem.recruitment_data }}
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
          name:'AdminClientsComponent',
          data:()=>({
            dialogVisible: false,
            dialogVisibleView: false,
            url:process.env.VUE_APP_ROOT_ASSETS,
            urlApi:process.env.VUE_APP_ROOT_API,
            tableData:[],
            selectedItem: null
          }),
          mounted(){
            this.refresh()
          },
          methods:{
            refresh(){
              this.tableData = []
              axios.get('clientes').then(res=>{
              this.tableData=res.data.data
            })
            },
            handleEdit(){
            },
            handleDelete(){
              axios.delete('clientes/'+this.selectedItem.id).then(res=>{
              console.log(res)
              this.refresh()
              this.dialogVisible=false
            })
            },
            eliminar(row){
              console.log(row)
              this.selectedItem=row
              this.dialogVisible=true
            },
            seleccionar(row){
            console.log(row)
            this.selectedItem=row
            this.dialogVisibleView=true
            },
            pdf(row){
            console.log(row)
            this.selectedItem=row
            },
          }
      }
  </script>
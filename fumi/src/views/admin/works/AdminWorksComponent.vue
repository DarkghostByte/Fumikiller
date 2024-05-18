<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div>
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start" >
          <div class="flex flex-wrap items-start justify-end ">

            <!--RUTAS ENTRES VISTAS-->
            <router-link to="/admin/clients" class="inline-flex px-5 py-3 text-white bg-blue-400 hover:bg-blue-700 focus:bg-blue-800 rounded-md ml-6 mb-3"
            style="color:black">
              <i class="fa fa-search" aria-hidden="true" style="margin-top: 5px;
              margin-left: -5px; margin-right:10px;"></i>                
              Ver Clientes
            </router-link>
            <!--FIN DE RUTAS ENTRES VISTAS-->

          </div>
        </div>
        <div class="mr-6">
          <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Ordenes de trabajo</h1>
        </div>

        <!-- TABLE DATA -->
        <div class="flex">
            <el-table
                :data="tableData"
                :default-sort="{ prop: 'name', order: 'descending' }"
                style="width: 100%"
                stripe>

              <!--BOTON PARA VISUALIZAR EL PDF DE LA ORDEN DE TRABAJO-->
              <el-table-column label="">
                <template #default="scope">
                  <el-button style="color:black"
                    size="small"
                    type="success"
                    @click="pdf(scope.row)">
                      <a :href="url+'api/orden-de-trabajo/'+scope.row.id_cliente+'/'+scope.row.id" target="_blank">
                      <span class="material-symbols-outlined">lab_profile</span>
                      </a>
                  </el-button>
                </template>
            </el-table-column>
            <!--FIN DEL BOTON PARA VISUALIZAR EL PDF DE LA ORDEN DE TRABAJO-->

            <!--VISUALIZACION DE LA TABLA-->
            <el-table-column label="Nombre" sortable width="200">
              <template #default="scope">
                {{ scope.row.name+' '+scope.row.lastname1+' '+scope.row.lastname2 }}
              </template>
            </el-table-column>
            <el-table-column label="Direccion" sortable width="200">
              <template #default="scope">
                {{ scope.row.home+' #'+scope.row.numAddress }}
              </template>
            </el-table-column>
            <el-table-column label="Colonia" sortable width="150">
              <template #default="scope">
                {{ scope.row.cologne+' #'+scope.row.cp }}
              </template>
            </el-table-column>
            <el-table-column prop="city" label="Cuidad"  sortable width="170" />
            <el-table-column prop="date1" label="Fecha de orden"  sortable width="150" />
            <el-table-column prop="date2" label="Fecha de asistencia" sortable width="170" />
            <el-table-column prop="time1" label="De" sortable width="100"  />
            <el-table-column prop="time2" label="A" sortable width="100"  />
            <!--FIN DE LA VISUALIZACION DE LA TABLA-->

            <!--BOTON PARA TERMINAR LA ORDEN DE TRABAJO-->
            <el-table-column label="">
              <template #default>
                <router-link to="/admin/works/complete-works" >
                  <el-button style="color:black"
                    size="small"
                    type="success"
                    @click="completarOrden()">
                      <span class="material-symbols-outlined">priority</span>
                  </el-button>
                </router-link>
              </template>
            </el-table-column>
            <!--FIN DEL BOTON PARA TERMINAR LA ORDEN DE TRABAJO-->

            <!--BOTON PARA DAR DE BAJA LA ORDEN DE TRABAJO-->
            <el-table-column label="">
              <template #default="scope">
                  <el-button style="color:black"
                    size="small"
                    type="danger"
                    @click="bajaOrden(scope.row)">
                      <span class="material-symbols-outlined">disabled_by_default</span>
                  </el-button>
              </template>
            </el-table-column>
            <!--FIN DEL BOTON PARA DAR DE BAJA LA ORDEN DE TRABAJO-->
            </el-table>
        </div>
        <!-- END TABLE DATA -->

        <!-- INICIO DEL DIALOGO PARA ELIMINAR -->
        <el-dialog
        v-model="dialogVisible"
        title="Deseas dar de baja la siguente orden de trabajo"
        width="1200">
          <div class="h-72 overflow-scroll" style="font-size:22px; color:black;">
            Datos la orden de trabajo
            <br>
            Nombre: {{ selectedItem.name }} {{ selectedItem.lastname1 }} {{ selectedItem.lastname2 }}
            <br>
            Direccion: {{ selectedItem.city }}, {{ selectedItem.cologne }} #{{ selectedItem.cp }}, {{ selectedItem.home }} #{{ selectedItem.numAddress }}
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
            <el-button type="danger" @click="confimarBaja()">
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
      export default {
          name:'AdminWorksComponent',
          data:()=>({
            url:process.env.VUE_APP_ROOT_ASSETS,
            urlApi:process.env.API,
            tableData:[],
            selectedItem: null,
            dialogVisible: false,
          }),
          mounted(){
            this.refresh()
          },
          methods:{
            refresh(){
              this.tableData = []
              axios.get('orden').then(res=>{
                this.tableData=res.data.data
              })
            },
            pdf(row){
            console.log(row)
            this.selectedItem=row
            this.selectedItem = null
            },
            confimarBaja(){
              axios.delete('orden/'+this.selectedItem.id).then(res=>{
              console.log(res)
              this.refresh()
              this.dialogVisible=false
            })
            },
            bajaOrden(row){
              console.log(row)
              this.selectedItem=row
              this.dialogVisible=true
            },
            completarOrden(){},
          }
      }
  </script>
<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div>
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start" >
          <div class="flex flex-wrap items-start justify-end ">

            <router-link to="/admin/calendar" class="inline-flex px-5 py-3 text-white bg-blue-400 hover:bg-blue-700 focus:bg-blue-800 rounded-md ml-6 mb-3"
            style="color:black">
              <i class="fa fa-bookmark" aria-hidden="true" style="margin-top: 5px;
              margin-left: -5px; margin-right:10px;"></i>                
              Agenda por realizar
            </router-link>
  
            <router-link to="/admin/calendar/complete" class="inline-flex px-5 py-3 text-white bg-green-400 hover:bg-green-600 focus:bg-green-700 rounded-md ml-6 mb-3" style="color:black">
              <i class="fa fa-check" aria-hidden="true" style="margin-top: 5px;
              margin-left: -5px; margin-right:10px;"></i>                
              Agenda realizadas
            </router-link>
  
            <router-link to="/admin/works/edit-works" class="inline-flex px-5 py-3 text-white bg-yellow-400 hover:bg-yellow-500 focus:bg-yellow-600 rounded-md ml-6 mb-3" style="color:black">
              <i class="fa fa-circle-exclamation" aria-hidden="true" style="margin-top: 5px;
              margin-left: -5px; margin-right:10px;"></i>                
              **************
            </router-link>
            
          </div>
        </div>
        <div class="mr-6">
          <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Agenda por realizadas</h1>
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
                <router-link to="" >
                  <el-button style="color:black"
                  size="small"
                  type="warning"
                  @click="handleDelete()"
                  ><span class="material-symbols-outlined">done</span></el-button
                >
                </router-link>
              </template>
            </el-table-column>

                <el-table-column prop="nameCliente" label="Nombre"  sortable width="120" />
                <el-table-column prop="lastnameCliente1" label="Apellido Paterno"  sortable width="155" />
                <el-table-column prop="lastnameCliente2" label="Apellido Materno"  sortable width="160" />
                <el-table-column prop="direccionCliente" label="Dirección" sortable width="130" />
                <el-table-column prop="numTelefono" label="Celular" sortable width="160"  />
                <el-table-column prop="fechaAsistencia" label="Fecha para asistir" sortable width="160"  />
                <el-table-column label="">
                    <template #default>
                      <el-button style="color:black"
                        size="small"
                        type="danger"
                        @click="handleDelete()"
                        ><span class="material-symbols-outlined">delete</span></el-button>
                    </template>
                  </el-table-column>
            </el-table>
        </div>
        <!-- END TABLE DATA -->
    </div>
  
  </template>
  
  <script>
  
      export default {
          name:'AdminHomeComponent',
          
          data:()=>({
                tableData:[],
          }),
          mounted(){
            this.tableData = [{
                    nameCliente:'Luis Angel',
                    lastnameCliente1:'Peña',
                    lastnameCliente2:'Mora',
                    direccionCliente:'No. 189, Grove St, Los Angeles',
                    numTelefono:'6361111111',
                    fechaAsistencia: '2024-03-24',
                },
                {
                    nameCliente:'Jesus Liadeo',
                    lastnameCliente1:'Chavez',
                    lastnameCliente2:'Chavez',
                    direccionCliente:'No. 189, Grove St, Los Angeles',
                    numTelefono:'6362222222',
                    fechaAsistencia: '2024-03-24',
                }
            ]
          },
          methods:{
            handleEdit(){},
            handleDelete(){},
          }
      }
  </script>
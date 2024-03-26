<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div>
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start" >
          <div class="flex flex-wrap items-start justify-end -mb-3">

            <router-link to="/admin/works" class="inline-flex px-5 py-3 text-white bg-blue-400 hover:bg-blue-700 focus:bg-blue-800 rounded-md ml-6 mb-3"
            style="color:black">
              <i class="fa fa-search" aria-hidden="true" style="margin-top: 5px;
              margin-left: -5px; margin-right:10px;"></i>                
              Consultar Orden
            </router-link>
  
            <router-link to="/admin/works/add-works" class="inline-flex px-5 py-3 text-white bg-green-400 hover:bg-green-600 focus:bg-green-700 rounded-md ml-6 mb-3" style="color:black">
              <i class="fa fa-plus-circle" aria-hidden="true" style="margin-top: 5px;
              margin-left: -5px; margin-right:10px;"></i>                
              Nueva Orden
            </router-link>
  
            <router-link to="/admin/works/edit-works" class="inline-flex px-5 py-3 text-white bg-yellow-400 hover:bg-yellow-500 focus:bg-yellow-600 rounded-md ml-6 mb-3" style="color:black">
              <i class="fa fa-pencil" aria-hidden="true" style="margin-top: 5px;
              margin-left: -5px; margin-right:10px;"></i>                
              Editar Orden
            </router-link>
            
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
            >

            <el-table-column label="">
              <template #default>
                <el-button style="color:black"
                  size="small"
                  type="success"
                  @click="handleDelete()"
                  ><span class="material-symbols-outlined">visibility</span></el-button
                >
              </template>
            </el-table-column>

                <el-table-column prop="nameCliente" label="Nombre del Cliente"  sortable width="180" />
                <el-table-column prop="nameComercial" label="Nombre Comercial"  sortable width="180" />
                <el-table-column prop="fumi" label="Fumigador"  sortable width="120" />
                <el-table-column prop="direccionCliente" label="Dirección" sortable width="160" />
                <el-table-column prop="fechaOrden" label="Fecha de Orden" sortable width="160"  />
                <el-table-column prop="fechaAsistencia" label="Fecha de asistencia" sortable width="170"  />
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
                    nameCliente:'Luis Angel Peña Mora',
                    nameComercial:"La Pepa",
                    fumi:"Juan Carlos",
                    direccionCliente:'No. 189, Grove St, Los Angeles',
                    fechaOrden: '2024-03-24',
                    fechaAsistencia: '2024-03-24',
                },
                {
                    nameCliente:'Luis Angel Peña Mora',
                    nameComercial:"La Pepa",
                    fumi:"Juan Carlos",
                    direccionCliente:'No. 189, Grove St, Los Angeles',
                    fechaOrden: '2024-03-24',
                    fechaAsistencia: '2024-03-24',
                },
                {
                    nameCliente:'Luis Angel Peña Mora',
                    nameComercial:"La Pepa",
                    fumi:"Juan Carlos",
                    direccionCliente:'No. 189, Grove St, Los Angeles',
                    fechaOrden: '2024-03-24',
                    fechaAsistencia: '2024-03-24',
                },
                {
                    nameCliente:'Luis Angel Peña Mora',
                    nameComercial:"La Pepa",
                    fumi:"Juan Carlos",
                    direccionCliente:'No. 189, Grove St, Los Angeles',
                    fechaOrden: '2024-03-24',
                    fechaAsistencia: '2024-03-24',
                },
            ]
          },
          methods:{
            handleEdit(){},
            handleDelete(){},
          }
      }
  </script>
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
                  @click="handleDelete()"
                  ><span class="material-symbols-outlined">visibility</span></el-button
                >
              </template>
            </el-table-column>

                <el-table-column prop="apCliente" label="Apellido Paterno" sortable width="155"  />
                <el-table-column prop="amCliente" label="Apellido Materno"  sortable width="160"/>
                <el-table-column prop="nameCliente" label="Nombres"  sortable width="110"/>
                <el-table-column prop="address" label="Dirección" sortable width="160" />
                <el-table-column prop="numCelu" label="Numero Celular"  sortable width="160" />
                <el-table-column prop="numTel" label="Numero Fijo"  sortable width="130" />
                
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
                        @click="handleDelete()"
                        ><span class="material-symbols-outlined">delete</span></el-button
                        >
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
                    apCliente: 'Peña',
                    amCliente:'Mora',
                    nameCliente: 'Luis Angel',
                    address: 'No. 189, Grove St, Los Angeles',
                    numCelu:'6361306641',
                    numTel:'636130664',
                },
                {
                    apCliente: 'Chavez',
                    amCliente:'Chavez',
                    nameCliente: 'Jesus Liadeo',
                    address: 'No. 189, Grove St, Los Angeles',
                    numCelu:'636125070',
                    numTel:'636125070',
                },
                {
                    apCliente: 'Mozqueda',
                    amCliente:'Gomez',
                    nameCliente: 'Emiliano',
                    address: 'No. 189, Grove St, Los Angeles',
                    numCelu:'6361224988',
                    numTel:'6361224988',
                },
                {
                    apCliente: 'Madrid',
                    amCliente:'Holguin',
                    nameCliente: 'Alan Saul',
                    address: 'No. 189, Grove St, Los Angeles',
                    numCelu:'6361024108',
                    numTel:'6361024108',
                },
            ]
          },
          methods:{
            handleEdit(){},
            handleDelete(){},
          }
      }
  </script>
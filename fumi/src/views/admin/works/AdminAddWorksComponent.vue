<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div>
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start" >
          <div class="flex flex-wrap items-start justify-end ">

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
          <el-form :model="form" label-width="auto" style="max-width: 100%">
            
            <p>Cliente</p>

            <el-form-item label="Nombre comercial: "
            style="width: 50%">
              <el-input v-model="form.comercio" 
              placeholder="Ingresa el nombre del comercio"/>
            </el-form-item>

            <div class="flex">
              <el-form-item label="Nombres: ">
                <el-input v-model="form.name" 
                placeholder="Ingresa sus nombres"/>
              </el-form-item>
              <el-form-item label="Apellido paterno: ">
                <el-input v-model="form.lastname1" 
                placeholder="Ingresa su primer apellido"/>
              </el-form-item>
              <el-form-item label="Apellido materno: ">
                <el-input v-model="form.lastname2" 
                placeholder="Ingresa su segundo apellido"/>
              </el-form-item>
            </div>

            

            <p>Problematica</p>

            <div class="flex">
              <el-form-item label="Plaga#1: "
              style="width: 50%">
                <el-select v-model="form.plaga1" placeholder="Selecciona la  colonia">
                  <el-option label="Cucarachas" value="cucarachas" />
                  <el-option label="Pulgas" value="pulgas" />
                </el-select>
              </el-form-item>
              <el-form-item label="Plaga#2: "
              style="width: 50%">
                <el-select v-model="form.plaga2" placeholder="Selecciona la cuidad">
                  <el-option label="Cucarachas" value="cucarachas" />
                  <el-option label="Pulgas" value="pulgas" />
                </el-select>
              </el-form-item>
            </div>

            <p>Fechas</p>

            <el-form-item label="Fecha de orden">
              <el-col :span="11">
                <el-date-picker
                  v-model="form.date1"
                  type="date"
                  placeholder="Orden"
                  style="width: 50%"
                />
              </el-col>
            </el-form-item>

            <el-form-item label=" Fecha de asistencia">
              <el-col :span="11">
                <el-date-picker
                  v-model="form.date2"
                  type="date"
                  placeholder="Orden"
                  style="width: 50%"
                />
              </el-col>
            </el-form-item>

            <el-form-item label="De hora">
              <el-col :span="11">
                <el-time-picker
                  v-model="form.date3"
                  placeholder="Hora"
                  style="width: 50%"
                />
              </el-col>
            </el-form-item>

            <el-form-item label="A hora">
              <el-col :span="11">
                <el-time-picker
                  v-model="form.date4"
                  placeholder="Hora"
                  style="width: 50%"
                />
              </el-col>
            </el-form-item>

            <el-form-item label="Extra...">
              <el-checkbox-group v-model="form.type">
                <el-checkbox value="Presupuesto" name="type">
                  Presupuesto
                </el-checkbox>
                <el-checkbox value="Fumigar" name="type">
                  Fumigar
                </el-checkbox>
                <el-checkbox value="Garantia" name="type">
                  Garantia
                </el-checkbox>
                <el-checkbox value="Cortesia" name="type">
                  Cortesia
                </el-checkbox>
              </el-checkbox-group>
            </el-form-item>
            
            <el-form-item>
              <el-button type="success" @click="onSubmit" round plain>Crear</el-button>
              <el-button type="success" round>Success</el-button>
            </el-form-item>

            <div class="mb-4">
              <el-button>Default</el-button>
              <el-button type="primary">Primary</el-button>
              <el-button type="success">Success</el-button>
              <el-button type="info">Info</el-button>
              <el-button type="warning">Warning</el-button>
              <el-button type="danger">Danger</el-button>
            </div>
            <div class="mb-4">
              <el-button round>Round</el-button>
              <el-button type="primary" round>Primary</el-button>
              <el-button type="success" round>Success</el-button>
              <el-button type="info" round>Info</el-button>
              <el-button type="warning" round>Warning</el-button>
              <el-button type="danger" round>Danger</el-button>
            </div>
            <div class="mb-4">
              <el-button plain>Plain</el-button>
              <el-button type="primary" plain>Primary</el-button>
              <el-button type="success" plain>Success</el-button>
              <el-button type="info" plain>Info</el-button>
              <el-button type="warning" plain>Warning</el-button>
              <el-button type="danger" plain>Danger</el-button>
            </div>
            <div>
              <el-button color="#626aef" :dark="isDark">Default</el-button>
              <el-button color="#626aef" :dark="isDark" plain>Plain</el-button>
          
              <el-button color="#626aef" :dark="isDark" disabled>Disabled</el-button>
              <el-button color="#626aef" :dark="isDark" disabled plain
                >Disabled Plain</el-button
              >
            </div>
          </el-form>
        </div>
        <!-- END TABLE DATA -->
    </div>
  
  </template>
  
  <script>
      export default {
          name:'AdminHomeComponent',
          
          data:()=>({
                tableData:[],
                form:{
                name:'',
                lastname1:'',
                lastname2:'',
                comercio:'',
                plaga1:'',
                plaga2:'',
                date1:'',
                date2:'',
                date3:'',
                date4:'',
                type: [],
            },
          }),
          mounted(){
            
          },
          methods:{
            handleEdit(){},
            handleDelete(){},
          }
      }
  </script>
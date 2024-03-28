<template>
  <!-- Importar Iconos-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div>
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-start" >
          <div class="flex flex-wrap items-start justify-end ">

          <router-link to="/admin/works" class="inline-flex px-5 py-3 text-white bg-red-400 hover:bg-red-700 focus:bg-red-800 rounded-md ml-6 mb-3"
          style="color:black">
            <i class="fa fa-rotate-left" aria-hidden="true" style="margin-top: 5px;
            margin-left: -5px; margin-right:10px;"></i>                
            Devolver
          </router-link>

          </div>
        </div>
        <div class="mr-6">
          <h1 class="py-10 px-5 text-4xl font-semibold mb-2">Completar orden de trabajo</h1>
        </div>
        <!-- TABLE DATA -->

        <div class="flex ml-5">
          <el-form :model="form" label-width="auto" style="max-width: 100%">
            
            <p>Cliente</p>
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-12">Nombre Comercial:</p>
              <p class="px-20 pr-10">Nombres:</p>
              <p class="px-20 ml-12 ">Apellido Paterno:</p>
              <p class="px-5">Apellido Materno:</p>
            </div>

            <!-- Primera Fila -->  
            <div class="flex">
              <el-form-item class="ml-5" style="width: 25%">
                <el-input v-model="form.comercio" 
                placeholder="Ingresa el nombre del comercio"/>
              </el-form-item>
              <el-form-item class="px-8">
                <el-input v-model="form.name" 
                placeholder="Ingresa sus nombres"/>
              </el-form-item>
              <el-form-item class="px-6">
                <el-input v-model="form.lastname1" 
                placeholder="Ingresa su primer apellido"/>
              </el-form-item>
              <el-form-item class="px-5">
                <el-input v-model="form.lastname2" 
                placeholder="Ingresa su segundo apellido"/>
              </el-form-item>
            </div>

            <!-- Segunda Fila --> 
            <p>Problematica</p>
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-8">Plaga #1:</p>
              <p class="px-36 pr-7">Plaga #2:</p>
            </div>

            <div class="flex" style="width:100%;">
              <el-form-item class="px-5" style="width: 25%" >
                <el-select v-model="form.plaga1" placeholder="Selecciona la plaga" >
                  <el-option label="Cucarachas" value="cucarachas" />
                  <el-option label="Pulgas" value="pulgas" />
                  <el-option label="Chinches" value="chinches" />
                  <el-option label="Cucaracha de cocina" value="cucaracha de cocina" />
                  <el-option label="Garrapatas" value="garrapatas" />
                  <el-option label="Palomillas" value="palomillas" />
                  <el-option label="Roedores" value="roedores" />
                  <el-option label="Hormigas" value="hormigas" />
                </el-select>
              </el-form-item>
              <el-form-item class="px-5" style="width: 25%" >
                <el-select v-model="form.plaga2" placeholder="Selecciona la plaga" >
                  <el-option label="Cucarachas" value="cucarachas" />
                  <el-option label="Pulgas" value="pulgas" />
                  <el-option label="Chinches" value="chinches" />
                  <el-option label="Cucaracha de cocina" value="cucaracha de cocina" />
                  <el-option label="Garrapatas" value="garrapatas" />
                  <el-option label="Palomillas" value="palomillas" />
                  <el-option label="Roedores" value="roedores" />
                  <el-option label="Hormigas" value="hormigas" />
                </el-select>
              </el-form-item>
            </div>


            <!-- Tercera Fila --> 
            <p>Fechas</p>
            <div style="display:flex" class="m-2"   >
              <p class="px-4 pr-12">Fecha de orden:</p>
              <p class="px-20 pr-7">Fecha para asistir:</p>
              <p class="px-5 ml-12 ">De hora:</p>
              <p class="px-40">A hora:</p>
            </div>
            <div class="flex">
              <el-form-item class="px-5" style="width: 25%">
                <el-col :span="11">
                  <el-date-picker
                    v-model="form.date1"
                    type="date"
                    placeholder="Orden"
                    
                  />
                </el-col>
              </el-form-item>
  
              <el-form-item class="ml-5" style="width: 25%" >
                <el-col :span="11">
                  <el-date-picker
                    v-model="form.date2"
                    type="date"
                    placeholder="Orden"
                    
                  />
                </el-col>
              </el-form-item>
  
              <el-form-item  style="width: 25%">
                <el-col :span="11">
                  <el-time-picker
                    v-model="form.date3"
                    placeholder="Hora"
                    
                  />
                </el-col>
              </el-form-item>
  
              <el-form-item style="width: 25%">
                <el-col :span="11">
                  <el-time-picker
                    v-model="form.date4"
                    placeholder="Hora"
                    
                  />
                </el-col>
              </el-form-item>
            </div>

            <!-- Cuarta Fila --> 
            <div class="flex justify-start px-16">
              <el-form-item >
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
            </div>

            <div style="display:flex; justify-content: center;" class="">
              <el-button class="w-40 h-16 mt-5" style="background-color:#0B1821; border-radius:40px; font-size:25px;" type="info" round>Crear</el-button>
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
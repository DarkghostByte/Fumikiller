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
            
            <p>Fumigador</p>
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-12">Responsable</p>
              <p class="px-20 ml-12 ">Ayudante</p>
            </div>

            <!-- Primera Fila -->  
            <div class="flex">
              <el-form-item class="px-5" style="width: 25%" >
                <el-select v-model="form.fumigadorRes" placeholder="Selecciona el fumigador" >
                  <el-option label="Juan" value="juan" />
                  <el-option label="Pepe" value="pepe" />
                  <el-option label="Jesus" value="jesus" />
                </el-select>
              </el-form-item>
              <el-form-item class="px-5" style="width: 25%" >
                <el-select v-model="form.fumigadorAyu" placeholder="Selecciona ayudante" >
                  <el-option label="Juan" value="juan" />
                  <el-option label="Pepe" value="pepe" />
                  <el-option label="Jesus" value="jesus" />
                </el-select>
              </el-form-item>
            </div>

            <!-- Segunda Fila --> 
            <p>Producto interno</p>
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-8">Producto #1:</p>
              <p class="px-36 pr-7">Producto #2:</p>
            </div>

            <div class="flex" style="width:100%;">
              <el-form-item class="px-5" style="width: 25%" >
                <el-select v-model="form.productoInt1" placeholder="Selecciona el pruducto" >
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
                <el-select v-model="form.productoInt2" placeholder="Selecciona el pruducto" >
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
            <p>Producto externo</p>
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-8">Producto #1:</p>
              <p class="px-36 pr-7">Producto #2:</p>
            </div>

            <div class="flex" style="width:100%;">
              <el-form-item class="px-5" style="width: 25%" >
                <el-select v-model="form.productoExt1" placeholder="Selecciona el pruducto" >
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
                <el-select v-model="form.productoExt2" placeholder="Selecciona el pruducto" >
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


            <!-- Cuarta Fila --> 
            <p>Recomendaciones</p>
            <div style="display:flex" class="m-2"   >
              <p class="px-4 pr-12">No tapear:</p>
              <p class="px-32 ml-6">No ingresar:</p>
              <p class="px-12 ">Otra dosis:</p>
              <p class="px-36">Hora:</p>
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
  
              <el-form-item class="px-6" style="width: 25%" >
                <el-col :span="11">
                  <el-time-picker
                    v-model="form.date2"
                    
                    placeholder="Orden"
                    
                  />
                </el-col>
              </el-form-item>
  
              <el-form-item class="px-6" style="width: 25%">
                <el-col :span="11">
                  <el-date-picker
                    v-model="form.date3"
                    type="date"
                    placeholder="Orden"
                    
                  />
                </el-col>
              </el-form-item>
  
              <el-form-item class="px-6" style="width: 25%">
                <el-col :span="11">
                  <el-time-picker
                    v-model="form.date4"
                    placeholder="Hora"
                    
                  />
                </el-col>
              </el-form-item>
            </div>

            <!-- Quinta Fila --> 
            <p>Requiere de:</p>
            <div class="flex justify-start px-16">
              <el-form-item >
                <el-checkbox-group v-model="form.requiere">
                  <el-checkbox value="Factura" name="type">
                    Factura
                  </el-checkbox>
                  <el-checkbox value="Certificado" name="type">
                    Certificado
                  </el-checkbox>
                  <el-checkbox value="Remision" name="type">
                    Remision
                  </el-checkbox>
                  <el-checkbox value="Nada" name="type">
                    Nada
                  </el-checkbox>
                </el-checkbox-group>
              </el-form-item>
            </div>

            <div style="display:flex; justify-content: center;" class="">
              <el-button class="w-40 h-16 mt-5" style="background-color:#11639c; border-radius:40px; font-size:25px;" type="info" round>Crear</el-button>
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
                  fumigadorRes:'',
                  fumigadorAyu:'',
                  productoInt1:'',
                  productoInt2:'',
                  productoExt1:'',
                  productoExt2:'',
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
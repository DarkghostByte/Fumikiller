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


        <!-- TABLE INSERT -->
        <!-- Primera Fila -->
        <div class="flex">
          <el-form :model="form" label-width="auto" style="max-width: 100%">
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-7">Nombres:</p>
              <p class="px-20 ml-12 ">Apellido Paterno:</p>
              <p class="px-5">Apellido Materno:</p>
              <p class="px-20 pr-5">Nombre Comercial:</p>
            </div>
            
            <div class="flex">
              <el-form-item >
                <el-input v-model="form.name" class="px-5" 
                placeholder="Ingresa sus nombres"/>
              </el-form-item>
              <el-form-item >
                <el-input v-model="form.lastname1" class="px-5"
                placeholder="Ingresa su apellido paterno"/>
              </el-form-item>
              <el-form-item >
                <el-input v-model="form.lastname2" class="px-5"
                placeholder="Ingresa su apellido materno"/>
              </el-form-item>
              <el-form-item >
                <el-input v-model="form.comercio" class="px-5"
                placeholder="Ingresa el nombre del comercio"/>
              </el-form-item>


            </div>
            <!-- Segunda Fila -->
            <p class="px-5">Domicilio:</p>
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-7">Tipo de Calle:</p>
              <p class="px-12 ml-12 ">Domicilio:</p>
              <p class="px-28 pr-">Codigo Postal:</p>
              <p class="pr-5">Colonia:</p>
            </div>
            <div class="flex px-5" style="">
              <el-select v-model="form.call" placeholder="Tipo de calle" class="w-20" style="width: 180px;" >
                <el-option label="Av." value="Av." />
                <el-option label="Calle" value="Calle" />
                <el-option label="Callejón" value="Callejon" />
              </el-select>
              <el-form-item >
                <el-input v-model="form.name1" class="px-10"
                placeholder="Ingresa el domicilio"/>
              </el-form-item>
              <el-form-item >
                <el-input v-model="form.codpostal" class=""
                placeholder="Ingresa el codigo postal"/>
              </el-form-item>
              <el-form-item >
                <el-select v-model="form.col" placeholder="Selecciona la  colonia" class="px-10" style="width: 265px;" >
                  <el-option label="Primera de mayo" value="primerademayo" />
                  <el-option label="Madero" value="madero" />
                </el-select>
              </el-form-item>
            </div>

            <!-- Tercera Fila -->
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-7">Ciudad:</p>
              <p class="px-24 ml-12 ">Tipo de lugar:</p>
            </div>
            <div class="flex">
              <el-form-item class="px-5" style="width: 25%">
                <el-select v-model="form.cui" placeholder="Selecciona la cuidad">
                  <el-option label="Nuevo Casas Grande" value="ncg" />
                  <el-option label="Casas Grandes" value="cg" />
                </el-select>
              </el-form-item>
              <el-form-item class="px-2" style="width: 25%">
                <el-select v-model="form.lug" placeholder="Selecciona el tipo de lugar">
                  <el-option label="Restaurante" value="restaurante" />
                  <el-option label="Bodega" value="bodega" />
                </el-select>
              </el-form-item>
            </div>
            <!-- Descripción Fila -->
            <div class="px-5" > 
              <p>Descripción:</p>
              <el-form-item class="pt-4" >
                <el-input v-model="form.desc" type="textarea" 
                placeholder="Agrega una descripcion"/>
              </el-form-item>
            </div>
            
            <!-- Como llegar Fila -->
            <div class="px-5">
              <p>Como llegar:</p>
              <el-form-item class="pt-5" >
                <el-input v-model="form.lleg" type="textarea" 
                placeholder="Agrega como llegar al domicilio"/>
              </el-form-item>
            </div>
            
            <!-- Sexta Fila -->
            <p class="px-5">Domicilio:</p>
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-7">Numero de Celular:</p>
              <p class="px-12">Numero Fijo:</p>
            </div>
            <div class="flex">
              <el-form-item class="px-5">
                <el-input v-model="form.phone1" 
                placeholder="Celular"/>
              </el-form-item>
              <el-form-item class="px-3" >
                <el-input v-model="form.phone2" 
                placeholder="Celular"/>
              </el-form-item>
            </div>

            <!-- Septima Fila -->
            <div style="display:flex" class="m-2"  >
              <p class="px-4 pr-7">Forma de contacto:</p>
              <p class="px-12">Especificar:</p>
            </div>

            <div class="flex">
              <el-form-item class="px-5" style="width: 25%">
                <el-select v-model="form.contac" placeholder="Selecciona la  forma de contacto" class="">
                  <el-option label="Facebook" value="facebook" />
                  <el-option label="Barda" value="barda" />
                </el-select>
              </el-form-item>
              <el-form-item >
                <el-input v-model="form.espe" 
                placeholder="Especificar"/>
              </el-form-item>
            </div>
            
            <div style="color:white; display:flex; justify-content: center;" class="white">
              <el-button class="w-40 h-16 mt-5" style="color:white; background-color:#11639c; border-radius:40px; font-size:25px;" type="info" round>Crear</el-button>
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
                col:'',
                call:'',
                codpostal:'',
                cui:'',
                lug:'',
                desc:'',
                lleg:'',
                phone1:'',
                phone2:'',
                contac:'',
                espe:'',
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